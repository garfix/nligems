from chart import Chart
from chart_state import ChartState
from grammar_rule import GrammarRule
from extract_trees import extract_trees

"""
This Earley parser reads input (an array of tokens) and returns a set of parse trees.

Earley's top-down chart parsing algorithm as described in
"Speech and Language Processing" - Daniel Jurafsky & James H. Martin
It is the basic algorithm. Semantics (sense) is only calculated after the parse is complete.
"""
class Parser:
    lexicon = None
    grammar = None

    def __init__(self, lexicon, grammar):
        self.lexicon = lexicon
        self.grammar = grammar

    def parse(self, words):
        """return an array with 0) parse trees and 1) error"""
        chart = self.build_chart(words)

        if chart.is_ok():
            trees = extract_trees(chart)
        else:
            last_parsed_word_index, next_word = chart.find_last_completed_word_index()
            if next_word != "":
                error = "Incomplete. Could not parse word: " + next_word
            elif len(words) == 0:
                error = "No sentence given."
            elif last_parsed_word_index == len(words) - 1:
                error = "All words are parsed but some word or token is missing to make the sentence complete."
            trees = []
        return trees, chart.get_error()

    def build_chart(self, words):
        chart = Chart(words)
        word_count = len(words)

        # gamma(g1) => s(s1)
     	initial_state = ChartState(GrammarRule(("gamma", "s"), ("g1", "s1"), ()), 1, 0, 0)
     	chart.enqueue(initial_state, 0)

     	# go through all word positions in the sentence
     	# note: the end value in Python's range() is 1 larger than the last created index
     	for i in range(0, word_count + 1):

     		# go through all chart entries in this position (entries will be added while we're in the loop)
     		for j in range(0, len(chart.states[i])):

     			# a state is a complete entry in the chart (rule, dot_position, start_word_index, end_word_index)
     			state = chart.states[i][j]

     			# check if the entry is parsed completely
     			if state.is_incomplete():

     				# note: we make no distinction between part-of-speech and not part-of-speech; a category can be both

     				# add all entries that have this abstract consequent as their antecedent
     				self.predict(chart, state)

     				# if the current word in the sentence has this part-of-speech, then
     				# we add a completed entry to the chart (part-of-speech => word)
     				if i < word_count:
     					self.scan(chart, state)
     			else:

     				# proceed all other entries in the chart that have this entry's antecedent as their next consequent
     				tree_complete = self.complete(chart, state)

     				if tree_complete:
     					return chart

      	return chart

    def predict(self, chart, state):
        """Adds all entries to the chart that have the current consequent of $state as their antecedent"""

        next_consequent = state.rule.get_consequent(state.dot_position - 1)
        end_word_index = state.end_word_index

        # go through all rules that have the next consequent as their antecedent
        for new_rule in self.grammar.find_rules(next_consequent):
            predicted_state = ChartState(new_rule, 1, end_word_index, end_word_index)
            chart.enqueue(predicted_state, end_word_index)

    def scan(self, chart, state):
        """
        If the current consequent in state (which non-abstract, like noun, verb, adjunct) is one
        of the parts of speech associated with the current word in the sentence,
        then a new, completed, entry is added to the chart: (cat => word)
        """
        next_consequent = state.rule.get_consequent(state.dot_position - 1)
        end_word_index = state.end_word_index
        end_word = chart.words[end_word_index]

        lex_item_found = self.lexicon.get_lex_item(end_word, next_consequent)
        if lex_item_found:
            rule = Grammar_rule((next_consequent, end_word), ("a", "b"), ())
            scanned_state = ChartState(rule, 2, end_word_index, end_word_index + 1)
            chart.enqueue(scanned_state, end_word_index + 1)

    def complete(self, chart, completed_state):
        """
        This function is called whenever a state is completed.
        Its purpose is to advance other states.

        For example:
         - this state is NP -> noun, it has been completed
         - now proceed all other states in the chart that are waiting for an NP at the current position
        """
        tree_complete = False
        completed_antecedent = completed_state.rule.get_antecedent()
        for i, charted_state in enumerate(chart.states[completed_state.start_word_index]):

            dot_position = charted_state.dot_position
            rule = charted_state.rule

            # check if the antecedent of the completed state matches the charted state's consequent at the dot position
            if (dot_position > rule.get_consequent_count()) or (rule.get_consequent(dot_position-1) != completed_antecedent):
                continue

            advanced_state = ChartState(rule, dot_position + 1, charted_state.start_word_index, completed_state.end_word_index)

            # store extra information to make it easier to extract parse trees later
            tree_complete, advanced_state = chart.store_state_info(completed_state, charted_state, advanced_state)
            if tree_complete:
                break

            chart.enqueue(advanced_state, completed_state.end_word_index)

        return tree_complete


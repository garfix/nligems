from chart import Chart
from chartstate import ChartState
from grammarrule import GrammarRule
from extracttrees import extractTrees

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
        chart = self.buildChart(words)

        if chart.isOk():
            trees = extractTrees(chart)
        else:
            lastParsedWordIndex, nextWord = chart.findLastCompletedWordIndex()
            if nextWord != "":
                error = "Incomplete. Could not parse word: " + nextWord
            elif len(words) == 0:
                error = "No sentence given."
            elif lastParsedWordIndex == len(words) - 1:
                error = "All words are parsed but some word or token is missing to make the sentence complete."
            trees = []
        return trees, chart.getError()

    def buildChart(self, words):
        chart = Chart(words)
        wordCount = len(words)

        # gamma(g1) => s(s1)
     	initialState = ChartState(GrammarRule(("gamma", "s"), ("g1", "s1"), ()), 1, 0, 0)
     	chart.enqueue(initialState, 0)

     	# go through all word positions in the sentence
     	# note: the end value in Python's range() is 1 larger than the last created index
     	for i in range(0, wordCount + 1):

     		# go through all chart entries in this position (entries will be added while we're in the loop)
     		for j in range(0, len(chart.states[i])):

     			# a state is a complete entry in the chart (rule, dotPosition, startWordIndex, endWordIndex)
     			state = chart.states[i][j]

     			# check if the entry is parsed completely
     			if state.isIncomplete():

     				# note: we make no distinction between part-of-speech and not part-of-speech; a category can be both

     				# add all entries that have this abstract consequent as their antecedent
     				self.predict(chart, state)

     				# if the current word in the sentence has this part-of-speech, then
     				# we add a completed entry to the chart (part-of-speech => word)
     				if i < wordCount:
     					self.scan(chart, state)
     			else:

     				# proceed all other entries in the chart that have this entry's antecedent as their next consequent
     				treeComplete = self.complete(chart, state)

     				if treeComplete:
     					return chart

      	return chart

    def predict(self, chart, state):
        """Adds all entries to the chart that have the current consequent of $state as their antecedent"""

        nextConsequent = state.rule.getConsequent(state.dotPosition - 1)
        endWordIndex = state.endWordIndex

        # go through all rules that have the next consequent as their antecedent
        for newRule in self.grammar.findRules(nextConsequent):
            predictedState = ChartState(newRule, 1, endWordIndex, endWordIndex)
            chart.enqueue(predictedState, endWordIndex)

    def scan(self, chart, state):
        """
        If the current consequent in state (which non-abstract, like noun, verb, adjunct) is one
        of the parts of speech associated with the current word in the sentence,
        then a new, completed, entry is added to the chart: (cat => word)
        """
        nextConsequent = state.rule.getConsequent(state.dotPosition - 1)
        endWordIndex = state.endWordIndex
        endWord = chart.words[endWordIndex]

        lexItemFound = self.lexicon.getLexItem(endWord, nextConsequent)
        if lexItemFound:
            rule = GrammarRule((nextConsequent, endWord), ("a", "b"), ())
            scannedState = ChartState(rule, 2, endWordIndex, endWordIndex + 1)
            chart.enqueue(scannedState, endWordIndex + 1)

    def complete(self, chart, completedState):
        """
        This function is called whenever a state is completed.
        Its purpose is to advance other states.

        For example:
         - this state is NP -> noun, it has been completed
         - now proceed all other states in the chart that are waiting for an NP at the current position
        """
        treeComplete = False
        completedAntecedent = completedState.rule.getAntecedent()
        for i, chartedState in enumerate(chart.states[completedState.startWordIndex]):

            dotPosition = chartedState.dotPosition
            rule = chartedState.rule

            # check if the antecedent of the completed state matches the charted state's consequent at the dot position
            if (dotPosition > rule.getConsequentCount()) or (rule.getConsequent(dotPosition-1) != completedAntecedent):
                continue

            advancedState = ChartState(rule, dotPosition + 1, chartedState.startWordIndex, completedState.endWordIndex)

            # store extra information to make it easier to extract parse trees later
            treeComplete, advancedState = chart.storeStateInfo(completedState, chartedState, advancedState)
            if treeComplete:
                break

            chart.enqueue(advancedState, completedState.endWordIndex)

        return treeComplete


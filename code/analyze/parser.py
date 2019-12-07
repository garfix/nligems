from chart import Chart
from chartstate import ChartState
from grammarrule import GrammarRule

"""
This Earley parser reads input (an array of tokens) and returns a set of parse trees.
"""
class Parser:
    lexicon = None
    grammar = None

    def __init__(self, grammar, lexicon):
        self.grammar = grammar
        self.lexicon = lexicon

    def parse(self, words):
        """return an array with 0) parse trees and 1) error"""
        chart = self.buildChart(words)

        if chart.isOk():
            trees = self.extractTrees(chart)
        else:
            [lastParsedWordIndex, nextWord] = self.findLastCompletedWordIndex(chart)
            if nextWord != "":
                error = "Incomplete. Could not parse word: " + nextWord
            elif len(words) == 0:
                error = "No sentence given."
            elif lastParsedWordIndex == len(words) - 1:
                error = "All words are parsed but some word or token is missing to make the sentence complete."
            trees = []
        return [trees, chart.getError()]

    def buildChart(self, words):
        chart = Chart(words)
        wordCount = len(words)

     	initialState = ChartState(GrammarRule(("gamma", "s"), ("g1", "s1"), ()), 1, 0, 0)
#     	parser.enqueue(chart, initialState, 0)
#
#     	// go through all word positions in the sentence
#     	for i := 0; i <= wordCount; i++ {
#
#     		// go through all chart entries in this position (entries will be added while we're in the loop)
#     		for j := 0; j < len(chart.states[i]); j++ {
#
#     			// a state is a complete entry in the chart (rule, dotPosition, startWordIndex, endWordIndex)
#     			state := chart.states[i][j]
#
#     			// check if the entry is parsed completely
#     			if parser.isStateIncomplete(state) {
#
#     				// note: we make no distinction between part-of-speech and not part-of-speech; a category can be both
#
#     				// add all entries that have this abstract consequent as their antecedent
#     				parser.predict(chart, state)
#
#     				// if the current word in the sentence has this part-of-speech, then
#     				// we add a completed entry to the chart (part-of-speech => word)
#     				if i < wordCount {
#     					parser.scan(chart, state)
#     				}
#
#     			} else {
#
#     				// proceed all other entries in the chart that have this entry's antecedent as their next consequent
#     				treeComplete := parser.complete(chart, state)
#
#     				if treeComplete {
#
#     					parser.log.EndDebug("createChart", true)
#
#     					return chart, true
#     				}
#     			}
#     		}
#     	}
#
      	return chart


    def extractTrees(self, chart):
        return ()

    def findLastCompletedWordIndex(self, chart):
        return ""

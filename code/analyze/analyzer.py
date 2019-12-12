from parser import Parser
from tokenizer import Tokenizer
from extract_trees import extract_trees
from extract_semantics import extract_semantics

class Analyzer:
    lexicon = None
    grammar = None

    def __init__(self, lexicon, grammar):
        self.lexicon = lexicon
        self.grammar = grammar

    def get_trees(self, input):
        """return an array with 0) parse trees and 1) error"""
        error = ""
        tokenizer = Tokenizer()
        parser = Parser(self.lexicon, self.grammar)

        tokens = tokenizer.tokenize(input)
        chart = parser.parse(tokens)
        trees = extract_trees(chart)

        if len(trees) == 0:
            last_parsed_word_index, next_word = chart.find_last_completed_word_index()
            if next_word != "":
                error = "Incomplete. Could not parse word: " + next_word
            elif len(words) == 0:
                error = "No sentence given."
            elif last_parsed_word_index == len(words) - 1:
                error = "All words are parsed but some word or token is missing to make the sentence complete."
            trees = []
        return trees, error

    def get_semantics(self, input):
        trees, error = self.get_trees(input)
        if error != "":
            return [], ""

        return extract_semantics(trees, self.lexicon)

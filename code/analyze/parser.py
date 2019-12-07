"""
This Earley parser reads an array of tokens and returns a set of parse trees.
"""
class Parser:
    lexicon = None
    grammar = None

    def __init__(self, grammar, lexicon):
        self.grammar = grammar
        self.lexicon = lexicon

    def parse(self, tokens):
        print 'parse!'

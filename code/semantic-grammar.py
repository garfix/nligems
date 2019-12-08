from analyze import Tokenizer, Parser, Grammar, GrammarRule, Lexicon, LexItem

input = "put all blue blocks on the red block"

tokenizer = Tokenizer()

lexicon = Lexicon()
lexicon.add_lex_item(LexItem('put'))
lexicon.add_lex_item(LexItem('on'))
lexicon.add_lex_item(LexItem('the'))
lexicon.add_lex_item(LexItem('all'))
lexicon.add_lex_item(LexItem('blue'))
lexicon.add_lex_item(LexItem('red'))
lexicon.add_lex_item(LexItem('block'))
lexicon.add_lex_item(LexItem('blocks', 'block'))

grammar = Grammar()
# s(P1) -> vp(P1)
grammar.add_grammar_rule(GrammarRule(('s', 'vp'), ('P1', 'P1'), ()))
# vp(P1) -> put(P1) np(E1) on(P1) np(E2)
grammar.add_grammar_rule(GrammarRule(('vp', 'put', 'object', 'on', 'object'), ('P1', 'P1', 'E1', 'P1', 'E2'), ()))
# object(E1) -> np(E1)
grammar.add_grammar_rule(GrammarRule(('object', 'np'), ('E1', 'E1'), ()))
# np(E1) -> quantifier(Q1) nbar(E1)
grammar.add_grammar_rule(GrammarRule(('np', 'quantifier', 'nbar'), ('E1', 'Q1', 'E1'), ()))
# quantifier(Q1) -> the(Q1)
grammar.add_grammar_rule(GrammarRule(('quantifier', 'the'), ('Q1', 'Q1'), ()))
# quantifier(Q1) -> all(Q1)
grammar.add_grammar_rule(GrammarRule(('quantifier', 'all'), ('Q1', 'Q1'), ()))
# nbar(E1) -> adjp(A1) nbar(E1)
grammar.add_grammar_rule(GrammarRule(('nbar', 'adjp', 'nbar'), ('E1', 'A1', 'E1'), ()))
# nbar(E1) -> noun(E1)
grammar.add_grammar_rule(GrammarRule(('nbar', 'noun'), ('E1', 'E1'), ()))

parser = Parser(lexicon, grammar)

tokens = tokenizer.tokenize(input)

print tokens

trees = parser.parse(tokens)

print trees

print str(lexicon)
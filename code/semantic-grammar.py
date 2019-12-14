from analyze import Analyzer, Grammar, GrammarRule, Lexicon, LexItem, Relation, Variable, Value

input = "put all blue blocks on the red block"

lexicon = Lexicon()
lexicon.add_lex_item(LexItem('put'))
lexicon.add_lex_item(LexItem('on'))
lexicon.add_lex_item(LexItem('the'))
lexicon.add_lex_item(LexItem('all'))
lexicon.add_lex_item(LexItem('blue'))
lexicon.add_lex_item(LexItem('red'))
lexicon.add_lex_item(LexItem('block'))
lexicon.add_lex_item(LexItem('blocks', (), 'block'))

grammar = Grammar()
# s(P1) -> vp(P1)
grammar.add_rule(GrammarRule(('s', 'vp'), ('P1', 'P1'), []))
# vp(P1) -> put(P1) np(E1) on(P1) np(E2)
grammar.add_rule(GrammarRule(('vp', 'put', 'np', 'on', 'np'), ('P1', 'P1', 'E1', 'P1', 'E2'), [ Relation('put_on', [Variable('E1'), Variable('E2')]) ] ))
# np(E1) -> quantifier(Q1) nbar(E1)
grammar.add_rule(GrammarRule(('np', 'quantifier', 'nbar'), ('R1', 'Q1', 'R1'),
    [ Relation('quantifier', [
        Variable('Q1'), [ Relation('sem', [Value('1')]) ],
        Variable('R1'), [ Relation('sem', [Value('2')]) ],
        [ Relation('sem', [Value('parent')]) ]]) ]))
# nbar(E1) -> adjp(A1) nbar(E1)
grammar.add_rule(GrammarRule(('nbar', 'adjp', 'nbar'), ('E1', 'E1', 'E1'), []))
# nbar(E1) -> noun(E1)
grammar.add_rule(GrammarRule(('nbar', 'noun'), ('E1', 'E1'), []))
# adjp(A1) -> adjective(A1)
grammar.add_rule(GrammarRule(('adjp', 'adjective'), ('A1', 'A1'), []))

# quantifier(Q1) -> the(Q1)
grammar.add_rule(GrammarRule(('quantifier', 'the'), ('Q1', 'Q1'), [ Relation('the', [Variable('Q1')]) ]))
# quantifier(Q1) -> all(Q1)
grammar.add_rule(GrammarRule(('quantifier', 'all'), ('Q1', 'Q1'), [ Relation('all', [Variable('Q1')]) ]))
# noun(E1) -> block(E1)
grammar.add_rule(GrammarRule(('noun', 'block'), ('E1', 'E1'), [ Relation('block', [Variable('E1')]) ]))
# adjective(A1) -> red(A1)
grammar.add_rule(GrammarRule(('adjective', 'red'), ('A1', 'A1'), [ Relation('red', [Variable('A1')]) ]))
# adjective(A1) -> blue(A1)
grammar.add_rule(GrammarRule(('adjective', 'blue'), ('A1', 'A1'), [ Relation('blue', [Variable('A1')]) ]))

analyzer = Analyzer(lexicon, grammar)
trees = analyzer.get_trees(input)

#print 'Trees'
#print trees

semantics = analyzer.get_semantics(input)

print 'Semantics:'
print semantics

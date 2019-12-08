from analyze import Tokenizer, Parser, Grammar, Lexicon, LexItem

input = "put all blue blocks on the red block"

tokenizer = Tokenizer()

lexicon = Lexicon()
lexicon.addLexItem(LexItem('put'))
lexicon.addLexItem(LexItem('all'))
lexicon.addLexItem(LexItem('blue'))

grammar = Grammar()
parser = Parser(lexicon, grammar)

tokens = tokenizer.tokenize(input)

print tokens

trees = parser.parse(tokens)

print trees
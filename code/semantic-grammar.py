from analyze import Tokenizer, Parser, Grammar, Lexicon

input = "put all blue blocks on the red block"

tokenizer = Tokenizer()
lexicon = Lexicon()
grammar = Grammar()
parser = Parser(lexicon, grammar)

tokens = tokenizer.tokenize(input)

print tokens

trees = parser.parse(tokens)

print trees
"""
Creates individual tokens from a string. These tokens then serve as input to the parser.
"""
class Tokenizer:
    def tokenize(self, input):
        """Splits input string into an array of tokens"""
        return input.split(' ')
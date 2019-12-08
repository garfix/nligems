class Lexicon:

    lexItems = {}

    def addLexItem(self, lexItem):
        if not lexItem.form in self.lexItems:
            self.lexItems[lexItem.form] = []
        self.lexItems[lexItem.form].append(lexItem)

    def getLexItem(self, word, partOfSpeech):
        if not word in self.lexItems:
            return False
        for lexItem in self.lexItems[word]:
            if lexItem.partOfSpeech == partOfSpeech:
                return True
        return False


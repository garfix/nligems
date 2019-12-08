class Lexicon:

    lexItems = {}

    def addLexItem(self, lexItem):
        if not lexItem.form in self.lexItems:
            self.lexItems[lexItem.form] = []
        self.lexItems[lexItem.form].append(lexItem)

    def getLexItem(self, form, canonicalForm):
        if not form in self.lexItems:
            return False
        for lexItem in self.lexItems[form]:
            if lexItem.canonicalForm == canonicalForm:
                return True
        return False


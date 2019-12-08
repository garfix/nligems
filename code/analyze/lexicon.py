class Lexicon:

    lex_items = {}

    def add_lex_item(self, lex_item):
        if not lex_item.form in self.lex_items:
            self.lex_items[lex_item.form] = []
        self.lex_items[lex_item.form].append(lex_item)

    def get_lex_item(self, form, canonical_form):
        if not form in self.lex_items:
            return False
        for lex_item in self.lex_items[form]:
            if lex_item.canonical_form == canonical_form:
                return True
        return False

    def __repr__(self):
        return "{lex_items: " + str(self.lex_items) + "}"
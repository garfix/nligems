class LexItem:
    form = None
    canonicalForm = None

    def __init__(self, form, canonicalForm = None):
        self.form = form
        if canonicalForm == None:
            self.canonicalForm = form
        else:
           self.canonicalForm = canonicalForm

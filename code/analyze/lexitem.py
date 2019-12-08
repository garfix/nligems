class LexItem:
    form = None
    canonical_form = None

    def __init__(self, form, canonical_form = None):
        self.form = form
        if canonical_form == None:
            self.canonical_form = form
        else:
           self.canonical_form = canonical_form

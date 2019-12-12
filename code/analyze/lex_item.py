class LexItem:
    form = None
    canonical_form = None
    relation_templates = None

    def __init__(self, form, relation_templates = None, canonical_form = None):
        self.form = form
        if relation_templates == None:
            self.relation_templates = ()
        else:
            self.relation_templates = relation_templates

        if canonical_form == None:
            self.canonical_form = form
        else:
           self.canonical_form = canonical_form

    def __repr__(self):
        return "[" + self.form + ", " + self.canonical_form + "]"
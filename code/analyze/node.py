class Node:
    category = ""
    constituents = []
    form = ""
    rule = None

    def __init__(self, category, constituents, form, rule):
        self.category = category
        self.constituents = constituents
        self.form = form
        self.rule = rule

    def is_leaf_node(self):
        return len(self.constituents) == 0

    def __repr__(self):
        body = ""

        if self.form != "":
            body = self.form
        else:
            sep = ""
            for child in self.constituents:
                body = body + sep + repr(child)
                sep = " "

        return "[" + self.category + " " + body + "]"

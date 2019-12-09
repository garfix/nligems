class Node:
    category = ""
    constituents = []
    form = ""

    def __init__(self, category, constituents, form):
        self.category = category
        self.constituents = constituents
        self.form = form

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

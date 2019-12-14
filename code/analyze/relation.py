class Relation:
    predicate = None
    arguments = None

    def __init__(self, predicate, arguments):
        self.predicate = predicate
        self.arguments = arguments

    def __repr__(self):
        str = self.predicate + '('
        sep = ''
        for arg in self.arguments:
            str += sep + repr(arg)
            sep = ', '
        str += ')'
        return str

class Variable:
    name = None

    def __init__(self, name):
        self.name = name

    def __repr__(self):
        return self.name

class Value:
    value = None

    def __init__(self, value):
        self.value = value

    def __repr__(self):
        return self.value

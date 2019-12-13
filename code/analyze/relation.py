class Relation:
    predicate = None
    arguments = None

    def __init__(self, predicate, arguments):
        self.predicate = predicate
        self.arguments = arguments

    def __repr__(self):
        return self.predicate + '(' + ', '.join(self.arguments) + ')'

class Variable:
    name = None

    def __init__(self, name):
        self.name = name

class Value:
    value = None

    def __init__(self, value):
        self.value = value

class List:
    values = None

    def __init__(self, values):
        self.values = values

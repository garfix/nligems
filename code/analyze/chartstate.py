class ChartState:
    rule = None
    dotPosition = None
    startWordIndex = None
    endWordIndex = None

    childStateIds = None
    id = None

    def __init__(self, rule, dotPosition, startWordIndex, endWordIndex):
        self.rule = rule
        self.dotPosition = dotPosition
        self.startWordIndex = startWordIndex
        self.endWordIndex = endWordIndex
        self.childStateIds = []
        self.id = 0

    def isLeaf(self):
        return len(self.childStateIds) == 0

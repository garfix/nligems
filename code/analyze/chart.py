from chartstate import ChartState

class Chart:
    states = None
    words = None

    sentenceStates = None
    indexedStates = None
    stateIdGenerator = None

    error = ""

    def __init__(self, words):
        self.states = (ChartState() for i in range(len(words)))
        self.words = words
        self.sentenceStates = ()
        self.indexedStates = {}
        self.stateIdGenerator = 0

    def isOk(self):
        return self.error == ""

    def getError(self):
        return self.error

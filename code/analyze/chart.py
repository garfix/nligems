from chartstate import ChartState

class Chart:
    states = None
    words = None

    sentenceStates = None
    indexedStates = None
    stateIdGenerator = None

    error = ""

    def __init__(self, words):
        self.states = [[] for i in range(len(words) + 1)]
        self.words = words
        self.sentenceStates = ()
        self.indexedStates = {}
        self.stateIdGenerator = 0

    def isOk(self):
        return self.error == ""

    def getError(self):
        return self.error

    def isStateInChart(self, state, position):
        for _, presentState in enumerate(self.states[position]):
            if presentState.rule.Equals(state.rule) and \
                presentState.dotPosition == state.dotPosition and \
                presentState.startWordIndex == state.startWordIndex and \
                presentState.endWordIndex == state.endWordIndex:
                return True
        return False

    def enqueue(self, state, position):
    	if not self.isStateInChart(state, position):
		    self.pushState(state, position)

    def pushState(self, state, position):
        # index the state for later lookup
        self.stateIdGenerator = self.stateIdGenerator + 1
        state.id = self.stateIdGenerator
        self.indexedStates[state.id] = state

        self.states[position].append(state)

    def storeStateInfo(self, completedState, chartedState, advancedState):

        treeComplete = False

        # store the state's "children" to ease building the parse trees from the packed forest
        chartedState.childStateIds.append(completedState.id)

        # rule complete?
        if chartedState.dotPosition == chartedState.rule.getConsequentCount():

            # complete sentence?
            if chartedState.rule.getAntecedent() == "gamma":

                # that matches all words?
                if completedState.endWordIndex == len(chart.words):

                    self.sentenceStates.append(advancedState)

                    # set a flag to allow the Parser to stop at the first complete parse
                    treeComplete = true

        return treeComplete, advancedState

    def findLastCompletedWordIndex(self):
        return ""

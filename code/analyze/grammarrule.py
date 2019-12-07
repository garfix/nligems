"""
    A rule like this
        vgp(P1) -> put(P1) np(E1) into(P1) np(E2),                      sense: put_into(P1, E1, E2)
"""
class GrammarRule:
    syntacticCategories = None
    entityVariables = None
    sense = None

    def __init__(self, syntacticCategories, entityVariables, sense):
        self.syntacticCategories = syntacticCategories
        self.entityVariables = entityVariables
        self.sense = sense

    def getAntecedent():
	    return self.syntacticCategories[0]

    def getConsequents():
	    return self.syntacticCategories[1:]

    def getConsequent(i):
	    return self.syntacticCategories[i+1]

    def getConsequentCount():
	    return len(self.syntacticCategories) - 1

    def equals(otherRule):
        if len(self.syntacticCategories) != len(otherRule.syntacticCategories):
    		return false
        for i, v in enumerate(self.syntacticCategories):
            if v != otherRule.syntacticCategories[i]:
                return false
    	return true

    def getConsequentIndexByVariable(variable):
        for i, entityVariable in enumerate(rule.entityVariables[1:]):
            if entityVariable == variable:
                return (i, true)
        return (0, false)

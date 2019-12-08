"""
    A syntactic rewrite rule with semantic attachment (sense) like this
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

    def getAntecedent(self):
	    return self.syntacticCategories[0]

    def getConsequents(self):
	    return self.syntacticCategories[1:]

    def getConsequent(self, i):
	    return self.syntacticCategories[i + 1]

    def getConsequentCount(self):
	    return len(self.syntacticCategories) - 1

    def equals(self, otherRule):
        if len(self.syntacticCategories) != len(otherRule.syntacticCategories):
    		return false
        for i, v in enumerate(self.syntacticCategories):
            if v != otherRule.syntacticCategories[i]:
                return False
    	return True

    def getConsequentIndexByVariable(self, variable):
        for i, entityVariable in enumerate(rule.entityVariables[1:]):
            if entityVariable == variable:
                return (i, True)
        return (0, False)

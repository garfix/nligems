"""
    A syntactic rewrite rule with semantic attachment (sense) like this
        vgp(P1) -> put(P1) np(E1) into(P1) np(E2),                      sense: put_into(P1, E1, E2)
"""
class GrammarRule:
    syntactic_categories = None
    entity_variables = None
    sense = None

    def __init__(self, syntactic_categories, entity_variables, sense):
        if len(syntactic_categories) != len(entity_variables):
            raise Exception('Number of elements in syntactic_categories must match that in entity_variables')
        if not isinstance(sense, (tuple, list)):
            print sense
            raise Exception('Sense must either be tuple or list')
        self.syntactic_categories = syntactic_categories
        self.entity_variables = entity_variables
        self.sense = sense

    def get_antecedent(self):
	    return self.syntactic_categories[0]

    def get_consequents(self):
	    return self.syntactic_categories[1:]

    def get_consequent(self, i):
	    return self.syntactic_categories[i + 1]

    def get_consequent_count(self):
	    return len(self.syntactic_categories) - 1

    def equals(self, other_rule):
        if len(self.syntactic_categories) != len(other_rule.syntactic_categories):
    		return False
        for i, v in enumerate(self.syntactic_categories):
            if v != other_rule.syntactic_categories[i]:
                return False
    	return True

    def get_consequent_index_by_variable(self, variable):
        for i, entity_variable in enumerate(rule.entity_variables[1:]):
            if entity_variable == variable:
                return (i, True)
        return (0, False)

    def __repr__(self):
        s = ""
        sep = ""
        for i, cat in enumerate(self.syntactic_categories):
            s = s + sep + self.syntactic_categories[i] + "(" + self.entity_variables[i] + ")"
            if i == 0:
                sep = " -> "
            elif i == 1:
                sep = " "
        return s
class Grammar:

    rules = {}

    def add_grammar_rule(self, rule):
        antecedent = rule.syntactic_categories[0]
        if antecedent not in self.rules:
            self.rules[antecedent] = []
        self.rules[antecedent].append(rule)

    def find_rules(self, antecedent):
        if antecedent not in self.rules:
            return []
        else:
            return self.rules[antecedent]

    def __repr__(self):
        return "{rules: " + str(self.rules) + "}"
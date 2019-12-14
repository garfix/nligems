import copy
from relation import *

var_index_counter = {}

# Returns a new variable name
def get_new_variable(formal_variable):

    initial = formal_variable[0:1]

    if not initial in var_index_counter:
        var_index_counter[initial] = 1
    else:
        var_index_counter[initial] = var_index_counter[initial] + 1

    return initial + str(var_index_counter[initial])

# Creates a map of formal variables to actual variables (new variables are created)
def create_variable_map(actual_antecedent, formal_variables):

    m = {}
    antecedent_variable = formal_variables[0]

    m[antecedent_variable] = Variable(actual_antecedent)

    i = 1
    while i < len(formal_variables):

        consequent_variable = formal_variables[i]

        if consequent_variable == antecedent_variable:
            # the consequent variable matches the antecedent variable, inherit its actual variable
            m[consequent_variable] = Variable(actual_antecedent)
        else:
            # we're going to add a new actual variable, unless we already have
            if not consequent_variable in m:
                m[consequent_variable] = Variable(get_new_variable(consequent_variable))

        i = i + 1

    return m

# Create actual relations given a set of templates and a variable map (formal to actual variables)
def create_grammar_rule_relations(relation_templates, variable_map):

    relations = []

    for relation in relation_templates:

        new_relation = copy.deepcopy(relation)

        for a, argument in enumerate(new_relation.arguments):

            if isinstance(argument, Variable):
                new_relation.arguments[a] = copy.deepcopy(variable_map[argument.name])
            elif isinstance(argument, list):
                new_relation.arguments[a] = create_grammar_rule_relations(argument, variable_map)

        relations.append(new_relation)

    return relations

# Create actual relations given a set of templates and an actual variable to replace any * positions
def create_lex_item_relations(relation_templates, variable):

    from_term = Variable("E")
    to_term = Variable(variable)

    return replace_term(relation_templates, from_term, to_term)

# Replaces all occurrences in relation_templates from from to to
def replace_term(relation_templates, from_term, to_term):

    relations = []

    for relation_template in relation_templates:

        args = []

        for argument in relation_template.arguments:
            relation_argument = argument

            if type(argument) == type(from_term) and argument.value == from_term.value:
                relation_argument = to_term

            args.append(relation_argument)

        relations.append(Relation(relation_template.predicate, args))

    return relations

import copy
from sense_builder import *

"""
The relationizer turns a parse tree into a relation set
It also subsumes the range and quantifier relation sets inside its quantification relation
"""

def extract_semantics(trees, lexicon):
    semantics = []
    for tree in trees:
        semantics.append(relationize(tree, lexicon))
    return semantics        

def relationize(root_node, lexicon):
	sense, make_constant = extract_sense_from_node(root_node, get_new_variable("Sentence"), lexicon)
	return sense

def extract_sense_from_node(node, antecedent_variable, lexicon):
    """
    Returns the sense of a node and its children
    node contains a rule with NP -> Det NBar
    antecedent_variable the actual variable used for the antecedent (for example: E5)
    """
    relation_set = []
    make_constant = False

    if node.is_leaf_node():
		# leaf state rule: category -> word
		lex_item, ok = lexicon.get_lex_item(node.form, node.category)
		lex_item_relations = create_lex_item_relations(lex_item.relation_templates, antecedent_variable)
		relation_set = lex_item_relations
    else:
		variable_map = create_variable_map(antecedent_variable, node.rule.entity_variables)

		# create relations for each of the children
		bound_child_sets = []
		for i, child_node in enumerate(node.constituents):
			entity_variable = node.rule.entity_variables[i + 1]
			consequent_variable = variable_map[entity_variable]
			child_relations, make_constant = extract_sense_from_node(child_node, consequent_variable.name, lexicon)
			bound_child_sets.append(child_relations)

			if make_constant:
				variable_map[entity_variable] = Value(child_node.form)

		bound_parent_set = create_grammar_rule_relations(node.rule.sense, variable_map)
		relation_set = combine_parents_and_children(bound_parent_set, bound_child_sets, node.rule)

    return relation_set, make_constant

def combine_parents_and_children(parent_set, child_sets, rule):
    """
    Adds all child_sets to parent_set
    Special case: if parent_set contains relation set placeholders [], like `quantification(X, [], Y, [])`, then these placeholders
    will be filled with the child set of the preceding variable
    """

    referenced_children_indexes = []
    compound_relation = None

	# process sem(1) sem(2)
    new_set1 = []
    for i, parent_relation in enumerate(parent_set):
		compound_relation, referenced_children_indexes = include_child_senses(parent_relation, i, child_sets, rule, referenced_children_indexes)
		new_set1.append(compound_relation)

    # collect children with sem(parent)
    children_with_parent_reference_indexes = collect_children_with_parent_references(parent_set, child_sets)

    combination = parent_set

	# add simple children
    for i, child_set in enumerate(child_sets):
		if (not i in referenced_children_indexes) and (not i in children_with_parent_reference_indexes, i):
			combination.extend(child_set)

	# raise children with sem(parent), eg. quants
    for i in children_with_parent_reference_indexes:
		combination = bind_parent(combination, child_sets[i])

    return combination

def bind_parent(parent_relations, child_set):
    """
    Replaces a child_relation's sem(parent) with parent_relations and returns the new child_relation
    """
    new_parent_relations = parent_relations

    for r, child_relation in enumerate(child_set):
		for a, argument in enumerate(child_relation.Arguments):
			if isinstance(argument, List):
				for argument_relation in argument.values:
					if argument_relation.predicate == "sem" and argument_relation.arguments[0].value == "parent":
						prev_parent = new_parent_relations
						# the the sem of P is replaced by this quant
						new_parent_relations = copy.deepcopy(child_set)
						# the argument 'scope' in the quant of C is replaced by the current sem of P
						new_parent_relations[r].arguments[a] = List((prev_parent))

    return new_parent_relations

def collect_children_with_parent_references(parent_relations, child_sets):

	child_indexes = []

	for s, child_set in enumerate(child_sets):
		for  child_relation in child_set:
			for argument in child_relation.arguments:
				if isinstance(argument, List):
					for argument_relation in argument.Term_value_relation_set:
						if argument_relation.predicate == "sem" and argument_relation.arguments[0].value == "parent":
							child_indexes.append(s)

	return child_indexes

def include_child_senses(parent_relation, child_index, child_sets, rule, child_indexes):
    """
    Example:
    relation = quantification(E1, [], D1, [])
    extracted_set_indexes = []
    child_sets = [ [], [isa(E1, dog)], [], [isa(D1, every)] ]
    rule = np(E1) -> dp(D1) nbar(E1);
    """
    rule_relation = rule.sense[child_index]

    for i, formal_argument in enumerate(rule_relation.arguments):
        if isinstance(formal_argument, List):
            first_relation = formal_argument.values[0]
            if first_relation.predicate == "sem":
                index = int(first_relation.arguments[0].value) - 1
                child_indexes.append(index)
                sub_set = child_sets[index]
                relation_set_argument = List(sub_set)
                parent_relation.Arguments[i] = relation_set_argument

    return parent_relation, child_indexes

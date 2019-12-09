from node import Node

def extract_trees(chart):
    trees = []
    print 'extract'
    for i in range(len(chart.sentence_states)):
        print chart.sentence_states[i]
        rootStateId = chart.sentence_states[i].child_state_ids[0]
        root = chart.indexed_states[rootStateId]
        tree = extract_parse_tree_branch(chart, root)
        trees.append(tree)
    return trees

def extract_parse_tree_branch(chart, state):

	rule = state.rule
	branch = Node(rule.get_antecedent(), [], "")

	if state.is_leaf():
		branch.form = rule.get_consequent(0)
	else:
		for child_state_id in state.child_state_ids:
			child_state = chart.indexed_states[child_state_id]
			branch.constituents.append(extract_parse_tree_branch(chart, child_state))

	return branch

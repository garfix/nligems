class ChartState:
    rule = None
    dot_position = None
    start_word_index = None
    end_word_index = None

    child_state_ids = None
    id = None

    def __init__(self, rule, dot_position, start_word_index, end_word_index):
        self.rule = rule
        self.dot_position = dot_position
        self.start_word_index = start_word_index
        self.end_word_index = end_word_index
        self.child_state_ids = []
        self.id = 0

    def is_leaf(self):
        return len(self.child_state_ids) == 0

    def is_incomplete(self):
        return self.dot_position < self.rule.get_consequent_count() + 1

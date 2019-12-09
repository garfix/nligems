from chartstate import ChartState

class Chart:
    states = None
    words = None

    sentence_states = None
    indexed_states = None
    state_id_generator = None

    error = ""

    def __init__(self, words):
        self.states = [[] for i in range(len(words) + 1)]
        self.words = words
        self.sentence_states = []
        self.indexed_states = {}
        self.state_id_generator = 0

    def is_ok(self):
        return self.error == ""

    def get_error(self):
        return self.error

    def is_state_in_chart(self, state, position):
        for _, present_state in enumerate(self.states[position]):
            if present_state.rule.equals(state.rule) and \
                present_state.dot_position == state.dot_position and \
                present_state.start_word_index == state.start_word_index and \
                present_state.end_word_index == state.end_word_index:
                return True
        return False

    def enqueue(self, state, position):
    	if not self.is_state_in_chart(state, position):
		    self.push_state(state, position)

    def push_state(self, state, position):
        # index the state for later lookup
        self.state_id_generator = self.state_id_generator + 1
        state.id = self.state_id_generator
        self.indexed_states[state.id] = state

        self.states[position].append(state)

    def store_state_info(self, completed_state, charted_state, advanced_state):

        tree_complete = False

        # store the state's "children" to ease building the parse trees from the packed forest
        advanced_state.child_state_ids = charted_state.child_state_ids + [completed_state.id]

        # rule complete?
        if charted_state.dot_position == charted_state.rule.get_consequent_count():

            # complete sentence?
            if charted_state.rule.get_antecedent() == "gamma":

                # that matches all words?
                if completed_state.end_word_index == len(self.words):

                    self.sentence_states.append(advanced_state)

                    # set a flag to allow the Parser to stop at the first complete parse
                    #tree_complete = True

        return tree_complete, advanced_state

    def find_last_completed_word_index(self):
        next_word = ""
        last_index = -1

        # find the last completed nextWord
        i = len(chart.states) - 1
        done = False
        while i >= 0:
            states = chart.states[i]
            for state in states:
                if not state.is_incomplete():
                    last_index = state.end_word_index - 1
                    done = True
                    break
            if done:
                break
            i = i - 1

        if last_index <= len(chart.words) - 2:
        	nextWord = chart.words[last_index + 1]

        return last_index, next_word

    def __repr__(self):
        return "{states: " + repr(self.states) + "}"
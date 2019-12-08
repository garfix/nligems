import random
import re

"""
Chatbot

Sample code for a simple chatbot

Possible responses are declared by cases. Each case has a pattern and several possible responses.

The user's input sentence is split into parts on commas and punctuation marks. Each part is treated separately.

The bot remembers which responses have been given, rather than giving a random response.
"""

def main():

    cases = (
        {
            'pattern': 'i like (.*)',
            'responses': ['i like %1 too!', 'what do you like about %1?']
        },
        {
            'pattern': '(.*) you (.*) me',
            'responses': ['what makes you think that I %2 you?']
        },
        {
            'pattern': 'i don\'t like (.*)',
            'responses': ['why don\'t do you like %1?']
        },
        {
            'pattern': 'i am (.*)',
            'responses': ['how long have you been %1?']
        },
        {
            'pattern': '(.*) are all (.*)',
            'responses': ['in what way?', 'i\'m sure there are exceptions']
        },
        {'pattern': 'depressed', 'responses': ['I\'m sorry to hear that you are depressed']},
        {'pattern': 'idiot', 'responses': ['I apologize for my shortcomings']},
    )

    case_memory = {}

    print "Hello there!"
    print "Let's have a chat. Type 'exit' or 'quit' to leave. Type 'test' to run some tests."

    while True:

        # get an answer from the user
        answer = raw_input("> ")
        # move the answer to lower case
        answer = answer.lower()

        # allow the user to exit
        if answer == 'exit' or answer == 'quit':
            print "Bye!"
            break

        # self-test
        if answer == 'test':
            do_tests(cases)
            continue

        # treat all punctuation marks as separators
        for answer_part in re.split('[.,!?]+', answer):

            # remove superfluous whitespace
            answer_part = re.sub('[ ]+', ' ', answer_part)

            # generate a response
            response = find_response(answer_part, cases, case_memory)

            # stop evaluating other parts if a good response was found
            if response != '':
                break

        # if no good remark could be found, at least say something
        if response == '':
            response = random.choice(['Tell me more!', 'Interesting', 'OK'])

        print response

def find_response(answer, cases, case_memory):
    """Returns a textual response to 'answer'.
    cases provide possible answers
    case_memory holds per case an index of the last given response. It is changed by this function.
    """

    response = ""

    for case in cases:
        match = re.search(case['pattern'], answer)
        if match:

            # get the index of the next response
            response_index = get_response_index(case, case_memory)

            # use this index to select a response
            response = case['responses'][response_index]

            # replace the placeholders
            for i, group in enumerate(match.groups()):

                # invert pronouns (me -> you)
                group = invert_pronouns(group)

                # replace placeholder
                response = response.replace('%' + str(i + 1), group)

            # capitalize the first letter
            response = response[0].upper() + response[1:]
            break

    return response

def get_response_index(case, case_memory):
    # find the index of the previous response that was used
    if case['pattern'] in case_memory:
        response_index = case_memory[case['pattern']]
    else:
        response_index = 0

    # save the new index for next time
    if response_index + 1 < len(case['responses']):
        case_memory[case['pattern']] = response_index + 1
    else:
        case_memory[case['pattern']] = 0

    return response_index

def invert_pronouns(text):
    """Replaces all I pronouns to You pronouns and vice versa"""

    inverts = {
        'my': 'your',
        'your': 'my',
        'you': 'me',
        'me': 'you',
        'myself': 'you'
    }

    words = text.split(' ')
    new_words = []

    for word in words:
        if word in inverts:
            new_words.append(inverts[word])
        else:
            new_words.append(word)

    return ' '.join(new_words)

def do_tests(cases):
    case_memory = {}
    test(cases, case_memory, 'idiot', 'I apologize for my shortcomings')
    test(cases, case_memory, 'i like you', 'I like me too!')
    test(cases, case_memory, 'i like you', 'What do you like about me?')
    test(cases, case_memory, 'i like you', 'I like me too!')

def test(cases, case_memory, answer, expected):
    print '# ' + answer
    response = find_response(answer, cases, case_memory)
    print response
    if response != expected:
        print 'ERROR!'

main()

import random
import re

"""Chatbot
Sample code for a simple chatbot

Possible responses are declared by cases. Each case has a pattern and several possible responses.

The user's input sentence is split into clauses on commas and punctuation marks. Each clause is treated separately.

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

    caseMemory = {}

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
            doTests(cases)
            continue

        # treat all punctuation marks as clause separators
        for clause in re.split('[.,!?]+', answer):

            # remove superfluous whitespace
            answer = re.sub('[ ]+', ' ', clause)

            # generate a response
            response = findResponse(answer, cases, caseMemory)

            # stop evaluating other clauses if a good response was found
            if response != '':
                break

        # if no good remark could be found, at least say something
        if response == '':
            response = random.choice(['Tell me more!', 'Interesting', 'OK'])

        print response

def findResponse(answer, cases, caseMemory):
    """Returns a textual response to 'answer'.
    cases provide possible answers
    caseMemory holds per case an index of the last given response. It is changed by this function.
    """

    response = ""

    for case in cases:
        match = re.search(case['pattern'], answer)
        if match:

            # find the index of the previous response that was used
            if case['pattern'] in caseMemory:
                responseIndex = caseMemory[case['pattern']]
            else:
                responseIndex = 0

            # use this index to select a response
            response = case['responses'][responseIndex]

            # save the new index for next time
            if responseIndex + 1 < len(case['responses']):
                caseMemory[case['pattern']] = responseIndex + 1
            else:
                caseMemory[case['pattern']] = 0

            # replace the placeholders
            for i, group in enumerate(match.groups()):

                # invert pronouns (me -> you)
                group = invertPronouns(group)

                # replace placeholder
                response = response.replace('%' + str(i + 1), group)

            # capitalize the first letter
            response = response[0].upper() + response[1:]
            break

    return response

def invertPronouns(text):
    """Replaces all I pronouns to You pronouns and vice versa"""

    inverts = {
        'my': 'your',
        'your': 'my',
        'you': 'me',
        'me': 'you',
        'myself': 'you'
    }

    words = text.split(' ')
    newWords = []

    for word in words:
        if word in inverts:
            newWords.append(inverts[word])
        else:
            newWords.append(word)

    return ' '.join(newWords)

def doTests(cases):
    caseMemory = {}
    test(cases, caseMemory, 'idiot', 'I apologize for my shortcomings')
    test(cases, caseMemory, 'i like you', 'I like me too!')
    test(cases, caseMemory, 'i like you', 'What do you like about me?')
    test(cases, caseMemory, 'i like you', 'I like me too!')

def test(cases, caseMemory, answer, expected):
    print '# ' + answer
    response = findResponse(answer, cases, caseMemory)
    print response
    if response != expected:
        print 'ERROR!'

main()

import random
import re

# Chatbot
#
# Sample code for a simple chatbot
#
#

def invertPronouns(text):

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

# note: caseMemory is changed by this function
def findResponse(answer, cases, caseMemory):

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
            response = response.capitalize()
            break

    return response

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

def main():

    cases = [
        {
            'pattern': 'i like (.*)',
            'responses': ['i like %1 too!', 'what do you like about %1?']
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
    ]

    caseMemory = {}

    print "Hello there!"

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

main()

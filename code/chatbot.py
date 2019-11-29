import sys
import random
import re

def findResponse(answer):

    cases = [
        {
            'pattern': 'i like (.*)',
            'responses': ['i like %1 too!', 'what do you like about it?']
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
        {'pattern': 'depressed', 'responses': ['I\'m sorry to hear that you are depressed']}
    ]

    for case in cases:
        match = re.search(case['pattern'], answer)
        if match:
            # select a random response
            response = random.choice(case['responses'])

            # replace the placeholders
            for i, group in enumerate(match.groups()):

                # invert possesive pronouns
                group = re.sub('\\bmy\\b', 'your', group)
                group = re.sub('\\bour\\b', 'your', group)
                group = re.sub('\\byou\\b', 'me', group)
                group = re.sub('\\bme\\b', 'you', group)
                group = re.sub('\\bmyself\\b', 'you', group)

                response = response.replace('%' + str(i + 1), group)

            # capitalize the first letter and return
            return response.capitalize()

    # random remarks
    return random.choice(['Tell me more!', 'Interesting', 'OK'])

def main():

    print "Hello there!"

    while True:

        # get an answer from the user
        answer = raw_input("> ")

        # move the answer to lower case
        # remove punctuation marks
        # split the words
        answer = answer.lower().translate(None, '!?.,')

        # allow the user to exit
        if answer == 'exit' or answer == 'quit':
            print "Bye!"
            break

        # generate a response
        response = findResponse(answer)

        print response

main()

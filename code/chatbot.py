import random
import re

# Chatbot
#
# Sample code for a simple chatbot

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

def findResponse(answer, cases):

    response = ""

    for case in cases:
        match = re.search(case['pattern'], answer)
        if match:
            # select a random response
            response = random.choice(case['responses'])

            # replace the placeholders
            for i, group in enumerate(match.groups()):

                # invert pronouns (me -> you)
                group = invertPronouns(group)

                response = response.replace('%' + str(i + 1), group)

            # capitalize the first letter
            response = response.capitalize()
            break

    return response

def main():

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

    print "Hello there!"

    while True:

        # get an answer from the user
        answer = raw_input("> ")
        # move the answer to lower case
        answer = answer.lower()
        # remove punctuation and superfluous whitespace
        answer = re.sub('[?!., ]+', ' ', answer)

        # allow the user to exit
        if answer == 'exit' or answer == 'quit':
            print "Bye!"
            break

        # generate a response
        response = findResponse(answer, cases)

        # random remarks
        if response == "":
            response = random.choice(['Tell me more!', 'Interesting', 'OK'])

        print response

main()

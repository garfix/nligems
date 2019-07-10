SIR accepts a fixed set of sentence types and converts these into relations. From these relations it is able to deduce the answer to a fixed set of questions. It is also able to reply with a question to the user about missing information.

For example the sentence type "Every boy is a person" is recognized as "Every X is a Y" and is added as the relation SETR(Boy, Person).

Given the input

Every boy is a person / SETR(Boy, Person)
John is a boy / SETR(John, Boy)
Any person has two hands / PARTRN(Hand, Person, 2)
A finger is part of a hand / PARTR(Finger, Hand)

and the user question 'How many fingers are on John?' / PARTRNQ(Finger, John)

SIR then poses the clarification question 'How many fingers per hand?'

If the user then gives this additional information: 'Every hand has five fingers' / PARTRN(Finger, Hand, 5)

SIR is able to deduce the answer: "The answer is 10"

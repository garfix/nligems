PhD thesis of Raphael under supervision of Minsky.

SIR accepts a fixed set of sentence types and converts these into relations. From these relations it is able to deduce the answer to a fixed set of questions. It is also able to reply with a question to the user about missing information.

For example the sentence type "Every boy is a person" is recognized as "Every X is a Y" and is added as the relation SETR(Boy, Person).

~~~
Every boy is a person / SETR(Boy, Person)
John is a boy / SETR(John, Boy)
Any person has two hands / PARTRN(Hand, Person, 2)
A finger is part of a hand / PARTR(Finger, Hand)

Q: How many fingers are on John? / PARTRNQ(Finger, John)
A: How many fingers per hand?
Q: Every hand has five fingers / PARTRN(Finger, Hand, 5)
A: The answer is 10
~~~

+ ! Queries the user about missing information
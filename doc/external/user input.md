# User Input

Which features of natural language are covered by the system?

## Languages

Which natural languages are supported? Most historical systems just cover English.

## Phrase structures

Types of phrases the system may be able to handle:

* Noun Phrases, Pronouns
* Verb Phrases, Auxiliaries, Modals
* Preposition Phrases
* Determiner Phrases, Negations
* Adverb Phrases
* Adjective Phrases
* Relative Clauses, Comparative expressions
* Conjunctions

## Dialog sentence types

Primarily the user makes requests to the system. The system may reply with a question to the user (for clarification). In that case the user will make a response. The response is usually short (yes/no, the white one)

* Request
* Response

## Grammatical categories

* Mood: declarative, interrogative, imperative
* Voice: active, passive (The yellow cube was taken by me.)
* Tense: simple, progressive, perfect, habitual, prospective

Interrogative questions:

EQ = identity (is, was, are, were)
BE = auxiliary (is, was, are, were)
DO = auxiliary (do, does, did)
HAVE = auxiliary (has, have)

## Factual yes/no-questions or choice questions (boolean / a selected object)

* DO NP VP (did Lord Byron marry Queen Elisabeth)
* DO NP VP (did Lord Byron marry Queen Elisabeth or Anne Isabella Milbanke)

* EQ NP NP (was Lord Byron king of England)
* EQ NP NP (was Lord Byron a king or a lord)

* BE NP ADJ (is the block red)
* BE NP ADJ (is the block red or blue)

* HAVE NP VP (has Napolean invaded Germany)
* HAVE NP VP (has Napolean invaded Germany or The Netherlands)

* WOULD YOU VP (would you like a cup of coffee)
* WOULD YOU VP (would you like coffee or tea)

## Wh-questions (which, what, who; name one or more individuals)

* WHO verb NP (who married Lord Byron)
* WHO EQ NP (who was Lord Byron's wife)

* WHICH NP VP (which countries border the mediterranean)
* WHICH DO NP VP (which do you do more often)

* WHAT NP VP (what rock sample contains most iron)
* WHAT EQ NP (what is the biggest block, what is your name)
* WHAT DO NP VP (what do laptops cost)

* WHOSE NP EQ NP (whose book is that)

##  How many (a number, requires aggregation)

* HOW MANY NP VP (how many children had Lord Byron)
* HOW MANY NP DO NP VP (how many children did Lord Byron have)

## Capability (boolean)

* CAN NP VP (can dogs fly, can i ask you a question, can you stack a cube on a piramid)

## Degree (a number, the unit result depends on subject)

* HOW ADJ BE NP (how high is the Mount Everest, how tall is the tallest man, how small is a mouse, how old are you)
* HOW ADV DO NP VP (how often do you go to the movies)
* HOW BE NP (how are you)

## Reason (a cause)

* WHY DO NP VP (why did Napolean invade Germany)
* WHY BE NP VP (why was Napolean crowned king)

## Time (a time)

* WHEN BE NP VP (when was Napolean crowned king)

## Manner (an event)

* HOW BE NP VP (how was Napolean crowned king)

Introspective Interrogative questions:

* How/Why/When questions (access to internal plans)

## Special syntactic constructs

* Clauses as objects (Find a block which is taller than _the one I told you to pick up_.)
* Clefts (It's the blue ball that I took.)
* There be's (There is a green pyramid on the yellow cube.)
* Extraposition

## Corrupt Sentences

Can the system handle sentences that are ungrammatical or have spelling errors?

* No
* Yes, fixing it through a dialog with the user

## Single Sentence / Texts

Can the system deal with one single sentence at a time, or can it handle text consisting of multiple sentences at once?

## Idioms

Many expressions in natural are not to be taken literally.

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

## Question sentence syntax

EQ = identity (is, was, are, were)
BE = auxiliary (is, was, are, were)
DO = auxiliary (do, does, did)
HAVE = auxiliary (has, have)
MOD = modality (can, could, will, would, shall, should)

### Factual yes/no-questions or choice questions (boolean / a selected object)

* DO NP VP (did Lord Byron marry Queen Elisabeth)
* DO NP VP (did Lord Byron marry Queen Elisabeth or Anne Isabella Milbanke)
* DO NP NOT VP (did Lord Byron not marry Queen Elisabeth)

* EQ NP NP (was Lord Byron king of England)
* EQ NP NP (was Lord Byron a king or a lord)
* EQ NP NOT NP (was Lord Byron not king of England)

* BE NP ADJ (is the block red)
* BE NP ADJ (is the block red or blue)

* BE NP VP (was Lord Byron born in London)
* BE NP VP (was Lord Byron born in London or Cambridge)
* BE NP NOT VP (was Lord Byron not born in London)

* HAVE NP VP (has Napoleon invaded Germany)
* HAVE NP NOT VP (has Napoleon not invaded Germany)
* HAVE NP VP (has Napoleon invaded Germany or The Netherlands)

* MOD NP VP (would you like a cup of coffee, should I leave my things here, can dogs fly, can i ask you a question, can you stack a cube on a pyramid)
* MOD NP VP (would you like coffee or tea)

### Uninverted yes/no questions

* NP VP (Lord Byron married Queen Elisabeth?) (question mark is required)
* NP DO NOT VP (Lord Byron did not marry Queen Elisabeth?) (question mark is required)

### Wh-questions (which, what, who; name one or more individuals)

* WHO VP NP (who married Lord Byron)
* WHO EQ NP (who was Lord Byron's wife)
* WHO DO NP VP (who does Pierre want to win)

* WHOM DO NP VP (whom do you believe)
* WHOM MOD NP VP (whom should I talk to)
* WITH/TO WHOM BE NP VP (with whom is Peter speaking)

* WHICH NP VP (which countries border the mediterranean)
* WHICH NP DO NOT VP (which countries do not border the mediterranean)
* WHICH DO NP VP (which do you do more often)
* WHICH EQ VP (which is the best option)
* WHICH NP MOD NP VP (which way should I go)

* WHAT NP VP (what rock sample contains most iron, what food items did you eat)
* WHAT EQ NP (what is the biggest block, what is your name)
* WHAT DO NP VP (what do laptops cost)
* WHAT EQ VP (what is the largest planet)

* WHOSE NP EQ NP (whose book is that)
* WHOSE NP VP (whose autographs have you collected)

###  Amount (a number, requires aggregation)

* HOW MANY NP VP (how many children had Lord Byron, how many children did Lord Byron have)

### Degree (a number, the unit result depends on subject)

* HOW ADJ BE NP (how high is the Mount Everest, how tall is the tallest man, how small is a mouse, how old are you)
* HOW ADV DO NP VP (how often do you go to the movies, how nicely do I need to dress tonight)
* HOW MUCH NP VP (how much sugar goes in a single drink)

### Manner (an means)

* HOW BE NP VP (how was Napoleon crowned king)
* HOW DO NP VP (how do you go to work)
* HOW MOD NP VP (how can I become more productive)

### State

* HOW BE NP (how are you)

### Reason (a cause)

* WHY DO NP VP (why did Napolean invade Germany)
* WHY DO NP NOT VP (why did Napolean not invade Germany)
* WHY BE NP VP (why was Napolean crowned king)
* WHY MOD NP VP (why should I go)

### Time (a time)

* WHEN BE NP VP (when was Napolean crowned king)
* WHEN DO NP VP (when did you start wearing make up)

### Place (a place)

* WHERE DO NP VP (where did you go)
* WHERE PP DO NP VP (where on the map does this train go)

Also, check this page! https://www.myenglishteacher.eu/blog/types-of-questions/

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

# Purpose

This page aims to describe what an NLI should do. What's its function, its purpose.

An NLI is primarily a way to interact with one or more databases, or knowledge sources, or even more general, services.

Advanced systems also allow the user to query the internal knowledge sources the system to aid its central processes.
A system with these capabilities is said to have introspective abilities.

## Knowledge Sources

What types of subjects can be addressed in user requests?

* Domain specific knowledge (Addressing the primary knowledge source: Who is X? Did Y do Z? How many Q?)
* Domain model knowledge (meta knowledge about a knowledge source, stored in a separate knowledge source; i.e. is a square a rectangle?)
* Dialog model / task model knowledge (Why do you ask X?)
* Task model knowledge (How did you do X?)
* User model knowledge (What's my name?)

## Expressiveness

A system that supports the user's natural use of language is better than that which only supports a small subset of natural language.

* Supported natural languages
* Supported phrase structures
* Grammatical categories (Mood, Voice, Tense)
    * Within Mood: Declarative, Interrogative, Imperative
        * Within Interrogative: Wh-questions, Yes/No-questions, How many, Why/How/When (Dialog model)
* Special syntactic constructs
* Corrupt Sentences
* Multiple sentences
* Idioms
* Ellipsis
* Anaphora: reference to current persons, time, and location in the active context

## Types of action

For all of the knowledge sources it may or may not be possible to perform these actions:

* TELL (add knowledge)
* ASK (query knowledge)
* DO (perform an action)
* RESPOND (a response to a another action)

## Learning

Each of the system's knowledge sources may be able to acquire new knowledge

* From the user directly
* Independently (machine learning)

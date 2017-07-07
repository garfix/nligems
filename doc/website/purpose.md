# Purpose

This page aims to describe what an NLI should do. What's its function, its purpose.

An NLI is primarily a way to interact with a database.
Advanced systems also allow the user to query the internal knowledge sources the system uses for its central processes.
To allow this, the agent needs to have introspective abilities.

## Knowledge Sources

Which knowledge sources are used by the system?

* Domain specific knowledge bases / databases (Who is X?)
* The domain model (Meta knowledge about a knowledge source) (Is a square a rectangle?)
* Dialog model (Why do you ask X?)
* Task model (How did you do X?)
* User model (What's my name?)

## Expressiveness

A system that supports the user's natural use of language is better than that which only supports a small subset of natural language.

The different types of expressions are specified in the analysis sections.

## Types of action

For all of the knowledge sources it may or may not be possible to perform these actions:

* TELL
* ASK (yes/no, who/what/when, how/why)
* DO

## Learning

Each of the system's knowledge sources may be able to acquire new knowledge

* From the user directly
* Independently (machine learning)

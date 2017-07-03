# Pragmatic Analysis

Pragmatic analysis covers all aspects of interpretation that require the context of a sentence.

## Context

The context consists of these aspects:

* Domain (A world of blocks, world geography, human relationships, moon rocks)
* Dialog (Expected responses)
* Deictic center (When a sentence mentions "I", "Here", "Now")

There are three types of deictic center:

* Person (who is I?)
* Time (when is Now?)
* Space (where is Here?)

Each domain has its own meanings for words and expressions, so you can only know the meaning of a sentence if you know the domain.

## Pronouns: Anaphora

Pronouns (he, she, it, that) are the variables of natural language. They refer to ever changing things. The system needs to keep track of recent subjects in the discourse,
and link the pronoun to the subject.

A pronoun may refer to an entity in the same sentence, to an entity in a recent previous sentence, or to an implicit entity.

Data sources:

* a discourse model

## Verbs: Tense

If a system can handle time, it must interpret tensed sentences with respect to the deictic center of time.

## Action detection

The input sentence must be converted into one of the systems' actions: ASK (query the database), TELL (update the database), DO (perform a task)

Superficially these actions correspond with the mood of the sentence, but not always ("Can you put the red block on the table?" is a DO action)

## Ellipsis

Can the system handle sentences where one or more words or phrases have been left out, because they can be filled in.

https://en.wikipedia.org/wiki/Ellipsis_(linguistics)

## Idioms

Can the system handle expressions whose meaning should not be taken literally?


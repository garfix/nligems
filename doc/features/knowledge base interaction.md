# Interaction with Knowledge Sources

A complex NLI system interacts with multiple databases (or, more general: knowledge sources) in order to process a single sentence.

Different knowledge sources usually have different ontologies (ways of describing the world). Therefore, the ontology of the system needs to be mapped onto that of each of the knowledge sources.

When presenting a goal to a knowledge source for answering, this goal may exist of:

* a single predicate
* a sentence (multiple predicates)
* a complete query

Querying many single facts from a database is easier to do, but speed optimizations need to be made inside the system.
Creating a complete query to be handed over to the database is much more complex, and knowledge of indexes needs to be put into the query, for speed efficiency.

The knowledge source may produce:

* zero or more facts that satisfy the goal predicate
* new goals, to be answered by the system, in order to fulfill the goal that the system posed to the knowledge source

Like inference, the knowledge source may be synchronous or asynchronous

Open problem: if multiple knowledge sources contain information about the same entities (things), a shared identity must be found to link the information. For dates in time, this is simple. For persons, however, the name of the person may be insufficient to identify him or her in both sources. How to identify all types of entities in multiple heterogeneous knowledge sources is still an open problem.

Data sources: knowledge sources

## Domain specific to DB language conversion

Is there a conversion from domain language to db language?

## Types of knowledge sources

Is there one knowledge source?

If so, is it part of the NLI system?
    This is often the case in Prolog and LISP systems.

If there are multiple knowledge sources, are the:

* homogeneous
* heterogeneous (different storage types or ontologies)

## Intermediate representation

Is there an in-between representation that is shared by all databases of the same type (i.e. relational, document based)?

## Output: conversion to domain specific language

Are database results converted to domain level constructs?


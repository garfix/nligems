# Functions

## Analysis

Of course an NLI system needs to analyse the user's intent. It is done by a combination of some of these techniques:

* tokenization: splitting a sentence into words, and possible words into morphemes
* morphological analysis
* parsing: analysis of the syntactic structure of the sentence
* template matching: a line of input is matched to a set of templates (one-on-one or best-fit)
* semantic analysis: mapping syntax to semantics (meaning representation)
* reference / anaphora resolution
* quantifier scoping

These analytical processes are usually done sequentially, and lead to several intermediate (quasi) semantic representations. Many variations have been tried.

User input is transformed into one or more internal representations. These are only the most important forms:

* parse tree (from recursive rewrite rules)
* generic logical (a relational form that can be used as a basis for all domain specific forms)
* domain specific logical (all concepts are domain specific)
* generic database form (i.e. for all document databases)
* specific database form (i.e. for a specific relational database: MySql)

The database forms are only part of the analysis process in a QA system, where each question automatically leads to a database query.

Data sources:

* a lexicon
* a grammar
* a set of input-matching templates
* a syntax to semantics mapping

## Dialog

A dialog based system has a dialog manager at its center. This manager handles all incoming messages and delegates its actions to other parts of the system.

The type of dialog implements the purpose of the NLI system. This may be

* to help the user find information in the database and update it
* to help the user to select a product
* to help the user to use one or more services

It may be able to:

* keep track of discourse goals (originating from the user, or the system itself)
* clarify the question or the request of the user
* initiate the conversation based on system-goals

Data sources:

* a goal model, that models the goals the system wants to achieve
* a discourse model that holds active goals and means
* contexts: date and time of conversation, person roles (me, you: anaphora)

## Planner

When the user gives a command, this may mean that a goal needs to be executed. Executing a goal may require a plan (a series of tasks).

A planner takes a goal, creates a plan (recursively) and executes a set of tasks needed to accomplish it.

Data sources:

* set of plans (templates)

## Inference

Inference is the production of temporary information in order to solve a problem.

A system may infer information by:

* deduction: IF A, B, and C, THEN D
* proof by example: IF red(a) THEN EXISTS red(X)
* proof by custom procedure: near(X, Y) is calculated by a distance formula

This inference may occur both synchronously and asynchronously: in the latter case the inference requires the input from a resource that takes time to respond (for example: user input)

Data sources:

* a domain model: information about the domain that is implicit in the knowledge sources and that is nevertheless necessary to retrieve that information

## Task Manager

An asynchronous system, or agent, that has multiple goals can still only do one thing at a time. Which one? That's the job of the task manager. Based on what's most important in any
situation, it selects the most suitable action.

## Interaction with Heterogeneous Knowledge Sources

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

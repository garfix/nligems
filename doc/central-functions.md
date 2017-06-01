# Functions

!!! HET GAAT HIER OM HET FUNCTIONEEL ONTWERP, DE FUNCTIONALITEIT, NIET DE IMPLEMENTATIE

## Analysis

Of course an NLI system needs to analyse the user's intent. It is done by

* tokenization: splitting a sentence into words, and possible words into morphemes
* parsing: analysis of the syntactic structure of the sentence
* semantic analysis: mapping syntax to semantics (meaning representation)

Data sources:

* a lexicon
* a grammar
* a syntax to semantics mapping

## Dialog

A dialog based system has a dialog manager at its center. This manager handles all incoming messages and delegates its actions to other parts of the system.

It may be able to:

* keep track of discourse goals (originating from the user, or the system itself)
* clarify the question or the request of the user
* initiate the conversation based on system-goals

Data sources:

* a goal model, that models the goals the system wants to achieve
* a discourse model that holds active goals and means
* contexts: date and time of conversation, person roles (me, you: anaphora)

## Planner

A planner takes a goal and produces a set of means needed to accomplish it.

Data sources:

* sets of plans (goal and means)

## Inference

Inference is the production of temporary information in order to solve a problem.

A system may infer information by:

* deduction: IF A, B, and C, THEN D
* proof by example: IF red(a) THEN EXISTS red(X)
* proof by custom procedure: near(X, Y) is calculated by a distance formula

This inference may occur both synchronously and asynchronously: in the latter case the inference requires the input from a resource that takes time to respond (for example: user input)

Data sources:

* a domain model: information about the domain that is implicit in the knowledge sources and that is nevertheless necessary to retrieve that information

## Quantifier Scoping

In a sentence, a noun phase (NP) is about things. It may contain a determiner phrase (DP). This DP specifies the things. A quantifier phrase (QP) is a special form of DP. It determines the quantity of the NP; the number of things. The NP many be "many", "few", "3", "more than 3", "all", "some" or "none".

A QP requires a special treatment from the system. The number of the QP applies only to a part of the sentence; it has the NP as its scope. In the sentence "Some children have more than 2 friends", "some" applies to "children" only, and "2" to each of these children's "friends". To express the meaning of this sentence in a computational way, it may look like this

    // Some children have more than 2 friends

    // outer scope quantity
    childrenWithMoreThanTwoFriends := 0

    foreach (children as child) {

        // inner scope quantity
        friendCount := 0

        foreach (persons as person) {
            if has_friend(child, person) {
                friendCount++
            }
        }

        // "more than two"
        if friendCount > 2 {
            childrenWithMoreThanTwoFriends++
        }
    }

    // in this domain "some" means "more than one, but less than half"
    sentenceTruth := childrenWithMoreThanTwoFriends >  1 && childrenWithMoreThanTwoFriends <= count(children) / 2

You will notice the inner and outer scopes, as well as the aggregation variables (childrenWithMoreThanTwoFriends and sentenceTruth). A system that supports quantifier scoping needs to handle such cases.

Open problem: scopes are ambiguous. In the example above "children" outscopes "friends". Whether one QP outscopes the other depends on a set of heuristics. For this reason it is hard to do scoping at parse time. It is best postponed until parsing is done. The heuristics are quite complex and they are not water tight. A simpler or complete theory of quantifier scope resolution has still to be found.

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
Maak hier een pagina van

Main aspects (facets) of natural language interaction systems.

## Learning

Learning may take place in several components of the system. Learning is the production and storage of new facts. Such a fact is stored with the other facts and will be used in a similar way from then on.

A system may learn these items:

* facts about the world
* facts about the user with whom it interacts
* names for individual things
* concepts (the mapping from a name its meaning)

Learning can occur in several ways.

* the user may tell it to the system
* the system may deduce it

## Inference

Inference is the production of temporary information in order to solve a problem.

A system may infer information by:

* deduction: IF A, B, and C, THEN D
* proof by example: IF red(a) THEN EXISTS red(X)
* proof by custom procedure: near(X, Y) is calculated by a distance formula

This inference may occur:

* synchronously: the inference is available right away
* asynchronously: the inference requires the input from a resource that takes time to respond (for example: user input)

in the latter case, the inference step may become a goal in itself and become thus be part of the dialog.

## Contexts

A sentence is not an island. In order to understand more types of sentences, a system may keep track of the following contexts:

* dialog (current goals, active questions)
* time (which time is "now")
* location (where is "here"?)
* person (who is "me", who is "he"?) (= anaphora)

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

## Heterogeneous Knowledge Sources

A complex system interacts with multiple databases (or, more general: knowledge sources) in order to process a single sentence.

Open problem: 
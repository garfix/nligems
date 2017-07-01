# Semantic and Pragmatic Analysis

Semantic Analysis maps words to semantic elements. These elements are integrated into a semantic structure by a process of composition. Semantic structures differ from syntactic structures in that they are language independent.

Different types of phrases need to be handled differently in the analysis and composition process.

## Nouns and Adjectives: Compound Noun Analysis

Users may introduce compounds that are not in the lexicon. These come in two shapes:

* noun-noun compounds ("city department")
* adjective-noun compounds ("large company")

The meaning of these compounds is not purely analytical. A "city department" could denote a department located in a city, or a department responsible for a city. A "large company" can be a company with a large volume of sales or a company with many employees.

(example from Androutsopoulos)

## Proper Nouns: Named Entity Recognition (NER)

How to tell proper nouns (names) apart? Which words form a name? Which words go together to form a name. Names are not in the lexicon.

## Pronouns: Anaphora

Pronouns (he, she, it, that) are the variables of natural language. They refer to ever changing things. The system needs to keep track of recent subjects in the discourse,
and link the pronoun to the subject.

A pronoun may refer to an entity in the same sentence, to an entity in a recent previous sentence, or to an implicit entity.

Data sources:

* a discourse model

## Determiners: Quantifier Scoping

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

## Conjunction and Disjunction

The word "and" is often used to denote disjunction rather than conjunction. (Androutsopoulos)

## Preposition Phrases: Modifier Attachment

To which constituent must the modifier (PP) be attached? (Androutsopoulos)

## Action detection

The input sentence must be converted into one of the systems' actions: ASK (query the database), TELL (update the database), DO (perform a task)

Superficially these actions correspond with the mood of the sentence, but not always ("Can you put the red block on the table?" is a DO action)


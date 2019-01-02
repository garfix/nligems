# The NLI System

## Reasons for NLI

Ever since there are computers, people have wanted to interact with them using their natural language (like English or French).

The goal of NLI (Natural Language Interface) is to allow you to interact with a database, or more general, any source of information and any online service, in natural language.

This is an old field of study, and yet these interfaces are still challenging to make, and quite rare in use.

Why would you want to use a Natural Language Interface? Are the existing means to access data not sufficient?

NLI allows you to place free-form queries, and as such it may be compared to free-form SQL, and text search.

SQL was designed to be an easy-to-learn human readable database query language. Still, only software developers use it today. It does not only require one to learn SQL, but to have detailed understanding of the database structure as well.

Text search is also free-form and has proven to be quite powerful and successful. Yet it can never give precise results, nor does it allow you to access structured data.

NLI aims to combine the strictness of SQL with the ease of use of text search.

This text shows you some of the ideas and techniques used in this field, and highlights its choice points. It is certainly not necessary to use all of this information to create a useful NLI. Just pick the stuff you need.

## Goals

The goals of NLI follow from this definition:

> An NLI allows a user to interact with a knowledge source through natural language. The system must understand the intent of the user's input, process it and respond in a helpful manner.

I will now explore these goals.

### Goal: Interact

A Knowledge Source can be a database, any other form of stored structured data (as opposed to unstructured text), and online services that provide an API.

This interaction consists of

- spoken input and audible output
- keyboard based input and text based output
- gui based sentence generation (NLMenu)

Most historical systems are based on the latter.

The type of interaction can be:

- question / answer (user asks, system answers)
- tell (user tells system what to do)
- inform (user feeds information into the system)

The system may answer with one of these sentences

- a database result ("Yes", "Ada Lovelace")
- a generated sentence ("She was married to Lord Byron on March 2, 1844")
- a paraphrase of the question (to verify that it was understood correctly)
- a request for clarification ("Do you mean [a] or [b]?")
- an admission of inability ("I do not know this person", "I do not understand the word 'vehicle'")

Interaction with an NLI is not limited to a simple Question/Answer. Since language is ambiguous on all levels, it is often necessary for the system to ask the user to clarify his/her intent. So the interaction is always a dialog.

#### User Expectations

The NLI has a massive affordance problem. The affordance of a system shows a user how to use it. NLI has none of that by itself. So when you tell a user he or she can talk to the system in plain English, his or her expectations will be too high and will quickly be disappointed.

For the foreseeable future it is best to assume that the user will not be able to use natural language in an unrestricted way.

In stead, the user should be taught to be able to use a well defined subset of his language. Learning by example is one way this can be done.

The knowledge engineer may elicit the expressions a user would normally use in a certain domain. It is these expressions that should be modelled in the system.

When a question cannot be answered it is up to the system to provide precise feedback of what it is that it cannot do. "I don't understand" is too vague. "I do not know the word 'salesperson'" is better. The user may try to reword the sentence.

When the user has reasoning capabilities, the user may also jump to the conclusion that the system is intelligent. The user will also need to be instructed about the possible reasoning capabilities of the system.

### Goal: Knowledge Source

Since the main purpose of an NLI is to interact with knowledge sources, it should be no surprise that historic NLI's have interacted with a wide variety of databases and in-memory storages. Anything that contains information may be the source that a user may want to query. That's why we talk about a knowledge source rather than just a database.

The technology of these sources may be

- a relational database (approachable through SQL)
- a triple store (approachable through SPARQL)
- an in-memory fact base (defined and approachable through code in some programming language)
- an online service with a public API

The information itself may consist of

- factual information (persons, soil samples, countries, ...)
- meta information (information about a class of objects)
- inference rules (if A then B)
- time based information (at time T is was the case that C)
- position based information (at position P it is the case that C)
- goal based information (event A was because of event B)

The source may be persistent or volatile. A ___volatile___ source is destroyed when the interaction with the user ends. A ___persistent___ source does not depend on the user session.

The source may be internal or external to the NLI system. An ___external___ database is located outside of the NLI and has its own query language. An ___internal___ source is part of the NLI. Many older systems had all their knowledge sources stored internally.

For a simple NLI the domain of the knowledge source is ___objective___, it contains soil sample data, geographical data or other factual worldly information. Objective sources contain information that is shared with others.

More complex NLI systems even contain information about their own inner processes, and this information can even be queried by the user (i.e. "Why did you pick up the red cube?"). Let's call these knowledge sources ___subjective___.

Subjective knowledge sources are:

- the dialog context (contains information about recently mentioned entities, and the place of self in time and space: deictic center)
- declarative memory (keeps track of the information the user feeds it)
- spatial memory (which object is located where)
- time based memory (what happened to whom at what time)
- the goals of the nli (goals added by the user, or built-in goals)
- emotional state
- a model of the beliefs, desires and intentions of itself and of the user

All types of combinations of these dimensions occur. Typical modern databases are persistent, external and objective. Emotional information is mostly volatile, internal and subjective.

As you can see, a sufficiently complex NLI is a proper intelligent agent.

A knowledge source usually contains positive information (X is the case), but it may also contain negative information (Y is not the case).

### Goal: Natural Language

Natural language means one of these:

- English
- French
- Chinese
- etc

Most research was done only with English, but some other languages were used as well.

Natural language sentences can be

- interrogatives / questions
- declaratives
- imperatives

Questions can be

- Yes/no questions
- Which / what / who questions
- How many questions
- Temporal, spatial questions (when / where, but also: 'before', 'on top of')
- Meta questions (Can chairs ..., Do chairs ...)
- Why / How questions

The type of sentence often corresponds with the act that the user wishes to perform. Often, but not always. "Do you know what time it is?" means "Tell me the time! (please)"

To be intelligible a sentence must be complete and syntactically and semantically correct. In practice a system may have to deal with

- partial sentences ("and the country?")
- spelling mistakes ("How manny")
- ambiguity ("That person")
- idioms ("the old ones")

Common syntactic structures that may need to be recognized are:

- Noun Phrases (including proper nouns and pronouns)
- Verb Phrases (modified by mood, voice and tense)
- Preposition Phrases
- Determiner Phrases
- ADVerb Phrases
- ADJective Phrases
- Relative Clauses
- Negations
- Conjunctions
- Auxiliaries
- Modals
- Comparative expressions
- Passives
- Clefts
- There be
- Clauses as objects
- Extraposition

#### Imperative sentence syntax

An imperative sentence commands the system to do something:

- Show me the five oldest presidents.
- Send a mail to my brother John about the holidays.

The syntactic structure of these sentences is always a single verb phrase

* VP

It may be followed by an exclamation mark.

#### Declarative sentence syntax

A declarative sentence gives information to the system:

- Spain borders France on the south.
- A cube has 6 sides.

It has the structure

* NP VP

#### Question sentence syntax

There are so many syntactic structures for questions. You might not need all of them, but it is always good to know there's not just two or three of them.

In this overview I use some new abbreviations:

EQ = identity (is, was, are, were)
BE = auxiliary (is, was, are, were)
DO = auxiliary (do, does, did)
HAVE = auxiliary (has, have)
MOD = modality (can, could, will, would, shall, should)

##### Factual yes/no-questions or choice questions (boolean / a selected object)

* DO NP VP (did Lord Byron marry Queen Elisabeth, did Lord Byron not marry Queen Elisabeth)
* DO NP VP (did Lord Byron marry Queen Elisabeth or Anne Isabella Milbanke)

* EQ NP NP (was Lord Byron king of England, was Lord Byron not king of England)
* EQ NP NP (was Lord Byron a king or a lord)

* BE NP ADJP (is the block red)
* BE NP ADJP (is the block red or blue)

* BE NP VP (was Lord Byron born in London, was Lord Byron not born in London)
* BE NP VP (was Lord Byron born in London or Cambridge)

* HAVE NP VP (has Napoleon invaded Germany, has Napoleon not invaded Germany)
* HAVE NP VP (has Napoleon invaded Germany or The Netherlands)

* MOD NP VP (would you like a cup of coffee, should I leave my things here, can dogs fly, can i ask you a question, can you stack a cube on a pyramid)
* MOD NP VP (would you like coffee or tea)

##### Uninverted yes/no questions (boolean)

* NP VP (Lord Byron married Queen Elisabeth?) (question mark is required)

##### Wh-questions (which, what, who; name one or more individuals)

* WHO VP (who married Lord Byron, who was Lord Byron's wife)
* WHO BE NP VP (who are you seeing)
* WHO DO NP VP (who does Pierre want to beat)
* WHO HAVE NP VP (who have you been seeing)
* WHO MOD VP (who can drive me home)

* WHOM DO NP VP (whom do you believe)
* WHOM HAVE NP VP (whom have you believed)
* WHOM MOD NP VP (whom should I talk to)

* WHOM -> WITH/TO WHOM (with whom is Peter speaking)

* WHICH NP VP (which countries border the mediterranean, which countries do not border the mediterranean)
* WHICH BE NP (which is the best option)
* WHICH DO NP VP (which do you do more often)
* WHICH NP MOD NP VP (which way should I go)

* WHAT NP VP (what rock sample contains most iron, what food items did you eat)
* WHAT BE NP (what is the biggest block, what is your name)
* WHAT DO NP VP (what do laptops cost)
* WHAT HAVE NP VP (what has Churchill done to stop the war)
* WHAT MOD NP VP (what should I do)

* WHOSE NP VP (whose autographs have you collected, whose parents will drive)
* WHOSE NP BE NP (whose book is that)

#####  Amount (a number, requires aggregation)

* HOW MANY NP VP (how many children had Lord Byron, how many children did Lord Byron have)

##### Degree (a number, the unit result depends on subject)

* HOW MUCH NP VP (how much sugar goes in a single drink)
* HOW ADJP BE NP (how high is the Mount Everest, how tall is the tallest man, how small is a mouse, how old are you)
* HOW ADVP DO NP VP (how often do you go to the movies, how nicely do I need to dress tonight)

##### Manner (a means)

* HOW BE NP VP (how was Napoleon crowned king)
* HOW DO NP VP (how do you go to work)
* HOW HAVE NP VP (how has Napoleon invaded Britain)
* HOW MOD NP VP (how can I become more productive)

##### State (a state)

* HOW BE NP (how are you)

##### Reason (a cause)

* WHY BE NP VP (why was Napoleon crowned king)
* WHY DO NP VP (why did Napoleon invade Germany)
* WHY HAVE NP VP (why has John hit Jake)
* WHY MOD NP VP (why should I go)

##### Time (a time)

* WHEN BE NP (when was the marriage)
* WHEN BE NP VP (when was Napoleon crowned king)
* WHEN DO NP VP (when did you start wearing make up)
* WHEN HAVE NP VP (when have you bought the tv)
* WHEN MOD NP VP (when can I go home)

* WHEN -> WHEN PP (when in the next hour do you want to go)

##### Place (a place)

* WHERE BE NP (where is it?)
* WHERE BE NP VP (where is the concert taking place)
* WHERE DO NP VP (where did you go)
* WHERE HAVE NP VP (where has Sally gone)
* WHERE MOD NP VP (where can I find a pub)

* WHERE -> WHERE PP (where on the map is it)

Also, check this page! https://www.myenglishteacher.eu/blog/types-of-questions/

### Goal: Understand the User

To understand a user, the system needs to extract the ___intent___ of the user's sentence.

Examples of the intent:

- MARRIED_TO?(Person1, Person2) "Was A married to B?"
- DATE_OF_BIRTH?(Person) "When was A born?"
- SEND_EMAIL!(Person, Subject, Content) "Send an email to A. Subject B. Content C."

The intent can be expressed by a single relation using variables. The variables can be filled in by arbitrarily complex structures. "Person" can be filled in with "Lord Byron", "the butcher's wife", or even "he who shall not be named", for example.

The reason to separate the intent from the full meaning is that the way the sentence is processed depends solely on the intent. The modifiers are processed the same in any sentence. The intent makes each sentence different.

In order to understand the intent of the user, and fill in the modifiers, the system can

- tokenize the sentence (split the sentence into words and punctuation marks)
- parse the sentence (using a lexicon and a grammar)
- turn the syntactic structure into pieces of semantic information (___semantic attachment___)
- compose these pieces into a semantic structure (___semantic composition___)

The semantic structure may take the form of

- a set of nested goals
- a scoped predicate logic formula

The first already tells the NLI what steps to take to reach the answer. The second one merely specifies the constraints of the answer.

Once the raw semantic structure is built, it needs to be modified into the final semantic structure.

- handle ambiguities (multiple interpretations of the same input)
- determine the right constituent of each attachment (___modifier attachment___)
- determine the correct nesting of AND and OR clauses
- scope the semantic structure to handle determiners (___syntactic scoping___)
- replace pronouns by entity references ("she -> Lady Lovelace") (Anaphora resolution)

All of these are just means to an end, and these steps may be combined or even skipped by an NLI.

The goal of this is to create an Intent, a semantic representation of the meaning of the sentence as it was intended by the user. This representation often takes the form of a variant of First Order Predicate Logic.

#### Understand the User: Syntactic analysis

##### Tokenization

In all systems, raw text is split into tokens. This means that words, numbers and punctuation characters are distinguished.

##### Morphological Analysis

In some systems the morphemes of words are distinguished. This helps keep the dictionary small, since inflections of words need not be stored.

##### Unlexical Word Forms

Verbs, nouns, determiners, adverbs, etc. are called parts-of-speech.

Some parts-of-speech cannot be listed completely in the lexicon. A special case is formed by proper nouns (names of persons and things). Proper nouns are not part of the lexicon, and must be recognized somehow, and not be discarded as non-words. This can be done in several ways:

- by looking up the unknown words in the database
- by matching their form (assuming they start with capitals)
- by using Named Entity Recognition

If proper nouns are looked up in the database, one needs to specify which table/column stores these names.

Proper noun lookup can be located in different places in the the understanding process.

Some tokens can only be recognized using pattern recognition:

- dates
- numbers
- prices
- quoted strings

##### Sentence Structure Analysis

From the individual words the structure of the sentence must be analysed. There are two ways in which this can be done:

- template matching
- parsing

For simple sentence structures it is possible to use ___template matching___. The template is a fixed form like this:

    WHAT IS THE MASS OF ?x

When the sentence is analysed it is simply compared to the template. All words must match literally to the template, with the exception of ?x, which matches a variable text.

For more complex sentences ___parsing___ is required. The parsing process uses a ___parser___, an algorithm that uses rewrite rules to transform a sentence into a ___parse tree___. These rewrite rules form a ___grammar___.

There are three main types of grammar used to parse a sentence:

- phrase structure grammars
- dependency grammars
- semantic grammars

___semantic grammars___ form a parse tree of semantic nodes. An example parse tree is:

    - S
        - Specimen_question
            - Specimen_spec
                - "which rock"
            - Contains_info
                - "contains"
                - Substance
                    - "magnesium"

The advantage is that semantic, domain specific information is present right from the parse tree. The disadvantage is that the grammar must be completely rewritten for each new domain.

__dependency grammars___ form a parse tree of dependency relations. An example parse tree:

    - "contains"
        - subject: "rock"
            - det?: "which"
        - object: "magnesium"

The advantage is that the syntactic functions that form the dependency relations (i.e. subject, object, etc) are closely associated with semantic relations.

__phrase structure grammars___ form a parse tree of phrase nodes. An example parse tree is:

    - S
        - WH_NP
            - WH_WORD
                - "which"
            - NP
                - DP
                - NBar
                    - Noun
                        - "rock"

        - VP
            - VBar
                - Verb
                    - "contains"
            - NP
                - NBar
                    - Noun
                        - "magnesium"

The advantage is that rewrite rules may be reused in other domains.

Examples of rewrite rules are

    S -> NP VP
    VP -> VBar PP
    NP -> proper_noun

One has to build one's own grammar. The grammar describes only a subset of the natural language. Each natural language requires its own grammar, although languages in the same language family have many rules in common.

The reason that one has to write his own grammar, is that the number of rules has to be kept to a minimum. The fact that more rules means slower parsing is not so important. More rules, however, cause unnecessary ambiguity, and that is something to avoid.

There's an online parser that may help you to find rewrite rules for a sentence. It is the Stanford Parser:  http://nlp.stanford.edu:8080/parser/index.jsp

#### Understand the User: Semantic Analysis

Once the tree structure of the sentence is known, the syntactic information needs to be transformed and enriched into semantic information.

Semantic Analysis maps words and word structures to semantic structures through a process of semantic composition. Semantic structures differ from syntactic structures in that they do not depend on the surface form of the sentence.

Semantic analysis is necessary only when the sentence is parsed using a phrase structure grammar.

Semantic analysis consists of two parts: semantic attachment and semantic composition.

___Semantic attachment___ links partial semantic structures to words and syntactic structures. The attachments are stored in the lexicon with the word forms, and in the grammar, with the rewrite rules. Semantic attachment can take place during the parsing process, or as a separate step.

Both words and phrases may have pieces of semantics attached. For example:

    Lexicon
        book:
            - semantics: isa(E, book) number(E, singular)

        married:
            - semantics: isa(E, marry) tense(E, past)

    Grammar
        s(S1) -> np(E1) vp(S1)
            - semantics: subject(S1, E1)

        vp(V1) -> vbar(V1) np(E1)
            - semantics: object(V1, E1)

Verbs represent actions and states. They may be represented as predicates (as in marry(E, F)) but also as objects (as in isa(E, marry)). The former is more intuitive, but the latter is more expressive.

___Semantic composition___ is the technique of combining pieces of semantics into a complete semantic form. This is the basic semantic form, that may need to be modified later.

There are several techniques with which to compose semantics:

- semantic specialists
- Montague grammar
- feature unification

___semantic specialists___ are hard-coded functions that transform parts of a syntactic structure into a semantic structure. They are used heavily by Winograd's SHRDLU. The technique is not portable to other domains and requires expert information about a system's inner workings.

___Montague grammar___ is Montague's attempt to express natural language in Predicate Logic. The composition techniques are ___lambda abstraction___ and ___lambda reduction___. The resulting semantic expression is in classic Predicate Logic and includes many quantifiers (∀ and ∃), and logical operators (→, =). Apparently it is hard to extend to anything other than simple sentences.

___Feature unification___ is based on the idea that each semantic constituent has some features (like "number", "passive", "agr"). When the constituents are connected, the features must match and their values are inherited up the tree. This is the approach CLE has taken, and they were able to address many grammatical phenomena with it.

##### Quantifier Scoping

In forming a semantic structure (logical form), a system may first create some intermediate representations (sometimes called quasi logical forms). Quantifier scoping is one of these.

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
    sentenceTruth := childrenWithMoreThanTwoFriends >  1
        && childrenWithMoreThanTwoFriends <= count(children) / 2

You will notice the inner and outer scopes, as well as the aggregation variables (childrenWithMoreThanTwoFriends and sentenceTruth). A system that supports quantifier scoping needs to handle such cases.

Open problem: scopes are ambiguous. In the example above "children" outscopes "friends". Whether one QP outscopes the other depends on a set of heuristics. For this reason it is hard to do scoping at parse time. It is best postponed until parsing is done. The heuristics are quite complex and they are not water tight. A simpler or complete theory of quantifier scope resolution has still to be found.

#### Understand the User: Pragmatic analysis

The difference between semantic and pragmatic analysis is that pragmatic analysis requires contextual information.

##### Context

The context consists of these aspects:

* Domain (A world of blocks, world geography, human relationships, moon rocks)
* Dialog (Expected responses)
* Deictic center (When a sentence mentions "I", "Here", "Now")

There are three types of deictic center:

* Person (who is I?)
* Time (when is Now?)
* Space (where is Here?)

Each domain has its own meanings for words and expressions, so you can only know the meaning of a sentence if you know the domain.

##### Conjunction and Disjunction

The word "and" is often used to denote disjunction rather than conjunction.

##### Modifier Attachment

To which constituent must the modifier (PP) be attached?

##### Pronouns / Anaphora

Pronouns (he, she, it, that) are the variables of natural language. They refer to ever changing things. The system needs to keep track of recent subjects in the discourse,
and link the pronoun to the subject.

A pronoun may refer to an entity in the same sentence, to an entity in a recent previous sentence, or to an implicit entity.

##### Verbs: Tense

If a system can handle time, it must interpret tensed sentences with respect to the deictic center of time.

##### Action detection

The input sentence must be converted into one of the systems' actions: ASK (query the database), TELL (update the database), DO (perform a task)

Superficially these actions correspond with the mood of the sentence, but not always ("Can you put the red block on the table?" is a DO action)

##### Ellipsis

Can the system handle sentences where one or more words or phrases have been left out, because they can be filled in.

##### Proper Nouns: Named Entity Recognition (NER)

How to tell proper nouns (names) apart?

A name is only meaningful if it is present, or introduced into, the present domain. This type of NER looks up names in a database.

##### Nouns and Adjectives: Compound Noun Analysis

Users may introduce compounds that are not in the lexicon. These come in two shapes:

* noun-noun compounds ("city department")
* adjective-noun compounds ("large company")

The meaning of these compounds is not purely analytical. A "city department" could denote a department located in a city, or a department responsible for a city. A "large company" can be a company with a large volume of sales or a company with many employees.

##### Idioms

Each domain has its own expressions, that are meaningless outside it.

### Goal: Process the Intent

To process the Intent of the sentence, it must be processed. This entails

- determine feasibility
- performing inferences
- setting goals and executing plans
- interaction with databases
- updating internal state

It must be noted that although "Understand the User" and "Process the Intent" are separated in this text, they are not always separate phrases in a system. Some older systems executed the user's intent __while__ analyzing the sentence. (DEACON)

#### Process the Intent: Determine feasibility

Even if an intent is understood, it is another question whether it is possible to fulfill this intent. The NLI must check if it is able to process the question given its capabilities.

One thing that needs to be checked which of the knowledge bases under control has the information the user requested. For factual information this means selecting the knowledge base or bases that contain information of this type. There's no use querying the others.

Then there are some questions that only may be answered by very specific types of knowledge bases.

A "when" or "where" question can be answered by any knowledge base that contains time and space information.

A "why" or "how" question can only be answered with information from a goal based knowledge base.

A question about meta information "Can a pyramid be supported by a block?" can only be answered with information from a knowledge base with meta information.

#### Process the Intent: Inference

Inference allows an NLI to infer new information by applying (inference) rules to existing information.

An inference form has one or more antecedents, and a consequent:

IF a AND b AND c THEN d

The programming language Prolog is typically used for NLI's that rely on inference, since Prolog has a built in inference engine. Some databases also allow storing and processing rules. A reduced form of Prolog, along with a custom inference engine is sometimes implemented in the NLI itself.

#### Process the Intent: Executing plans

The NLI may have a set of built-in goals, or the system may respond to a user request by fulfilling a goal.

A goal is reached by executing plans that are linked to it. The plans are usually built-in.

#### Process the Intent: Interaction with knowledge sources

Different knowledge sources usually have different ontologies (ways of describing the world). Therefore, the ontology of the system needs to be mapped onto that of each of the knowledge sources.

Open problem: if multiple knowledge sources contain information about the same entities (things), a shared identity must be found to link the information. For dates in time, this is simple. For persons, however, the name of the person may be insufficient to identify him or her in both sources. How to identify all types of entities in multiple heterogeneous knowledge sources is still an open problem.

#### Process the Intent: Interaction with databases

This is the prototypical use of an NLI: interaction with external knowledge sources; to query, tell, and delete information. In order to do this the user intent must be turned into one or more database queries.

One approach is to turn the user query into a single database query. Another is to create a number of small database queries and combine their results.

For some user queries the first approach is better. For example: "Show me the five oldest employees and sort them by age." The resemblance to an SQL query is deliberate.

For other queries this is more problematic, because building the database is complicated. For example: "How old was Lord Byron when Ada Lovelace was born?"

And for user queries that require access to multiple knowledge sources in a single response, it is impossible.

For larger databases it is necessary to optimize the queries for speed.

It is necessary to use aggregates (notably COUNT, MAX, MIN) for certain questions. This can be integrated in the query that is sent to the database, but it is also possible that the systems perform the aggregations on the results when they come back from the database.

In some NLI's the semantic structure that represents the intent of the user coincides with the database query.

#### Process the Intent: Updating internal state

I will now describe several types of internal knowledge sources.

##### Dialog context

The "dialog context" keeps track of roles in the dialog. When the user mentions "Lord Byron", the NLI can store Lord Byron as the current subject of the dialog with the user, along with the gender of Lord Byron (male).

When the next user question just uses "he" to mention Lord Byron, the NLI can look up the referent in the dialog context. The gender is an extra check for correctness.

This current subject of conversation is called the deictic center. We have just seen the deictic center of person. There may also be deictic centers for time (where is 'now' in the active conversation) and space (where is 'here').

##### Domain model

A common application of an NLI is to have a knowledge source of metadata about a domain.

##### Goal hierarchy

A goal based NLI needs to keep track of its goal hierarchy.

##### Emotional state

Emotional state describes the relation of the NLI as a subject towards other entities.

##### Beliefs, Desires, Intentions

An NLI may be modelled as a goal driven system beliefs (current representation of the world), desires (goals) and intentions (intended plans and actions).

### Goal: Respond in a Helpful Manner

An NLI responds to the user by

- giving a canned response ("I don't know", "Thank you")
- generating a custom response ("She married to Lord Byron")
- asking for clarification ("Do you mean [a] ... [b] ...")
- admission of inability ("I do not know this person", "I do not understand the word 'vehicle'")

A cooperative response would always give some extra information that may be helpful but not explicitly asked.

"How many children had Lord Byron?"
"Two: Ada and Allegra"

Having a mental model of the beliefs, desires and intentions may help to give a more helpful answer. But I know of no system that has implemented this.

It is important to realize that a knowledge source may or may not have complete information about a domain. The domain is either closed or open.

In a closed domain the knowledge of the source is complete. If it is not present in the knowledge source, it is not present in the world. This allows you to infer information about the absense of data. If a user aks "When did Michael Jackson graduate?" the system may infer from the absence of graduation information that "Michael Jackson did not graduate".

On the other hand, if the system was put to an open domain source, the answer would have to be "Unknown", because the absence of information here does not imply the opposite.

## General aspects

If you are evaluating or designing an NLI, be aware of the following main aspects, that reoccur in all parts of the system:

### Aspect: Modelling

In every module, data needs to be modelled in a distinct way. The grammar, the parse tree, the logical representation, rules, plans. For each of the models you need:

* a formal language, the syntax
* an ontology: a set of concepts that make up the problem space of the module

For each ontology holds that it can be

* generic: suitable for all types of domains
* domain specific: suitable to a single domain only

Generic representations have the advantage of reuse: the same ontology may be used in other fields. Domain specific ontologies have the advantage that they restrict ambiguity. A word in a domain most often means just a single thing. A domain specific model is simpler to create, because the question of how generic each item is does not play a part.

### Aspect: Ambiguity

An analysis may well lead to multiple interpretations. Parse trees, for example. Possible strategies to deal with them:

* Use the first. Ignore all but the first interpretation. This is based on the idea that, through proper modelling, the first result is the best.
* Depth first. For each of the parse trees, push it further down the pipeline until it fails. Only then, try the second tree.
* Breadth first. Collect all parse trees. Use all of them in the next phase of interpretation. Keep all possibilities around as long as they haven't failed.

Use the first only works for simple domains with many constraints.
The breadth first approach may have considerable computational and memory costs.
The depth first approach has the problem that all "pipeline" phases are active at the same time. All components need to keep state while other components are active.

### Aspect: Completeness

In every part of the system, one can ask if it is "complete". Are all words in the lexicon? Are all necessary rules in the grammar? Are all database mappings present?

Can all data from the previous phrase be converted to the next phase in a way that is eventually useful to the user?

As long as a part is incomplete, how is this communicated to the user?

### Aspect: Synchronicity

Parts of a system may respond to a request immediately, or require input from a third party that take some time.

So we distinguish

* synchronous: a response is given immediately
* asynchronous: a response is forwarded to a third party (possibly the user)

Asynchronous events may be embedded in the dialog with the user. Such as a request for information, or a remark that the answer will take some time to prepare.

### Aspect: Learning

Learning may take place in several components of the system. Learning is the production and storage of new facts. Such a fact is stored with the other facts and will be used in a similar way from then on.

A system may learn these items:

* facts about the world
* facts about the user with whom it interacts
* names for individual things
* concepts (the mapping from a name its meaning)

Learning can occur in several ways.

* the user may tell it to the system
* the system may deduce it

### Aspect: Ease of Configuration

How hard is it for a user to setup and maintain this module?

### Aspect: Portability

How easy is it to use this part of the system in another domain, another language, another database?

The information of the module may be fixed in:

* code: in which case a programmer is needed to port the module to another field
* data: in which case a user with limited knowledge of the system may port it to another field

### Aspect: Transparency

Transparency is about being able to inspect the internal processes of the system, to understand how and why it has chosen its actions.

A user may sometimes want to know _how_ or _why_ the system performed a certain action, or asked a certain question. There are several types of explanation:

* logging: create a textual trace of all processes that have taken place
* introspection: allow a user to ask the system about the goals that have lead to the steps it has taken.

Logging can be used at all levels but is only suited for the developer, not the end user.
Introspection can only be used for some functions like inference and planning. But it allows end users to ask the system in natural language.

## References

Some of the information in this text had its origin in:

- Natural Language Interfaces to Databases – An Introduction (1995), I. Androutsopoulos, G.D. Ritchie, P. Thanisch

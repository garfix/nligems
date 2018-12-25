## Reasons for NLI

Ever since there are computers, people have wanted to interact with them using their natural language (like English or French).

The goal of NLI (Natural Language Interface) is to allow you to interact with a database, or more general, any source of information and any online service, in natural language.

This is an old field of study, and yet these interfaces are still challenging to make, and quite rare in use.

Why would you want to use a Natural Language Interface? Are the existing means to access data not sufficient?

NLI allows you to place free-form queries, and as such it may be compared to free-form SQL, and text search.

SQL was designed to be an easy-to-learn human readable database query language. Still, only software developers use it today. It does not only require one to learn SQL, but to have detailed understanding of the database structure as well.

Text search is also free-form and has proven to be quite powerful and successful. Yet it can never give precise results, nor does it allow you to access structured data.

NLI aims to combine the strictness of SQL with the ease of use of text search.

This text shows you some of the ideas and techniques used in this field, and highlights its problems.

## Goals

The goals of NLI (or: the system) follow from this (my) definition:

> An NLI allows a user to interact with a knowledge source through natural language. The system must understand the intent of the user's input, process it and respond in a helpful manner.

I will now explore these goals.

### Goal: Interact with a Knowledge Source

A Knowledge Source can be a database, any other form of stored structured data (as opposed to unstructured text), and online services that provide an API.

This interaction consists of

- spoken input and audible output
- keyboard based input and text based output

Most historical systems are based on the latter.

The type of interaction can be:

- question / answer (user asks, system answers)
- tell (user tells system what to do)
- inform (user feeds information into the system)

The system may answer with one of these sentences

- a request clarification ("Do you mean [a] or [b]?")
- a factual response ("yes", "Ada Lovelace")
- a paraphrase of the question (to verify that it was understood correctly)
- a canned response ("Thank you", "I don't know")
- a generated sentence ("She was married to Lord Byron on March 2, 1844")

Interaction with an NLI is not limited to a simple Question/Answer. Since language is ambiguous on all levels, it is often necessary for the system to ask the user to clarify his/her intent. So the interaction is always a dialog.

### Goal: Knowledge Source

Anything that contains information may be the source of the information that a user may want to query. That's why we talk about a knowledge source rather than just a database.

The technology of these sources may be

- a relational database (approachable through SQL)
- a triple store (approachable through SPARQL)
- an in-memory fact base (defined and approachable through code in some programming language)
- an online service with a public API

The information itself may consist of

- relations (persons, soil samples, countries, ...)
- inference rules (if A then B)
- time based information (at time T is was the case that C)
- position based information (at position P it is the case that C)

The source may be ___internal___ or ___external___ to the NLI system. A database is always external to the system. Many older systems made use of some internal data structure that contained all its knowledge.

For a simple NLI the domain of the knowledge source is ___objective___, it contains soil sample data, geographical data or other factual worldly information.

More complex NLI systems even contain information about their own inner processes, and this information can even be queried by the user (i.e. "Why did you pick up the red cube?"). Let's call these knowledge sources ___subjective___.

Subjective knowledge sources are:

- the dialog context (contains information about recently mentioned entities, and the place of self in time and space: deictic center)
- declarative memory (keeps track of the information the user feeds it)
- spatial memory (which object is located where)
- time based memory (what happend to whom at what time)
- the goals of the nli (goals added by the user, or built-in goals)
- emotional state
- a model of the beliefs, desires and intentions of itself and of the user

As you can see, a sufficiently complex NLI is a proper intelligent agent.

A knowledge source usually contains positive information (X is the case), but it may also contain negative information (Y is not the case).

### Goal: Natural Language

Natural language means one of these:

- English
- French
- etc

Most research was done only with English, some other languages were used as well.

Natural language sentences can be

- questions
- declarations
- imperatives

Questions can be

- Yes/no questions
- Which / what / who questions
- How many questions
- When questions
- How questions
- Why questions

The type of sentence often corresponds with the act that the user wishes to perform. Often, but not always. "Do you know what time it is?" means "Tell me the time! (please)"

To be intelligible a sentence must be complete and syntactically and sematically correct. In practice a system may have to deal with

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

#### Question sentence syntax

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
And of course http://nlp.stanford.edu:8080/parser/index.jsp

### Goal: Understand the User

To understand a user, the system needs to extract the "intent" of the user's sentence.

Examples of the intent:

- MARRIED_TO?(Person1, Person2) "Was A married to B?"
- DATE_OF_BIRTH?(Person) "When was A born?"
- SEND_EMAIL!(Person, Subject, Content) "Send an email to A. Subject B. Content C."

The intent can be expressed by a single relation, with variables. The variables can be arbitrarily complex structures. "Person" can be filled in with "Lord Byron", "the butcher's wife", or even "he who shall not be named".

The reason to separate the intent from the full meaning is that the way the sentence is processed depends solely on the intent. The modifiers are processed the same in any sentence. The intent makes each sentence different.

In order to understand the intent of the user, the system can

- tokenize the sentence (split the sentence into words and punctuation marks)
- parse the sentence (using a lexicon and a grammar)
- turn the syntactic structure into pieces of semantic information (semantic attachment)
- compose these pieces into a semantic structure

The semantic structure may take the form of

- a set of nested goals
- a scoped predicate logic formula

The first already tells the NLI how to reach the answer. The second one merely specifies the constraints of the answer.

Once the raw semantic structure is built, it needs to be modified into the final semantic structure.

- handle ambiguities (multiple interpretations of the same input)
- determine the right constituent of each attachment (Modifier attachment)
- determine the correct nesting of AND and OR clauses
- scope the semantic structure to handle determiners
- replace pronouns by entity references ("she -> Lady Lovelace") (Anaphora resolution)

All of these are just means to an end, and these steps may be combined or even skipped by an NLI.

The goal of this is to create an Intent, a semantic representation of the meaning of the sentence as it was intended by the user. This representation often takes the form of a variant of First Order Predicate Logic.

A special part of understanding the user is to recognize proper names in the sentence. Proper names are not part of the lexicon, and must be recognized somehow, and not be discarded as non-words. This can be done in several ways:

- by looking up the unknown words in the database as identifiers
- by matching their form (they might start with capitals)
- by using Named Entity Recognition

Some tokens can only be recognized using pattern recognition:

- dates
- numbers
- prices
- quoted strings

#### Understand the User: Syntactic analysis

##### Tokenization

In all systems, raw text is split into tokens. This means that words, numbers and punctuation characters are distinguished.

##### Morphological Analysis

In some systems the morphemes of words are distinguished. This helps keep the dictionary small, since inflections of words need not be stored.

##### Sentence structure recognition

Recognizing word combinations is done in two ways:

By parsing a tree structure of the sentence is created.

By template matching a line of input is matched to a template.

Data sources:

* a lexicon
* a grammar
* a set of input-matching templates

#### Understand the User: Semantic Analysis

Semantic Analysis maps words and word structures to semantic structures through a process of semantic composition. Semantic structures differ from syntactic structures in that they are language independent.

In forming a semantic structure (logical form), a system may first create some intermediate representations (called quasi logical forms).

Different types of phrases need to be handled differently in the analysis and composition process.

This process uses language dependent composition rules.

##### Determiners: Quantifier Scoping

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

##### Conjunction and Disjunction

The word "and" is often used to denote disjunction rather than conjunction. (Androutsopoulos)

##### Preposition Phrases: Modifier Attachment

To which constituent must the modifier (PP) be attached? (Androutsopoulos)

#### Understand the User: Pragmatic analysis

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

##### Pronouns / Anaphora

Pronouns (he, she, it, that) are the variables of natural language. They refer to ever changing things. The system needs to keep track of recent subjects in the discourse,
and link the pronoun to the subject.

A pronoun may refer to an entity in the same sentence, to an entity in a recent previous sentence, or to an implicit entity.

Data sources:

* a discourse model

##### Verbs: Tense

If a system can handle time, it must interpret tensed sentences with respect to the deictic center of time.

##### Action detection

The input sentence must be converted into one of the systems' actions: ASK (query the database), TELL (update the database), DO (perform a task)

Superficially these actions correspond with the mood of the sentence, but not always ("Can you put the red block on the table?" is a DO action)

##### Ellipsis

Can the system handle sentences where one or more words or phrases have been left out, because they can be filled in.

#### Understand the User: Domain Specific Analysis

This part of pragmatic analysis uses knowledge from the current "domain". It may use domain specific knowledge bases to help it.

##### Proper Nouns: Named Entity Recognition (NER)

How to tell proper nouns (names) apart?

A name is only meaningful if it is present, or introduced into, the present domain. This type of NER looks up names in a database.

##### Nouns and Adjectives: Compound Noun Analysis

Users may introduce compounds that are not in the lexicon. These come in two shapes:

* noun-noun compounds ("city department")
* adjective-noun compounds ("large company")

The meaning of these compounds is not purely analytical. A "city department" could denote a department located in a city, or a department responsible for a city. A "large company" can be a company with a large volume of sales or a company with many employees.

(example from Androutsopoulos)

##### Idioms

Each domain has its own expressions, that are meaningless outside it.

### Goal: Process the Intent

To process the Intent of the sentence, it must be processed. This entails

- performing inferences
- setting goals and executing plans
- interaction with databases
- updating internal state

#### Process the Intent: Inference

Inference allows an NLI to infer new information by applying (inference) rules to existing information.

An inference form has one or more antecedents, and a consequent:

IF a AND b AND c THEN d

The programming language Prolog is typically used for NLI's that rely on inference, since Prolog has a built in inference engine. Some databases also allow storing and processing rules. A reduced form of Prolog, along with a custom inference engine is sometimes implemented in the NLI itself.

#### Process the Intent: Executing plans

The NLI may have a set of built-in goals, or the system may respond to a user request by fulfilling a goal.

A goal is reached by executing plans that are linked to it. The plans are usually built-in.

#### Process the Intent: Interaction with knowledge sources

Since the main purpose of an NLI is to interact with knowledge sources, it should be no surprise that historic NLI's have interacted with a wide variety of databases and in-memory storages.

These knowledge sources can be:

- persistent or volatile. A volatile source is destroyed when the interaction with the user ends.
- internal or external. An internal source is part of the NLI. An external database is located outside of the NLI and has its own query language.
- subjective or objective. A subjective source contains information about the relations the NLI has as a subject towards other entities. Objective sources contain information that is shared with others.

All types of combinations of these dimensions occur. Typical modern databases are persistent, external and objective. Emotional information is mostly volatile, internal and subjective.

Updating these sources can be regarded as a form of learning on the part of the NLI.

Knowledge sources may have:

- time based information
- location based information
- reason based information

Knowledge may take the form of:

- facts (relations)
- rules
- definitions

Different knowledge sources usually have different ontologies (ways of describing the world). Therefore, the ontology of the system needs to be mapped onto that of each of the knowledge sources.

Open problem: if multiple knowledge sources contain information about the same entities (things), a shared identity must be found to link the information. For dates in time, this is simple. For persons, however, the name of the person may be insufficient to identify him or her in both sources. How to identify all types of entities in multiple heterogeneous knowledge sources is still an open problem.

#### Process the Intent: Interaction with databases

This is the prototypical use of an NLI: interaction with external knowledge sources; to query, tell, and delete information. In order to do this the user intent must be turned into one or more database queries.

One approach is to turn the user query into a single database query. Another is to create a number of small database queries and combine their results.

For some user queries the first approach is better. For example: "Show me the five oldest employees and sort them by age." The resemblance to an SQL query is deliberate.

For other queries this is more problematic, because building the database is complicated. For example: "How old was Lord Byron when Ada Lovelace was born?"

And for user queries that require access to multiple knowledge sources in a single response, it is impossible.

For larger databases it is necessary to optimize the queries for speed.

It is necessary to use aggregates (notably COUNT, MAX, MIN) for certain questions.

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



### Goal: Respond in a Helpful Manner

An NLI responds to the user by

- giving a canned response ("I don't know")
- generating a custom response ("She married to Lord Byron")
- asking for clarification ("Do you mean [a] ... [b] ...")

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
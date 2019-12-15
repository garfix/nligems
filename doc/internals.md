# The NLI System

A natural language interaction system (NLI) allows a user to interact with it using the normal language he or she uses to communicate with other people.

NLI is a discipline that touches the fields of computer science, artificial intelligence, linguistics, databases, information retrieval, cognitive architecture, and cognitive ergonomics. At the same time it has concepts and techniques that are unique to it. It is a complex problem field with a rich history.

## Why NLI?

Ever since there are computers, people have wanted to interact with them using their natural language (like English or French).

The goal of NLI (Natural Language Interface) is to allow you to interact with a database, or more general, any source of information and any online service, in natural language.

This is an old field of study, and yet these interfaces are still challenging to make, and quite rare in use.

Why would you want to use a Natural Language Interface? Are the existing means to access data not sufficient?

NLI allows you to place free-form queries, and as such it may be compared to free-form SQL, and text search.

SQL was designed to be an easy-to-learn human readable database query language. Still, only software developers use it today. It does not only require one to learn SQL, but to have detailed understanding of the database structure as well.

Text search is also free-form and has proven to be quite powerful and successful. Yet it can never give precise results, nor does it allow you to access structured data.

NLI aims to combine the strictness of SQL with the ease of use of text search.

This text shows you some of the ideas and techniques used in this field, and highlights its choice points. It is certainly not necessary to use all of this information to create a useful NLI. Just pick the stuff you need.

## Functions of NLI systems

The generic function of an NLI can be described like this:

> An NLI allows a user to use natural language to interact with a computer system to meet predefined goals. The system must understand the intent of the user's input, use common sense to process it, communicate with knowledge sources, and respond in a helpful manner.

Historical systems have had the following functions:

- Find an exact answer (question-answering)
- Locate information in unstructured text sources (information-retrieval) 
- Make an agent perform tasks (virtual-assistant: SHRDLU, SIRI)
- Keep a conversation alive (chatbot: ELIZA, JABBERWACKY)
- Help the user make a selection (decision-support: IR-NLI, WISBER)
- Help the user fix a problem (troubleshooting: SOPHIE)
- Emulate a therapist (therapy: Woebot)
- Model human cognition (cognitive-model: DAYDREAMER, ACRES)
- Create a paraphrase of a story (story-understanding, MARGIE, SAM)
- Prototype / proof-of-concept (show how a certain technique can be used)

## Interaction

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
- an initiated question ("Do you want to be able to have access to your money during the term of the investment?")
- a request for clarification ("Do you mean [a] or [b]?")
- an admission of inability ("I do not know this person", "I do not understand the word 'vehicle'")

Interaction with an NLI is not limited to a simple Question/Answer. Since language is ambiguous on all levels, it is often necessary for the system to ask the user to clarify his/her intent. So the interaction is always a sort of dialog.

### User Expectations

The NLI has a massive affordance problem. The affordance of a system shows a user how to use it. NLI has none of that by itself. So when you tell a user he or she can talk to the system in plain English, his or her expectations will be too high and will quickly be disappointed.

For the foreseeable future it is best to assume that the user will not be able to use natural language in an unrestricted way.

In stead, the user should be taught to be able to use a well defined subset of his language. Learning by example is one way this can be done.

The knowledge engineer may elicit the expressions a user would normally use in a certain domain. It is these expressions that should be modelled in the system.

When a question cannot be answered it is up to the system to provide precise feedback of what it is that it cannot do. "I don't understand" is too vague. "I do not know the word 'salesperson'" is better. The user may try to reword the sentence.

When the user has reasoning capabilities, the user may also jump to the conclusion that the system is intelligent. The user will also need to be instructed about the possible reasoning capabilities of the system.

## Dialog

When a user interacts with a system, this can be considered to be a dialog. A dialog may be directed, or be free form.

- The user directs the questions (most systems)
- The system directs the questions (IR-NLI, WISBER)
- Both user and system may initiate questions (Chatbots)

A system that handles anaphora (pronouns and other references) must be able to match these references to entities previously mentioned in the dialog. That's why a ___Dialog History___ is kept. Possibly it must also be able to remember the current place and time of discourse. This is why a system needs a ___Dialog Context___.

Systems that help the user make a selection or make a choice enter a real dialog with the user. They need to plan this dialog in order to reach the intended goal efficiently. For this goal they create a ___Dialog Plan___. A plan is a hierarchical structure of goals and actions. This plan steers the conversation. It may be changed dynamically as the conversation progresses, but it must be aimed at reaching the preset goal.

Systems that guide the user often make use of a mental model of the user. 

In a system with a dialog plan, this structure must be made the basis of the architecture. 

## Knowledge Sources

Since the main purpose of an NLI is to interact with knowledge sources, it should be no surprise that historic NLI's have interacted with a wide variety of databases and in-memory storages. Anything that contains information may be the source that a user may want to query. That's why we talk about a knowledge source rather than just a database.

There are many types of learning. All of them result in a change in one of these knowledge sources.

### Storage Technology

The technology of these sources may be

- a relational database (approachable through SQL)
- a triple store (approachable through SPARQL)
- an in-memory fact base (defined and approachable through code in some programming language)
- an online service with a public API
- plain text documents

### Characteristics

The source may be persistent or volatile. A ___volatile___ source is destroyed when the interaction with the user ends. A ___persistent___ source does not depend on the user session.

The source may be internal or external to the NLI system. An ___external___ database is located outside of the NLI and has its own query language. An ___internal___ source is part of the NLI. Many older systems had all their knowledge sources stored internally.

For a simple NLI the domain of the knowledge source is ___objective___, it contains soil sample data, geographical data or other factual worldly information. Objective sources contain information that is shared with others. More complex NLI systems even contain information about their own inner processes, and this information can even be queried by the user (i.e. "Why did you pick up the red cube?"). Let's call these knowledge sources ___subjective___.

Each type of knowledge base may either hold ___current information___ or ___time-bound information___. A time bound system usually uses events to link its data to.

And finally knowledge may either be ___direct___ or ___indirect___. Direct, factual, information tells you directly what is the case. Rule based information allows you to infer what is the case, or to reach a state by following a procedure. It is unusual for a relational database to contain indirect information, but it is quite common for a Prolog program to contain indirect information.

- procedures (to reach D, first do A, B and C)
- inferences (to determine if D is the case, you must first determine if A, B, and C are the case)

Note that NLI's have been created that could access and even modify all types of knowledge sources.

As you will see, a sufficiently complex NLI is a proper intelligent agent. An NLI that has none of these is simple. An NLI that has all of these is very advanced. 

A knowledge source usually contains positive information (X is the case), but it may also contain negative information (Y is not the case).

A single database may very well hold several knowledge sources. This makes it easier to create global identities for all entities involved (the same id can be used everywhere). 

### Objective knowledge sources

#### Object data

A database holds factual information about the objects in a domain: their attributes and relations.

persons, soil samples, countries, ...

Object data is usually persistent, external, and direct. It is usually not time bound, but some systems use it.

#### Metadata 

Metadata is information about the concepts in the domain. This information can be in the form of facts, but also rules.

### Subjective knowledge sources

#### Dialog Context

The dialog context holds information about the active dialog with a user. It may contain information about

- recently mentioned entities (for anaphora resolution)
- the current place of self and others in time and space: deictic center

#### Dialog History

A track of all (or the most recent) previous sentences in the dialog.

#### Dialog Plan

A system that helps the user make some selection, needs to plan its questions. This plan may be dynamic.

IR-NLI  

#### Goal model

The goal model keeps track of the active and previous goals of the system and the current procedure that is being executed.

SHRDLU

#### Mental models

In a simple system, it has direct access to the truth (as stored in a knowledge source). More advanced systems avoid this simplification by keeping track of mental models.

The BDI models keep track of the goals of different agents, which helps establish the cause of their actions (why they do things).

Two things can be modeled:

- Beliefs: what an agent believes to be the case; its mental model 
- Motives: the desires and intentions of the agent

#### Model of the system's own beliefs about the world

LUIGI

#### Model of the user's beliefs of the database 

PIQUE

#### Model of the motives of the agents in a story

MARGIE 

#### Model of the user's motives

Same as Propositional Attitudes KNOW BELIEVE WANT (?)

WISBER

#### Emotional state

Emotional state can influence the motivation of the NLI and change its goals and its output.

DAYDREAMER, ACRES

## Natural Language

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

### Syntactic structures

Common syntactic structures that may need to be recognized are:

- Noun Phrases (including proper nouns and pronouns)
- Verb Phrases (modified by mood, voice and tense)
- Preposition Phrases (e.g. "on the table")
- Determiner Phrases (e.g. "that book")
- Quantifier Phrases (e.g. "all books")
- Adverb Phrases (e.g. "quickly")
- Adjective Phrases (e.g. "red")
- Relative Clauses (e.g. "(the man) that took the money")
- Negations ("not")
- Conjunctions ("and", "or")
- Auxiliaries
- Modals ("should", "can")
- Comparative expressions ("larger than")
- Passives
- Clefts
- There be ("there is a block that ...")
- Clauses as objects
- Extraposition

### Imperative sentence syntax

An imperative sentence commands the system to do something:

- Show me the five oldest presidents.
- Send a mail to my brother John about the holidays.

The syntactic structure of these sentences is always a single verb phrase

* VP

It may be followed by an exclamation mark.

### Declarative sentence syntax

A declarative sentence gives information to the system:

- Spain borders France on the south.
- A cube has 6 sides.

It has the structure

* NP VP

### Question sentence syntax

There are so many syntactic structures for questions. You might not need all of them, but it is always good to know there's not just two or three of them.

In this overview I use some new abbreviations:

EQ = identity (is, was, are, were)
BE = auxiliary (is, was, are, were)
DO = auxiliary (do, does, did)
HAVE = auxiliary (has, have)
MOD = modality (can, could, will, would, shall, should)
NOT = negation (not)

#### Factual yes/no-questions or choice questions

* DO NP VP (did Lord Byron marry Queen Elisabeth, did Lord Byron not marry Queen Elisabeth)
* DO NP VP (did Lord Byron marry Queen Elisabeth or Anne Isabella Milbanke)
* DO NOT NP VP (didn't Lord Byron marry Anne Isabella Milbanke)

* EQ NP NP (was Lord Byron king of England, was Lord Byron not king of England)
* EQ NP NP (was Lord Byron a king or a lord)
* EQ NOT NP NP (wasn't Lord Byron a king)

* BE NP ADJP (is the block red)
* BE NP ADJP (is the block red or blue)
* BE NOT NP ADJP (isn't the block red)

* BE NP VP (was Lord Byron born in London, was Lord Byron not born in London)
* BE NP VP (was Lord Byron born in London or Cambridge)
* BE NOT NP VP (wasn't Lord Byron born in London)

* HAVE NP VP (has Napoleon invaded Germany, has Napoleon not invaded Germany)
* HAVE NP VP (has Napoleon invaded Germany or The Netherlands)
* HAVE NOT NP VP (hasn't Napoleon invaded Germany)

* MOD NP VP (would you like a cup of coffee, should I leave my things here, can dogs fly, can i ask you a question, can you stack a cube on a pyramid)
* MOD NP VP (would you like coffee or tea)
* MOD NOT NP VP (wouldn't you like coffee)

#### Uninverted yes/no questions

* NP VP (Lord Byron married Queen Elisabeth?) (question mark is required)

#### Wh-questions (which, what, who)

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

####  Amount

* HOW MANY NP VP (how many children had Lord Byron, how many children did Lord Byron have)

#### Degree

* HOW MUCH NP VP (how much sugar goes in a single drink)
* HOW ADJP BE NP (how high is the Mount Everest, how tall is the tallest man, how small is a mouse, how old are you)
* HOW ADVP DO NP VP (how often do you go to the movies, how nicely do I need to dress tonight)

#### Manner

* HOW BE NP VP (how was Napoleon crowned king)
* HOW DO NP VP (how do you go to work)
* HOW HAVE NP VP (how has Napoleon invaded Britain)
* HOW MOD NP VP (how can I become more productive)

#### State

* HOW BE NP (how are you)

#### Reason

Why questions may be about an objective knowledge source (a database) or a subjective (asking the system why it has made an action in the past).

* WHY BE NP VP (why was Napoleon crowned king)
* WHY DO NP VP (why did you put the green block on the table)
* WHY HAVE NP VP (why has John hit Jake)
* WHY MOD NP VP (why should I go)

#### Time

* WHEN BE NP (when was the marriage)
* WHEN BE NP VP (when was Napoleon crowned king)
* WHEN DO NP VP (when did you start wearing make up)
* WHEN HAVE NP VP (when have you bought the tv)
* WHEN MOD NP VP (when can I go home)

* WHEN -> WHEN PP (when in the next hour do you want to go)

#### Place

* WHERE BE NP (where is it?)
* WHERE BE NP VP (where is the concert taking place)
* WHERE DO NP VP (where did you go)
* WHERE HAVE NP VP (where has Sally gone)
* WHERE MOD NP VP (where can I find a pub)

* WHERE -> WHERE PP (where on the map is it)

#### What if

* WHAT ... WOULD ... IF (What utensils would I get dirty if I made a cake? - LUIGI)
* WHAT ... WOULD ... AFTER (What utensils would be left on the counter after I made cookies? - LUIGI)

Also, check this page! <https://www.myenglishteacher.eu/blog/types-of-questions/>

## Internal representation

Some early systems translated the user query to a database query directly, without an intermediate representation. This was inflexible and not very extendible. So called "semantic grammars" needed to be rewritten for each new database. Most systems now use this internal representation, but there is no consensus to what it looks like, and it may very well depend on the function of the system. 

The system has understood the user when the sentence has been transformed into an internal representation. This representation is called semantic, or logical, or quasi semantic or logical.

The purpose of understanding is to be useful to the system. A sentence needs only to be understood to the level needed by the system. There is no absolute criterium that needs to be reached.

While the established way of representing meaning is Predicate Logic, this formalism is almost never used literally. Some representations approach PL, others are completely different. There are as yet no standards. Every system has used its own unique representation.

Several forms of representation have been used. Different systems have different types of content they store. Each form of representation can be used to represent any type of content, but some are more suited than others.

### Architecture: tiers

When processing a question, a system goes though several phases. These phases may each have its own distinct representation, which I will call tiers. These tiers form the basic structure of a system, and are thus often called the architecture of the system.

Most combination of tiers named here have been used, in various combinations. More tiers means more work for the implementer, but is also means more flexibility, better reuse, and clearer representation. The architecture chosen depends on the task of the system and is a balance of these factors.

#### Syntax tree

Most systems parse the raw sentence into a parse tree. This tree consists of nested phrases and its leafs are words. 

#### Generic semantics

This representation contains a literal interpretation of the words of the sentence. It is created when a syntax tree is turned into a semantic representation by a generic tool.

#### Domain specific semantics

This representation contains domain specific concepts. It is a good representation to have when working with multiple databases, or reasoning in a domain, when a database representation is awkward to use.

#### Generic database

This representation contains specific database terms, but it is abstract enough to be used for multiple (similar) databases, such as different relational databases. 

#### Specific database

This is a database query.    

### Form

#### Raw-text representations

ELIZA uses raw-text parts in it internal representation. Large parts of the sentence are not processed at all and are kept in their raw form. Therefore we say that ELIZA does not understand a sentence at all.

#### Predicate Logic 

Systems that use Montague Semantics use the original Predicate Logic. There's only a few of them, and they are not very expressive, since making them cover all types of sentences is very complicated.

Pure predicate logic is useful for logic problems for which the system must find a solution. It is impractical for problems for which a solution is available; it is just a waste of time to find a solution from first principles, when a procedure is already available and could just be executed. 

#### Predicate Logic variations

Standard predicate logic lacks support for most quantifiers, for tense and mode, and for argument restrictions. Therefore most systems extend it. 

CLE uses feature unification.

#### Procedural knowledge

Planner, Prolog

Both logical deductions and plan templates are stored in the form of procedural rules. This makes them easy to understand and code by humans.

#### Conceptual Dependency

Schank

#### Frames, Scripts

Minsky

Knowledge is stored as objects with slots. Slots have default values. There may be causal connections between these objects.

#### Domain specific representations

The spec list of Baseball is not extensible to more complex sentences.  

### Content

#### Facts

#### Dialog context

#### Goals, plans, actions

#### Beliefs, desires, intentions

#### Spatial

ThoughtTreasure uses a spatial map to represent object locations.

#### Emotions

## Understanding the User

To understand a user, the system needs to extract the ___intent___ of the user's sentence.

The intent is a domain specific representation of an intended action.

Examples of the intent:

- MARRIED_TO?(Person1, Person2) "Was A married to B?"
- DATE_OF_BIRTH?(Person) "When was A born?"
- SEND_EMAIL!(Person, Subject, Content) "Send an email to A. Subject B. Content C."

The intent can typically be expressed by a single relation using variables. The variables can be filled in by arbitrarily complex structures. "Person" can be filled in with "Lord Byron", "the butcher's wife", or even "he who shall not be named", for example.

The reason to separate the intent from the full meaning is that the way the sentence is processed depends solely on the intent. The modifiers are processed the same in any sentence. The intent makes each sentence different.

In order to understand the intent of the user, and fill in the modifiers, the system can

- tokenize the sentence (split the sentence into words and punctuation marks)
- parse the sentence (using a lexicon and a grammar)
- turn the syntactic structure into pieces of semantic information (___semantic attachment___)
- compose these pieces into a semantic structure (___semantic composition___)
- detect entity types

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

### Recognize tokens

#### Tokenization

In all systems, raw text is split into tokens. This means that words, numbers and punctuation characters are distinguished.

- Lexicon lookup
- Morphological analysis (Removes the prefixes and suffixes of a word to find the root form (present in the lexicon) For example: larger => large; finding => find; unable => able)
- Open-ended token recognition (Recognizes words from an endless category that is not a good fit for a lexicon. Examples are ordinals: 42, forty-two, forty-second)
- Proper names lookup in knowledge base 
- Proper names by matching (Proper names are recognized by fitting them into a pattern. For example: [A-Z][a-z]* van der [A-Z][a-z]*)
- Quoted string recognition (le film "Horizons lointains")
- Uses a part-of-speech tagger  

#### Morphological Analysis

In some systems the morphemes of words are distinguished. This helps keep the dictionary small, since inflections of words need not be stored.

It can be useful to split up words like "wasn't" in "was" and "not".

#### Unlexical Word Forms

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

### Recognize structures

#### Pattern matching

By pattern matching in this context we mean that a system simply recognizes some words in a sentence, and does not care about their position or their part-of-speech. 

ELIZA

#### Template matching

For simple sentence structures it is possible to use ___template matching___. The template is a fixed form like this:

    WHAT IS THE MASS OF ?x

When the sentence is analysed it is simply compared to the template. All words must match literally to the template, with the exception of ?x, which matches a variable text.

#### Parsing

For sentences that contain nested, recursive structures, ___parsing___ is required. The parsing process uses a ___parser___, an algorithm that uses rewrite rules to transform a sentence into a ___parse tree___. These rewrite rules form a ___grammar___.

There are different types of grammar used to parse a sentence:

__phrase structure grammars__ are most commonly used. They form a parse tree of phrase nodes. An example parse tree is:

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

There's an online parser that may help you to find rewrite rules for a sentence. It is the Stanford Parser:  <http://nlp.stanford.edu:8080/parser/index.jsp>

__dependency grammars__ form a parse tree of dependency relations. An example parse tree:

    - "contains"
        - subject: "rock"
            - det?: "which"
        - object: "magnesium"

The advantage is that the syntactic functions that form the dependency relations (i.e. subject, object, etc) are closely associated with semantic relations.

There are several types of parsers:

- top-down parser
- chart parser
- Augmented Transition Network

### Semantic analysis

This phase links semantic information to the syntactic information.

#### Semantic grammar

When the grammar contains semantic constructs (or even database constructs) in stead of syntactic constructs, it is called a __semantic grammar__. An example parse tree is:

    - S
        - Specimen_question
            - Specimen_spec
                - "which rock"
            - Contains_info
                - "contains"
                - Substance
                    - "magnesium"

A semantic grammar merges the phases of syntactic analysis and semantic analysis. The latter is the subject of the next paragraph.

#### Semantic attachment

Once the tree structure of the sentence is known, the syntactic information needs to be transformed and enriched into semantic information.

Semantic Analysis maps words and word structures to semantic structures through a process of semantic composition. Semantic structures differ from syntactic structures in that they do not depend on the surface form of the sentence.

Semantic analysis is necessary only when the sentence is parsed using a phrase structure grammar.

Semantic analysis consists of two parts: semantic attachment and semantic composition.

Semantic attachment links partial semantic structures to words and syntactic structures. The attachments are stored in the lexicon with the word forms, and in the grammar, with the rewrite rules. Semantic attachment can take place during the parsing process, or as a separate step.

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

#### Semantic specialists

__Semantic specialists__ are hard-coded functions that transform parts of a syntactic structure into a semantic structure. They are used heavily by Winograd's SHRDLU. The technique is not portable to other domains and requires expert information about a system's inner workings.

#### Montague grammar

Montague grammar is Montague's attempt to express natural language in Predicate Logic. The composition techniques are ___lambda abstraction___ and ___lambda reduction___. The resulting semantic expression is in classic Predicate Logic and includes many quantifiers (∀ and ∃), and logical operators (→, =). Apparently it is hard to extend to anything other than simple sentences.

#### Feature unification

Feature unification is based on the idea that each semantic constituent has some features (like "number", "passive", "agr"). When the constituents are connected, the features must match and their values are inherited up the tree. This is the approach CLE has taken, and they were able to address many grammatical phenomena with it.

#### Selectional restrictions

An ontology can be used to type the arguments of the relations. This helps to prune possible interpretations.  

### Semantic post-processing

#### Quantifier Scoping

In forming a semantic structure (logical form), a system may first create some intermediate representations (sometimes called quasi logical forms). Quantifier scoping is one of these.

In a sentence, a noun phase (NP) is about things. It may contain a determiner phrase (DP). This DP specifies the things. A quantifier phrase (QP) is a special form of DP. It determines the quantity of the NP; the number of things. The NP many be "many", "few", "all", "some" or "none".

A QP requires a special treatment from the system. The number of the QP applies only to a part of the sentence; it has the NP as its scope. In the sentence "Some children have no friends", "some" applies to "children" only, and "no" to each of these children's "friends".

You will notice the inner and outer scopes, as well as the aggregation variables (childrenWithMoreThanTwoFriends and sentenceTruth). A system that supports quantifier scoping needs to handle such cases.

Open problem: scopes are ambiguous. In the example above "children" outscopes "friends". Whether one QP outscopes the other depends on a set of heuristics. For this reason it is hard to do scoping at parse time. It is best postponed until parsing is done. The heuristics are quite complex and they are not water tight. A simpler or complete theory of quantifier scope resolution has still to be found.

Note: numbers like 2 (in "2 friend") are not quantifiers. They are treated just like other properties of entities.

<https://en.wikipedia.org/wiki/Quantifier_(linguistics)>

<https://en.wikipedia.org/wiki/Numeral_(linguistics)>

#### Entity type recognition

The relations that form the semantic representation of a sentence imply the entity types of the entities in the sentence. For example, if this relation is found

    has_capital(X, Y)

It is clear to a human that X is a country and Y is a city. This information about the entity types of predicate arguments must be explicitly stored in the NLI.

Once the entity types are known in the analysis, they may be used to limit the namespace for proper nouns. For example, once it is known that the name "Iran" in a sentence is a country, the Brazilian football player by the same name can be safely discarded as the subject of the sentence.

Semantic selectional restrictions: Also called "S-selection". The lexicon stores semantic constraints for each argument of a verb.
For example, the verb may contain these restrictions:
subject: instance of living organism
object: instance of a liquid

### Pragmatic analysis

The difference between semantic and pragmatic analysis is that pragmatic analysis requires contextual information: information that can't be obtained from the sentence alone.

#### Context

The context consists of these aspects:

* Domain (A world of blocks, world geography, human relationships, moon rocks)
* Dialog (Expected responses)
* Deictic center (When a sentence mentions "I", "Here", "Now")

There are three types of deictic center:

* Person (who is I?)
* Time (when is Now?)
* Space (where is Here?)

Each domain has its own meanings for words and expressions, so you can only know the meaning of a sentence if you know the domain.

#### Conjunction and Disjunction

The word "and" is often used to denote disjunction rather than conjunction.

#### Modifier Attachment

To which constituent must the modifier (PP) be attached?

#### Anaphora

Pronouns (he, she, it, that) are the variables of natural language. They refer to ever changing things. The system needs to keep track of recent subjects in the discourse,
and link the pronoun to the subject.

A pronoun may refer to an entity in the same sentence, to an entity in a recent previous sentence, or to an implicit entity.

SHRDLU processes many types of anaphora. The numbers are sentence numbers from the sample dialog.

an object (objects) in the scene (no stored referent)

- 1 "a big red block": one of the "big" red blocks in the scene
- 3a "a block which is taller than the one you are holding": a complex reference to an object in the scene
- 4 "the box": the single box in the scene
- 6 "blocks": all blocks in the scene
- 12 "two pyramids": exactly two of the pyramids in the scene
- 13 "the blue pyramid": a single object in the scene
- 16 "anything in the box" - any type of object in the scene
- 17 "both of the red blocks and either a green cube or a pyramid": complex reference to objects in the scene
- 21a "the littlest pyramid": from all pyramids in the scene the one with the smallest height 
- 34 "the blue pyramid on the block" / "the blue pyramid on the block in the box" (ambiguous, but one interpretation has
    a reference)
- 38 "any steeples" object from the scene
- 41 "superblock" a proper name of an object in the scene

an object from the same sentence

- 3b "it": refers to the object in 3a

an object from the previous question

- 20 "a small one": "one" refers to the type "block" from previous question; extended with "small" 
- 21b "it": refers to "a small one", the direct object of the previous question

an object from the previous response

- 5 "the pyramid": one of the two objects mentioned in the conjunction of the previous response
- 7a "one of them": refers to "four of them" from the previous response
- 8 "it": refers to the the object in the previous response 
- 27 "that cube" refers to the direct object from the previous response

an event from the previous response

- 26 "that" refers to the action in the previous response

an object from an earlier question

- 7b "the one which I told you to pick up": a complex reference to the direct object the last event in which "I tell you
    to pick up" ("pick up") is true
    
a concept, an abstract object
    
- 10 "a pyramid", "a block": a pyramid-concept and a block-concept in the metadata knowledge base

a description of an object (no stored referent)

- 14a "blocks which are not red" - this is a description of objects that have no direct reference
- 14b "anything which supports a pyramid" - this is a description of objects that have no direct reference
- 37 "a stack which contains two green cubes and a pyramid" the description of a concept
   
none found

- 2 "the pyramid": reference unknown

Any noun phrase can become a referent, so all of them need to be stored in the dialog context as subject. Referents can
be singular or plural. When a reference is a description, the full description needs to match the possible referent.

#### Tense

If a system can handle time, it must interpret tensed sentences with respect to the deictic center of time.

#### Ellipsis

Can the system handle sentences where one or more words or phrases have been left out, because they can be filled in.

#### Named Entity Recognition

How to tell proper nouns (names) apart?

A name is only meaningful if it is present, or introduced into, the present domain. This type of NER looks up names in a database.

#### Compound Noun Analysis

Users may introduce compounds that are not in the lexicon. These come in two shapes:

* noun-noun compounds ("city department")
* adjective-noun compounds ("large company")

The meaning of these compounds is not purely analytical. A "city department" could denote a department located in a city, or a department responsible for a city. A "large company" can be a company with a large volume of sales or a company with many employees.

#### Common sense restrictions

"A steel ball fell on a glass table and it shattered." (Melanie Mitchell) Only common sense tells us that it is the glass that shattered. I.e. knowledge of material properties helps to select the referent of the pronoun "it".

#### Idioms

Each domain has its own expressions, that are meaningless outside it.

### Forming the intent

What a user says should be taken as just a hint of what the system should actually do. It needs a transformation of the surface request of the user to formal representation the system can work with.

#### Action detection

The input sentence must be converted into one of the systems' actions: ASK (query the database), TELL (update the database), DO (perform a task)

Superficially these actions correspond with the mood of the sentence, but not always ("Can you put the red block on the table?" is a DO action)

#### Question classification

If the input is a question then the type of question needs to be established: yes/no, when, which, why?

#### Answer type detection

The type of answer that the user expects from the system strongly influences the procedure of finding the answer. See Watson for good example.

#### Operationalization

This is the part where the system derives the "true meaning" from the user's questions. While the user asks "Give me the most recent articles on global warming". What the user "really means" is "Select the first 5 articles with titles like 'global warming' sorted descendingly by publication date".

Of course the user just means what he just said. So this step is not so much about "interpretation". It is a matter of __operationalization__, that is: transforming the request to a form that can be executed by the system and yields the result that the user expects. 

### Domain Switching

A system that handles multiple domains needs a way to automatically switch from active domain as the user changes subject (domain).

## Processing the Intent

Processing the intent of the sentence entails

- determine feasibility
- performing inferences
- interaction with databases
- updating internal state

It must be noted that although "Understand the User" and "Process the Intent" are separated in this text, they are not always separate phrases in a system. Some older systems executed the user's intent __while__ analyzing the sentence. (DEACON)

### Common sense

All rules of an NLI system are programmed by humans. This always is a lot of work. But the important advantage of this approach is that the train of thought of the system that it uses to solve a problem can be traced back to individual inference rules. And more, the builder of the application can decide what kinds of inferences the system can and cannot make. 

This is in distinct contradiction to the practise of machine learning (ML) where the programmer has less work and the system learns by itself. In such a system the machine determines the rules and there is a real chance that the user does not understand the reasoning of the computer. What's more, the results of an ML system tend to be inexact and the response has a small but real chance of not being correct.

Now there are uses cases for NLI systems where this does not matter, but they are rare. In which cases would it be okay to specify a question in great detail and then get a response that is not certain and whose reasoning cannot be traced? 

### Determine feasibility

Even if an intent is recognized, it is another question whether it is possible to fulfill this intent. The NLI must check if it is able to process the question given its capabilities.

One thing that needs to be checked which of the knowledge bases under control has the information the user requested. For factual information this means selecting the knowledge base or bases that contain information of this type. There's no use querying the others.

Then there are some questions that only may be answered by very specific types of knowledge bases.

A "when" or "where" question can be answered by any knowledge base that contains time and space information.

A "why" or "how" question can only be answered with information from a goal based knowledge base.

A question about meta information "Can a pyramid be supported by a block?" can only be answered with information from a knowledge base with meta information.

### Deduction

An inference form has one or more antecedents, and a consequent:

IF a AND b AND c THEN d

The programming language Prolog is typically used for NLI's that rely on inference, since Prolog has a built in inference engine. Some databases also allow storing and processing rules. A reduced form of Prolog, along with a custom inference engine is sometimes implemented in the NLI itself.

### Learning by being told

When a user tells a system something, the system may remember this. This is a simple yet powerful way of learning. 

- Learn new names 
- Learn new words by telling 
- Learn new words by deduction
- Learn new facts 
- Learn new rules

Most learning exists of the user simply telling the system what is the case.

The system may also conclude by itself what is the case, or what is probably the case. It may do this by applying scripts for example, or inference rules.

#### Refuse to accept

Something that is clearly wrong should not be added to the database.  

### Finding new solutions

When the system encounters a goal for which there is no known plan, or a request for information it does not have, it may need to create a new plan or actively find this new knowledge.   

#### Search

Trial-and-error. If there is a search space, the system may try possible alternatives and remember the ones that receive positive feedback.

#### Induction

Induction is deriving a uncertain conclusion based on an incomplete set of observations.

<https://en.wikipedia.org/wiki/Inductive_reasoning>

It is used in expert systems, not much in database NLI's, A medical system may conclude from the presence of symptom A and symptom B that cause C is true with certainty T.

Also: conclude that something is possible from the existence of at least a single instance.

Example from SHRDLU:
User	can a pyramid be supported by a block?
SHRDLU	YES.
The deductive system finds an actual example, so it knows this is possible. (Winograd)

#### Making Analogies

#### Proof by custom procedure

A custom procedure implemented in code decides whether a statement is true or false.
Example from ThoughtTreasure
near(X, Y) is determined by invoking a space routine.

### Interaction with knowledge sources

The system may read and write to all types of knowledge sources that are equiped with this facility.

Different knowledge sources usually have different ontologies (ways of describing the world). Therefore, the ontology of the system needs to be mapped onto that of each of the knowledge sources.

Open problem: if multiple knowledge sources contain information about the same entities (things), a shared identity must be found to link the information. For dates in time, this is simple. For persons, however, the name of the person may be insufficient to identify him or her in both sources. How to identify all types of entities in multiple heterogeneous knowledge sources is still an open problem.

#### Interaction with databases

This is the prototypical use of an NLI: interaction with external knowledge sources; to query, tell, and delete information. In order to do this the user intent must be turned into one or more database queries.

One approach is to turn the user query into a single database query. Another is to create a number of small database queries and combine their results.

For some user queries the first approach is better. For example: "Show me the five oldest employees and sort them by age." The resemblance to an SQL query is deliberate.

For other queries this is more problematic, because building the database is complicated. For example: "How old was Lord Byron when Ada Lovelace was born?"

And for user queries that require access to multiple knowledge sources in a single response, it is impossible.

For larger databases it is necessary to optimize the queries for speed.

It is necessary to use aggregates (notably COUNT, MAX, MIN) for certain questions. This can be integrated in the query that is sent to the database, but it is also possible that the systems perform the aggregations on the results when they come back from the database.

In some NLI's the semantic structure that represents the intent of the user coincides with the database query.

#### Information extraction from text files

When the knowledge source is a library of text files, the answer may be located in these phases:

- determine the answer type of the question
- locate the document (information retrieval). an index should be used for this
- locate the relevant sentences in the document 
- match the question to these sentences to find the answer
- ideally process each sentence syntactically and semantically  

### Update Dialog context

The "dialog context" is a type of memory that is linked to a single conversion with a user. It does not survive outside of this conversation. It is filled with information that is inferred from perviously processed sentences and aids in processing new sentences. 

The dialog context has several functions:

* Anaphora resolution 
* Deictic center
* Common sense

Anaphora resolution: It keeps track of roles in the dialog. When the user mentions "Lord Byron", the NLI can store Lord Byron as the current subject of the dialog with the user, along with the gender of Lord Byron (male). When the next user question just uses "he" to mention Lord Byron, the NLI can look up the referent in the dialog context. The gender is an extra check for correctness.

Deictic center: This current subject of conversation is called the deictic center. We have just seen the deictic center of person. There may also be deictic centers for time (where is 'now' in the active conversation) and space (where is 'here').

Common sense: From the sentence a user enters (e.g. "John went into a restaurant") the system may infer some information that is implied in the situation and store this in the dialog context (i.e. "John eats food", "John pays the bill").

### Update Dialog plan

In a system that helps the user make a selection, the system usually takes the initiative for questions. It has a dialog plan to guide it. When the user has answered the system's question, the plan needs to be updated and a new question prepared.

#### Update dialog history

Add the user's sentence and the systems's response. 

### Update mental models

A system may have mental models of the user or the agents in a story. The information given can be used to update these models.

### Update Goal, plans and actions

A goal based NLI needs to keep track of its goal hierarchy. The system may add a goal, process a plan or part of a plan, and perform actions.

Goals are distinct from the dialog context, because the execution of plans often takes time and uses hardware resources and the system should be able to manage conflicting demands on these resources.

 ThoughtTreasure

### Update Beliefs, desires, intentions

An NLI may keep track of its own beliefs, and of the beliefs of the user. These are mental models. It can be interesting to keep track of what you know that the other person knows. Further it can be useful for a system to have desires, and to be aware of the desires of the user. Intentions are strongly related to the goals in the previous section, of course. An intention to which the system commits itself is a goal. BDI is a level above goals, plans and actions.  

A system may also have built-in desires and be aware of the desires of the user.

 PANDORA

### Update Emotional state

A computer does not experience emotions, of course. But that does not mean it cannot react to input in the same way a human being would. For a conversational agent it is very useful to have simulated emotions. It would react more human.

## Responding in a Helpful Manner

An NLI responds to the user by

- giving a canned response ("I don't know", "Thank you")
- generating a custom response ("She married to Lord Byron")
- asking for clarification ("Do you mean [a] ... [b] ...")
- admission of inability ("I do not know this person", "I do not understand the word 'vehicle'")
- initiating a question

### Sentence generation

Compound sentences need to be built from smaller pieces, just as an input sentence is broken down in pieces. Sometimes even the same grammar is used.

### Admitting inability

It is important to realize that a knowledge source may or may not have complete information about a domain. The domain is either closed or open.

In a closed domain the knowledge of the source is complete. If it is not present in the knowledge source, it is not present in the world. This allows you to infer information about the absence of data. If a user aks "When did Michael Jackson graduate?" the system may infer from the absence of graduation information that "Michael Jackson did not graduate".

On the other hand, if the system was put to an open domain source, the answer would have to be "Unknown", because the absence of information here does not imply the opposite.

### Extra information

A cooperative response would always give some extra information that may be helpful but not explicitly asked.

"How many children had Lord Byron?"
"Two: Ada and Allegra"

"Does RV work on Loqui?"
"No. RV works on Bim-Prolog."

### Initiating a question

A system that helps the user make a selection may have a Dialog Plan that helps it decide which question to ask the user. In such a system the system takes the initiative to pose questions, and the user responds.

### Reformulation

The system can explain to the user how it interprets his question, by reformulating the semantic intent into natural language. The final SQL query may even be transformed into natural language.  

## General aspects

If you are evaluating or designing an NLI, be aware of the following main aspects, that reoccur in all parts of the system:

### Modelling

In every module, data needs to be modelled in a distinct way. The grammar, the parse tree, the logical representation, rules, plans. For each of the models you need:

* a formal language, the syntax
* an ontology: a set of concepts that make up the problem space of the module

For each ontology holds that it can be

* generic: suitable for all types of domains
* domain specific: suitable to a single domain only

Generic representations have the advantage of reuse: the same ontology may be used in other fields. Domain specific ontologies have the advantage that they restrict ambiguity. A word in a domain most often means just a single thing. A domain specific model is simpler to create, because the question of how generic each item is does not play a part.

### Ambiguity

An analysis may well lead to multiple interpretations. Parse trees, for example. Possible strategies to deal with them:

* Use the first. Ignore all but the first interpretation. This is based on the idea that, through proper modelling, the first result is the best.
* Depth first. For each of the parse trees, push it further down the pipeline until it fails. Only then, try the second tree.
* Breadth first. Collect all parse trees. Use all of them in the next phase of interpretation. Keep all possibilities around as long as they haven't failed.

Use the first only works for simple domains with many constraints.
The breadth first approach may have considerable computational and memory costs.
The depth first approach has the problem that all "pipeline" phases are active at the same time. All components need to keep state while other components are active.

### Completeness

In every part of the system, one can ask if it is "complete". Are all words in the lexicon? Are all necessary rules in the grammar? Are all database mappings present?

Can all data from the previous phrase be converted to the next phase in a way that is eventually useful to the user?

As long as a part is incomplete, how is this communicated to the user?

### Synchronicity

Parts of a system may respond to a request immediately, or require input from a third party that take some time.

So we distinguish

* synchronous: a response is given immediately
* asynchronous: a response is forwarded to a third party (possibly the user)

Asynchronous events may be embedded in the dialog with the user. Such as a request for information, or a remark that the answer will take some time to prepare.

### Learning

Learning may take place in several components of the system. Learning is the production and storage of new facts. Such a fact is stored with the other facts and will be used in a similar way from then on.

A system may learn these items:

* facts about the world
* facts about the user with whom it interacts
* names for individual things
* concepts (the mapping from a name its meaning)

Learning can occur in several ways.

* the user may tell it to the system
* the system may deduce it

### Ease of Configuration

How hard is it for a user to setup and maintain this module?

### Portability

How easy is it to use this part of the system in another domain, another language, another database?

The information of the module may be fixed in:

* code: in which case a programmer is needed to port the module to another field
* data: in which case a user with limited knowledge of the system may port it to another field

### Transparency

Transparency is about being able to inspect the internal processes of the system, to understand how and why it has chosen its actions.

A user may sometimes want to know _how_ or _why_ the system performed a certain action, or asked a certain question. There are several types of explanation:

* logging: create a textual trace of all processes that have taken place
* introspection: allow a user to ask the system about the goals that have lead to the steps it has taken.

Logging can be used at all levels but is only suited for the developer, not the end user.
Introspection can only be used for some functions like inference and planning. But it allows end users to ask the system in natural language.

## References

Some of the information in this text had its origin in:

- Natural Language Interfaces to Databases – An Introduction (1995), I. Androutsopoulos, G.D. Ritchie, P. Thanisch

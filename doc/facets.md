# Aspects

An aspect is a characteristic that may occur in several parts of the system.

## Modelling

In every module, data needs to be modelled in a distinct way. The grammar, the parse tree, the logical representation, rules, plans. For each of the models you need:

* a formal language, the syntax
* an ontology: a set of concepts that make up the problem space of the module

For each ontology holds that it can be

* generic: suitable for all types of domains
* domain specific: suitable to a single domain only

Generic representations have the advantage of reuse: the same ontology may be used in other fields. Domain specific ontologies have the advantage that they restrict ambiguity. A word in a domain most often means just a single thing. A domain specific model is simpler to create, because the question of how generic each item is does not play a part.

## Synchronicity

Parts of a system may respond to a request immediately, or require input from a third party that take some time.

So we distinguish

* synchronous: a response is given immediately
* asynchronous: a response is forwarded to a third party (possibly the user)

Asynchronous events may be embedded in the dialog with the user. Such as a request for information, or a remark that the answer will take some time to prepare.

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

## Portability

How easy is it to use this part of the system in another domain, another language, another database?

The information of the module may be fixed in:

* code: in which case a programmer is needed to port the module to another field
* data: in which case a user with limited knowledge of the system may port it to another field

## Explanation

A user may sometimes want to know _how_ or _why_ the system performed a certain action, or asked a certain question. There are several types of explanation:

* logging: create a textual trace of all processes that have taken place
* introspection: allow a user to ask the system about the goals that have lead to the steps it has taken.

Logging can be used at all levels but is only suited for the developer, not the end user.
Introspection can only be used for some functions like inference and planning. But it allows end users to ask the system in natural language.

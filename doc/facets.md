# Aspects

An aspect is a characteristic that may occur in several parts of the system.

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


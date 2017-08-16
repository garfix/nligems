# Design

It is not possible to design a system that understands anything a user might ask or say. Everything the system does needs to be hard-coded. The power of the system arises from the combination of hard-coded functions.

An NLI is an interface between a human and a machine. An interface consists of procedures. A procedure has an name/action and a number of arguments.

These are the basic parts of the system for the designer:

1. syntax
2. intents
3. knowledge source interaction

## Intents

Design starts with step 2. The designer talks to the users of the system and finds out what they want from the system. This results in a number of "intents".

The number of intents is limited.

There are three types of intents: TELL, ASK?, and DO intents.

An ASK intent requests the system to retrieve information from the database. This is the most common type of intent. An example:

DATE_OF_BIRTH?(Person)

A TELL intent requests the system to add information to the database. For example:

DATE_OF_BIRTH(Person, Date)

A DO intent requests the system to perform an action.

SEND_EMAIL!(Person, Subject, Content)


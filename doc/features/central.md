# Central

Once the semantic representation is available, it can be used by central processes to solve problems and execute tasks.

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

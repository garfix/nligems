# Central

Once the semantic representation is available, it can be used by central processes to solve problems and execute tasks.

## Dialog Manager

Most systems have some kind of dialog manager to help it with the following problems:

* correct spelling mistakes (I don't understand X. Did you mean Y?)
* disambiguate words (Do you mean: X as in Y, or as in Z?)
* understand new compound nouns (By "city size" do you mean number of citizens or surface area?)

See https://en.wikipedia.org/wiki/Dialog_manager In an NLI system, the user leads the dialog (user-initiative). The system does not commence requests of its own. It is a form of tactic flow-control error handling.

To get an idea of how a dialog manager might work, here's an example:

This dialog manager is a type of task manager. The dialog manager has one permanent top-level goal: to process user requests. With it comes a single top-level plan-template:

    * top-level goal:
        * receive request (A)
        * process request
        * show response
        * repeat

The (A) denotes the active goal. The active goal moves constantly through the active plans. As soon as 'receive request' is activated, a plan template is looked up , instantiated and inserted into the active plan:

    * receive request:
        * ASK USER for input
        * correct spelling mistakes
        * disambiguate words
        * understand compound nouns
        * analyse sentence

'Correct spelling mistakes' might create one goal for each word:

    * correct spelling mistakes:
        * check 'how'
        * check 'many'
        * check 'people'
        * check 'live'
        * ...

And 'check' will look like

    * check: (OR)
        * lookup in dictionary 'how'
        * ASK USER to correct 'how' (A)

The ASK USER task tells the system to suspend its own activity and wait for the user to reply.

This structure allows for complex user-system interactions.

During the user-system interaction, context information is stored in the DM. Things like current subject, current time.

Data sources:

* plan templates (goal + steps to achieve the goal)
* active plans (a list of hierarchical goal structures)
* context information: date and time of conversation, person roles (me, you: anaphora)

## Planner

When the user gives a command, this may mean that a goal needs to be executed. Executing a goal may require a plan (a series of tasks).

A planner takes a goal, creates a plan (recursively) and executes a set of tasks needed to accomplish it.

Data sources:

* set of plan templates
* set of plans

## Inference

Inference is the production of temporary information in order to solve a problem.

A system may infer information by:

* deduction: IF A, B, and C, THEN D
* proof by example: IF red(a) THEN EXISTS red(X)
* proof by custom procedure: near(X, Y) is calculated by a distance formula

This inference may occur both synchronously and asynchronously: in the latter case the inference requires the input from a resource that takes time to respond (for example: user input)

Data sources:

* a domain model: information about the domain that is implicit in the knowledge sources and that is nevertheless necessary to retrieve that information


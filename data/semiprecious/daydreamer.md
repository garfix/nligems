This Cognitive architecture was written by Erik T. Mueller's for his 1987 dissertation.

Daydreaming  is the process of "the spontaneous activity - carried out in a stream of thought - of recalling past experiences, imagining alternative courses that a past experience might have taken, and imagining possible future experiences."

Mueller has gone way beyond that single subject, and worked out an impressive cognitive architecture that includes many mental faculties. He supports it with a massive base of research literature. Based on this architecture is the DAYDREAMER Lisp program.

At the core of the architecture are personal goals and needs. These include achievement goals: to maintain self esteem, to have friends, and so on; and cyclic goals: food, money, entertainment.

In order to achieve these personal goals, DAYDREAMER has knowledge about "persons, physical objects, locations, possession of physical objects, ... mental states, interpersonal relationships, actions, and activities" (the "interpersonal domain"). This knowledge is implemented as planning rules and inference rules.

The program also applies these rules to other entities than itself in order to represent and make inferences on the mental states of others. This is called "other planning".

"Most AI programs take a request from a human user, handle the request, and terminate...In contrast, DAYDREAMER has a collection of goals which are instantiated and processed as the program sees fit."

A task or activity on behalf of an active top-level goal is called a "concern". Several concerns may be active at any time. "Each subsequence of contiguous representations produced on behalf of a given concern may be called a 'daydream'".

The program uses emotions to determine which concern to choose at any time ("emotion-driven planning"). Several emotions are created in different phases of a concern. For example, when a concern terminates a new positive or negative emotion is created. These emotions may trigger new concerns.

The architecture allow for two types of creative mechanisms: Serendipity and Action Mutation. Serendipity-based planning uses new input, as a fortunate coincidence, to help progress concerns that are not currently active. Action Mutation modifies events and goals in arbitrary ways (mutation) in order to find novel solutions.

Events are stored in episodic memory.

Emotions, Daydreaming goals, learning, and creativity

It continues with the description of the personal goals that are specific to daydreaming: rationalization, roving, revenge, reversal, recovery, rehearsal, and repercussions. These goals are activated when a person is idle. "Daydreaming goals are heuristics for how to exploit surplus processing time in a useful way." They are activated by emotions and directed, among others, towards the reduction of negative emotional states, and the exploration of consequences of possible actions.

The natural language interface is almost taken for granted in this work, but it is there nevertheless, and forms an important part of its interface.

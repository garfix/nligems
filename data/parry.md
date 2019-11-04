The purpose of Colby's systems is to accumulate belief statements held by the user.

Originally it used a set of pattern-oriented rules much like those of ELIZA, but Colby added pushdown stacks to maintain the continuity of the conversation. This allowed the system to interpret an input sentence as a response to an earlier question, for example.

A directed graph model of concepts in relation to other concepts has been developed to model the belief systems of the persons being conversed with.

Rules of inference are also embedded in this structure in the form of conditional statements with variables. The principal inference rule is of the form "A implies B" where "implies" is understood to mean a psychological expectation and the A term may involve multiple conditions.

Beliefs are evaluated by a technique that computes credibility as a weighted function of consistency and evidential foundation of each belief.

~~~
Q: Why are you in the hospital?
A: I shouldn't be here.
Q: Who brought you here?
A: The police.
Q: What trouble did you have with the police?
A: Cops don't do their jobs.
~~~
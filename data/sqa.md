This system accepts a very limited set of sentences in the form 'IF a THEN b'. Simple declarative statements ('Pluto is next smaller than Mars') are stored as IF/THEN statements with an empty antecedent (IF).

For example, the system may accept these sentences as input

Mercury is next smaller than Pluto
Pluto is next smaller than Mars
Mars is next smaller than Venus
If X is next smaller than Y, then X is smaller than Y.
If X is next smaller than Y and Y is smaller than Z then X is smaller than Z.

From this prior knowledge the system is then able to deduce the answer to the questions "What is next smaller than Pluto?" and "Pluto is smaller than what?".

A question is transformed into a simple relation. This relation is matched to the consequent of each of the available IF/THEN rules. If it matches the antecedents are processed. A rules with no antecedents always matches.


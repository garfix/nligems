This system accepts a very limited set of sentences in the form 'IF a THEN b'. Simple declarative statements ('Pluto is next smaller than Mars') are stored as IF/THEN statements with an empty antecedent (IF).

A question is transformed into a simple relation. This relation is matched to the consequent of each of the available IF/THEN rules. If it matches the antecedents are processed. A rules with no antecedents always matches.

~~~
Mercury is next smaller than Pluto
Pluto is next smaller than Mars
Mars is next smaller than Venus
If X is next smaller than Y, then X is smaller than Y.
If X is next smaller than Y and Y is smaller than Z then X is smaller than Z.

Q: Is Pluto smaller than Venus?
A: Yes
~~~

+ ! Its knowledge base is a set of conditional statements IF A THEN B
+ ! A declarative statement is a conditional with an empty antecedent  
Baseball answers questions about the scores, teams, locations and dates of baseball games. It uses list structures to organize data. The input questions are restricted to single clauses. The parser creates a tree structure of word groups. The semantic analyzer builds a spec list from the parsed question. With this spec list the acceptable answers are located. The logical processor processes the aggregations for 'every', 'either' and 'how many'.

~~~
H: How many games did the Yankees play in July?
~~~

+ ! Uses a specification list to locate acceptable answers
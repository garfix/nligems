Phillips wrote this program as part of his Master's Thesis. It was written in LISP (which had been created just a year earlier by Phillips' supervisor, John McCarthy).

The program takes a as input a sentence (the question) and a set of other sentences (the body of knowledge). A sentence might contain a subject, a verb and a single object, along with a prepositional phrase for time and for space.

Syntactic analysis consisted of these phases: lexicalization (looking up the part-of-speech of each word); parsing using Chomsky's phrase structure rules; ordering (placing subject, verb, object, time-phrase and space-phrase in the canonical order [subject, verb, object, place, time]). Past and perfect tense were recognized.

In the matching phase the question was compared to each of the sentences in the body of knowledge.

The program handled yes/no questions (does ...?; which were answered with "YES" or "THE ORACLE SAYS NO") and wh-questions (who, what, whom, when, where; they were answered with the requested noun or by the text "THE ORACLE DOES NOT KNOW").

~~~
The teacher went to school.

Q: Where did the teacher go?
A: to school
~~~

+ ! The question is syntactically analyzed into a canonical form and matched to the stored canonical forms
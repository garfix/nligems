LIFER is a system for creating natural language interfaces to relational databases. 

It handles ellipsis by automatically deducing possible elliptical structures from the grammars supplied for complete constructions.

For example: the sentence

~~~
position and date hired
~~~

will be recognized as 

~~~
What is the position and date hired of Eric Johnson?
~~~

LIFER also uses spelling correction and anaphoric reference resolution. It is able to define synonyms and abbreviations.

It uses a left-to-right parser following a simplifications of the ATN system of Woods.

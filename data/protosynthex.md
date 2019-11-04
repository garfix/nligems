This system has a two-phase strategy to find an answer in a large text.

In the first phase all the content words of the text are looked up in an index that was extracted from the text. Words of related meaning (thesaurus) are involved. From these an information score is calculated and the highest scoring five or ten potential answers are retrieved from the original text.

In the second phase the question and the potential answers are parsed using a dependency grammar. Human interaction is needed to remove ambiguities. The matching is done by building a matrix from all the words from the question and the possible answers.

~~~
Q: What do worms eat?
A: - Worms eat grass
   - Grass is eaten by worms
   - Birds eat worms
   - Worms eat the way through the ground
   - Horses with worms eat grain
~~~

+ ! Uses a dependency grammar
+ ! Uses related words to match the input 
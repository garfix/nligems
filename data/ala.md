This system is designed to handle the breadth and complexity of language found in a book on astronomy. Input text is translated to the intermediate language ('Flex') which bears a strong relationship to dependency structure. Analysis of a sentence includes linking to entries in a thesaurus (for word synonyms). The system does not find an exact answer but merely tries to match the question to the sentences in the source text as best as possible, using 'semantic correlation' calculations. We would now call this information retrieval.

The sequence of operations is that the question is first analyzed and assigned Flex and thesaurus codes, then sentences are selected and matched, and finally the paragraphs that contain supposed answering sentences are printed out with their scores.

+ ! Uses a thesaurus
+ ! Calculates the correlation of the question with all sentences under its control 
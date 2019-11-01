SAD SAM answers questions about human relationships. Lindsay's primary interest was in machine comprehension of English. SAD SAM reads Basic English sentences about family relationships and extracts from them data for the database. The database is in the form of a family tree represented in the program by a hierarchical set of lists.
The system has a parser and a semantic analyzer. The parser handles simple sentences, relative clauses and some appositional strings and forms a (phrase structure) parse tree.
The semantic analyzer searches for subject-complement combinations (i.e. Bill is Mary's father) and forms triplets (i.e. Bill (father) Mary)

+ ! The parser handles arbitrarily complex grammars
+ ! Constructs semantic structures composed of triplets (proper noun, relation word, proper noun)
+ ! Makes inferences while answering questions

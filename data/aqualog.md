Transforms a sentence into triples, which are then used to query a triple store. 

A sentence is parsed using the GATE NLP platform: English tokenizer, sentence splitter, POS tagger and VP chunker. It uses JAPE grammars. The result of this parse is a domain independent representation.

The core of the system is the Relation Similarity Service (RSS). The RSS creates an ontology-compliant logical query. If it encounters an ambiguity, it interacts with the user and it will remember (learn) from his choice. It maps domain independent representations to domain representations; it handles synonyms; it resolves proper nouns. It combines triples and determines their order in execution.

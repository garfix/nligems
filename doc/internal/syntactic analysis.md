# Syntactic Analysis

Syntactic Analysis is the process of turning a string of raw text into a structured representation. This structure contains no other information than can be derived from the raw text alone.

## Tokenization

In all systems, raw text is split into tokens. This means that words, numbers and punctuation characters are distinguished.

## Morphological Analysis

In some systems the morphemes of words are distinguished. This helps keep the dictionary small, since inflections of words need not be stored.

## Sentence structure recognition

Recognizing word combinations is done in two ways:

By parsing a tree structure of the sentence is created.

By template matching a line of input is matched to a template.

Data sources:

* a lexicon
* a grammar
* a set of input-matching templates

## Proper Nouns: Named Entity Recognition (NER)

How to tell proper nouns (names) apart? Which words form a name? Which words go together to form a name. Names are not in the lexicon.

NER may also include recognition of identifiers like times, dates, e-mail addresses, etc.

This type of NER uses syntactic methods to detect names.

See also https://en.wikipedia.org/wiki/Named-entity_recognition


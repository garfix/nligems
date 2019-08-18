MARGIE is based on Roger Schank's Conceptual Dependency framework. From the input it receives, it creates inferences and is able to paraphrase a text.

Examples:

Inference mode

Input: John told Mary that Bill wants a book.
Output:
    - A book about what?
    - Mary knows that bill wants a book
    - Bill wants to come to have a book
    - Bill wants someone to cease to have a book
    - Bill wants to read a book

Paraphrase mode

Input: John advised Mary to drink the wine.
Output: John told Mary that drinking the wine would benefit her.

Conceptual Dependency theory postulates six basic concept types: things, actions, attributes of things, attributes of actions, times and locations. These concept types are connected in 16 ways. There are 14 possible actions: ATRANS, PTRANS, PROPEL, MTRANS, MBUILD, SPEAK, ATTEND, MOVE, GRASP, INGEST, EXPEL

Processing a sentence goes through these steps:

- the language analyzer extracts the conceptual dependency (CD) representation from a sentence
- the CD representation is converted to positional internal memory form; this involves linking to occurrence sets
- create references from proper names (i.e. 'John') in the text to concepts in memory
- extract sub-propositions (like: COLOR VAL (RED)
- generate inferences of five basic types: NORMATIVE, PERIPHERAL, CAUSATIVE, RESOLUTIVE, PREDICTIVE
- make use of RESULTATIVE and CAUSATIVE inferences to fill in missing causal chains
- "knitting" together of equal inferences
- detect and fill in missing or unspecified concepts or events during inferencing
- generate the surface lexical form for the responses, using discrimination nets


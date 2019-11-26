PhD thesis of Winograd, supervised by Seymour Papert.

[SHRDLU](https://en.wikipedia.org/wiki/SHRDLU) allows a user to interact with a microworld of blocks. It has an impressive list of features. Over 50 years old, it still is the most expressive natural language processing system ever.

 - It allows question, imperative and declarative sentences
 - It uses a procedural representation of knowledge that allows it to reason
 - It has strong support for determiners and quantifiers ('how many', 'at least one', ...)
 - It includes a large number of common sense rules to help understand the user and give helpful responses

Helpfulness
 - It has a representation for the user (do i own the box?) and itself ('which i told you to pick up')
 - You can use pronouns (it, the one) to refer to objects and past events, and it responds by using pronouns
 - It names objects differently in different contexts, depending on the information needed by the user (compare 'a big green cube' to 'the large green one which supports the red pyramid')
 - It has many forms of clarification questions ('i don't understand which pyramid you mean')
 - It knows some heuristics to help dissolve syntactic ambiguities
 - And you can say "thank you", simple idioms with canned responses

Meta knowledge
 - It has an ontology of a blocks world, and holds some explicit meta knowledge about its objects
 - You can ask meta questions ('can the table pick up blocks?')

Learning
 - You can learn it new rule-based knowledge ('I own blocks which are not red, ...')
 - You can learn it new concepts ('A steeple is a stack which contains ...') which you can then use in the dialog
 - You can learn it names for specific objects ('call the biggest block "superblock"')
 - It derives the meaning of words like 'littlest' from the stem
 - You can use OR in a question or command, and NOT

Time, goals and actions
 - It stores events as objects (reification)
 - It stores its own actions and goals in the dialog context and is able to answer questions about them
 - You can refer to specific time spans in the dialog by describing them ('before you put the green one on ...')
 - You can ask questions about the actions that it performed in a given span of time ('how many objects did you touch while you were doing it?')
 - You can ask questions about a scene at a given time ('what did the red cube support before you started to clean it off?')
 - You can ask about a specific action in some span of time ('had you touched any pyramid ... ?')
 - You can ask 'when' questions and it answers by describing the active action at the moment ('when...?', 'while i was stacking up ...')
 - You can ask 'why' questions about actions and it answers by giving the active goal ('why?', 'to get rid of it')
 - You can ask 'how' questions about compound actions and it answers by giving the composing actions


Some parts of an interaction:

~~~
H: Find a block which is taller than the one you are holding and put it into the box.
C: BY "IT", I ASSUME YOU MEAN THE BLOCK WHICH IS TALLER THAN THE ONE I AM HOLDING.
H: Which cube is sitting on the table?
C: THE LARGE GREEN ONE WHICH SUPPORTS THE RED PYRAMID.
H: Why did you clear off that cube?
C: TO PUT IT ON A LARGE GREEN CUBE.
~~~

This system is really full of innovations, but I will sum them up as follows

+ ! Procedural representation of knowledge that used both for questioning, commanding and teaching
+ ! Explicit representation of goals and past events, and allowing the user to ask "how" and "why" questions
+ ! Uses an ontology to help parsing and to ask meta-questions about the characteristics of the objects in the domain
+ ! Allows pronouns to refer to objects and events previously mentioned
+ ! Learns names, rules and concepts from the user
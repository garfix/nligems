Watson is for Natural Language Interaction what Deep Blue was for Chess computers. It played on live American national television against some of the best contestants in the game of Jeopardy!, a game that requires you to find the question to an answer that is given.

Watson, or DeepQA as it is called by the development team, is a Question Answering system. It is very good at searching for specific entities through large amounts of unstructured text documents  based on a question in natural language and providing the confidence it has in each of the answers it finds. It also integrates structured sources like triple stores and lookup tables. It is able to combine information of multiple sources of information to answer a single question. It handles nested subquestions and certain questions that require problem solving. At the time of the Jeopardy! event it just handled English questions.

It is a very complex system. Almost literally, every technique available from literature was tried and integrated in this machine. Next to the answering machine that contains countless algorithms and manually added (Prolog) rules, it consists of many different machine learning processes, content crawlers, and uses several different types if database engines. It is a distributed system that And then there is the game engine that knows the strategies of playing Jeopardy! at the highest level. 

In its essence, Watson executes the following "pipeline" as it answers a question:

- Question Analysis: extract information from the question
- Hypothesis Generation: use this information to search for possible answers (candidate answers, or hypotheses)
- Hypothesis and evidence scoring: determine the confidence on each hypothesis: how well does it match the question?
- Final merging and ranking: merge and rank the hypotheses based on the confidence values

Example questions and answers:

~~~
Puzzle: ASTRONOMICAL RHYME TIME: Any song about earth’s natural satellite. 
Answer: "Moon tune"

Multiple Choice: BUSY AS A BEAVER: Of 1, 5, or 15, the rough maximum number of minutes a beaver can hold its breath underwater. 
Answer: "15"

Common Bond: BOND, COMMON BOND: Fan, form, poison pen. 
Answer: "letters"

Fill-in-the-Blank (FITB): SCHOOL OF ROCK: History: Herman’s Hermits hit number 1 in 1965 singing "I’m" this man, "I Am." 
Answer: "Henry VIII"

Constraint Bearing: ARE YOU A FOOD"E"?: Escoffier says to leave them in their shells & soak them in a mixture of water, vinegar, salt, and flour. 
Answer: "Escargots"

Pun bearing: HIP-HOP ON POP: From this "M.D.": "It’s like this & like that & like this & uh, its like that & like this & like that & uh" 
Answer: "Dr. Dre"
~~~    
 
+ ! Creates top-level performance at Jeopardy! 
+ ! Integrates the ranked responses of many sources of information 

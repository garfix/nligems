ELIZA was one of the first "chatterbots", systems that are able to freely communicate with humans, but lacking real understanding. The NLI was copied widely and many variations where made from it.

ELIZA was able to run different scripts. One script, called DOCTOR, provided a parody of "the responses of a non-directional psychotherapist in an initial psychiatric interview".

Response to a question consists of these steps:

- examining the text input for the word (the keyword) with the highest rank
- responses associated with this keyword are looked up (a response contains a decomposition rule and a reassembly rule)
- the decomposition rules collects the variable parts from the input
- the reassembly rule creates the response from the response template and the variables
- pronouns are switched ('you' => 'me', 'myself' => 'yourself')

There are also a number of responses that apply when no keyword is present.

Example rules:

'hate'
I hate it that (1) => 'Why do you say that (1)'
I hate (1) => 'Why do you hate (1)?'

'because'
Because (1) => 'Tell me more about it'

+ ! Shows that simple pattern matching combined with many canned responses can go far to create the illusion of understanding

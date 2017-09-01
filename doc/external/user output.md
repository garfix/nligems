# Natural language output

Except for the simplest cases, raw responses from knowledge sources are not immediately useful.

## Types of Responses

Are the database results converted from database level to domain level?

* Raw database results
* Converted to the domain specific representation

What types of responses does the system give?

* Canned responses ("I can't", "Yes", "I don't know", "The weather is fine")
* Canned responses with variables ("You have %s messages")
* Generated responses ("In the morning the weather is cloudy with a humidity of 80%. Later in the day the sky clears up.")

## Cooperative responses

If the intent of a user question is known, the nli may give a cooperative answer. Especially if the question is in yes/no form, a more cooperative answer then just "yes" or "no" may be helpful. "No, but ..."

## Lack of knowledge

From the fact that a request did not yield any responses, it should not automatically be concluded that the answer is "none" or "zero". The nli should notice that:

* The database does not contain the necessary relations to answer the question.
* The database does contains the necessary relations, but does not have information on the specific subject (i.e. person) of the question.

Even if all information is available, the nli may still remark that the information returned is "according to the knowledge available in database X". "According to my information, ..."


This program is generally considered as the first one to enter in a natural language dialog with a user. The subject of the conversation was restricted to the weather.

The program was prepared with information about the current weather of today, yesterday, and tomorrow. It was also given information about the weather each month of the year, and of the seasons. Lastly it was given emotional attachments to different types of weather. It likes sunny skies and warm breezes.

Three types of words were recognized from user input: ordinary words ("snow"), time words ("October", "last week"), and operator words ("not").

Each word was given an id and a degree. For example (3, 1) for "drizzle" (light rain), (9, 1) for "downpour" (heavy rain); 1 is the id here, 3 and 9 are degrees. Together this represents the meaning of the word. Function words could be combined with ordinary words to create new words: "not", "enjoy" -> "dislike".

The program determined whether the contents of the user's sentence was in agreement with its own knowledge of the weather.

Based on keywords in the input, and the agreement with its own knowledge, the program selected an answer frame. For example: "Well, we don't usually have ... weather in ..., so you will probably not be disappointed".

+ ! First natural language system
+ ! The meaning of each word is stored as an attribute-value pair 
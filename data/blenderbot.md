Neural-net based chatbot, by Facebook AI Research.

https://ai.facebook.com/blog/state-of-the-art-open-source-chatbot/

Based on the open source ParlAI framework https://parl.ai/ . ParlAI is a python-based platform for enabling dialog AI research.

The bot is trained by feeding it the input/output pairs of the following datasets:

* ConvAI2: conversations of people talking about their persona 
* Empathetic Dialogues (ED): conversations between humans displaying empathy
* Wizard of Wikipedia (WoW): questions and human generated answers using Wikipedia

It uses a Seq2Seq Transformer architecture (for an explanation see [this blog](https://medium.com/inside-machine-learning/what-is-a-transformer-d07dd1fbec04)) to generate responses.

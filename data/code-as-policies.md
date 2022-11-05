This nameless system by Google AI directs a robot arm based on natural language input.

Policy code is the Python code that is used to instruct a robot. The CaP system generates such policy code from natural language input, using [OpenAI Codex](https://en.wikipedia.org/wiki/OpenAI_Codex). The training of the model includes annotating policy code with human readable descriptions in comments. For example:

~~~
# move rightwards until you see the apple.
while not detect_object("apple"):
    robot.set_velocity(x=0, y=0.1, z=0)
~~~

The system makes use of perception API's and Control API's for visual recognition and action primitives. An action primitive can be "put_first_on_second(B1, B2)". The extent of the system is determined by the capabilities of these API's and by the previously written and annotated code. 

* https://ai.googleblog.com/2022/11/robots-that-write-their-own-code.html
* https://github.com/google-research/google-research/tree/master/code_as_policies
* https://code-as-policies.github.io/

+ ! CaP applies the power of code generation LLM's to the domain of robotics


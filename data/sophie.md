SOPHIE helps the user to find the fault in an electronic system.

~~~
H: INSERT A FAULT
C: THE INSTRUMENT HAS A FAULT AND ITS PRESENT CONTROL SETTINGS ARE:
   CC   1.0   CURRENT CONTROL-FROM 0.0 (MIN CURRENT) TO 1.0
   CR   HIGH  CURRENT RANGE SWITCH, HIGH=1 AMP, LOW=.1 AMP
   LOAD 1000  LOAD RESISTANCE.IN OHMS
   VC   1.0   VOLTAGE CONTROL-FROM 0.0 (MIN VOLTAGE) TO 1.0
   VR   HIGH  VOLTAGE RANGE SWITCH, HIGH=30, LOW=10 VOLTS
H: WHAT IS THE OUTPT?
C: OUTPT => OUTPUT
   THE OUTPUT VOLTAGE IS 1.2 VOLTS
   IF YOU ARE NOT SURE WHETHER A VALUE IS CORRECT, YOU CAN ASK "IS THAT VALUE CORRECT?"
H: IS THAT RIGHT
C: IN A WORKING CIRCUIT THE OUTPUT VOLTAGE IS 30.1 VOLTS.
   THAT VALUE IS INCORRECT.
H: WHAT IS THE VOLTAGE BETWEEN THE CURRENT LIMITING TRANSISTOR AND THE CONSTANT CURRENT SOURCE?
C: THE VOLTAGE AT NTIS 2.46 VOLTS.          
~~~ 
A natural language question-answering system for a database containing detailed records of U.S. Naval aircraft maintenance and flight information over a period of time.

The system understands requests by matching the requests with prestored request patterns.
During this process standard terms are substituted for synonymous words or phrases, simple misspellings are corrected and appropriate items are inserted for pronouns and referential phrases. 

If the matching is successful, a unique pre-stored request form will be specified, consisting of three structures:
1. an English sentence skeleton which expresses the meanings of the request if fragments of the original request sentence are inserted This will be called the request meaning skeleton .
2. a search function which can operate on the data base and return the appropriate answer(s) . This will be called the search function skeleton .
3. an English sentence skeleton which can be used to answer the request when filled in with retrieved data . This will be called the answer skeleton.

 

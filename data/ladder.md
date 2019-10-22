The system was developed as a management aid to Navy decision makers.

LADDER’s first component, called INLAND, accepts questions in a restricted subset of natural language and produces a query or sequence of queries to the database as a whole. The queries to the database, as produced by INLAND, refer to specific fields, but make no commitment about how the information in the database is broken down into files. 

INLAND, the linguistic component of the intelligent interface to distributed data, has been constructed within Hendrix's LIFER framework. It handles ellipsis and spelling mistakes. It uses semantic grammars. 

Queries from INLAND are directed to the second component of LADDER, called IDA (for intelligent data access). Employing a model of the structure of the database, IDA breaks down a query
against the entire database into a sequence of queries against individual files.

It is the function of the third major component of LADDER, FAM (for File Access Manager) to find the location of the generic files and manage the access to them.


An evolution from Aqualog, extending it to use multiple ontologies. It is intended to query multiple Linked Open Data sources on the Semantic Web.

Poweraqua has a pipeline architecture that has four parts:
- Linguistic Component: The output of this module is a set of Query-Triples <subject, predicate, object>
- The Element Mapping Component (PowerMap): identifies those semantic resources that may be relevant to the user query
- The Triple Mapping Component (Triple Similarity Service -TSS): determines the most likely interpretation of a user query as whole
- The Merging and Ranking Component:  integrates the set of ontological facts (triple patterns), recovered in the previous step from multiple semantic resources

Poweraqua has plugins for the Watson SW gateway (API calls), Virtuoso (SPARQL), Sesame (SeRQL queries)

 
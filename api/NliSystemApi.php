<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemApi
{
	/** @var NliSystem[] */
	private $systems;

	public function __construct()
	{
		$Reader = new NliSystemReader();
		$this->systems = $Reader->readSystems(__DIR__ . '/../data');
	}

	public function getFeatureName($feature)
	{
		$names = array(

			NliSystem::DICTIONARY_LOOKUP => 'Dictionary lookup',

			NliSystem::FIRST_YEAR => 'First year',
			NliSystem::LAST_YEAR => 'Last year',
			NliSystem::CONTRIBUTORS => 'Contributor(s)',
			NliSystem::INSTITUTIONS => 'Institution',
			NliSystem::INFLUENCED_BY => 'Influenced by',
			NliSystem::NATURAL_LANGUAGES => 'Natural language',
			NliSystem::PROGRAMMING_LANGUAGES => 'Programming language',
			NliSystem::KNOWLEDGE_BASE_TYPE => 'Knowledge base type',
			NliSystem::KNOWLEDGE_BASE_DESCRIPTION => 'Knowledge base description',
			NliSystem::SENTENCE_TYPES => 'Sentence types',
			NliSystem::ARTICLES => 'Articles',

			NliSystem::DIALOG => 'Clarification dialog to improve input sentence',
			NliSystem::ANALYSIS => 'Type of analysis',
			NliSystem::NEW_WORDS => 'Allows the user to introduce new words and concepts',
			NliSystem::MULTI_DB => 'Queries multiple knowledge bases for single request',
			NliSystem::ACCEPT_UNGRAMMATICAL_SENTENCES => 'Accept ungrammatical sentences',
			NliSystem::META_SELF => 'Answers meta questions about its own processes',
			NliSystem::META_KB => 'Answers meta questions the knowledge base',

			NliSystem::DICTIONARY_LOOKUP => 'Dictionary lookup',
			NliSystem::MORPHOLOGICAL_ANALYSIS => 'Morphological analysis',
			NliSystem::WORD_SEPARATION => 'Word separation',
			NliSystem::SPELLING_CORRECTION => 'Spelling correction',
			NliSystem::OPEN_ENDED_TOKEN_RECOGNITION => 'Open-ended token recognition',
			NliSystem::PROPER_NAMES_FROM_KB => 'Proper names lookup in knowledge base',
			NliSystem::PROPER_NAMES_BY_MATCHING => 'Proper names by matching',
			NliSystem::QUOTED_STRING_RECOGNITION => 'Quoted string recognition',

			NliSystem::NP => 'Noun Phrases',
			NliSystem::VP => 'Verb Phrases',
			NliSystem::PP => 'Preposition Phrases',
			NliSystem::DP => 'Determiner Phrases',
			NliSystem::ADVP => 'ADVerb Phrases',
			NliSystem::ADJP => 'ADJective Phrases',
			NliSystem::RC => 'Relative clauses',
			NliSystem::NEG => 'Negations',
			NliSystem::CONJ => 'Conjunctions',
			NliSystem::ANAPHORA => 'Anaphora',
			NliSystem::AUX => 'Auxiliaries',
			NliSystem::MODALS => 'Modals',
			NliSystem::COMPARATIVE_EXPRESSIONS => 'Comparative expressions',
			NliSystem::PASSIVES => 'Passives',
			NliSystem::CLEFTS => 'Clefts',
			NliSystem::THERE_BES => 'There-bes',
			NliSystem::ELLIPSIS => 'Ellipsis',

			NliSystem::GRAMMAR_TYPE => 'Grammar type',
			NliSystem::PARSER_TYPE => 'Parser type',
			NliSystem::SEMANTIC_GRAMMAR => 'Semantic grammar',

			NliSystem::SEMANTIC_ATTACHMENT => 'Semantic attachment',
			NliSystem::MODIFIER_ATTACHMENT => 'Modifier attachment',
			NliSystem::CONJUNCTION_DISJUNCTION => 'Proper interpretation of conjunction and disjunction',
			NliSystem::NOMINAL_COMPOUNDS => 'Nominal compounds',
			NliSystem::SEMANTIC_COMPOSITION => 'Semantic composition',
			NliSystem::SEMANTIC_COMPOSITION_TYPE => 'Semantic composition type',
			NliSystem::SEMANTIC_CONFLICT_DETECTION => 'Semantic conflict detection',
			NliSystem::QUANTIFIER_SCOPING => 'Quantifier scoping',
			NliSystem::ANAPHORA_RESOLUTION => 'Anaphora resolution',
			NliSystem::PLAUSIBILITY_RESOLUTION => 'Plausibility resolution',
			NliSystem::UNIFORMIZATION_REWRITES => 'Uniformization rewrites',
			NliSystem::COOPERATIVE_RESPONSES => 'Cooperative repsonses',

			NliSystem::SEMANTIC_FORM_TYPE => 'Semantic form type',
			NliSystem::EVENT_BASED => 'Event based',
			NliSystem::TEMPORAL => 'Temporal',
			NliSystem::PROPER_NOUN_CONSTANTS => 'Uses constants for proper nouns',
			NliSystem::ONTOLOGY_USED => 'Uses an ontology',
			NliSystem::STANDARD_ONTOLOGY => 'Standard ontology',

			NliSystem::SYNTACTIC_REWRITE => 'Syntactic rewrites',
			NliSystem::OPTIMIZE_QUERY =>  'Optimize query',
			NliSystem::RESTRUCTURE_INFORMATION => 'Restructure information',

			NliSystem::KNOWLEDGE_BASE_LANGUAGES => 'Knowledge base languages',
			NliSystem::KNOWLEDGE_BASE_AGGREGATION => 'Handle aggregations',

			NliSystem::LOGICAL_REASONING => 'Logical reasoning',

			NliSystem::PARAPHRASE_QUERY => 'Paraphrase knowledge base query',
		);

		return $names[$feature];
	}

	/**
	 * @return NliSystem[]
	 */
	public function getAllSystems()
	{
		return $this->systems;
	}

	public function getSystem($systemId)
	{
		return isset($this->systems[$systemId]) ? $this->systems[$systemId] : null;
	}

	/**
	 * @param $feature
	 * @return array
	 */
	public function getAllFeatureValues($feature)
	{
		$types = array();

		foreach ($this->systems as $System) {
			$value = $System->getAsArray($feature);
			$types = array_merge($types, $value);
		}

		return $types;
	}
}

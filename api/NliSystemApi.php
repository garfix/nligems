<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemApi
{
	const FEATURETYPE_BOOL = 'boolean';
	const FEATURETYPE_TEXT_SINGLE = 'text_single';
	const FEATURETYPE_TEXT_MULTIPLE = 'text_multiple';

	/** @var NliSystem[] */
	private $systems;

	/**
	 * @return NliSystem[]
	 */
	public function getAllSystems()
	{
		if (!$this->systems) {
			$Reader = new NliSystemReader();
			$this->systems = $Reader->readSystems(__DIR__ . '/../data');
		}

		return $this->systems;
	}

	public function saveSystem(NliSystem $System)
	{
		$Reader = new NliSystemReader();
		$Reader->writeSystem($System, __DIR__ . '/../data/' . $System->getId() . '.json');
	}

	/**
	 * @param $feature
	 * @return array|null
	 */
	public function getPossibleValues($feature)
	{
		$entries = array(
			NliSystem::KNOWLEDGE_BASE_TYPE => array(
				'relational' => 'Relational',
				'tree-based' => 'Tree based',
				'inference engine' => 'Inference engine',
			),
			NliSystem::NATURAL_LANGUAGES => array(
				'English' => 'English',
			),
			NliSystem::PROGRAMMING_LANGUAGES => array(
				'APL' => 'APL',
				'C' => 'C',
				'Fortran' => 'Fortran',
				'Lisp' => 'Lisp',
				'Prolog' => 'Prolog',
			),
			NliSystem::ANALYSIS => array(
				'Semantics-based' => 'Semantics based',
				'Syntax-based' => 'Syntax based',
				'Pattern-matching' => 'Pattern matching',
			),
			NliSystem::SENTENCE_TYPES => array(
				'question' => 'Question',
			    'declarative' => 'Declarative',
			    'imperative' => 'Imperative',
			),
			NliSystem::CONVERT_TYPE => array(
				'hard-coded' => 'Hard coded',
			),
			NliSystem::SYNTACTIC_FORM_TYPE => array(
				'parse trees' => 'Parse trees',
			),
			NliSystem::SEMANTIC_FORM_TYPE => array(
				'relational' => 'Relational',
				'procedural' => 'Procedural',
				'ontology' => 'Ontology',
			),
			NliSystem::SEMANTIC_COMPOSITION_TYPE => array(
				'unification' => 'Unification',
				'production rules' => 'Production rules',
				'lambda calculus' => 'Lambda calculus',
				'custom' => 'Custom',
			),
		);

		return isset($entries[$feature]) ? $entries[$feature] : null;
	}

	public function getFeatureName($feature)
	{
		$names = array(

			NliSystem::NAME => 'Name',
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
			NliSystem::SOURCE_CODE_URL => 'Source code url',
			NliSystem::GEM_IMAGE => 'Gem image',
			NliSystem::NAME_DESCRIPTION => 'Name description',
			NliSystem::LONG_DESCRIPTION => 'Long description',
			NliSystem::ARTICLES => 'Articles',
			NliSystem::BOOKS => 'Books',

			NliSystem::DIALOG => 'Clarification dialog to improve input sentence',
			NliSystem::ANALYSIS => 'Type of analysis',
			NliSystem::SEMANTIC_GRAMMAR => 'Semantic grammar',
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
			NliSystem::THERE_BES => 'There be',
			NliSystem::ELLIPSIS => 'Ellipsis',

			NliSystem::PARSE_HEADER => 'Parse header',
			NliSystem::GRAMMAR_TYPE => 'Grammar type',
			NliSystem::PARSER_TYPE => 'Parser type',
			NliSystem::SEMANTIC_GRAMMAR => 'Semantic grammar',

			NliSystem::SYNTACTIC_FORM_TYPE => 'Syntactic form type',

			NliSystem::INTERPRET_HEADER => 'Interpreter header',
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
			NliSystem::COOPERATIVE_RESPONSES => 'Cooperative responses',

			NliSystem::SEMANTIC_FORM_TYPE => 'Semantic form type',
			NliSystem::SEMANTIC_FORM_DESC => 'Semantic form description',
			NliSystem::EVENT_BASED => 'Event based',
			NliSystem::TEMPORAL => 'Temporal',
			NliSystem::PROPER_NOUN_CONSTANTS => 'Uses constants for proper nouns',
			NliSystem::ONTOLOGY_USED => 'Uses an ontology',
			NliSystem::STANDARD_ONTOLOGY => 'Standard ontology',

			NliSystem::CONVERT_HEADER => 'Convert header',
			NliSystem::CONVERT_TYPE => 'Convert type',
			NliSystem::SYNTACTIC_REWRITE => 'Syntactic rewrites',
			NliSystem::OPTIMIZE_QUERY =>  'Optimize query',
			NliSystem::RESTRUCTURE_INFORMATION => 'Restructure information',

			NliSystem::KNOWLEDGE_BASE_LANGUAGES => 'Knowledge base languages',
			NliSystem::KNOWLEDGE_BASE_AGGREGATION => 'Handle aggregations',

			NliSystem::EXECUTE_HEADER => 'Execute header',
			NliSystem::LOGICAL_REASONING => 'Logical reasoning',

			NliSystem::GENERATE_HEADER => 'Generate header',
			NliSystem::PARAPHRASE_QUERY => 'Paraphrase knowledge base query',
		);

		return $names[$feature];
	}

	public function getFeatureType($feature)
	{
		$types = array(

			NliSystem::DICTIONARY_LOOKUP => self::FEATURETYPE_BOOL,

			NliSystem::NAME => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::FIRST_YEAR => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::LAST_YEAR => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::CONTRIBUTORS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::INSTITUTIONS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::INFLUENCED_BY => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::NATURAL_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::PROGRAMMING_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::KNOWLEDGE_BASE_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::KNOWLEDGE_BASE_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::SENTENCE_TYPES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SOURCE_CODE_URL => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::GEM_IMAGE => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::NAME_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::LONG_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::ARTICLES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::BOOKS => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystem::NP => self::FEATURETYPE_BOOL,
			NliSystem::VP => self::FEATURETYPE_BOOL,
			NliSystem::PP => self::FEATURETYPE_BOOL,
			NliSystem::DP => self::FEATURETYPE_BOOL,
			NliSystem::ADVP => self::FEATURETYPE_BOOL,
			NliSystem::ADJP => self::FEATURETYPE_BOOL,
			NliSystem::RC => self::FEATURETYPE_BOOL,
			NliSystem::NEG => self::FEATURETYPE_BOOL,
			NliSystem::CONJ => self::FEATURETYPE_BOOL,
			NliSystem::ANAPHORA => self::FEATURETYPE_BOOL,
			NliSystem::AUX => self::FEATURETYPE_BOOL,
			NliSystem::MODALS => self::FEATURETYPE_BOOL,
			NliSystem::COMPARATIVE_EXPRESSIONS => self::FEATURETYPE_BOOL,
			NliSystem::PASSIVES => self::FEATURETYPE_BOOL,
			NliSystem::CLEFTS => self::FEATURETYPE_BOOL,
			NliSystem::THERE_BES => self::FEATURETYPE_BOOL,
			NliSystem::ELLIPSIS => self::FEATURETYPE_BOOL,

			NliSystem::DIALOG => self::FEATURETYPE_BOOL,
			NliSystem::ANALYSIS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SEMANTIC_GRAMMAR => self::FEATURETYPE_BOOL,
			NliSystem::NEW_WORDS => self::FEATURETYPE_BOOL,
			NliSystem::MULTI_DB => self::FEATURETYPE_BOOL,
			NliSystem::ACCEPT_UNGRAMMATICAL_SENTENCES => self::FEATURETYPE_BOOL,
			NliSystem::META_SELF => self::FEATURETYPE_BOOL,
			NliSystem::META_KB => self::FEATURETYPE_BOOL,

			NliSystem::DICTIONARY_LOOKUP => self::FEATURETYPE_BOOL,
			NliSystem::MORPHOLOGICAL_ANALYSIS => self::FEATURETYPE_BOOL,
			NliSystem::WORD_SEPARATION => self::FEATURETYPE_BOOL,
			NliSystem::SPELLING_CORRECTION => self::FEATURETYPE_BOOL,
			NliSystem::OPEN_ENDED_TOKEN_RECOGNITION => self::FEATURETYPE_BOOL,
			NliSystem::PROPER_NAMES_FROM_KB => self::FEATURETYPE_BOOL,
			NliSystem::PROPER_NAMES_BY_MATCHING => self::FEATURETYPE_BOOL,
			NliSystem::QUOTED_STRING_RECOGNITION => self::FEATURETYPE_BOOL,

			NliSystem::PARSE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::GRAMMAR_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::PARSER_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SEMANTIC_GRAMMAR => self::FEATURETYPE_BOOL,

			NliSystem::SYNTACTIC_FORM_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystem::INTERPRET_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::SEMANTIC_ATTACHMENT => self::FEATURETYPE_BOOL,
			NliSystem::MODIFIER_ATTACHMENT => self::FEATURETYPE_BOOL,
			NliSystem::CONJUNCTION_DISJUNCTION => self::FEATURETYPE_BOOL,
			NliSystem::NOMINAL_COMPOUNDS => self::FEATURETYPE_BOOL,
			NliSystem::SEMANTIC_COMPOSITION => self::FEATURETYPE_BOOL,
			NliSystem::SEMANTIC_COMPOSITION_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SEMANTIC_CONFLICT_DETECTION => self::FEATURETYPE_BOOL,
			NliSystem::QUANTIFIER_SCOPING => self::FEATURETYPE_BOOL,
			NliSystem::ANAPHORA_RESOLUTION => self::FEATURETYPE_BOOL,
			NliSystem::PLAUSIBILITY_RESOLUTION => self::FEATURETYPE_BOOL,
			NliSystem::UNIFORMIZATION_REWRITES => self::FEATURETYPE_BOOL,
			NliSystem::COOPERATIVE_RESPONSES => self::FEATURETYPE_BOOL,

			NliSystem::SEMANTIC_FORM_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SEMANTIC_FORM_DESC => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::EVENT_BASED => self::FEATURETYPE_BOOL,
			NliSystem::TEMPORAL => self::FEATURETYPE_BOOL,
			NliSystem::PROPER_NOUN_CONSTANTS => self::FEATURETYPE_BOOL,
			NliSystem::ONTOLOGY_USED => self::FEATURETYPE_BOOL,
			NliSystem::STANDARD_ONTOLOGY => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystem::CONVERT_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::CONVERT_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::SYNTACTIC_REWRITE => self::FEATURETYPE_BOOL,
			NliSystem::OPTIMIZE_QUERY =>  self::FEATURETYPE_BOOL,
			NliSystem::RESTRUCTURE_INFORMATION => self::FEATURETYPE_BOOL,

			NliSystem::KNOWLEDGE_BASE_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystem::KNOWLEDGE_BASE_AGGREGATION => self::FEATURETYPE_BOOL,

			NliSystem::EXECUTE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::LOGICAL_REASONING => self::FEATURETYPE_BOOL,

			NliSystem::GENERATE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystem::PARAPHRASE_QUERY => self::FEATURETYPE_BOOL,
		);

		return $types[$feature];
	}

	public function getLanguageConstructs()
	{
		return array(
			NliSystem::NP,
			NliSystem::VP,
			NliSystem::PP,
			NliSystem::DP,
			NliSystem::ADVP,
			NliSystem::ADJP,
			NliSystem::RC,
			NliSystem::NEG,
			NliSystem::CONJ,
			NliSystem::ANAPHORA,
			NliSystem::AUX,
			NliSystem::MODALS,
			NliSystem::COMPARATIVE_EXPRESSIONS,
			NliSystem::PASSIVES,
			NliSystem::CLEFTS,
			NliSystem::THERE_BES,
			NliSystem::ELLIPSIS,
		);
	}

	public function getSystem($systemId)
	{
		$systems = $this->getAllSystems();
		return isset($systems[$systemId]) ? $systems[$systemId] : null;
	}

	/**
	 * @param $feature
	 * @return array
	 */
	public function getAllFeatureValues($feature)
	{
		$types = array();
		$systems = $this->getAllSystems();

		foreach ($systems as $System) {
			$value = $System->getAsArray($feature);
			$types = array_merge($types, $value);
		}

		return $types;
	}
}

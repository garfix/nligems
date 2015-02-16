<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemApi
{
	// features

	const NAME = 'NAME';
	const FIRST_YEAR = 'FIRST-YEAR';
	const LAST_YEAR = 'LAST-YEAR';
	const CONTRIBUTORS = 'CONTRIBUTORS';
	const INSTITUTIONS = 'INSTITUTIONS';
	const INFLUENCED_BY = 'INFLUENCED-BY';
	const NATURAL_LANGUAGES = 'NAT-LANGS';
	const PROGRAMMING_LANGUAGES = 'PROG-LANGS';
	const SOURCE_CODE_URL = 'SOURCE-CODE';
	const KNOWLEDGE_BASE_TYPE = 'KB-TYPE';
	const KNOWLEDGE_BASE_DESCRIPTION = 'KB-TYPE-DESC';
	const SENTENCE_TYPES = 'SENTENCE-TYPES';
	const ARTICLES = 'ARTICLES';
	const BOOKS = 'BOOKS';
	const GEM_IMAGE = 'GEM-IMAGE';
	const NAME_DESCRIPTION = 'NAME-DESC';
	const LONG_DESCRIPTION = 'LONG-DESC';

	const ANALYSIS = 'ANALYSIS';
	const SEMANTIC_GRAMMAR = 'SEMANTIC-GRAMMAR';
	const DIALOG = 'DO-DIALOG';
	const NEW_WORDS = 'NEW-WORDS';
	const MULTI_DB = 'MULTI-DB';
	const META_SELF = 'META-SELF';
	const META_KB = 'META-KB';

	const NP = 'NP';
	const VP = 'VP';
	const PP = 'PP';
	const DP = 'DP';
	const ADVP = 'ADVP';
	const ADJP = 'ADJP';
	const RC = 'RC';
	const NEG = 'NEG';
	const CONJ = 'CONJ';
	const ANAPHORA = 'ANAPHORA';
	const AUX = 'AUX';
	const MODALS = 'MODALS';
	const COMPARATIVE_EXPRESSIONS = 'COMP-EXP';
	const PASSIVES = 'PASSIVES';
	const CLEFTS = 'CLEFTS';
	const THERE_BES = 'THERE';
	const ELLIPSIS = 'ELLIPSIS';

	const MORPHOLOGICAL_ANALYSIS = 'DO-MORPH-ANA';
	const DICTIONARY_LOOKUP = 'DO-DICT-LOOKUP';
	const WORD_SEPARATION = 'DO-WORD-SEPA';
	const SPELLING_CORRECTION = 'DO-SPELL-CORR';
	const OPEN_ENDED_TOKEN_RECOGNITION = 'DO-OPEN-ENDED';
	const PROPER_NAMES_FROM_KB = 'DO-PROP-NAME-KB';
	const PROPER_NAMES_BY_MATCHING = 'DO-PROP-NAME-MAT';
	const QUOTED_STRING_RECOGNITION = 'DO-QUOTED-STRINGS';

	const PARSE_HEADER = 'PARSE-HEADER';
	const GRAMMAR_TYPE = 'GRAMMAR-TYPE';
	const PARSER_TYPE = 'PARSER-TYPE';
	const ACCEPT_UNGRAMMATICAL_SENTENCES = 'DO-UNGRAMMATICAL';

	const SYNTACTIC_FORM_TYPE = 'SYNTACTIC-FORM-TYPE';

	const INTERPRET_HEADER = 'INTERPRET-HEADER';
	const SEMANTIC_ATTACHMENT = 'DO-SEMANTIC-ATTACH';
	const MODIFIER_ATTACHMENT = 'DO-MODIFIER-ATTACH';
	const CONJUNCTION_DISJUNCTION = 'DO-CONJUNCTION-DISJUNCTION';
	const NOMINAL_COMPOUNDS = 'DO-NOMINAL-COMPOUNDS';
	const SEMANTIC_COMPOSITION = 'DO-SEMANTIC-COMP';
	const SEMANTIC_COMPOSITION_TYPE = 'SEMANTIC-COMP-TYPE';
	const SEMANTIC_CONFLICT_DETECTION = 'DO-SEMANTIC-CONFLICT';
	const QUANTIFIER_SCOPING = 'DO-QUANTIFIER-SCOPE';
	const ANAPHORA_RESOLUTION = 'DO-ANAPHORA-RESOL';
	const PLAUSIBILITY_RESOLUTION = 'DO-PLAUSIB-JUDGE';
	const UNIFORMIZATION_REWRITES = 'DO-UNIFORM-REWRITES';
	const COOPERATIVE_RESPONSES = 'COOPERATIVE-RESPONSES'; // Androutsopoulos, p. 24

	const SEMANTIC_FORM_TYPE = 'SEMANTIC-FORM-TYPE';
	const SEMANTIC_FORM_DESC = 'SEMANTIC-FORM-DESC';
	const EVENT_BASED = 'EVENT-BASED';
	const TEMPORAL = 'TEMPORAL';
	const PROPER_NOUN_CONSTANTS = 'PROPER-NOUN-CNST';
	const ONTOLOGY_USED = 'ONTOLOGY-USED';
	const STANDARD_ONTOLOGY = 'STD-ONTOLOGY';

	const CONVERT_HEADER = 'CONVERT-HEADER';
	const CONVERT_TYPE = 'CONVERT-TYPE';
	const SYNTACTIC_REWRITE = 'DO-SYNTACTIC-REWRITE';
	const OPTIMIZE_QUERY = 'DO-OPTIMIZE-QUERY';
	const RESTRUCTURE_INFORMATION = 'DO-INFORMATION-RESTRUCT';

	const KNOWLEDGE_BASE_LANGUAGES  = 'KB-LANGS';
	const KNOWLEDGE_BASE_AGGREGATION = 'KB-AGGREGATIONS';

	const EXECUTE_HEADER = 'EXECUTE-HEADER';
	const LOGICAL_REASONING = 'DO-LOGICAL-REASON';

	const GENERATE_HEADER = 'GENERATE-HEADER';
	const PARAPHRASE_QUERY = 'PARAPHRASE-QUERY';

	const LEXICON_DERIVE_WORDS = 'LEXICON-DERIVE-WORDS';

	// feature types

	const FEATURETYPE_BOOL = 'boolean';
	const FEATURETYPE_TEXT_SINGLE = 'text_single';
	const FEATURETYPE_TEXT_SINGLE_LONG = 'text_single_long';
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
	 * @return array
	 */
	public function getFeatureNames()
	{
		$names = array(

			NliSystemApi::NAME => 'Name',
			NliSystemApi::FIRST_YEAR => 'First year',
			NliSystemApi::LAST_YEAR => 'Last year',
			NliSystemApi::CONTRIBUTORS => 'Contributor(s)',
			NliSystemApi::INSTITUTIONS => 'Institution',
			NliSystemApi::INFLUENCED_BY => 'Influenced by',
			NliSystemApi::NATURAL_LANGUAGES => 'Natural language',
			NliSystemApi::PROGRAMMING_LANGUAGES => 'Programming language',
			NliSystemApi::KNOWLEDGE_BASE_TYPE => 'Domain model type',
			NliSystemApi::KNOWLEDGE_BASE_DESCRIPTION => 'Knowledge base description',
			NliSystemApi::SENTENCE_TYPES => 'Sentence types',
			NliSystemApi::SOURCE_CODE_URL => 'Source code url',
			NliSystemApi::GEM_IMAGE => 'Gem image',
			NliSystemApi::NAME_DESCRIPTION => 'Name description',
			NliSystemApi::LONG_DESCRIPTION => 'Long description',
			NliSystemApi::ARTICLES => 'Articles',
			NliSystemApi::BOOKS => 'Books',

			NliSystemApi::DIALOG => 'Clarification dialog to improve input sentence',
			NliSystemApi::ANALYSIS => 'Type of analysis',
			NliSystemApi::SEMANTIC_GRAMMAR => 'Semantic grammar',
			NliSystemApi::NEW_WORDS => 'Allows the user to introduce new words and concepts',
			NliSystemApi::MULTI_DB => 'Queries multiple knowledge bases for single request',
			NliSystemApi::ACCEPT_UNGRAMMATICAL_SENTENCES => 'Accept ungrammatical sentences',
			NliSystemApi::META_SELF => 'Answers meta questions about its own processes',
			NliSystemApi::META_KB => 'Answers meta questions about the knowledge base',

			NliSystemApi::DICTIONARY_LOOKUP => 'Dictionary lookup',
			NliSystemApi::MORPHOLOGICAL_ANALYSIS => 'Morphological analysis',
			NliSystemApi::WORD_SEPARATION => 'Word separation',
			NliSystemApi::SPELLING_CORRECTION => 'Spelling correction',
			NliSystemApi::OPEN_ENDED_TOKEN_RECOGNITION => 'Open-ended token recognition',
			NliSystemApi::PROPER_NAMES_FROM_KB => 'Proper names lookup in knowledge base',
			NliSystemApi::PROPER_NAMES_BY_MATCHING => 'Proper names by matching',
			NliSystemApi::QUOTED_STRING_RECOGNITION => 'Quoted string recognition',

			NliSystemApi::NP => 'Noun Phrases',
			NliSystemApi::VP => 'Verb Phrases',
			NliSystemApi::PP => 'Preposition Phrases',
			NliSystemApi::DP => 'Determiner Phrases',
			NliSystemApi::ADVP => 'ADVerb Phrases',
			NliSystemApi::ADJP => 'ADJective Phrases',
			NliSystemApi::RC => 'Relative clauses',
			NliSystemApi::NEG => 'Negations',
			NliSystemApi::CONJ => 'Conjunctions',
			NliSystemApi::ANAPHORA => 'Anaphora',
			NliSystemApi::AUX => 'Auxiliaries',
			NliSystemApi::MODALS => 'Modals',
			NliSystemApi::COMPARATIVE_EXPRESSIONS => 'Comparative expressions',
			NliSystemApi::PASSIVES => 'Passives',
			NliSystemApi::CLEFTS => 'Clefts',
			NliSystemApi::THERE_BES => 'There be',
			NliSystemApi::ELLIPSIS => 'Ellipsis',

			NliSystemApi::PARSE_HEADER => 'Parse header',
			NliSystemApi::GRAMMAR_TYPE => 'Grammar type',
			NliSystemApi::PARSER_TYPE => 'Parser type',
			NliSystemApi::SEMANTIC_GRAMMAR => 'Semantic grammar (domain specific grammar)',

			NliSystemApi::SYNTACTIC_FORM_TYPE => 'Syntactic form type',

			NliSystemApi::INTERPRET_HEADER => 'Interpreter header',
			NliSystemApi::SEMANTIC_ATTACHMENT => 'Semantic attachment',
			NliSystemApi::MODIFIER_ATTACHMENT => 'Modifier attachment',
			NliSystemApi::CONJUNCTION_DISJUNCTION => 'Proper interpretation of conjunction and disjunction',
			NliSystemApi::NOMINAL_COMPOUNDS => 'Nominal compounds',
			NliSystemApi::SEMANTIC_COMPOSITION => 'Semantic composition',
			NliSystemApi::SEMANTIC_COMPOSITION_TYPE => 'Semantic composition type',
			NliSystemApi::SEMANTIC_CONFLICT_DETECTION => 'Semantic conflict detection',
			NliSystemApi::QUANTIFIER_SCOPING => 'Quantifier scoping',
			NliSystemApi::ANAPHORA_RESOLUTION => 'Anaphora resolution',
			NliSystemApi::PLAUSIBILITY_RESOLUTION => 'Plausibility resolution',
			NliSystemApi::UNIFORMIZATION_REWRITES => 'Uniformization rewrites',
			NliSystemApi::COOPERATIVE_RESPONSES => 'Cooperative responses',

			NliSystemApi::SEMANTIC_FORM_TYPE => 'Semantic form type',
			NliSystemApi::SEMANTIC_FORM_DESC => 'Semantic form description',
			NliSystemApi::EVENT_BASED => 'Event based',
			NliSystemApi::TEMPORAL => 'Temporal',
			NliSystemApi::PROPER_NOUN_CONSTANTS => 'Uses constants for proper nouns',
			NliSystemApi::ONTOLOGY_USED => 'Uses an ontology',
			NliSystemApi::STANDARD_ONTOLOGY => 'Standard ontology',

			NliSystemApi::CONVERT_HEADER => 'Convert header',
			NliSystemApi::CONVERT_TYPE => 'Convert type',
			NliSystemApi::SYNTACTIC_REWRITE => 'Syntactic rewrites',
			NliSystemApi::OPTIMIZE_QUERY =>  'Optimize query',
			NliSystemApi::RESTRUCTURE_INFORMATION => 'Restructure information',

			NliSystemApi::KNOWLEDGE_BASE_LANGUAGES => 'Knowledge base languages',
			NliSystemApi::KNOWLEDGE_BASE_AGGREGATION => 'Handle aggregations',

			NliSystemApi::EXECUTE_HEADER => 'Execute header',
			NliSystemApi::LOGICAL_REASONING => 'Logical reasoning',

			NliSystemApi::GENERATE_HEADER => 'Generate header',
			NliSystemApi::PARAPHRASE_QUERY => 'Paraphrase knowledge base query',

			NliSystemApi::LEXICON_DERIVE_WORDS => 'Regular inflections (larger <- large) are derived at runtime',
		);

		return $names;
	}

	/**
	 * @param string $feature
	 * @return string
	 */
	public function getFeatureType($feature)
	{
		$types = array(

			NliSystemApi::DICTIONARY_LOOKUP => self::FEATURETYPE_BOOL,

			NliSystemApi::NAME => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::FIRST_YEAR => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::LAST_YEAR => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::CONTRIBUTORS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::INSTITUTIONS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::INFLUENCED_BY => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::NATURAL_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::PROGRAMMING_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::KNOWLEDGE_BASE_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::KNOWLEDGE_BASE_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::SENTENCE_TYPES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SOURCE_CODE_URL => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::GEM_IMAGE => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::NAME_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE_LONG,
			NliSystemApi::LONG_DESCRIPTION => self::FEATURETYPE_TEXT_SINGLE_LONG,
			NliSystemApi::ARTICLES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::BOOKS => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystemApi::NP => self::FEATURETYPE_BOOL,
			NliSystemApi::VP => self::FEATURETYPE_BOOL,
			NliSystemApi::PP => self::FEATURETYPE_BOOL,
			NliSystemApi::DP => self::FEATURETYPE_BOOL,
			NliSystemApi::ADVP => self::FEATURETYPE_BOOL,
			NliSystemApi::ADJP => self::FEATURETYPE_BOOL,
			NliSystemApi::RC => self::FEATURETYPE_BOOL,
			NliSystemApi::NEG => self::FEATURETYPE_BOOL,
			NliSystemApi::CONJ => self::FEATURETYPE_BOOL,
			NliSystemApi::ANAPHORA => self::FEATURETYPE_BOOL,
			NliSystemApi::AUX => self::FEATURETYPE_BOOL,
			NliSystemApi::MODALS => self::FEATURETYPE_BOOL,
			NliSystemApi::COMPARATIVE_EXPRESSIONS => self::FEATURETYPE_BOOL,
			NliSystemApi::PASSIVES => self::FEATURETYPE_BOOL,
			NliSystemApi::CLEFTS => self::FEATURETYPE_BOOL,
			NliSystemApi::THERE_BES => self::FEATURETYPE_BOOL,
			NliSystemApi::ELLIPSIS => self::FEATURETYPE_BOOL,

			NliSystemApi::DIALOG => self::FEATURETYPE_BOOL,
			NliSystemApi::ANALYSIS => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SEMANTIC_GRAMMAR => self::FEATURETYPE_BOOL,
			NliSystemApi::NEW_WORDS => self::FEATURETYPE_BOOL,
			NliSystemApi::MULTI_DB => self::FEATURETYPE_BOOL,
			NliSystemApi::ACCEPT_UNGRAMMATICAL_SENTENCES => self::FEATURETYPE_BOOL,
			NliSystemApi::META_SELF => self::FEATURETYPE_BOOL,
			NliSystemApi::META_KB => self::FEATURETYPE_BOOL,

			NliSystemApi::DICTIONARY_LOOKUP => self::FEATURETYPE_BOOL,
			NliSystemApi::MORPHOLOGICAL_ANALYSIS => self::FEATURETYPE_BOOL,
			NliSystemApi::WORD_SEPARATION => self::FEATURETYPE_BOOL,
			NliSystemApi::SPELLING_CORRECTION => self::FEATURETYPE_BOOL,
			NliSystemApi::OPEN_ENDED_TOKEN_RECOGNITION => self::FEATURETYPE_BOOL,
			NliSystemApi::PROPER_NAMES_FROM_KB => self::FEATURETYPE_BOOL,
			NliSystemApi::PROPER_NAMES_BY_MATCHING => self::FEATURETYPE_BOOL,
			NliSystemApi::QUOTED_STRING_RECOGNITION => self::FEATURETYPE_BOOL,

			NliSystemApi::PARSE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::GRAMMAR_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::PARSER_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SEMANTIC_GRAMMAR => self::FEATURETYPE_BOOL,

			NliSystemApi::SYNTACTIC_FORM_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystemApi::INTERPRET_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::SEMANTIC_ATTACHMENT => self::FEATURETYPE_BOOL,
			NliSystemApi::MODIFIER_ATTACHMENT => self::FEATURETYPE_BOOL,
			NliSystemApi::CONJUNCTION_DISJUNCTION => self::FEATURETYPE_BOOL,
			NliSystemApi::NOMINAL_COMPOUNDS => self::FEATURETYPE_BOOL,
			NliSystemApi::SEMANTIC_COMPOSITION => self::FEATURETYPE_BOOL,
			NliSystemApi::SEMANTIC_COMPOSITION_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SEMANTIC_CONFLICT_DETECTION => self::FEATURETYPE_BOOL,
			NliSystemApi::QUANTIFIER_SCOPING => self::FEATURETYPE_BOOL,
			NliSystemApi::ANAPHORA_RESOLUTION => self::FEATURETYPE_BOOL,
			NliSystemApi::PLAUSIBILITY_RESOLUTION => self::FEATURETYPE_BOOL,
			NliSystemApi::UNIFORMIZATION_REWRITES => self::FEATURETYPE_BOOL,
			NliSystemApi::COOPERATIVE_RESPONSES => self::FEATURETYPE_BOOL,

			NliSystemApi::SEMANTIC_FORM_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SEMANTIC_FORM_DESC => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::EVENT_BASED => self::FEATURETYPE_BOOL,
			NliSystemApi::TEMPORAL => self::FEATURETYPE_BOOL,
			NliSystemApi::PROPER_NOUN_CONSTANTS => self::FEATURETYPE_BOOL,
			NliSystemApi::ONTOLOGY_USED => self::FEATURETYPE_BOOL,
			NliSystemApi::STANDARD_ONTOLOGY => self::FEATURETYPE_TEXT_MULTIPLE,

			NliSystemApi::CONVERT_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::CONVERT_TYPE => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::SYNTACTIC_REWRITE => self::FEATURETYPE_BOOL,
			NliSystemApi::OPTIMIZE_QUERY =>  self::FEATURETYPE_BOOL,
			NliSystemApi::RESTRUCTURE_INFORMATION => self::FEATURETYPE_BOOL,

			NliSystemApi::KNOWLEDGE_BASE_LANGUAGES => self::FEATURETYPE_TEXT_MULTIPLE,
			NliSystemApi::KNOWLEDGE_BASE_AGGREGATION => self::FEATURETYPE_BOOL,

			NliSystemApi::EXECUTE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::LOGICAL_REASONING => self::FEATURETYPE_BOOL,

			NliSystemApi::GENERATE_HEADER => self::FEATURETYPE_TEXT_SINGLE,
			NliSystemApi::PARAPHRASE_QUERY => self::FEATURETYPE_BOOL,

			NliSystemApi::LEXICON_DERIVE_WORDS => self::FEATURETYPE_BOOL,
		);

		return $types[$feature];
	}

	/**
	 * @param $feature
	 * @return array|null
	 */
	public function getPossibleValues($feature)
	{
		$entries = array(
			NliSystemApi::KNOWLEDGE_BASE_TYPE => array(
				'relational' => 'Relational',
				'tree-based' => 'Tree based',
				'inference engine' => 'Inference engine',
			),
			NliSystemApi::NATURAL_LANGUAGES => array(
				'English' => 'English',
			),
			NliSystemApi::PROGRAMMING_LANGUAGES => array(
				'APL' => 'APL',
				'C' => 'C',
				'Fortran' => 'Fortran',
				'Lisp' => 'Lisp',
				'Prolog' => 'Prolog',
			),
			NliSystemApi::ANALYSIS => array(
				'Pattern-matching' => 'Pattern matching',
				'Syntax-based' => 'Syntax based (maps parse tree to DB query)',
				'Semantics-based' => 'Semantics based (via semantic intermediate)',
			),
			NliSystemApi::SENTENCE_TYPES => array(
				'question' => 'Question',
			    'declarative' => 'Declarative',
			    'imperative' => 'Imperative',
			),
			NliSystemApi::CONVERT_TYPE => array(
				'hard-coded' => 'Hard coded',
			),
			NliSystemApi::SYNTACTIC_FORM_TYPE => array(
				'parse trees' => 'Parse trees',
			),
			NliSystemApi::SEMANTIC_FORM_TYPE => array(
				'relational' => 'Relational',
				'procedural' => 'Procedural',
				'ontology' => 'Ontology',
			),
			NliSystemApi::SEMANTIC_COMPOSITION_TYPE => array(
				'unification' => 'Unification',
				'production rules' => 'Production rules',
				'lambda calculus' => 'Lambda calculus',
				'custom' => 'Custom',
			),
		);

		return isset($entries[$feature]) ? $entries[$feature] : null;
	}

	public function getExplanationHtml($feature)
	{
		$entries = array(
			NliSystemApi::KNOWLEDGE_BASE_TYPE =>
				'The way data is stored in the domain model:
					<dl>
						<dt>Relational</dt><dd>A relational database</dd>
						<dt>Tree based</dt><dd>A hierarchical database</dd>
						<dt>Inference engine</dt><dd>A logical database, with inference rules</dd>
					</dl>
				',
			NliSystemApi::ANALYSIS =>
				'The main categories of natural language interfaces<br>
					<dl>
						<dt>Pattern matching</dt><dd>Literal occurrences of a pattern in a sentence are converted directly to parts of a DB query</dd>
						<dt>Syntax based</dt><dd>A sentence is parsed and the parse tree is mapped directly to a DB query</dd>
						<dt>Semantics based</dt><dd>After a sentence is parsed, it is first converted into an intermediate semantic expression, which is in turn converted into a DB query</dd>
					</dl>
					From: Androutsopoulos, et al., Natural Language Interfaces to Databases - An Introduction'
		);

		return isset($entries[$feature]) ? $entries[$feature] : null;
	}

	public function getFeatureName($feature)
	{
		$names = $this->getFeatureNames();
		return $names[$feature];
	}

	public function getFeatureCount()
	{
		$names = $this->getFeatureNames();
		return count($names);
	}

	public function getFeatures()
	{
		$names = $this->getFeatureNames();
		return array_keys($names);
	}

	public function getFeaturesOfSystem(NliSystem $System)
	{
		$features = [];

		foreach ($System->getAllValues() as $feature => $value) {
			if (!empty($value)) {
				$features[$feature] = $value;
			}
		}

		return $features;
	}

	public function getUniqueFeaturesOfSystem(NliSystem $System)
	{
		$unique = array();

		foreach ($System->getAllValues() as $feature => $value) {

			if (is_array($value)) {

				$uniqueElements = $value;

				foreach ($this->systems as $SomeSystem) {
					if ($SomeSystem->getId() != $System->getId()) {
						$someSystemsValue = $SomeSystem->get($feature);
						$uniqueElements = array_diff($uniqueElements, $someSystemsValue);
					}
				}

				if (!empty($uniqueElements)) {
					$unique[$feature] = $uniqueElements;
				}

			} else {
				$found = false;
				foreach ($this->systems as $SomeSystem) {
					if ($SomeSystem->getId() != $System->getId()) {
						$someSystemsValue = $SomeSystem->get($feature);
						if ($someSystemsValue == $value) {
							$found = true;
							break;
						}
					}
				}

				if (!$found) {
					$unique[$feature] = $value;
				}
			}
		}

		return $unique;
	}

	public function getLanguageConstructs()
	{
		return array(
			NliSystemApi::NP,
			NliSystemApi::VP,
			NliSystemApi::PP,
			NliSystemApi::DP,
			NliSystemApi::ADVP,
			NliSystemApi::ADJP,
			NliSystemApi::RC,
			NliSystemApi::NEG,
			NliSystemApi::CONJ,
			NliSystemApi::ANAPHORA,
			NliSystemApi::AUX,
			NliSystemApi::MODALS,
			NliSystemApi::COMPARATIVE_EXPRESSIONS,
			NliSystemApi::PASSIVES,
			NliSystemApi::CLEFTS,
			NliSystemApi::THERE_BES,
			NliSystemApi::ELLIPSIS,
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

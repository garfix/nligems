<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystem
{
	const NAME = 'NAME';
	const FIRST_YEAR = 'FIRST-YEAR';
	const LAST_YEAR = 'LAST-YEAR';
	const CONTRIBUTORS = 'CONTRIBUTORS';
	const INSTITUTIONS = 'INSTITUTIONS';
	const INFLUENCED_BY = 'INFLUENCED-BY';
	const NATURAL_LANGUAGES = 'NAT-LANGS';
	const PROGRAMMING_LANGUAGES = 'PROG-LANGS';
	const KNOWLEDGE_BASE_TYPE = 'KB-TYPE';
	const KNOWLEDGE_BASE_DESCRIPTION = 'KB-TYPE-DESC';
	const SENTENCE_TYPES = 'SENTENCE-TYPES';
	const ARTICLES = 'ARTICLES';
	const GEM_IMAGE = 'GEM-IMAGE';
	const NAME_DESCRIPTION = 'NAME-DESC';
	const LONG_DESCRIPTION = 'LONG-DESC';
	const SOURCE_CODE_URL = 'SOURCE-CODE';

	const ANALYSIS = 'ANALYSIS';
	const DIALOG = 'DO-DIALOG';
	const NEW_WORDS = 'NEW-WORDS';
	const MULTI_DB = 'MULTI-DB';

	const MORPHOLOGICAL_ANALYSIS = 'DO-MORPH-ANA';
	const DICTIONARY_LOOKUP = 'DO-DICT-LOOKUP';
	const WORD_SEPARATION = 'DO-WORD-SEPA';
	const SPELLING_CORRECTION = 'DO-SPELL-CORR';
	const OPEN_ENDED_TOKEN_RECOGNITION = 'DO-OPEN-ENDED';
	const PROPER_NAMES_FROM_KB = 'DO-PROP-NAME-KB';
	const PROPER_NAMES_BY_MATCHING = 'DO-PROP-NAME-MAT';
	const QUOTED_STRING_RECOGNITION = 'DO-QUOTED-STRINGS';

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

	const GRAMMAR_TYPE = 'GRAMMAR-TYPE';
	const PARSER_TYPE = 'PARSER-TYPE';
	const SEMANTIC_GRAMMAR = 'SEMANTIC-GRAMMAR';

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

	const SEMANTIC_FORM_TYPE = 'SEMANTIC-FORM-TYPE';
	const EVENT_BASED = 'EVENT-BASED';
	const PROPER_NOUN_CONSTANTS = 'PROPER-NOUN-CNST';
	const ONTOLOGY_USED = 'ONTOLOGY-USED';
	const STANDARD_ONTOLOGY = 'STD-ONTOLOGY';

	const SYNTACTIC_REWRITE = 'DO-SYNTACTIC-REWRITE';
	const OPTIMIZE_QUERY = 'DO-OPTIMIZE-QUERY';
	const RESTRUCTURE_INFORMATION = 'DO-INFORMATION-RESTRUCT';

	const KNOWLEDGE_BASE_LANGUAGES  = 'KB-LANGS';
	const KNOWLEDGE_BASE_AGGREGATION = 'KB-AGGREGATIONS';

	const LOGICAL_REASONING = 'DO-LOGICAL-REASON';


	private $values = array();

	public function set($key, $value)
	{
		$this->values[$key] = $value;
	}

	public function get($key)
	{
		$value = isset($this->values[$key]) ? $this->values[$key] : null;

		return $value;
	}

	public function getAsArray($key)
	{
		$value = $this->get($key);

		if ($value === null) {
			return array();
		} elseif (is_array($value)) {
			return $value;
		} else {
			return array($value);
		}
	}

	/**
	 * @return string
	 */
	public function getId()
	{
		return $this->getValue('id');
	}

	/**
	 * @return string
	 */
	public function getName()
	{
		return $this->getValue(self::NAME);
	}

	/**
	 * @return string
	 */
	public function getNameDescription()
	{
		return $this->getValue(self::NAME_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getLongDescription()
	{
		return $this->getValue(self::LONG_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getFirstYear()
	{
		return $this->getValue(self::FIRST_YEAR);
	}

	/**
	 * @return string
	 */
	public function getLastYear()
	{
		return $this->getValue(self::LAST_YEAR);
	}

	/**
	 * @return string[]
	 */
	public function getInstitutions()
	{
		return $this->getValue(NliSystem::INSTITUTIONS);
	}

	/**
	 * @return string[]
	 */
	public function getInfluences()
	{
		return $this->getValue(self::INFLUENCED_BY);
	}

	/**
	 * @return string[]
	 */
	public function getNaturalLanguages()
	{
		return $this->getValue(self::NATURAL_LANGUAGES);
	}

	/**
	 * @return string[]
	 */
	public function getProgrammingLanguages()
	{
		return $this->getValue(self::PROGRAMMING_LANGUAGES);
	}

	/**
	 * @return string
	 */
	public function getSourceCodeUrl()
	{
		return $this->getValue(self::SOURCE_CODE_URL);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseType()
	{
		return $this->getValue(self::KNOWLEDGE_BASE_TYPE);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseTypeDescription()
	{
		return $this->getValue('KB-TYPE-DESC');
	}

	/**
	 * @return string
	 */
	public function getSentenceTypes()
	{
		return $this->getValue(self::SENTENCE_TYPES);
	}

	/**
	 * @return string[]
	 */
	public function getArticles()
	{
		return $this->getValue(self::ARTICLES);
	}

	public function getParserName()
	{
		return $this->getValue('PARSE-HEADER');
	}

	public function getInterpreterName()
	{
		return $this->getValue('INTERPRET-HEADER');
	}

	public function getSemanticFormName()
	{
		return $this->getValue('SEMANTIC-FORM-DESC');
	}

	public function getConverterName()
	{
		return $this->getValue('CONVERT-HEADER');
	}

	public function useConverter()
	{
		return $this->getValue(self::SYNTACTIC_REWRITE) == 'yes';
	}

	public function useOntology()
	{
		return $this->getValue(self::ONTOLOGY_USED) == 'yes';
	}

	public function getStandardOntology()
	{
		return $this->getValue(self::STANDARD_ONTOLOGY);
	}

	public function getKnowledgeBaseLanguageName()
	{
		return $this->getValue(self::KNOWLEDGE_BASE_LANGUAGES);
	}

	public function getGrammarType()
	{
		return $this->getValue(self::GRAMMAR_TYPE);
	}

	public function getParserType()
	{
		return $this->getValue(self::PARSER_TYPE);
	}

	public function getSemanticAttachmentType()
	{
		return $this->getValue(self::SEMANTIC_COMPOSITION_TYPE);
	}

	public function getAnswererName()
	{
		return $this->getValue('GENERATE-HEADER');
	}

	public function getTokenizerName()
	{
		return $this->getValue('TOKENIZE-HEADER');
	}

	public function getExecuterName()
	{
		return $this->getValue('EXECUTE-HEADER');
	}

	public function getContributors()
	{
		return $this->getValue(self::CONTRIBUTORS);
	}

	public function getGemImage()
	{
		return $this->getValue(self::GEM_IMAGE);
	}

	public function getTokenizationProcesses()
	{
		$processes = array();

		$names = array(
			self::DICTIONARY_LOOKUP => 'Dictionary lookup',
			self::MORPHOLOGICAL_ANALYSIS => 'Morphemic analysis',
			self::WORD_SEPARATION => 'Word separation',
			self::SPELLING_CORRECTION => 'Spelling correction',
			self::OPEN_ENDED_TOKEN_RECOGNITION => 'Recognition of open-ended tokens',
			self::PROPER_NAMES_FROM_KB => 'Proper names from knowledge base',
			self::PROPER_NAMES_BY_MATCHING => 'Proper name recognition by matching',
			self::QUOTED_STRING_RECOGNITION => 'Treat quoted strings as single tokens',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value) {
				$processes[] = $desc;
			}
		}

		return $processes;
	}

	public function getInterpretationProcesses()
	{
		$processes = array();

		$names = array(
			self::SEMANTIC_ATTACHMENT => 'Semantic attachment',
			self::SEMANTIC_COMPOSITION => 'Semantic composition',
			self::MODIFIER_ATTACHMENT => 'Modifier attachment',
			self::CONJUNCTION_DISJUNCTION => 'Conjunction and disjunction',
			self::SEMANTIC_CONFLICT_DETECTION => 'Semantic conflict detection',
			self::QUANTIFIER_SCOPING => 'Quantification scoping',
			self::ANAPHORA_RESOLUTION => 'Anaphora resolution',
			self::PLAUSIBILITY_RESOLUTION => 'Plausibility judgement',
			self::UNIFORMIZATION_REWRITES => 'Uniformization rewrites',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value == 'yes') {

				$description = $names[$key];

				if ($key == 'DO-SEMANTIC-COMP' && ($type = $this->getSemanticAttachmentType())) {
					$description .= "\n(" . $type . ")";
				}

				$processes[] = $description;
			}
		}

		return $processes;
	}

	public function getExecuterProcesses()
	{
		$processes = array();

		$names = array(
			self::LOGICAL_REASONING => 'Logical reasoning',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value == 'yes') {
				$processes[] = $names[$key];
			}
		}

		return $processes;
	}

	public function getConversionProcesses()
	{
		$processes = array();

		$names = array(
			self::RESTRUCTURE_INFORMATION => 'Knowledge base-specific query refactoring',
			self::OPTIMIZE_QUERY => 'Optimize query for speed',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value == 'yes') {
				$processes[] = $names[$key];
			}
		}

		return $processes;
	}

	public function getSemanticOptions()
	{
		$processes = array();

		$names = array(
			self::EVENT_BASED => 'Event-based semantics',
			self::PROPER_NOUN_CONSTANTS => 'Proper nouns represented by constants',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value == 'yes') {
				$processes[] = $names[$key];
			}
		}

		return $processes;
	}

	public function getKnowledgeBaseOptions()
	{
		$processes = array();

		$names = array(
			self::KNOWLEDGE_BASE_AGGREGATION => 'Supports aggregation (AVG, MIN, MAX, COUNT, SUM)',
		);

		foreach ($names as $key => $desc) {
			$value = $this->getValue($key);
			if ($value == 'yes') {
				$processes[] = $names[$key];
			}
		}

		return $processes;
	}

	public function getLanguageConstructs()
	{
		$NliSystemApi = new NliSystemApi();
		$constructs = array();

		$ids = array(
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

		foreach ($ids as $id) {
			$value = $this->getValue($id);
			if ($value == 'yes') {
				$constructs[] = $NliSystemApi->getFeatureName($id);
			}
		}

		return $constructs;
	}

	public function getValue($key)
	{
		return isset($this->values[$key]) ? $this->values[$key] : null;
	}
}

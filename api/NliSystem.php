<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystem
{
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

	const ANALYSIS = 'ANALYSIS';
	const DIALOG = 'DO-DIALOG';
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

	const SEMANTIC_ATTACHMENT = 'DO-SEMANTIC-ATTACH';
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
		return $this->getValue('NAME');
	}

	/**
	 * @return string
	 */
	public function getNameDescription()
	{
		return $this->getValue('NAME-DESC');
	}

	/**
	 * @return string
	 */
	public function getLongDescription()
	{
		return $this->getValue('LONG-DESC');
	}

	/**
	 * @return string
	 */
	public function getFirstYear()
	{
		return $this->getValue('FIRST-YEAR');
	}

	/**
	 * @return string
	 */
	public function getLastYear()
	{
		return $this->getValue('LAST-YEAR');
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
		return $this->getValue('INFLUENCED-BY');
	}

	/**
	 * @return string[]
	 */
	public function getNaturalLanguages()
	{
		return $this->getValue('NAT-LANGS');
	}

	/**
	 * @return string[]
	 */
	public function getProgrammingLanguages()
	{
		return $this->getValue('PROG-LANGS');
	}

	/**
	 * @return string
	 */
	public function getWebsite()
	{
		return $this->getValue('WEBSITE');
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseType()
	{
		return $this->getValue('KB-TYPE');
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
		return $this->getValue('SENTENCE-TYPES');
	}

	/**
	 * @return string[]
	 */
	public function getArticles()
	{
		return $this->getValue('ARTICLES');
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
		return $this->getValue('DO-SYNTACTIC-REWRITE') == 'yes';
	}

	public function useOntology()
	{
		return $this->getValue('ONTOLOGY-USED') == 'yes';
	}

	public function getStandardOntology()
	{
		return $this->getValue('STD-ONTOLOGY');
	}

	public function getKnowledgeBaseLanguageName()
	{
		return $this->getValue('KB-LANGS');
	}

	public function getGrammarType()
	{
		return $this->getValue('GRAMMAR-TYPE');
	}

	public function getParserType()
	{
		return $this->getValue('PARSER-TYPE');
	}

	public function getSemanticAttachmentType()
	{
		return $this->getValue('SEMANTIC-COMP-TYPE');
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
		return $this->getValue('CONTRIBUTORS');
	}

	public function getGemImage()
	{
		return $this->getValue(self::GEM_IMAGE);
	}

	public function getTokenizationProcesses()
	{
		$processes = array();

		$names = array(
			'DO-DICT-LOOKUP' => 'Dictionary lookup',
			'DO-MORPH-ANA' => 'Morphemic analysis',
			'DO-WORD-SEPA' => 'Word separation',
			'DO-SPELL-CORR' => 'Spelling correction',
			'DO-OPEN-ENDED' => 'Recognition of open-ended tokens',
			'DO-PROP-NAME-KB' => 'Proper names from knowledge base',
			'DO-PROP-NAME-MAT' => 'Proper name recognition by matching',
			'DO-QUOTED-STRINGS' => 'Treat quoted strings as single tokens',
		);

		foreach (array('DO-DICT-LOOKUP', 'DO-MORPH-ANA', 'DO-WORD-SEPA', 'DO-SPELL-CORR', 'DO-OPEN-ENDED', 'DO-PROP-NAME-KB', 'DO-PROP-NAME-MAT', 'DO-QUOTED-STRINGS') as $key) {
			$value = $this->getValue($key);
			if ($value) {
				$processes[] = $names[$key];
			}
		}

		return $processes;
	}

	public function getInterpretationProcesses()
	{
		$processes = array();

		$names = array(
			'DO-SEMANTIC-ATTACH' => 'Semantic attachment',
			'DO-SEMANTIC-COMP' => 'Semantic composition',
			'DO-SEMANTIC-CONFLICT' => 'Semantic conflict detection',
			'DO-QUANTIFIER-SCOPE' => 'Quantification scoping',
			'DO-ANAPHORA-RESOL' => 'Anaphora resolution',
			'DO-PLAUSIB-JUDGE' => 'Plausibility judgement',
			'DO-UNIFORM-REWRITES' => 'Uniformization rewrites',
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
			'DO-LOGICAL-REASON' => 'Logical reasoning',
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
			'DO-INFORMATION-RESTRUCT' => 'Knowledge base-specific query refactoring',
			'DO-OPTIMIZE-QUERY' => 'Optimize query for speed',
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
			'EVENT-BASED' => 'Event-based semantics',
			'PROPER-NOUN-CNST' => 'Proper nouns represented by constants',
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
			'KB-AGGREGATIONS' => 'Supports aggregation (AVG, MIN, MAX, COUNT, SUM)',
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

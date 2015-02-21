<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystem
{
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

	/**
	 * @return array
	 */
	public function getAllValues()
	{
		return $this->values;
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
		return $this->getValue(Features::NAME);
	}

	/**
	 * @return string
	 */
	public function getNameDescription()
	{
		return $this->getValue(Features::NAME_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getLongDescription()
	{
		return $this->getValue(Features::LONG_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getFirstYear()
	{
		return $this->getValue(Features::FIRST_YEAR);
	}

	/**
	 * @return string
	 */
	public function getLastYear()
	{
		return $this->getValue(Features::LAST_YEAR);
	}

	/**
	 * @return string[]
	 */
	public function getInstitutions()
	{
		return $this->getValue(Features::INSTITUTIONS);
	}

	/**
	 * @return string[]
	 */
	public function getInfluences()
	{
		return $this->getValue(Features::INFLUENCED_BY);
	}

	/**
	 * @return string[]
	 */
	public function getNaturalLanguages()
	{
		return $this->getValue(Features::NATURAL_LANGUAGES);
	}

	/**
	 * @return string[]
	 */
	public function getProgrammingLanguages()
	{
		return $this->getValue(Features::PROGRAMMING_LANGUAGES);
	}

	/**
	 * @return string
	 */
	public function getSourceCodeUrl()
	{
		return $this->getValue(Features::SOURCE_CODE_URL);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseType()
	{
		return $this->getValue(Features::KNOWLEDGE_BASE_TYPE);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseTypeDescription()
	{
		return $this->getValue(Features::KNOWLEDGE_BASE_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getSentenceTypes()
	{
		return $this->getValue(Features::SENTENCE_TYPES);
	}

	/**
	 * @return string[]
	 */
	public function getArticles()
	{
		return $this->getValue(Features::ARTICLES);
	}

	/**
	 * @return string[]
	 */
	public function getBooks()
	{
		return $this->getValue(Features::BOOKS);
	}

	public function getParserName()
	{
		return $this->getValue(Features::PARSE_HEADER);
	}

	public function getInterpreterName()
	{
		return $this->getValue(Features::INTERPRET_HEADER);
	}

	public function getSemanticFormName()
	{
		return $this->getValue(Features::SEMANTIC_FORM_DESC);
	}

	public function getConverterName()
	{
		return $this->getValue(Features::CONVERT_HEADER);
	}

	public function useConverter()
	{
		return $this->getValue(Features::SYNTACTIC_REWRITE);
	}

	public function useOntology()
	{
		return $this->getValue(Features::ONTOLOGY_USED);
	}

	public function getStandardOntology()
	{
		return $this->getValue(Features::STANDARD_ONTOLOGY);
	}

	public function getKnowledgeBaseLanguageName()
	{
		return $this->getValue(Features::KNOWLEDGE_BASE_LANGUAGES);
	}

	public function getGrammarType()
	{
		return $this->getValue(Features::GRAMMAR_TYPE);
	}

	public function getParserType()
	{
		return $this->getValue(Features::PARSER_TYPE);
	}

	public function getSemanticAttachmentType()
	{
		return $this->getValue(Features::SEMANTIC_COMPOSITION_TYPE);
	}

	public function getAnswererName()
	{
		return $this->getValue(Features::GENERATE_HEADER);
	}

	public function getExecuterName()
	{
		return $this->getValue(Features::EXECUTE_HEADER);
	}

	public function getContributors()
	{
		return $this->getValue(Features::CONTRIBUTORS);
	}

	public function getGemImage()
	{
		return $this->getValue(Features::GEM_IMAGE);
	}

	private function buildFeatureDescriptionArray($features)
	{
		$NliSystemApi = new NliSystemApi();

		$descriptions = array();

		foreach ($features as $feature) {
			if ($this->getValue($feature)) {
				$descriptions[$feature] = $NliSystemApi->getFeatureName($feature);
			}
		}

		return $descriptions;
	}

	public function getTokenizationProcesses()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::DICTIONARY_LOOKUP,
			Features::MORPHOLOGICAL_ANALYSIS,
			Features::WORD_SEPARATION,
			Features::SPELLING_CORRECTION,
			Features::OPEN_ENDED_TOKEN_RECOGNITION,
			Features::PROPER_NAMES_FROM_KB,
			Features::PROPER_NAMES_BY_MATCHING,
			Features::QUOTED_STRING_RECOGNITION,
		));
	}

	public function getInterpretationProcesses()
	{
		$descriptions = $this->buildFeatureDescriptionArray(array(
			Features::SEMANTIC_ATTACHMENT,
			Features::SEMANTIC_COMPOSITION,
			Features::MODIFIER_ATTACHMENT,
			Features::CONJUNCTION_DISJUNCTION,
			Features::NOMINAL_COMPOUNDS,
			Features::SEMANTIC_CONFLICT_DETECTION,
			Features::QUANTIFIER_SCOPING,
			Features::ANAPHORA_RESOLUTION,
			Features::PLAUSIBILITY_RESOLUTION,
			Features::UNIFORMIZATION_REWRITES,
			Features::COOPERATIVE_RESPONSES,

		));

		if (isset($descriptions[Features::SEMANTIC_COMPOSITION]) && ($type = $this->getSemanticAttachmentType())) {
			$descriptions[Features::SEMANTIC_COMPOSITION] .= "\n(" . $type . ")";
		}

		return $descriptions;
	}

	public function getExecuterProcesses()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::LOGICAL_REASONING,
		));
	}

	public function getConversionProcesses()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::RESTRUCTURE_INFORMATION,
			Features::OPTIMIZE_QUERY,
		));
	}

	public function getSemanticOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::EVENT_BASED,
			Features::TEMPORAL,
			Features::PROPER_NOUN_CONSTANTS,
		));
	}

	public function getKnowledgeBaseOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::KNOWLEDGE_BASE_AGGREGATION
		));
	}

	public function getGenerationOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			Features::PARAPHRASE_QUERY
		));
	}

	public function getLanguageConstructNames()
	{
		$Api = new NliSystemApi();

		return $this->buildFeatureDescriptionArray($Api->getLanguageConstructs());
	}

	public function getValue($key)
	{
		return isset($this->values[$key]) ? $this->values[$key] : null;
	}
}

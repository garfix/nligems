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
		return $this->getValue(NliSystemApi::NAME);
	}

	/**
	 * @return string
	 */
	public function getNameDescription()
	{
		return $this->getValue(NliSystemApi::NAME_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getLongDescription()
	{
		return $this->getValue(NliSystemApi::LONG_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getFirstYear()
	{
		return $this->getValue(NliSystemApi::FIRST_YEAR);
	}

	/**
	 * @return string
	 */
	public function getLastYear()
	{
		return $this->getValue(NliSystemApi::LAST_YEAR);
	}

	/**
	 * @return string[]
	 */
	public function getInstitutions()
	{
		return $this->getValue(NliSystemApi::INSTITUTIONS);
	}

	/**
	 * @return string[]
	 */
	public function getInfluences()
	{
		return $this->getValue(NliSystemApi::INFLUENCED_BY);
	}

	/**
	 * @return string[]
	 */
	public function getNaturalLanguages()
	{
		return $this->getValue(NliSystemApi::NATURAL_LANGUAGES);
	}

	/**
	 * @return string[]
	 */
	public function getProgrammingLanguages()
	{
		return $this->getValue(NliSystemApi::PROGRAMMING_LANGUAGES);
	}

	/**
	 * @return string
	 */
	public function getSourceCodeUrl()
	{
		return $this->getValue(NliSystemApi::SOURCE_CODE_URL);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseType()
	{
		return $this->getValue(NliSystemApi::KNOWLEDGE_BASE_TYPE);
	}

	/**
	 * @return string
	 */
	public function getKnowledgeBaseTypeDescription()
	{
		return $this->getValue(NliSystemApi::KNOWLEDGE_BASE_DESCRIPTION);
	}

	/**
	 * @return string
	 */
	public function getSentenceTypes()
	{
		return $this->getValue(NliSystemApi::SENTENCE_TYPES);
	}

	/**
	 * @return string[]
	 */
	public function getArticles()
	{
		return $this->getValue(NliSystemApi::ARTICLES);
	}

	/**
	 * @return string[]
	 */
	public function getBooks()
	{
		return $this->getValue(NliSystemApi::BOOKS);
	}

	public function getParserName()
	{
		return $this->getValue(NliSystemApi::PARSE_HEADER);
	}

	public function getInterpreterName()
	{
		return $this->getValue(NliSystemApi::INTERPRET_HEADER);
	}

	public function getSemanticFormName()
	{
		return $this->getValue(NliSystemApi::SEMANTIC_FORM_DESC);
	}

	public function getConverterName()
	{
		return $this->getValue(NliSystemApi::CONVERT_HEADER);
	}

	public function useConverter()
	{
		return $this->getValue(NliSystemApi::SYNTACTIC_REWRITE);
	}

	public function useOntology()
	{
		return $this->getValue(NliSystemApi::ONTOLOGY_USED);
	}

	public function getStandardOntology()
	{
		return $this->getValue(NliSystemApi::STANDARD_ONTOLOGY);
	}

	public function getKnowledgeBaseLanguageName()
	{
		return $this->getValue(NliSystemApi::KNOWLEDGE_BASE_LANGUAGES);
	}

	public function getGrammarType()
	{
		return $this->getValue(NliSystemApi::GRAMMAR_TYPE);
	}

	public function getParserType()
	{
		return $this->getValue(NliSystemApi::PARSER_TYPE);
	}

	public function getSemanticAttachmentType()
	{
		return $this->getValue(NliSystemApi::SEMANTIC_COMPOSITION_TYPE);
	}

	public function getAnswererName()
	{
		return $this->getValue(NliSystemApi::GENERATE_HEADER);
	}

	public function getExecuterName()
	{
		return $this->getValue(NliSystemApi::EXECUTE_HEADER);
	}

	public function getContributors()
	{
		return $this->getValue(NliSystemApi::CONTRIBUTORS);
	}

	public function getGemImage()
	{
		return $this->getValue(NliSystemApi::GEM_IMAGE);
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
			NliSystemApi::DICTIONARY_LOOKUP,
			NliSystemApi::MORPHOLOGICAL_ANALYSIS,
			NliSystemApi::WORD_SEPARATION,
			NliSystemApi::SPELLING_CORRECTION,
			NliSystemApi::OPEN_ENDED_TOKEN_RECOGNITION,
			NliSystemApi::PROPER_NAMES_FROM_KB,
			NliSystemApi::PROPER_NAMES_BY_MATCHING,
			NliSystemApi::QUOTED_STRING_RECOGNITION,
		));
	}

	public function getInterpretationProcesses()
	{
		$descriptions = $this->buildFeatureDescriptionArray(array(
			NliSystemApi::SEMANTIC_ATTACHMENT,
			NliSystemApi::SEMANTIC_COMPOSITION,
			NliSystemApi::MODIFIER_ATTACHMENT,
			NliSystemApi::CONJUNCTION_DISJUNCTION,
			NliSystemApi::NOMINAL_COMPOUNDS,
			NliSystemApi::SEMANTIC_CONFLICT_DETECTION,
			NliSystemApi::QUANTIFIER_SCOPING,
			NliSystemApi::ANAPHORA_RESOLUTION,
			NliSystemApi::PLAUSIBILITY_RESOLUTION,
			NliSystemApi::UNIFORMIZATION_REWRITES,
			NliSystemApi::COOPERATIVE_RESPONSES,

		));

		if (isset($descriptions[NliSystemApi::SEMANTIC_COMPOSITION]) && ($type = $this->getSemanticAttachmentType())) {
			$descriptions[NliSystemApi::SEMANTIC_COMPOSITION] .= "\n(" . $type . ")";
		}

		return $descriptions;
	}

	public function getExecuterProcesses()
	{
		return $this->buildFeatureDescriptionArray(array(
			NliSystemApi::LOGICAL_REASONING,
		));
	}

	public function getConversionProcesses()
	{
		return $this->buildFeatureDescriptionArray(array(
			NliSystemApi::RESTRUCTURE_INFORMATION,
			NliSystemApi::OPTIMIZE_QUERY,
		));
	}

	public function getSemanticOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			NliSystemApi::EVENT_BASED,
			NliSystemApi::TEMPORAL,
			NliSystemApi::PROPER_NOUN_CONSTANTS,
		));
	}

	public function getKnowledgeBaseOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			NliSystemApi::KNOWLEDGE_BASE_AGGREGATION
		));
	}

	public function getGenerationOptions()
	{
		return $this->buildFeatureDescriptionArray(array(
			NliSystemApi::PARAPHRASE_QUERY
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

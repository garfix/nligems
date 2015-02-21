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
			Features::COOPERATIVE_RESPONSES,

		));

		if (isset($descriptions[Features::SEMANTIC_COMPOSITION]) && ($type = $this->get(Features::SEMANTIC_COMPOSITION_TYPE))) {
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

<?php

namespace nligems\page\api;

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

	public function get($feature)
	{
		if (array_key_exists($feature, $this->values)) {
			$value = $this->values[$feature];
		} else {
			trigger_error('Feature does not exist: ' . $feature, E_USER_ERROR);
		}

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

	private function buildFeatureDescriptionArray($tag)
	{
		$NliSystemApi = new NliSystemApi();

		$features = $NliSystemApi->getFeaturesByTag($tag);

		$descriptions = array();

		foreach ($features as $feature) {
			if ($NliSystemApi->getFeatureType($feature) == Features::FEATURETYPE_BOOL) {
				if ($this->getValue($feature)) {
					$descriptions[$feature] = $NliSystemApi->getFeatureName($feature);
				}
			}
		}

		return $descriptions;
	}

	public function getTokenizationProcesses()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_TOKENIZATION);
	}

	public function getInterpretationProcesses()
	{
		$descriptions = $this->buildFeatureDescriptionArray(Features::TAG_SEMANTIC_ANALYSIS);

		if (isset($descriptions[Features::SEMANTIC_COMPOSITION]) && ($type = $this->get(Features::SEMANTIC_COMPOSITION_TYPE))) {
			$descriptions[Features::SEMANTIC_COMPOSITION] .= "\n(" . implode(', ', $type) . ")";
		}

		return $descriptions;
	}

	public function getExecutorProcesses()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_EXECUTION);
	}

	public function getConversionProcesses()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_CONVERSION_TO_KB);
	}

	public function getSemanticOptions()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_SEMANTIC_FORM);
	}

	public function getKnowledgeBaseOptions()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_KB_FORM);
	}

	public function getGenerationOptions()
	{
		return $this->buildFeatureDescriptionArray(Features::TAG_ANSWER);
	}

	public function getLanguageConstructNames()
	{
		$SystemApi = new NliSystemApi();
		$possibleValues = $SystemApi->getPossibleValues(Features::PHRASE_TYPES);
		$names = array();
		foreach ($this->get(Features::PHRASE_TYPES) as $val) {
			$names[] = 	$possibleValues[$val];
		}

		return $names;
	}

	public function getValue($key)
	{
		return isset($this->values[$key]) ? $this->values[$key] : null;
	}
}

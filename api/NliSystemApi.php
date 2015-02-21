<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemApi
{
	/** @var NliSystem[] */
	private $systems;

	/** @var  array */
	private $featuresByTag;

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
		$features = Features::getFeatures();
		$entries = array_combine(
			array_keys($features),
			array_column($features, 'name')
		);

		return $entries;
	}

	/**
	 * @param string $feature
	 * @return string
	 */
	public function getFeatureType($feature)
	{
		$features = Features::getFeatures();
		return isset($features[$feature]['type']) ? $features[$feature]['type'] : null;
	}

	/**
	 * @param $feature
	 * @return array|null
	 */
	public function getPossibleValues($feature)
	{
		$features = Features::getFeatures();
		return isset($features[$feature]['options']) ? $features[$feature]['options'] : null;
	}

	public function getExplanationHtml($feature)
	{
		$features = Features::getFeatures();
		return isset($features[$feature]['desc']) ? trim($features[$feature]['desc']) : null;
	}

	public function getFeatureName($feature)
	{
		$features = Features::getFeatures();
		return isset($features[$feature]['name']) ? $features[$feature]['name'] : null;
	}

	public function getFeaturesByTag($tag)
	{
		if (!$this->featuresByTag) {

			$this->featuresByTag = [];

			foreach (Features::getFeatures() as $feature => $info) {
				if (isset($info['tags'])) {
					foreach ($info['tags'] as $featureTag) {
						$this->featuresByTag[$featureTag][] = $feature;
					}
				}
			}
		}

		return isset($this->featuresByTag[$tag]) ? $this->featuresByTag[$tag] : array();
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
			Features::NP,
			Features::VP,
			Features::PP,
			Features::DP,
			Features::ADVP,
			Features::ADJP,
			Features::RC,
			Features::NEG,
			Features::CONJ,
			Features::ANAPHORA,
			Features::AUX,
			Features::MODALS,
			Features::COMPARATIVE_EXPRESSIONS,
			Features::PASSIVES,
			Features::CLEFTS,
			Features::THERE_BES,
			Features::ELLIPSIS,
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

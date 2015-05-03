<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemApi
{
	/** @var NliSystem[] */
	private $systems;

	/** @var NliSystem[] */
	private $systemsSortedByYear;

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

	/**
	 * Returns an [id => System] array of all systems, sorted by start year
	 *
	 * @return array
	 */
	public function getAllSystemsSortedByYear()
	{
		if (!$this->systemsSortedByYear) {

			$sortedSystems = array();

			// create a year => system map
			foreach ($this->getAllSystems() as $System) {
				$sortKey = $System->get(Features::FIRST_YEAR) . $System->getName();
				$sortedSystems[$sortKey] = $System;
			}
			// sort this map by year
			ksort($sortedSystems);

			$allSystems = array();
			/** @var NliSystem $System */
			foreach ($sortedSystems as $System) {
				$allSystems[$System->getId()] = $System;
			}

			$this->systemsSortedByYear = $allSystems;
		}

		return $this->systemsSortedByYear;
	}

	public function saveSystem(NliSystem $System)
	{
		$Reader = new NliSystemReader();
		$Reader->writeSystem($System, __DIR__ . '/../data/' . $System->getId() . '.json');
	}

	/**
	 * Returns the basename of the image of system $id
	 *
	 * @param string $id
	 * @return string
	 */
	public function getGemImageForSystem($id)
	{
		static $images;

		// load the images
		if (!$images) {

			$images = array();

			foreach (glob(__DIR__ . '/../page/img/gems/*.png') as $path) {
				$images[] = basename($path);
			}
		}

		// find the index of system $id
		$index = array_search($id, array_keys($this->getAllSystemsSortedByYear()));

		// grab the corresponding image
		// cycle through the images if there are not enough of them
		$image = $images[$index % count($images)];

		return $image;
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
	 * Returns the default value (empty) for an attribute.
	 *
	 * @param $feature
	 * @return array|null
	 */
	public function getEmptyValue($feature)
	{
		$featureType = $this->getFeatureType($feature);

		if (in_array($featureType, array(Features::FEATURETYPE_MULTIPLE_CHOICE, Features::FEATURETYPE_TEXT_MULTIPLE))) {
			return array();
		} else {
			return null;
		}
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
		return isset($features[$feature]['desc']) ? $features[$feature]['desc'] : null;
	}

	public function getFeatureName($feature)
	{
		$features = Features::getFeatures();
		return isset($features[$feature]['name']) ? $features[$feature]['name'] : null;
	}

	public function getFeaturesByTag($tag)
	{
		if (!$this->featuresByTag) {

			$this->featuresByTag = array();

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
		$features = array();

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

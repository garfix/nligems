<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class NliSystemReader
{
	public function readSystems($dir)
	{
		$systems = array();

		foreach (glob($dir . '/*.txt') as $path) {

			preg_match('#/([^/.]+)\.txt#', $path, $matches);
			$id = $matches[1];

			$systems[$id] = $this->readSystem($id, $path);
		}

		return $systems;
	}

	private function getMultipleValueFieldKeys()
	{
		return array(
			NliSystem::CONTRIBUTORS,
			NliSystem::INSTITUTIONS,
			NliSystem::KNOWLEDGE_BASE_TYPE,
			NliSystem::INSTITUTIONS,
			NliSystem::PARSER_TYPE,
			NliSystem::INFLUENCED_BY,
			NliSystem::NATURAL_LANGUAGES,
			NliSystem::PROGRAMMING_LANGUAGES,
			NliSystem::SENTENCE_TYPES,
			NliSystem::KNOWLEDGE_BASE_LANGUAGES,
			NliSystem::STANDARD_ONTOLOGY,
			NliSystem::GRAMMAR_TYPE,
			NliSystem::SEMANTIC_FORM_TYPE,
		);
	}

	private function readSystem($id, $filename)
	{
		$System = new NliSystem();

		$System->set('id', $id);

		$lines = file($filename);

		for ($i = 0; $i < count($lines); $i++) {

			$line = trim($lines[$i]);

			if ($line != '') {

				if (!preg_match('/([^:]+):(.*)/', $line, $matches)) {
					trigger_error('Syntax error in ' . $filename . ' line ' . ($i + 1), E_USER_WARNING);
					continue;
				}

				$key = trim($matches[1]);
				$value = trim($matches[2]);

				if (in_array($key, $this->getMultipleValueFieldKeys())) {

					$value = array_filter(array_map('trim', explode(',', $value)));

				} elseif ($value == 'yes') {

					$value = true;

				} elseif ($value == 'no') {

					$value = false;

				} elseif ($value == '') {

					$value = null;

				} elseif ($value == '-') {

					$value = '';
					$i++;
					while ($i < count($lines) && ($line = trim($lines[$i])) != '-') {
						$value .= ($line ? "\n" : "") . $line;
						$i++;
					}
				}

				$System->set($key, $value);
			}

		}

		return $System;
	}
}

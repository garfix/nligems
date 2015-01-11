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

		foreach (glob($dir . '/*.json') as $path) {

			preg_match('#/([^/.]+)\.json#', $path, $matches);
			$id = $matches[1];

			$systems[$id] = $this->readSystem($id, $path);
		}

		return $systems;
	}

	private function readSystem($id, $filename)
	{
		$System = new NliSystem();

		$System->set('id', $id);

		$contents = file_get_contents($filename);
		$structure = json_decode($contents);

		foreach ($structure as $key => $value) {
			$System->set($key, $value);
		}

		return $System;
	}

	public function writeSystem(NliSystem $System, $fileName)
	{
		$structure = [];

		foreach ($System->getAllValues() as $key => $value) {

			if ($key == 'id') {
				continue;
			}

			$structure[$key] = $value;
		}

		$json = json_encode($structure, JSON_PRETTY_PRINT);

		file_put_contents($fileName, $json);
	}
}

<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class LinkApi
{
	public function getLink($page, $params = [])
	{
		if ($page == 'image') {
			$rel = 'img/' . $params['name'] . '.jpg';
			if (!file_exists(__DIR__ . '/../' . $rel)) {
				$rel = 'img/unknown.jpg';
			}

			return $rel;

		} else {
			return $page . '.php' . ($params ? '?' . http_build_query($params) : '');
		}
	}
}

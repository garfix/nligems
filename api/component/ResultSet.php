<?php

namespace nligems\api\component;

use nligems\api\filter\Filter;
use nligems\api\LinkApi;
use nligems\api\NliSystem;
use nligems\api\NliSystemApi;

/**
 * @author Patrick van Bergen
 */
class ResultSet
{
	/** @var NliSystem[] */
	private $systems = [];

	/**
	 * @param NliSystemApi $NliSystemApi
	 * @param Filter $Filter
	 * @param array $values
	 * @return NliSystem[]
	 */
	public function filterResults(NliSystemApi $NliSystemApi, Filter $Filter)
	{
		$systems = $NliSystemApi->getAllSystems();
		$selectedSystems = [];

		foreach ($systems as $System) {

			if ($Filter->matches($System)) {
				$sortKey = $System->getFirstYear() . $System->getName();
				$selectedSystems[$sortKey] = $System;
			}
		}

		// sort by date
		ksort($selectedSystems);

		$this->systems = $selectedSystems;

		return $this->systems;
	}

	public function __toString()
	{
		$LinkApi = new LinkApi();

		$Table = new HtmlElement('table');
		$Table->addClass('system');

		foreach ($this->systems as $System) {

			$Row = new HtmlElement('tr');
			$Row->addClass('used');
			$Table->addChildNode($Row);

			$Img = new HtmlElement('img');
			$Img->addAttribute('src', 'page/img/gems/' . $System->getGemImage());

			$Gem = new HtmlElement('td');
			$Gem->addClass('gem');
			$Gem->addChildNode($Img);
			$Row->addChildNode($Gem);

			$Link = new HtmlElement('a');
			$Link->addAttribute('href', $LinkApi->getLink('system', array('id' => $System->getId())));
			$Link->addChildText($System->getName());

			$Name = new HtmlElement('td');
			$Name->addClass('systemName');
			$Name->addChildNode($Link);
			$Row->addChildNode($Name);

			$Desc = new HtmlElement('td');
			$Desc->addClass('systemDescription');
			$Desc->addChildText($System->getFirstYear());
			$Desc->addChildText(', ');
			$Desc->addChildText(implode(', ', $System->getContributors()));
			$Row->addChildNode($Desc);

			$Row = new HtmlElement('tr');
			$Row->addClass('empty');
			$Table->addChildNode($Row);

			$TD = new HtmlElement('td');
			$Row->addChildNode($TD);

			$TD = new HtmlElement('td');
			$Row->addChildNode($TD);
		}

		return (string)$Table;
	}
}

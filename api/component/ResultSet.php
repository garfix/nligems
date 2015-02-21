<?php

namespace nligems\api\component;

use nligems\api\Features;
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
	private $filteredSystems = [];

	/** @var  Filter */
	private $Filter;

	/**
	 * @param NliSystemApi $NliSystemApi
	 * @param Filter $Filter
	 * @return NliSystem[]
	 */
	public function filterResults(NliSystemApi $NliSystemApi, Filter $Filter)
	{
		$this->Filter = $Filter;

		$systems = $NliSystemApi->getAllSystems();
		$selectedSystems = [];

		foreach ($systems as $System) {

			if ($Filter->matches($System)) {
				$selectedSystems[] = $System;
			}
		}

		$this->filteredSystems = $selectedSystems;

		return $this->filteredSystems;
	}

	public function __toString()
	{
		$LinkApi = new LinkApi();
		$NliSystemApi = new NliSystemApi();

		// sort all systems
		$allSystems = array();
		foreach ($NliSystemApi->getAllSystems() as $System) {
			$sortKey = $System->get(Features::FIRST_YEAR) . $System->getName();
			$allSystems[$sortKey] = $System;
		}
		ksort($allSystems);

		$Form = new HtmlElement('form');
		$Form->addAttribute('action', $LinkApi->getLink('compare'));
		$Form->addAttribute('method', 'get');

		$Table = new HtmlElement('table');
		$Table->addClass('system');

		$Submit = new HtmlElement('button');
		$Submit->addAttribute('type', 'submit');
		$Submit->addChildHtml('Compare &#8595;');
		$Submit->addClass('compare');

		$ButtonHead = new HtmlElement('div');
		$ButtonHead->addChildNode($Submit);
		$ButtonHead->addClass('buttonHead');
		$Form->addChildNode($ButtonHead);

		$filterFeatures = $this->Filter->getFeatures();

		/** @var NliSystem $System */
		foreach ($allSystems as $System) {

			$Row = new HtmlElement('tr');
			if (in_array($System, $this->filteredSystems)) {
				$Row->addClass('used');
			} else {
				$Row->addClass('unused');
			}
			$Table->addChildNode($Row);

			$Img = new HtmlElement('img', false);
			$Img->addAttribute('src', 'page/img/gems/' . $System->get(Features::GEM_IMAGE));

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
			$Desc->addChildText($System->get(Features::FIRST_YEAR));
			$Desc->addChildText(', ');
			$Desc->addChildText(implode(', ', $System->get(Features::CONTRIBUTORS)));
			$Row->addChildNode($Desc);

			$params = array_intersect_key($NliSystemApi->getFeaturesOfSystem($System), array_flip($filterFeatures));

			$Links = new HtmlElement('div');
			$Links->addClass('select');

			$Link = new HtmlElement('a');
			$Link->addAttribute('href', $LinkApi->getLink('filter', $params));
			$Link->addChildText('Select all of its features');
			$Links->addChildNode($Link);

			$Links->addChildHtml(" | ");

			$params = array_intersect_key($NliSystemApi->getUniqueFeaturesOfSystem($System), array_flip($filterFeatures));

			$Link = new HtmlElement('a');
			$Link->addAttribute('href', $LinkApi->getLink('filter', $params));
			$Link->addChildText('Select its unique features');
			$Links->addChildNode($Link);

			$Desc->addChildNode($Links);

			$Input = new HtmlElement('input', false);
			$Input->addAttribute('type', 'checkbox');
			$Input->addAttribute('name', 'system[]');
			$Input->addAttribute('value', $System->getId());

			$Check = new HtmlElement('td');
			$Check->addClass('select');
			$Check->addChildNode($Input);
			$Row->addChildNode($Check);


			$Row = new HtmlElement('tr');
			$Row->addClass('empty');
			$Table->addChildNode($Row);

			$TD = new HtmlElement('td');
			$Row->addChildNode($TD);

			$TD = new HtmlElement('td');
			$Row->addChildNode($TD);
		}

		$Form->addChildHtml($Table);

		return (string)$Form;
	}
}

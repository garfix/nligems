<?php

namespace nligems\api\component;

/**
 * @author Patrick van Bergen
 */
class FormElementCheckboxGroup extends HtmlElement
{
	/** @var  string */
	private $name;

	/** @var  array */
	private $options;

	public function __construct($name, array $options)
	{
		$this->name = $name;
		$this->options = $options;
	}

	/** @var array  */
	private $value = array();

	/**
	* @return array
	*/
	public function getValue()
	{
		return $this->value;
	}

	/**
	* @param array $value
	*/
	public function setValue($value)
	{
		$this->value = $value;
	}

	public function __toString()
	{
		$elements = array();

		foreach ($this->options as $key => $title) {
			$Element = new FormElementCheckbox();
			$Element->addAttribute('name', $this->name . '[' . $key . ']');
			if (in_array($key, $this->value)) {
				$Element->addAttribute('checked', 'checked');
			}
			$elements[] = (string)$Element;
			$elements[] = htmlspecialchars($title);
		}

		return implode($elements);
	}
}

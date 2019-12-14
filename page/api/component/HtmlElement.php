<?php

namespace nligems\page\api\component;

/**
 * @author Patrick van Bergen
 */
class HtmlElement
{
	/** @var  string */
	private $tagName;

	/** @var  bool */
	private $requiresClosingTag;

	/** @var array  */
	private $attributes = array();

	private $children = array();

	public function __construct($tagName, $requiresClosingTag = true)
	{
		$this->tagName = $tagName;
		$this->requiresClosingTag = $requiresClosingTag;
	}

	/**
	 * @param string $name
	 * @param string $value
	 */
	public function addAttribute($name, $value)
	{
		$this->attributes[$name] = $value;
	}

	/**
	 * @param string $class
	 */
	public function addClass($class)
	{
		if (isset($this->attributes['class'])) {
			$this->attributes['class'] .= ' ' . $class;
		} else {
			$this->attributes['class'] = $class;
		}
	}

	/**
	 * @param HtmlElement $Child
	 */
	public function addChildNode(HtmlElement $Child)
	{
		$this->children[] = array('type' => 'node', 'value' => $Child);
	}

	/**
	 * @param string $child
	 */
	public function addChildText($child)
	{
		$this->children[] = array('type' => 'text', 'value' => $child);
	}

	/**
	 * @param string $child
	 */
	public function addChildHtml($child)
	{
		$this->children[] = array('type' => 'html', 'value' => $child);
	}

	public function __toString()
	{
		$attributeHtml = "";

		foreach ($this->attributes as $name => $value) {
			$attributeHtml .= ($attributeHtml ? ' ' : '') . $name . "='" . htmlspecialchars($value) . "'";
		}

		$childrenHtml = "";

		foreach ($this->children as $childTuple) {
			if ($childTuple['type'] == 'node') {
				$childrenHtml .= $childTuple['value'];
			} elseif ($childTuple['type'] == 'html') {
				$childrenHtml .= $childTuple['value'];
			} else {
				$childrenHtml .= htmlspecialchars($childTuple['value']);
			}
		}

		if ($this->requiresClosingTag) {
			$html = "<{$this->tagName} {$attributeHtml}>" . $childrenHtml . "</{$this->tagName}>";
		} else {
			$html = "<{$this->tagName} {$attributeHtml} />";
		}

		return $html;
	}
}

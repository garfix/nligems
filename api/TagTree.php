<?php

namespace nligems\api;

/**
 * @author Patrick van Bergen
 */
class TagTree
{
	/**
	 * This structure is there to make any sense of all the features.
	 * It is used for both the front-end and the backend to group features.
	 *
	 * @return array
	 */
	public static function getTagTree()
	{
		return array(
			array(
				'name' => 'General',
				'sections' => array(
					array('name' => 'General', 'tag' => Features::TAG_GENERAL),
					array('name' => 'Code',	'tag' => Features::TAG_CODE),
					array('name' => 'System structure', 'tag' => Features::TAG_STRUCTURE),
				)
			),
			array(
				'name' => 'Input / Output',
				'sections' => array(
					array('name' => 'User Input', 'tag' => Features::TAG_DIALOG),
					array('name' => 'System Output', 'tag' => Features::TAG_ANSWER),
				)
			),
			array(
				'name' => 'Processes',
				'sections' => array(
					array('name' => 'Tokenization',	'tag' => Features::TAG_TOKENIZATION),
					array('name' => 'Parsing', 'tag' => Features::TAG_PARSING),
					array('name' => 'Semantic Analysis', 'tag' => Features::TAG_SEMANTIC_ANALYSIS),
					array('name' => 'Inference', 'tag' => Features::TAG_INFERENCE),
					array('name' => 'Conversion to knowledge base form', 'tag' => Features::TAG_CONVERSION_TO_KB),
					array('name' => 'Knowledge base execution', 'tag' => Features::TAG_EXECUTION),
					array('name' => 'Planning', 'tag' => Features::TAG_PLANNING),
					array('name' => 'Generation', 'tag' => Features::TAG_GENERATION),
					array('name' => 'Learning', 'tag' => Features::TAG_LEARNING),
				)
			),
			array(
				'name' => 'Temporary Data Structures',
				'sections' => array(
					array('name' => 'Semantic form', 'tag' => Features::TAG_SEMANTIC_FORM),
					array('name' => 'Knowledge base form', 'tag' => Features::TAG_KB_FORM),
				)
			),
			array(
				'name' => 'Models',
				'sections' => array(
					array('name' => 'Database / Knowledge Base', 'tag' => Features::TAG_KNOWLEDGE_BASE),
					array('name' => 'Goal model',	'tag' => Features::TAG_GOAL_MODEL),
					array('name' => 'Domain model',	'tag' => Features::TAG_DOMAIN_MODEL),
					array('name' => 'Discourse model', 'tag' => Features::TAG_DISCOURSE_MODEL),
					array('name' => 'Lexicon', 'tag' => Features::TAG_LEXICON),
					array('name' => 'Grammar', 'tag' => Features::TAG_GRAMMAR),
				)
			),
		);
	}
}

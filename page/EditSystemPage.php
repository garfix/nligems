<?php

namespace nligems\page;

use nligems\api\component\FieldSet;
use nligems\api\component\Form;
use nligems\api\component\FormElementCheckbox;
use nligems\api\component\FormElementCheckboxGroup;
use nligems\api\component\FormElementText;
use nligems\api\component\FormElementTextarea;
use nligems\api\component\Legend;
use nligems\api\component\SubmitButton;
use nligems\api\component\Table;
use nligems\api\NliSystem;
use nligems\api\NliSystemApi;
use nligems\api\page\BackEndPage;

/**
 * @author Patrick van Bergen
 */
class EditSystemPage extends BackEndPage
{
    /** @var  NliSystem */
    private $System;

    public function __construct(NliSystem $NliSystem)
   	{
        $this->System = $NliSystem;
   	}

    protected function getBody()
    {
        $SystemsApi = new NliSystemApi();

        $fields = array(
            array(
                'title' => 'General',
                'fields' => array(
                    NliSystem::NAME,
                    NliSystem::FIRST_YEAR,
                    NliSystem::LAST_YEAR,
                    NliSystem::CONTRIBUTORS,
                    NliSystem::INSTITUTIONS,
                    NliSystem::INFLUENCED_BY,
                    NliSystem::NATURAL_LANGUAGES,
                    NliSystem::SOURCE_CODE_URL,
                    NliSystem::KNOWLEDGE_BASE_TYPE,
                    NliSystem::KNOWLEDGE_BASE_DESCRIPTION,
                    NliSystem::ARTICLES,
                    NliSystem::BOOKS,
                    NliSystem::GEM_IMAGE,
                    NliSystem::NAME_DESCRIPTION,
                    NliSystem::LONG_DESCRIPTION,
                ),
            ),
            array(
                'title' => 'Code',
                'fields' => array(
                    NliSystem::PROGRAMMING_LANGUAGES,
                ),
            ),
            array(
                'title' => 'System structure',
                'fields' => array(
                    NliSystem::ANALYSIS,
                    NliSystem::SEMANTIC_GRAMMAR,
                    NliSystem::DIALOG,
                    NliSystem::NEW_WORDS,
                    NliSystem::MULTI_DB,
                    NliSystem::ACCEPT_UNGRAMMATICAL_SENTENCES,
                    NliSystem::META_SELF,
                    NliSystem::META_KB,
                ),
            ),
            array(
                'title' => 'Language constructs',
                'fields' => array_merge(
                    $SystemsApi->getLanguageConstructs(),
                    [NliSystem::SENTENCE_TYPES]
                ),
            ),
            array(
                'title' => 'Tokenization',
                'fields' => array(
                    NliSystem::MORPHOLOGICAL_ANALYSIS,
                    NliSystem::DICTIONARY_LOOKUP,
                    NliSystem::WORD_SEPARATION,
                    NliSystem::SPELLING_CORRECTION,
                    NliSystem::OPEN_ENDED_TOKEN_RECOGNITION,
                    NliSystem::PROPER_NAMES_FROM_KB,
                    NliSystem::PROPER_NAMES_BY_MATCHING,
                    NliSystem::QUOTED_STRING_RECOGNITION,
                ),
            ),
            array(
                'title' => 'Parsing',
                'fields' => array(
                    NliSystem::PARSE_HEADER,
                    NliSystem::GRAMMAR_TYPE,
                    NliSystem::PARSER_TYPE,
                ),
            ),
            array(
                'title' => 'Interpretation',
                'fields' => array(
                    NliSystem::INTERPRET_HEADER,
                    NliSystem::SEMANTIC_ATTACHMENT,
                    NliSystem::MODIFIER_ATTACHMENT,
                    NliSystem::CONJUNCTION_DISJUNCTION,
                    NliSystem::NOMINAL_COMPOUNDS,
                    NliSystem::SEMANTIC_COMPOSITION,
                    NliSystem::SEMANTIC_COMPOSITION_TYPE,
                    NliSystem::SEMANTIC_CONFLICT_DETECTION,
                    NliSystem::QUANTIFIER_SCOPING,
                    NliSystem::ANAPHORA_RESOLUTION,
                    NliSystem::PLAUSIBILITY_RESOLUTION,
                    NliSystem::UNIFORMIZATION_REWRITES,
                    NliSystem::COOPERATIVE_RESPONSES,
                ),
            ),
            array(
                'title' => 'Conversion to knowledge base',
                'fields' => array(
                    NliSystem::CONVERT_HEADER,
                    NliSystem::CONVERT_TYPE,
                    NliSystem::SYNTACTIC_REWRITE,
                    NliSystem::OPTIMIZE_QUERY,
                    NliSystem::RESTRUCTURE_INFORMATION,
                ),
            ),
            array(
                'title' => 'Knowledge base execution',
                'fields' => array(
                    NliSystem::EXECUTE_HEADER,
                    NliSystem::LOGICAL_REASONING,
                ),
            ),
            array(
                'title' => 'Answer generation',
                'fields' => array(
                    NliSystem::GENERATE_HEADER,
                    NliSystem::PARAPHRASE_QUERY,
                ),
            ),
            array(
                'title' => 'Syntactic form',
                'fields' => array(
                    NliSystem::SYNTACTIC_FORM_TYPE,
                ),
            ),
            array(
                'title' => 'Semantic form',
                'fields' => array(
                    NliSystem::SEMANTIC_FORM_TYPE,
                    NliSystem::SEMANTIC_FORM_DESC,
                    NliSystem::EVENT_BASED,
                    NliSystem::TEMPORAL,
                    NliSystem::PROPER_NOUN_CONSTANTS,
                    NliSystem::ONTOLOGY_USED,
                    NliSystem::STANDARD_ONTOLOGY,
                ),
            ),
            array(
                'title' => 'Knowledge base form',
                'fields' => array(
                    NliSystem::KNOWLEDGE_BASE_LANGUAGES,
                    NliSystem::KNOWLEDGE_BASE_AGGREGATION,
                ),
            ),
        );

        $Form = new Form();
        $Form->addAttribute('action', $_SERVER['REQUEST_URI']);
        $Form->addAttribute('method', 'POST');

        foreach ($fields as $group) {

            $Form->addChildNode($FieldSet = new FieldSet());
            $FieldSet->addChildNode(new Legend($group['title']));

            $FieldSet->addChildNode($Table = new Table(count($fields), 2));
            $Table->treatCellContentsAsHtml(true);


            foreach ($group['fields'] as $i => $field) {

                $Table->set($i, 0, $SystemsApi->getFeatureName($field));
                $Table->set($i, 1, $this->getFormElement($SystemsApi, $field));
            }
        }

        $Form->addChildNode(new SubmitButton('Update'));

        return (string)$Form;
    }

    private function getFormElement(NliSystemApi $SystemsApi, $field)
    {
        $type = $SystemsApi->getFeatureType($field);

        $value = $this->System->get($field);

        switch ($type) {
            case NliSystemApi::FEATURETYPE_BOOL:
                $Element = new FormElementCheckbox();
                $Element->addAttribute('name', $field);
                if ($value) {
                    $Element->addAttribute('checked', true);
                }
                break;
            case NliSystemApi::FEATURETYPE_TEXT_MULTIPLE:

                if ($possibleValues = $SystemsApi->getPossibleValues($field)) {
                    $Element = new FormElementCheckboxGroup($field, $possibleValues);
                    $Element->setValue($value);
                } else {
                    $Element = new FormElementTextarea();
                    $Element->addAttribute('name', $field);
                    $Element->addAttribute('cols', 100);
                    $value = implode("\n", $value);
                    $Element->addChildText($value);
                }
                break;
            case NliSystemApi::FEATURETYPE_TEXT_SINGLE:
                $Element = new FormElementText();
                $Element->addAttribute('name', $field);
                $Element->addAttribute('value', $value);
                break;
            default:
                trigger_error('Unknown type: ' . $type, E_USER_ERROR);
                $Element = null;
        }

        return $Element;
    }

    public function processPost($postValues)
    {
        $SystemsApi = new NliSystemApi();

        foreach ($postValues as $key => $value) {

            $type = $SystemsApi->getFeatureType($key);

             switch ($type) {
                 case NliSystemApi::FEATURETYPE_BOOL:
                     $inputValue = $value == 'on';
                     break;
                 case NliSystemApi::FEATURETYPE_TEXT_MULTIPLE:
                     if (is_array($value)) {
                         $inputValue = array_keys(array_filter($value, function($val){ return $val == 'on'; }));
                     } else {
                         $inputValue = array_filter(explode("\r\n", $value));
                     }
                     break;
                 case NliSystemApi::FEATURETYPE_TEXT_SINGLE:
                     $inputValue = $value;
                     break;
                 default:
                     trigger_error('Unknown type: ' . $type, E_USER_ERROR);
                     $inputValue = null;
            }

            $this->System->set($key, $inputValue);
        }

        $SystemsApi->saveSystem($this->System);
    }
}

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

        $features = array(
            array(
                'title' => 'General',
                'features' => array(
                    NliSystemApi::NAME,
                    NliSystemApi::FIRST_YEAR,
                    NliSystemApi::LAST_YEAR,
                    NliSystemApi::CONTRIBUTORS,
                    NliSystemApi::INSTITUTIONS,
                    NliSystemApi::INFLUENCED_BY,
                    NliSystemApi::NATURAL_LANGUAGES,
                    NliSystemApi::SOURCE_CODE_URL,
                    NliSystemApi::KNOWLEDGE_BASE_TYPE,
                    NliSystemApi::KNOWLEDGE_BASE_DESCRIPTION,
                    NliSystemApi::ARTICLES,
                    NliSystemApi::BOOKS,
                    NliSystemApi::GEM_IMAGE,
                    NliSystemApi::NAME_DESCRIPTION,
                    NliSystemApi::LONG_DESCRIPTION,
                ),
            ),
            array(
                'title' => 'Code',
                'features' => array(
                    NliSystemApi::PROGRAMMING_LANGUAGES,
                ),
            ),
            array(
                'title' => 'System structure',
                'features' => array(
                    NliSystemApi::ANALYSIS,
                    NliSystemApi::SEMANTIC_GRAMMAR,
                    NliSystemApi::DIALOG,
                    NliSystemApi::NEW_WORDS,
                    NliSystemApi::MULTI_DB,
                    NliSystemApi::ACCEPT_UNGRAMMATICAL_SENTENCES,
                    NliSystemApi::META_SELF,
                    NliSystemApi::META_KB,
                ),
            ),
            array(
                'title' => 'Language constructs',
                'features' => array_merge(
                    $SystemsApi->getLanguageConstructs(),
                    [NliSystemApi::SENTENCE_TYPES]
                ),
            ),
            array(
                'title' => 'Tokenization',
                'features' => array(
                    NliSystemApi::MORPHOLOGICAL_ANALYSIS,
                    NliSystemApi::DICTIONARY_LOOKUP,
                    NliSystemApi::WORD_SEPARATION,
                    NliSystemApi::SPELLING_CORRECTION,
                    NliSystemApi::OPEN_ENDED_TOKEN_RECOGNITION,
                    NliSystemApi::PROPER_NAMES_FROM_KB,
                    NliSystemApi::PROPER_NAMES_BY_MATCHING,
                    NliSystemApi::QUOTED_STRING_RECOGNITION,
                ),
            ),
            array(
                'title' => 'Parsing',
                'features' => array(
                    NliSystemApi::PARSE_HEADER,
                    NliSystemApi::GRAMMAR_TYPE,
                    NliSystemApi::PARSER_TYPE,
                ),
            ),
            array(
                'title' => 'Interpretation',
                'features' => array(
                    NliSystemApi::INTERPRET_HEADER,
                    NliSystemApi::SEMANTIC_ATTACHMENT,
                    NliSystemApi::MODIFIER_ATTACHMENT,
                    NliSystemApi::CONJUNCTION_DISJUNCTION,
                    NliSystemApi::NOMINAL_COMPOUNDS,
                    NliSystemApi::SEMANTIC_COMPOSITION,
                    NliSystemApi::SEMANTIC_COMPOSITION_TYPE,
                    NliSystemApi::SEMANTIC_CONFLICT_DETECTION,
                    NliSystemApi::QUANTIFIER_SCOPING,
                    NliSystemApi::ANAPHORA_RESOLUTION,
                    NliSystemApi::PLAUSIBILITY_RESOLUTION,
                    NliSystemApi::UNIFORMIZATION_REWRITES,
                    NliSystemApi::COOPERATIVE_RESPONSES,
                ),
            ),
            array(
                'title' => 'Conversion to knowledge base',
                'features' => array(
                    NliSystemApi::CONVERT_HEADER,
                    NliSystemApi::CONVERT_TYPE,
                    NliSystemApi::SYNTACTIC_REWRITE,
                    NliSystemApi::OPTIMIZE_QUERY,
                    NliSystemApi::RESTRUCTURE_INFORMATION,
                ),
            ),
            array(
                'title' => 'Knowledge base execution',
                'features' => array(
                    NliSystemApi::EXECUTE_HEADER,
                    NliSystemApi::LOGICAL_REASONING,
                ),
            ),
            array(
                'title' => 'Answer generation',
                'features' => array(
                    NliSystemApi::GENERATE_HEADER,
                    NliSystemApi::PARAPHRASE_QUERY,
                ),
            ),
            array(
                'title' => 'Syntactic form',
                'features' => array(
                    NliSystemApi::SYNTACTIC_FORM_TYPE,
                ),
            ),
            array(
                'title' => 'Semantic form',
                'features' => array(
                    NliSystemApi::SEMANTIC_FORM_TYPE,
                    NliSystemApi::SEMANTIC_FORM_DESC,
                    NliSystemApi::EVENT_BASED,
                    NliSystemApi::TEMPORAL,
                    NliSystemApi::PROPER_NOUN_CONSTANTS,
                    NliSystemApi::ONTOLOGY_USED,
                    NliSystemApi::STANDARD_ONTOLOGY,
                ),
            ),
            array(
                'title' => 'Knowledge base form',
                'features' => array(
                    NliSystemApi::KNOWLEDGE_BASE_LANGUAGES,
                    NliSystemApi::KNOWLEDGE_BASE_AGGREGATION,
                ),
            ),
            array(
                'title' => 'Lexicon',
                'features' => array(
                )
            )
        );

        $Form = new Form();
        $Form->addAttribute('action', $_SERVER['REQUEST_URI']);
        $Form->addAttribute('method', 'POST');

        $featuresUsed = array();

        foreach ($features as $group) {

            $Form->addChildNode($FieldSet = new FieldSet());
            $FieldSet->addChildNode(new Legend($group['title']));

            $FieldSet->addChildNode($Table = new Table(count($features), 2));
            $Table->treatCellContentsAsHtml(true);


            foreach ($group['features'] as $i => $feature) {

                $Table->set($i, 0, $SystemsApi->getFeatureName($feature));
                $Table->set($i, 1, $this->getFormElement($SystemsApi, $feature));

                $featuresUsed[] = $feature;
            }
        }

        // quick check if all features have been used
        $unusedFeatures = array_diff($SystemsApi->getFeatures(), $featuresUsed);
        if (!empty($unusedFeatures)) {
            die('These features are not used: '. implode(', ', $unusedFeatures));
        }

        $Form->addChildNode(new SubmitButton('Update'));

        return (string)$Form;
    }

    private function getFormElement(NliSystemApi $SystemsApi, $feature)
    {
        $type = $SystemsApi->getFeatureType($feature);

        $value = $this->System->get($feature);

        switch ($type) {
            case NliSystemApi::FEATURETYPE_BOOL:
                $Element = new FormElementCheckbox();
                $Element->addAttribute('name', $feature);
                if ($value) {
                    $Element->addAttribute('checked', true);
                }
                break;
            case NliSystemApi::FEATURETYPE_TEXT_MULTIPLE:

                if ($possibleValues = $SystemsApi->getPossibleValues($feature)) {
                    $Element = new FormElementCheckboxGroup($feature, $possibleValues);
                    $Element->setValue($value);
                } else {
                    $Element = new FormElementTextarea();
                    $Element->addAttribute('name', $feature);
                    $Element->addAttribute('cols', 100);
                    $value = implode("\n", $value);
                    $Element->addChildText($value);
                }
                break;
            case NliSystemApi::FEATURETYPE_TEXT_SINGLE:
                $Element = new FormElementText();
                $Element->addAttribute('name', $feature);
                $Element->addAttribute('value', $value);
                break;
            case NliSystemApi::FEATURETYPE_TEXT_SINGLE_LONG:
                $Element = new FormElementTextarea();
                $Element->addAttribute('name', $feature);
                $Element->addAttribute('cols', 100);
                $Element->addChildText($value);
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
                 case NliSystemApi::FEATURETYPE_TEXT_SINGLE_LONG:
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

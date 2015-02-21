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
use nligems\api\Features;
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
                    Features::NAME,
                    Features::FIRST_YEAR,
                    Features::LAST_YEAR,
                    Features::CONTRIBUTORS,
                    Features::INSTITUTIONS,
                    Features::INFLUENCED_BY,
                    Features::NATURAL_LANGUAGES,
                    Features::SOURCE_CODE_URL,
                    Features::KNOWLEDGE_BASE_TYPE,
                    Features::KNOWLEDGE_BASE_DESCRIPTION,
                    Features::ARTICLES,
                    Features::BOOKS,
                    Features::GEM_IMAGE,
                    Features::NAME_DESCRIPTION,
                    Features::LONG_DESCRIPTION,
                ),
            ),
            array(
                'title' => 'Code',
                'features' => array(
                    Features::PROGRAMMING_LANGUAGES,
                ),
            ),
            array(
                'title' => 'System structure',
                'features' => array(
                    Features::ANALYSIS,
                    Features::SEMANTIC_GRAMMAR,
                    Features::DIALOG,
                    Features::NEW_WORDS,
                    Features::MULTI_DB,
                    Features::ACCEPT_UNGRAMMATICAL_SENTENCES,
                    Features::META_SELF,
                    Features::META_KB,
                ),
            ),
            array(
                'title' => 'Language constructs',
                'features' => array_merge(
                    $SystemsApi->getLanguageConstructs(),
                    [Features::SENTENCE_TYPES]
                ),
            ),
            array(
                'title' => 'Tokenization',
                'features' => array(
                    Features::MORPHOLOGICAL_ANALYSIS,
                    Features::DICTIONARY_LOOKUP,
                    Features::WORD_SEPARATION,
                    Features::SPELLING_CORRECTION,
                    Features::OPEN_ENDED_TOKEN_RECOGNITION,
                    Features::PROPER_NAMES_FROM_KB,
                    Features::PROPER_NAMES_BY_MATCHING,
                    Features::QUOTED_STRING_RECOGNITION,
                ),
            ),
            array(
                'title' => 'Parsing',
                'features' => array(
                    Features::PARSE_HEADER,
                    Features::GRAMMAR_TYPE,
                    Features::PARSER_TYPE,
                ),
            ),
            array(
                'title' => 'Interpretation',
                'features' => array(
                    Features::INTERPRET_HEADER,
                    Features::SEMANTIC_ATTACHMENT,
                    Features::MODIFIER_ATTACHMENT,
                    Features::CONJUNCTION_DISJUNCTION,
                    Features::NOMINAL_COMPOUNDS,
                    Features::SEMANTIC_COMPOSITION,
                    Features::SEMANTIC_COMPOSITION_TYPE,
                    Features::SEMANTIC_CONFLICT_DETECTION,
                    Features::QUANTIFIER_SCOPING,
                    Features::ANAPHORA_RESOLUTION,
                    Features::PLAUSIBILITY_RESOLUTION,
                    Features::UNIFORMIZATION_REWRITES,
                    Features::COOPERATIVE_RESPONSES,
                ),
            ),
            array(
                'title' => 'Conversion to knowledge base',
                'features' => array(
                    Features::CONVERT_HEADER,
                    Features::CONVERT_TYPE,
                    Features::SYNTACTIC_REWRITE,
                    Features::OPTIMIZE_QUERY,
                    Features::RESTRUCTURE_INFORMATION,
                ),
            ),
            array(
                'title' => 'Knowledge base execution',
                'features' => array(
                    Features::EXECUTE_HEADER,
                    Features::LOGICAL_REASONING,
                ),
            ),
            array(
                'title' => 'Answer generation',
                'features' => array(
                    Features::GENERATE_HEADER,
                    Features::PARAPHRASE_QUERY,
                ),
            ),
            array(
                'title' => 'Syntactic form',
                'features' => array(
                    Features::SYNTACTIC_FORM_TYPE,
                ),
            ),
            array(
                'title' => 'Semantic form',
                'features' => array(
                    Features::SEMANTIC_FORM_TYPE,
                    Features::SEMANTIC_FORM_DESC,
                    Features::EVENT_BASED,
                    Features::TEMPORAL,
                    Features::PROPER_NOUN_CONSTANTS,
                    Features::ONTOLOGY_USED,
                    Features::STANDARD_ONTOLOGY,
                ),
            ),
            array(
                'title' => 'Knowledge base form',
                'features' => array(
                    Features::KNOWLEDGE_BASE_LANGUAGES,
                    Features::KNOWLEDGE_BASE_AGGREGATION,
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
            case Features::FEATURETYPE_BOOL:
                $Element = new FormElementCheckbox();
                $Element->addAttribute('name', $feature);
                if ($value) {
                    $Element->addAttribute('checked', true);
                }
                break;
            case Features::FEATURETYPE_TEXT_MULTIPLE:
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
            case Features::FEATURETYPE_TEXT_SINGLE:
                $Element = new FormElementText();
                $Element->addAttribute('name', $feature);
                $Element->addAttribute('value', $value);
                break;
            case Features::FEATURETYPE_TEXT_SINGLE_LONG:
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
                 case Features::FEATURETYPE_BOOL:
                     $inputValue = $value == 'on';
                     break;
                 case Features::FEATURETYPE_TEXT_MULTIPLE:
                     if (is_array($value)) {
                         $inputValue = array_keys(array_filter($value, function($val){ return $val == 'on'; }));
                     } else {
                         $inputValue = array_filter(explode("\r\n", $value));
                     }
                     break;
                 case Features::FEATURETYPE_TEXT_SINGLE:
                 case Features::FEATURETYPE_TEXT_SINGLE_LONG:
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

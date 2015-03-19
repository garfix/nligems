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
use nligems\api\TagTree;

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

        $this->addStyleSheet('backend');
   	}

    protected function getBody()
    {
        $SystemsApi = new NliSystemApi();

        $Form = new Form();
        $Form->addAttribute('action', $_SERVER['REQUEST_URI']);
        $Form->addAttribute('method', 'POST');

        $featuresUsed = array();

        foreach (TagTree::getTagTree() as $sectionGroupData) {
            foreach ($sectionGroupData['sections'] as $sectionData) {

                $Form->addChildNode($FieldSet = new FieldSet());
                $FieldSet->addChildNode(new Legend($sectionData['name']));

                $features = $SystemsApi->getFeaturesByTag($sectionData['tag']);

                $FieldSet->addChildNode($Table = new Table(count($features), 2));
                $Table->treatCellContentsAsHtml(true);

                foreach ($features as $i => $feature) {

                    $Table->set($i, 0, $SystemsApi->getFeatureName($feature));
                    $Table->set($i, 1, $this->getFormElement($SystemsApi, $feature));

                    $featuresUsed[] = $feature;
                }
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
                $Element = new FormElementTextarea();
                $Element->addAttribute('name', $feature);
                $Element->addAttribute('cols', 100);
                $value = implode("\n", $value);
                $Element->addChildText($value);
                break;
            case Features::FEATURETYPE_MULTIPLE_CHOICE:
                $possibleValues = $SystemsApi->getPossibleValues($feature);
                $Element = new FormElementCheckboxGroup($feature, $possibleValues);
                $Element->setValue($value);
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
                     $inputValue = array_filter(explode("\r\n", $value));
                     break;
                 case Features::FEATURETYPE_MULTIPLE_CHOICE:
                     $inputValue = array_keys(array_filter($value, function($val){ return $val == 'on'; }));
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

<?php

namespace nligems\api\component;

use nligems\api\NliSystem;
use nligems\api\NliSystemApi;

/**
 * @author Patrick van Bergen
 */
class CharacteristicsList
{
    /** @var  NliSystem */
    private $System;

    public function __construct(NliSystem $System)
    {
        $this->System = $System;
    }

    public function __toString()
    {
        $NliSystemApi = new NliSystemApi();

        $features = array(
            NliSystem::PROGRAMMING_LANGUAGES,
            NliSystem::NATURAL_LANGUAGES,
            NliSystem::ANALYSIS,
            NliSystem::INFLUENCED_BY,
        );

        $DL = new DefinitionList();
        $DL->addClass('characteristics');
        foreach ($features as $feature) {
            $name = $NliSystemApi->getFeatureName($feature);
            $value = $this->System->get($feature);
            if ($value) {
                $serialized = is_array($value) ? implode(", ", $value) : $value;

                if ($feature == NliSystem::ANALYSIS) {
                    if ($this->System->get(NliSystem::SEMANTIC_GRAMMAR)) {
                        $serialized .= ' (semantic grammar)';
                    }
                }

                $DL->addItem($name, $serialized);
            }
        }

        $DL->addItem('Language constructs', implode(', ', $this->System->getLanguageConstructNames()));

        return (string)$DL;
    }
}

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

        $fields = array(
            NliSystem::PROGRAMMING_LANGUAGES,
            NliSystem::NATURAL_LANGUAGES,
            NliSystem::INFLUENCED_BY,
        );

        $DL = new DefinitionList();
        $DL->addClass('characteristics');
        foreach ($fields as $field) {
            $name = $NliSystemApi->getFeatureName($field);
            $value = $this->System->get($field);
            if ($value) {
                $serialized = is_array($value) ? implode(", ", $value) : $value;
                $DL->addItem($name, $serialized);
            }
        }

        return (string)$DL;
    }
}

<?php

namespace JaxName;

class HumanNameProcessor
{
    protected $titles = [
        'mr'        => 'Mr.',
        'ms'        => 'Ms.',
        'mrs'       => 'Mrs.',
        'miss'      => 'Miss.',
        'master'    => 'Master.',
        'dr'        => 'DR.'
    ];

    public function make(string $string): ?HumanName
    {
        $name = new HumanName($string);
        $elements = explode(' ', str_replace('.', '', $string));

        if (!count($elements)) {
            return null;
        }

        $lowerFirst = strtolower($elements[0]);

        if (isset($this->titles[$lowerFirst])) {
            $name->setTitle($this->titles[$lowerFirst]);
            unset($elements[0]);
            reset($elements);
        }

        if (count($elements) !== 1) {
            $name->setFirstName(array_splice($elements, 0, 1)[0]);
        }

        $name->setLastName(implode(' ', $elements));

        return $name;
    }
}
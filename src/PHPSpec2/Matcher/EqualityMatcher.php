<?php

namespace PHPSpec2\Matcher;

use PHPSpec2\Exception\Example\StringsNotEqualException;
use PHPSpec2\Exception\Example\ObjectsNotEqualException;

class EqualityMatcher extends BasicMatcher
{
    public function supports($name, $subject, array $arguments)
    {
        return in_array($name, array('be', 'equal', 'be_equal', 'be_equal_to'));
    }

    protected function matches($subject, array $arguments)
    {
        return $subject == $arguments[0];
    }

    protected function getFailureException($name, $subject, array $arguments)
    {
        if (is_object($subject)) {
            return new ObjectsNotEqualException(
                'Objects are not equal, but should be',
                $subject, $arguments[0]
            );
        } else {
            return new StringsNotEqualException(
                'Strings are not equal, but should be',
                $subject, $arguments[0]
            );
        }
    }

    protected function getNegativeFailureException($name, $subject, array $arguments)
    {
    }
}

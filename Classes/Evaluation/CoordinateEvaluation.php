<?php

namespace Comsolit\EasyGooglemap\Evaluation;

class CoordinateEvaluation
{
    /**
     * Server-Side evaluation on longitude and latitude.
     * @param string $value The field value to be evaluated
     * @return string $value evaluated field value
     */
    function evaluateFieldValue($value)
    {
        $theDec = 0;
        for ($a = strlen($value); $a > 0; $a--) {
            if (substr($value, $a - 1, 1) == '.' || substr($value, $a - 1, 1) == ',') {
                $theDec = substr($value, $a);
                $value = substr($value, 0, $a - 1);
                break;
            }
        }

        $theDec = preg_replace('[^0-9]', '', $theDec) . '0000000';
        $value = str_replace(' ', '', $value) . '.' . substr($theDec, 0, 7);

        return $value;
    }
}

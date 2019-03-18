<?php

namespace Comsolit\EasyGooglemap\Evaluation;

class CoordinateEvaluation
{
    /**
     * Server-Side evaluation on longitude and latitude.
     * @param string $value The field value to be evaluated
     * @param string $is_in The "is_in" value of the field configuration from TCA
     * @param bool $set Boolean defining if the value is written to the database or not.
     * @return string $value evaluated field value
     */
    function evaluateFieldValue($value, $is_in, &$set)
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

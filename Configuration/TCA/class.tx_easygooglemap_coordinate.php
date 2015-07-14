<?php

class tx_easygooglemap_coordinate
{
	function evaluateFieldValue($value, $is_in, &$set)
	{
		$theDec = 0;
		for($a = strlen ( $value ); $a > 0; $a --) {
			if (substr ( $value, $a - 1, 1 ) == '.' || substr ( $value, $a - 1, 1 ) == ',') {
				$theDec = substr ( $value, $a );
				$value = substr ( $value, 0, $a - 1 );
				break;
			}
		}
		
		$theDec = preg_replace ( '[^0-9]', '', $theDec ) . '0000000';
		$value = intval ( str_replace ( ' ', '', $value ) ) . '.' . substr ( $theDec, 0, 7 );
		
		return $value;
	}
}

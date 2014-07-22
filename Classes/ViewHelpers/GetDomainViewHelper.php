<?php

class Tx_EasyGooglemap_ViewHelpers_GetDomainViewHelper extends \TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper {
	
	
	/**
     * @param $link string Each `allowed` param need to have its line in PHPDoc
     * @return string
     */
	
  public function render($link) {
  	if (strpos($link,'http') === 0) {
  		return $link;
  	}
  	elseif (strpos($link,'https') === 0) {
  		return $link;
  	}
  	else {
  		return 'http://' . $link;
  	}
  }
}
?>
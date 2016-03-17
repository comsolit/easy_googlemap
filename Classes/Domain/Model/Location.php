<?php
namespace Comsolit\EasyGooglemap\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) Andres Lobacovs <info@comsolit.com>, comsolit AG
 *  
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 * @package easy_googlemap
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *         
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {
	
	/**
	 * Title
	 *
	 * @var \string @validate NotEmpty
	 */
	protected $title;

	/**
	 * City
	 *
	 * @var \string
	 */
	protected $infobox;
	
	/**
	 * City
	 *
	 * @var \string
	 */
	protected $city;
	
	/**
	 * Country
	 *
	 * @var \string
	 */
	protected $country;
	
	/**
	 * Postal Code
	 *
	 * @var \string
	 */
	protected $postalCode;
	
	/**
	 * Street and Number
	 *
	 * @var \string
	 */
	protected $street;

	/**
	 * AnchorX
	 *
	 * @var \integer
	 */
	protected $anchorx;

	/**
	 * AnchorY
	 *
	 * @var \integer
	 */
	protected $anchory;
	
	/**
	 * Longitude
	 *
	 * @var \float @validate NotEmpty
	 */
	protected $longitude;
	
	/**
	 * latitude
	 *
	 * @var \float @validate NotEmpty
	 */
	protected $latitude;
	
	/**
	 * Icon
	 *
	 * @var \string @validate NotEmpty
	 */
	protected $icon;
	
	/**
	 * Link
	 *
	 * @var \string @validate NotEmpty
	 */
	protected $link;
	
	/**
	 * Returns the title
	 *
	 * @return \string $title
	 */
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * Sets the title
	 *
	 * @param \string $title        	
	 * @return void
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * Returns the infobox
	 *
	 * @return \string $infobox
	 */
	public function getInfobox() {
		return $this->infobox;
	}

	/**
	 * Sets the infobox
	 *
	 * @param \string $infobox
	 * @return void
	 */
	public function setInfobox($infobox) {
		$this->infobox = $infobox;
	}
	
	/**
	 * Returns the city
	 *
	 * @return \string $city
	 */
	public function getCity() {
		return $this->city;
	}
	
	/**
	 * Sets the city
	 *
	 * @param \string $city        	
	 * @return void
	 */
	public function setCity($city) {
		$this->city = $city;
		return $this;
	}
	
	/**
	 * Returns the country
	 *
	 * @return \string $country
	 */
	public function getCountry() {
		return $this->country;
	}
	/**
	 * Sets the country
	 *
	 * @param \string $country        	
	 * @return void
	 */
	public function setCountry($country) {
		$this->country = $country;
		return $this;
	}
	
	/**
	 * Returns the postalCode
	 *
	 * @return \string $postal_code
	 */
	public function getPostalCode() {
		return $this->postalCode;
	}
	/**
	 * Sets the postalCode
	 *
	 * @param \string $postalCode
	 * @return void
	 */
	public function setPostalCode($postalCode) {
		$this->postalCode = $postalCode;
		return $this;
	}
	
	/**
	 * Returns the street
	 *
	 * @return \string $street
	 */
	public function getStreet() {
		return $this->street;
	}
	
	/**
	 * Sets the street
	 *
	 * @param \string $street        	
	 * @return void
	 */
	public function setStreet($street) {
		$this->street = $street;
		return $this;
	}
	
	/**
	 * Returns the longitude
	 *
	 * @return \float $longitude
	 */
	public function getLongitude() {
		return $this->longitude;
	}
	
	/**
	 * Sets the longitude
	 *
	 * @param \float $longitude        	
	 * @return void
	 */
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}
	
	/**
	 * Returns the latitude
	 *
	 * @return \float $latitude
	 */
	public function getLatitude() {
		return $this->latitude;
	}
	
	/**
	 * Sets the latitude
	 *
	 * @param \float $latitude        	
	 * @return void
	 */
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}

	/**
	 * Returns the latitude
	 *
	 * @return \integer $anchorx
	 */
	public function getAnchorx() {
		return $this->anchorx;
	}

	/**
	 * Sets the anchorx
	 *
	 * @param \integer $anchorx
	 * @return void
	 */
	public function setAnchorx($anchorx) {
		$this->anchorx = $anchorx;
	}

	/**
	 * Returns the latitude
	 *
	 * @return \integer $anchory
	 */
	public function getAnchory() {
		return $this->anchory;
	}

	/**
	 * Sets the anchory
	 *
	 * @param \integer $anchory
	 * @return void
	 */
	public function setAnchory($anchory) {
		$this->anchory = $anchory;
	}
	
	/**
	 * Returns the icon
	 *
	 * @return \string $icon
	 */
	/* */
	public function getIcon() {
		return $this->icon;
	}
	
	/**
	 * Sets the icon
	 *
	 * @param \string $icon        	
	 * @return void
	 */
	public function setIcon($icon) {
		$this->icon = $icon;
	}
	
	/**
	 * Returns the link
	 *
	 * @return \string $link
	 */
	public function getLink() {
		return $this->link;
	}
	
	/**
	 * Sets the link
	 *
	 * @param \string $link        	
	 * @return void
	 */
	public function setLink($link) {
		$this->link = $link;
	}
}
?>
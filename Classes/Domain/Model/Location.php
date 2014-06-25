<?php
namespace TYPO3\EasyGooglemap\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Andres Lobacovs <info@comsolit.ch>, comsolit AG
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
 *
 * @package easy_googlemap
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Location extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Longitude
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $longitude;

	/**
	 * latitude
	 *
	 * @var \float
	 * @validate NotEmpty
	 */
	protected $latitude;

	/**
	 * Title
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $title;

	/**
	 * Icon
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $icon;

	/**
	 * Link
	 *
	 * @var \string
	 * @validate NotEmpty
	 */
	protected $link;

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
	 * Returns the icon
	 *
	 * @return \string $icon
	 */
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
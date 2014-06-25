<?php

namespace TYPO3\EasyGooglemap\Tests;
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\EasyGooglemap\Domain\Model\Location.
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @package TYPO3
 * @subpackage EasyGoogleMap
 *
 * @author Andres Lobacovs <info@comsolit.ch>
 */
class LocationTest extends \TYPO3\CMS\Extbase\Tests\Unit\BaseTestCase {
	/**
	 * @var \TYPO3\EasyGooglemap\Domain\Model\Location
	 */
	protected $fixture;

	public function setUp() {
		$this->fixture = new \TYPO3\EasyGooglemap\Domain\Model\Location();
	}

	public function tearDown() {
		unset($this->fixture);
	}

	/**
	 * @test
	 */
	public function getLongitudeReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getLongitude()
		);
	}

	/**
	 * @test
	 */
	public function setLongitudeForFloatSetsLongitude() { 
		$this->fixture->setLongitude(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getLongitude()
		);
	}
	
	/**
	 * @test
	 */
	public function getLatitudeReturnsInitialValueForFloat() { 
		$this->assertSame(
			0.0,
			$this->fixture->getLatitude()
		);
	}

	/**
	 * @test
	 */
	public function setLatitudeForFloatSetsLatitude() { 
		$this->fixture->setLatitude(3.14159265);

		$this->assertSame(
			3.14159265,
			$this->fixture->getLatitude()
		);
	}
	
	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle() { 
		$this->fixture->setTitle('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getTitle()
		);
	}
	
	/**
	 * @test
	 */
	public function getIconReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setIconForStringSetsIcon() { 
		$this->fixture->setIcon('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getIcon()
		);
	}
	
	/**
	 * @test
	 */
	public function getLinkReturnsInitialValueForString() { }

	/**
	 * @test
	 */
	public function setLinkForStringSetsLink() { 
		$this->fixture->setLink('Conceived at T3CON10');

		$this->assertSame(
			'Conceived at T3CON10',
			$this->fixture->getLink()
		);
	}
	
}
?>
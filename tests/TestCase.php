<?php

namespace Billwerk\Sdk\Test;

class TestCase extends \PHPUnit\Framework\TestCase{
	use HelperTrait;
	
	protected function setUp(): void {
		parent::setUp();
		
		$this->setUpConfig();
	}
}

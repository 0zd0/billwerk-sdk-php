<?php

namespace Billwerk\Sdk\Test;

use Billwerk\Sdk\ClientFactory;

final class ClientFactoryTest extends TestCase {
	public function testInitial() {
		$this::assertInstanceOf(ClientFactory::class, $this->clientMock);
	}
}

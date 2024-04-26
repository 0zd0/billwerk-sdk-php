<?php

namespace Billwerk\Sdk\Service;

use Billwerk\Sdk\BillwerkRequest;

abstract class AbstractService {
	protected BillwerkRequest $request;
	
	public function __construct(
		BillwerkRequest $request
	) {
		$this->request = $request;
	}
}

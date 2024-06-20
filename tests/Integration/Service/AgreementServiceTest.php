<?php

namespace Billwerk\Sdk\Test\Integration\Service;

use Billwerk\Sdk\Model\Account\WebhookSettingsUpdateModel;
use Billwerk\Sdk\Test\TestCase;
use Spatie\Snapshots\MatchesSnapshots;

class AgreementServiceTest extends TestCase
{
    use MatchesSnapshots;

    public function testGetAllAgreements()
    {
        $agreements = $this->sdk->agreement()->all();

        $this->assertMatchesJsonSnapshot(json_encode(array_map(fn($item) => $item->toArray(), $agreements)));
    }
}

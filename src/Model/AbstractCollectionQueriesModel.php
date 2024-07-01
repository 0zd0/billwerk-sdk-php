<?php

namespace Billwerk\Sdk\Model;

use DateTime;
use Exception;

abstract class AbstractCollectionQueriesModel extends AbstractModel
{
    /**
     * Optional range defining the date and time attribute used to limit the query and also
     * defines the sorting. The sorting is always descending. Each resource offers different
     * range attributes. Each resource have a default range if non is defined
     */
    public const RANGES = [];

    /**
     * Optional range defining the date and time attribute used to limit the query and also defines the sorting.
     * The sorting is always descending. Each resource offers different range attributes. Each resource have a
     * default range if non is defined
     *
     * @var string|null $range
     */
    protected ?string $range = null;

    /**
     * Time range from (inclusive). Local date and time (according to account timezone) on the form
     * yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS.
     * Default from if no interval is given depends on the query. If the query limits on relation
     * e.g. customer and/or subscription, the default from will be epoch 1970-01-01, otherwise one month before to
     *
     * @var DateTime|null $from
     */
    protected ?DateTime $from = null;

    /**
     * Time range to (exclusive). Local date and time (according to account timezone) on the form
     * yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS. Defaults to now
     *
     * @var DateTime|null $to
     */
    protected ?DateTime $to = null;

    /**
     * Limit from to and interval back in time. E.g. one week. Will take precedence over from.
     * Defined in ISO 8601 duration. See https://en.wikipedia.org/wiki/ISO_8601#Durations
     *
     * @var string|null $interval
     */
    protected ?string $interval = null;

    /**
     * Page size between 10 and 100 (default 20)
     *
     * @var int|null $size
     */
    protected ?int $size = null;

    /**
     * Used to get the next page if query results in multiple pages. Will be returned in response for
     * current page. The above parameters must be the same in all subsequent page requests
     *
     * @var string|null $nextPageToken
     */
    protected ?string $nextPageToken = null;

    /**
     * Time range to (exclusive). Local date and time (according to account timezone) on the form
     *  yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS. Defaults to now
     *
     * @return DateTime|null
     */
    public function getTo(): ?DateTime
    {
        return $this->to;
    }

    /**
     * Limit from to and interval back in time. E.g. one week. Will take precedence over from.
     *  Defined in ISO 8601 duration. See https://en.wikipedia.org/wiki/ISO_8601#Durations
     *
     * @return string|null
     */
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * Page size between 10 and 100 (default 20)
     *
     * @return int|null
     */
    public function getSize(): ?int
    {
        return $this->size;
    }

    /**
     * Optional range defining the date and time attribute used to limit the query and also defines the sorting.
     *  The sorting is always descending. Each resource offers different range attributes. Each resource have a
     *  default range if non is defined
     *
     * @return string|null
     */
    public function getRange(): ?string
    {
        return $this->range;
    }

    /**
     * Used to get the next page if query results in multiple pages. Will be returned in response for
     *  current page. The above parameters must be the same in all subsequent page requests
     *
     * @return string|null
     */
    public function getNextPageToken(): ?string
    {
        return $this->nextPageToken;
    }

    /**
     * Time range from (inclusive). Local date and time (according to account timezone) on the form
     *  yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS.
     *  Default from if no interval is given depends on the query. If the query limits on relation
     *  e.g. customer and/or subscription, the default from will be epoch 1970-01-01, otherwise one month before to
     *
     * @return DateTime|null
     */
    public function getFrom(): ?DateTime
    {
        return $this->from;
    }

    /**
     * Page size between 10 and 100 (default 20)
     *
     * @param int|null $size
     *
     * @return self
     */
    public function setSize(?int $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Optional range defining the date and time attribute used to limit the query and also defines the sorting.
     *  The sorting is always descending. Each resource offers different range attributes. Each resource have a
     *  default range if non is defined
     *
     * @param string|null $range
     *
     * @return self
     */
    public function setRange(?string $range): self
    {
        $this->range = $range;

        return $this;
    }

    /**
     * Used to get the next page if query results in multiple pages. Will be returned in response for
     *  current page. The above parameters must be the same in all subsequent page requests
     *
     * @param string|null $nextPageToken
     *
     * @return self
     */
    public function setNextPageToken(?string $nextPageToken): self
    {
        $this->nextPageToken = $nextPageToken;

        return $this;
    }

    /**
     * Time range from (inclusive). Local date and time (according to account timezone) on the form
     *  yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS.
     *  Default from if no interval is given depends on the query. If the query limits on relation
     *  e.g. customer and/or subscription, the default from will be epoch 1970-01-01, otherwise one month before to
     *
     * @param DateTime|null $from
     *
     * @return self
     */
    public function setFrom(?DateTime $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Limit from to and interval back in time. E.g. one week. Will take precedence over from.
     *  Defined in ISO 8601 duration. See https://en.wikipedia.org/wiki/ISO_8601#Durations
     *
     * @param string|null $interval
     *
     * @return self
     */
    public function setInterval(?string $interval): self
    {
        $this->interval = $interval;

        return $this;
    }

    /**
     * Time range to (exclusive). Local date and time (according to account timezone) on the form
     *  yyyy-MM-dd, yyyyMMdd, yyyy-MM-ddTHH:mm, yyyy-MM-ddTHH:mm:ss or yyyy-MM-ddTHH:mm:ss.SSS. Defaults to now
     *
     * @param DateTime|null $to
     *
     * @return self
     */
    public function setTo(?DateTime $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return void
     * @throws Exception
     */
    public function fromArrayDefault(array $response): void
    {
        if (isset($response['from'])) {
            $this->setFrom(new DateTime($response['from']));
        }

        if (isset($response['to'])) {
            $this->setTo(new DateTime($response['to']));
        }

        if (isset($response['interval'])) {
            $this->setInterval($response['interval']);
        }

        if (isset($response['size'])) {
            $this->setSize($response['size']);
        }

        if (isset($response['next_page_token'])) {
            $this->setNextPageToken($response['next_page_token']);
        }

        if (isset($response['range']) && in_array($response['range'], $this::RANGES, true)) {
            $this->setRange($response['range']);
        }
    }

    public function toArrayDefault(): array
    {
        return array_filter([
            'from' => $this->getFrom() ? $this->getFrom()->format('Y-m-d\TH:i:s.v') : null,
            'to' => $this->getTo() ? $this->getTo()->format('Y-m-d\TH:i:s.v') : null,
            'interval' => $this->getInterval(),
            'size' => $this->getSize(),
            'next_page_token' => $this->getNextPageToken(),
            'range' => $this->getRange(),
        ], function ($value) {
            return $value !== null;
        });
    }
}

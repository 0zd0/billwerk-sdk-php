<?php

namespace Billwerk\Sdk\Model;

use DateTime;
use Exception;

abstract class AbstractCollectionModel extends AbstractModel
{
    /**
     * Model class in content
     */
    public const CONTENT_CLASS = '';

    /**
     * Optional range defining the date and time attribute used to limit the query and also
     * defines the sorting. The sorting is always descending. Each resource offers different
     * range attributes. Each resource have a default range if non is defined
     */
    public const RANGES = [];

    /**
     * Used page size
     *
     * @var int $size
     */
    protected int $size;

    /**
     * Number of elements in current page. If less than page size it is the last page
     *
     * @var int $count
     */
    protected int $count;

    /**
     * Local date and time range used as to (exclusive)
     *
     * @var DateTime $to
     */
    protected DateTime $to;

    /**
     * Local date and time range used as from (inclusive)
     *
     * @var DateTime $from
     */
    protected DateTime $from;

    /**
     * Range attribute limited on
     *
     * @var string|null $range
     */
    protected ?string $range = null;

    /**
     * List of count entities for the page
     *
     * @var AbstractModel[] $content
     */
    protected array $content;

    /**
     * Pagination token to use to get the next page. If not present the last page has been reached
     *
     * @var string|null $nextPageToken
     */
    protected ?string $nextPageToken = null;

    /**
     * Number of elements in current page. If less than page size it is the last page
     *
     * @return int
     */
    public function getCount(): int
    {
        return $this->count;
    }

    /**
     * Local date and time range used as from (inclusive)
     *
     * @return DateTime
     */
    public function getFrom(): DateTime
    {
        return $this->from;
    }

    /**
     * Pagination token to use to get the next page. If not present the last page has been reached
     *
     * @return string|null
     */
    public function getNextPageToken(): ?string
    {
        return $this->nextPageToken;
    }

    /**
     * List of count entities for the page
     *
     * @return AbstractModel[]
     */
    abstract public function getContent(): array;

    /**
     * Range attribute limited on
     *
     * @return string|null
     */
    public function getRange(): ?string
    {
        return $this->range;
    }

    /**
     * Used page size
     *
     * @return int
     */
    public function getSize(): int
    {
        return $this->size;
    }

    /**
     * Local date and time range used as to (exclusive)
     *
     * @return DateTime
     */
    public function getTo(): DateTime
    {
        return $this->to;
    }

    /**
     * List of count entities for the page
     *
     * @param array $content
     *
     * @return self
     */
    public function setContent(array $content): self
    {
        /**
         * @var AbstractModel $contentClass
         */
        $contentClass = static::CONTENT_CLASS;

        $this->content = array_map(
            function ($item) use ($contentClass) {
                return $contentClass::fromArray($item);
            },
            $content
        );

        return $this;
    }

    /**
     * Number of elements in current page. If less than page size it is the last page
     *
     * @param int $count
     *
     * @return self
     */
    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Local date and time range used as from (inclusive)
     *
     * @param DateTime $from
     *
     * @return self
     */
    public function setFrom(DateTime $from): self
    {
        $this->from = $from;

        return $this;
    }

    /**
     * Pagination token to use to get the next page. If not present the last page has been reached
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
     * Range attribute limited on
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
     * Used page size
     *
     * @param int $size
     *
     * @return self
     */
    public function setSize(int $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Local date and time range used as to (exclusive)
     *
     * @param DateTime $to
     *
     * @return self
     */
    public function setTo(DateTime $to): self
    {
        $this->to = $to;

        return $this;
    }

    /**
     * @param array $response
     *
     * @return static
     * @throws Exception
     */
    public static function fromArray(array $response): self
    {
        $collection = new static();

        $collection->setSize($response['size'])
                   ->setCount($response['count'])
                   ->setTo(new DateTime($response['to']))
                   ->setFrom(new DateTime($response['from']));

        if (isset($response['next_page_token'])) {
            $collection->setNextPageToken($response['next_page_token']);
        }

        if (isset($response['range']) && in_array($response['range'], $collection::RANGES, true)) {
            $collection->setRange($response['range']);
        }

        $collection->setContent($response['content']);

        return $collection;
    }

    public function toArray(): array
    {
        return array_filter([
            'size' => $this->getSize(),
            'count' => $this->getCount(),
            'to' => $this->getTo()->format('Y-m-d\TH:i:s.v'),
            'from' => $this->getFrom()->format('Y-m-d\TH:i:s.v'),
            'next_page_token' => $this->getNextPageToken(),
            'range' => $this->getRange(),
            'content' => array_map(function ($item) {
                return $item->toArray();
            }, $this->getContent()),
        ], function ($value) {
            return $value !== null;
        });
    }
}

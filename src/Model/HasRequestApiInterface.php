<?php

namespace Billwerk\Sdk\Model;

interface HasRequestApiInterface
{
    public function toApi(): array;
}

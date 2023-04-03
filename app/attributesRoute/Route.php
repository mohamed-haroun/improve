<?php

namespace attributesRoute;

use Attribute;

#[Attribute(flags: Attribute::TARGET_METHOD)]
class Route
{
    public function __construct(public string $path, public string $method='get')
    {
    }
}
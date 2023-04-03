<?php

namespace attributesRoute;
#[\Attribute]
class Get extends Route
{
    public function __construct(string $path)
    {
        parent::__construct($path, "get");
    }
}
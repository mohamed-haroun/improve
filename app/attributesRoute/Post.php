<?php

namespace attributesRoute;

#[\Attribute]
class Post extends Route
{
    public function __construct(string $path)
    {
        parent::__construct($path, "post");
    }
}
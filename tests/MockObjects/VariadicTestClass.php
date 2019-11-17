<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace Ulrack\ObjectFactory\Tests\MockObjects;

class VariadicTestClass
{
    /**
     * Contains the value of foo.
     *
     * @var string[]
     */
    private $foo;

    /**
     * Constructor
     *
     * @param string ...$foo
     */
    public function __construct(string ...$foo)
    {
        $this->foo = $foo;
    }

    /**
     * Retrieves foo.
     *
     * @return array
     */
    public function getFoo(): array
    {
        return $this->foo;
    }
}

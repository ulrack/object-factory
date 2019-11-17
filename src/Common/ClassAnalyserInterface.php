<?php
/**
 * Copyright (C) Jyxon, Inc. All rights reserved.
 * See LICENSE for license details.
 */
namespace Ulrack\ObjectFactory\Common;

interface ClassAnalyserInterface
{
    /**
     * Analyses the constructor of a class and returns a configuration array.
     *
     * @return array
     */
    public function analyse(string $class): array;
}

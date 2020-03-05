[![Build Status](https://travis-ci.com/ulrack/object-factory.svg?branch=master)](https://travis-ci.com/ulrack/object-factory)

# Ulrack Object Factory

The Object Factory package contains an implementation for creating objects,
based on configuration.

## Installation

To install the package run the following command:

```
composer require ulrack/object-factory
```

## Usage

The package provides a [Analyser](src/Component/Analyser/ClassAnalyser.php)
class, which retrieves an instantiation signature of a class.
This analyser is used by the [ObjectFactory](src/Factory/ObjectFactory.php) to
determine the order of the provided parameter from the configuration.
The analyser expects an implementation of the StorageInterface from the
`ulrack/storage` package.
This implementation can be used to store previous analyses and retrieve them at
a later point (caching mechanisms e.g.).

Creating an ObjectFactory can simply be done with the following snippet:
```php
<?php

use Ulrack\Storage\Component\ObjectStorage;
use Ulrack\ObjectFactory\Factory\ObjectFactory;
use Ulrack\ObjectFactory\Component\Analyser\ClassAnalyser;

$factory = new ObjectFactory(new ClassAnalyser(new ObjectStorage()))
```

To create an object with the factory, simply pass the class and parameters to
the create method.

```php
<?php

use Ulrack\Storage\Component\ObjectStorage;

/** @var ObjectStorage $result */
$result = $factory->create(
    ObjectStorage::class,
    [
        'data' => ['foo']
    ]
);
```

A key-value structure is used for the parameters provided to the ObjectFactory.
If (in this case the ObjectStorage class) expects a `$data` parameter of the
type array in the `__construct` method, then the structure of the `$parameter`
parameter will be as follows:
```php
$parameters = [
    'data' => [/** Value of $data here. */]
];
```

For variadic parameters, this structure is the same.

### Object nesting

Some objects require other objects in their `__construct` method. With the
ObjectFactory it is also possible to create these object, with the correct
configuration.

There are two ways to create the objects.

#### Configuration declaration

It is possible to completely configure the nested objects, expected by the method.
Instead of passing along the variable as is, a array is used with one expected
and one optional node. The expected node is `class`, this array node should contain
the string representation of the expected class. The optional node is `parameters`,
this array node will contain the objects' instantiation parameters. If none are
required, then this can be left empty or undeclared.

To create the ObjectFactory with a (full) configuration declaration, would look
like this:
```php
<?php

use Ulrack\Storage\Component\ObjectStorage;
use Ulrack\ObjectFactory\Factory\ObjectFactory;
use Ulrack\ObjectFactory\Component\Analyser\ClassAnalyser;

/** @var ObjectFactory $result */
$result = $factory->create(
    ObjectFactory::class,
    [
        'classAnalyser' => [
            'class' => ClassAnalyser::class,
            'parameters' => [
                'analysisStorage' => [
                    'class' => ObjectStorage::class,
                ],
            ],
        ],
    ]
);
```

The configuration declaration could technically be infinitely deep.

#### Object declaration

It is also possible to re-use a previously generated or instantiation instance
of a class. This can be done, by simply passing along the object in the parameters.

```php
<?php

use Ulrack\Storage\Component\ObjectStorage;
use Ulrack\ObjectFactory\Factory\ObjectFactory;
use Ulrack\ObjectFactory\Component\Analyser\ClassAnalyser;

$classAnalyser = new ClassAnalyser(new ObjectStorage());

/** @var ObjectFactory $result */
$result = $factory->create(
    ObjectFactory::class,
    [
        'classAnalyser' => $classAnalyser
    ]
);
```

Both of these declaration methods can be used and mixed throughout the declaration.

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## MIT License

Copyright (c) GrizzIT

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.

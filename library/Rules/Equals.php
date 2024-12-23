<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Attribute;
use Respect\Validation\Message\Template;
use Respect\Validation\Result;
use Respect\Validation\Rules\Core\Standard;

use function is_scalar;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
#[Template(
    '{{name}} must be equal to {{compareTo}}',
    '{{name}} must not be equal to {{compareTo}}',
)]
final class Equals extends Standard
{
    public function __construct(
        private readonly mixed $compareTo
    ) {
    }

    public function evaluate(mixed $input): Result
    {
        $parameters = ['compareTo' => $this->compareTo];
        if (is_scalar($input) === is_scalar($this->compareTo)) {
            return new Result($input == $this->compareTo, $input, $this, $parameters);
        }

        return Result::failed($input, $this, $parameters);
    }
}

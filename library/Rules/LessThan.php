<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Message\Template;

#[Template(
    '{{name}} must be less than {{compareTo}}',
    '{{name}} must not be less than {{compareTo}}',
)]
final class LessThan extends Comparison
{
    protected function compare(mixed $left, mixed $right): bool
    {
        return $left < $right;
    }
}

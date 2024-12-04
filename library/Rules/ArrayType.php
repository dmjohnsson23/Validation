<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Message\Template;
use Respect\Validation\Rules\Core\Simple;

use function is_array;

#[Template(
    '{{name}} must be an array',
    '{{name}} must not be an array',
)]
final class ArrayType extends Simple
{
    protected function isValid(mixed $input): bool
    {
        return is_array($input);
    }
}

<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Attribute;
use Respect\Validation\Message\Template;
use Respect\Validation\Rules\Core\FilteredString;

use function ctype_alnum;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
#[Template(
    '{{name}} must contain only letters (a-z) and digits (0-9)',
    '{{name}} must not contain letters (a-z) or digits (0-9)',
    self::TEMPLATE_STANDARD,
)]
#[Template(
    '{{name}} must contain only letters (a-z), digits (0-9), and {{additionalChars}}',
    '{{name}} must not contain letters (a-z), digits (0-9), or {{additionalChars}}',
    self::TEMPLATE_EXTRA,
)]
final class Alnum extends FilteredString
{
    protected function isValid(string $input): bool
    {
        return ctype_alnum($input);
    }
}

<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

use Respect\Validation\Validator;

test('Scenario #1', expectFullMessage(
    function (): void {
        Validator::callback('is_string')->between(1, 2)->setTemplate('{{name}} is not tasty')->assert('something');
    },
    '- "something" is not tasty',
));
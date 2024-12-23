<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Attribute;
use Respect\Validation\Result;
use Respect\Validation\Rule;
use Respect\Validation\Rules\Core\Binder;
use Respect\Validation\Rules\Core\KeyRelated;
use Respect\Validation\Rules\Core\Wrapper;

#[Attribute(Attribute::TARGET_PROPERTY | Attribute::IS_REPEATABLE)]
final class KeyOptional extends Wrapper implements KeyRelated
{
    public function __construct(
        private readonly int|string $key,
        Rule $rule,
    ) {
        $rule->setName($rule->getName() ?? (string) $key);
        parent::__construct($rule);
    }

    public function getKey(): int|string
    {
        return $this->key;
    }

    public function evaluate(mixed $input): Result
    {
        $keyExistsResult = (new Binder($this, new KeyExists($this->key)))->evaluate($input);
        if (!$keyExistsResult->isValid) {
            return $keyExistsResult->withInvertedMode();
        }

        return $this->rule
            ->evaluate($input[$this->key])
            ->withUnchangeableId((string) $this->key)
            ->withNameIfMissing($this->rule->getName() ?? (string) $this->key);
    }
}

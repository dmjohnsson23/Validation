<?php

/*
 * Copyright (c) Alexandre Gomes Gaigalas <alganet@gmail.com>
 * SPDX-License-Identifier: MIT
 */

declare(strict_types=1);

namespace Respect\Validation\Rules;

use Respect\Validation\Test\RuleTestCase;

/**
 * @covers \Respect\Validation\Exceptions\PublicDomainSuffixException
 * @covers \Respect\Validation\Rules\PublicDomainSuffix
 */
final class PublicDomainSuffixTest extends RuleTestCase
{
    /**
     * @return array<array{PublicDomainSuffix, mixed}>
     */
    public static function providerForValidInput(): array
    {
        $rule = new PublicDomainSuffix();

        return [
            [$rule, 'co.uk'],
            [$rule, 'nom.br'],
            [$rule, 'WWW.CK'],
        ];
    }

    /**
     * @return array<array{PublicDomainSuffix, mixed}>
     */
    public static function providerForInvalidInput(): array
    {
        $rule = new PublicDomainSuffix();

        return [
            [$rule, 'NONONONONONONONONON'],
            [$rule, 'NONONONONONONONONON.uk'],
            [$rule, 'invalid.com'],
            [$rule, 'tk'],
        ];
    }
}
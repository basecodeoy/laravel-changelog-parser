<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\ChangelogParser\Data;

final readonly class SectionItem implements \Stringable
{
    public function __construct(
        private string $html,
        private string $plain,
    ) {}

    public function __toString(): string
    {
        return $this->toString();
    }

    public function toString(): string
    {
        return $this->plain;
    }

    public function toHtml(): string
    {
        return $this->html;
    }
}

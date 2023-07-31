<?php

declare(strict_types=1);

namespace BombenProdukt\ChangelogParser\Parser;

use BombenProdukt\ChangelogParser\Contracts\Parser;
use BombenProdukt\ChangelogParser\Data\Changelog;
use Exception;

final class CommonChangelogParser implements Parser
{
    private array $disallowed = [
        '## [Unreleased]',
        '### Deprecated',
        '### Security',
        '[YANKED]',
    ];

    public function parse(string $content): Changelog
    {
        foreach ($this->disallowed as $disallowed) {
            if (\str_contains($content, $disallowed)) {
                throw new Exception('Common Changelog does not support '.$disallowed.' sections.');
            }
        }

        return (new KeepAChangelogParser())->parse($content);
    }
}

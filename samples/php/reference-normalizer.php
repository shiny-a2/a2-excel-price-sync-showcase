<?php

declare(strict_types=1);

function a2_showcase_normalize_reference($value): string
{
    $reference = trim((string) $value);
    $reference = preg_replace('/\s+/u', '', $reference) ?? '';
    $reference = str_replace(['_', '–', '—'], '-', $reference);

    return strtoupper($reference);
}

function a2_showcase_reference_matches_title(string $title, string $reference): bool
{
    $normalizedReference = a2_showcase_normalize_reference($reference);

    if ($normalizedReference === '') {
        return false;
    }

    $normalizedTitle = strtoupper($title);
    $pattern = '/(?<![A-Z0-9])' . preg_quote($normalizedReference, '/') . '(?![A-Z0-9])/u';

    return preg_match($pattern, $normalizedTitle) === 1;
}

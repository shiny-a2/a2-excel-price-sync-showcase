<?php

declare(strict_types=1);

function a2_showcase_validate_import_row(array $row): array
{
    $errors = [];
    $brand = trim((string) ($row['brand'] ?? ''));
    $reference = a2_showcase_clean_reference_for_validation($row['reference'] ?? '');
    $rawPrice = trim((string) ($row['price'] ?? ''));

    if ($brand === '') {
        $errors[] = 'Brand is required.';
    }

    if ($reference === '') {
        $errors[] = 'Product reference is required.';
    }

    if ($rawPrice === '' || ! preg_match('/^\d+(\.\d{1,2})?$/', $rawPrice)) {
        $errors[] = 'Price must be a non-negative decimal value.';
    }

    return [
        'valid' => $errors === [],
        'errors' => $errors,
        'value' => [
            'brand' => $brand,
            'reference' => $reference,
            'price' => $rawPrice === '' ? null : (float) $rawPrice,
        ],
    ];
}

function a2_showcase_clean_reference_for_validation($value): string
{
    $reference = trim((string) $value);
    $reference = preg_replace('/\s+/u', '', $reference) ?? '';

    return strtoupper($reference);
}

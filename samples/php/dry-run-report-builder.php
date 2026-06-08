<?php

declare(strict_types=1);

function a2_showcase_build_dry_run_report(array $validatedRows, array $catalogMatches): array
{
    $report = [
        'proposed_changes' => [],
        'missing_references' => [],
        'duplicate_matches' => [],
        'invalid_rows' => [],
    ];

    foreach ($validatedRows as $rowNumber => $validation) {
        if (! ($validation['valid'] ?? false)) {
            $report['invalid_rows'][] = [
                'row' => $rowNumber,
                'errors' => $validation['errors'] ?? [],
            ];
            continue;
        }

        $value = $validation['value'];
        $reference = (string) $value['reference'];
        $matches = $catalogMatches[$reference] ?? [];

        if (count($matches) === 0) {
            $report['missing_references'][] = [
                'row' => $rowNumber,
                'reference' => $reference,
            ];
            continue;
        }

        if (count($matches) > 1) {
            $report['duplicate_matches'][] = [
                'row' => $rowNumber,
                'reference' => $reference,
                'candidate_count' => count($matches),
            ];
            continue;
        }

        $report['proposed_changes'][] = [
            'row' => $rowNumber,
            'reference' => $reference,
            'product_label' => (string) $matches[0],
            'new_price' => $value['price'],
        ];
    }

    return $report;
}

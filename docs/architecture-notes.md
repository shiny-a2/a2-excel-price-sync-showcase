# Architecture Notes

This document explains the private plugin at a reviewer-friendly level without exposing production source code, commercial data, or operational files.

## Operating Model

The workflow is designed for controlled catalog operations, not blind bulk edits. An operator provides a prepared spreadsheet/CSV, reviews generated reports, and only then applies approved updates to WooCommerce products.

## Pipeline

1. **Upload and permission check** — admin-only actions gate upload, review, apply, cleanup, and report download flows.
2. **Row normalization** — spreadsheet rows are normalized into brand, product reference, and update intent before any product mutation is considered.
3. **Catalog matching** — references are matched against product titles and product attributes with boundary-aware checks to reduce partial-match mistakes.
4. **Set-product classification** — bundled or set products are separated from normal product updates so stock behavior can be decided explicitly.
5. **Dry-run reporting** — the workflow produces reports for proposed changes and anomalies before applying updates.
6. **Bounded processing** — long-running operations are split into manageable jobs so WordPress admin requests remain recoverable.
7. **Private report delivery** — generated CSV reports are stored and downloaded through guarded admin flows, not public static links.

## Report Categories

- **Changed products:** products that would receive a price or stock update.
- **Missing references:** spreadsheet rows that could not be matched safely.
- **Duplicate matches:** references that map to more than one candidate and require review.
- **Set products:** bundled products that need separate stock handling.
- **Not-listed in-stock products:** existing catalog items that remain in stock but are absent from the latest import handoff.

## Matching Strategy

The private implementation avoids broad fuzzy matching for operational updates. It uses stricter reference boundaries and attribute checks so a short reference does not accidentally match an unrelated product title.

This is important because a price-sync tool is a high-impact operational system: a false positive can publish incorrect prices or stock states across a live store.

## Reliability Considerations

- Import state is treated as a job rather than a single fragile request.
- Reports are generated before mutation so operators can review impact.
- Heavy downloads are handled separately from normal admin page rendering.
- Cleanup paths exist for generated files and job state.
- Public documentation avoids publishing implementation details that could reveal production behavior.

## Reviewer Notes

This showcase intentionally prioritizes architecture clarity over code volume. Phase 3 will add short sanitized snippets for reference normalization, row validation, and report-building patterns.

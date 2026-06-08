# A2 Excel Price Sync Showcase

Public-safe showcase for a private WooCommerce operational plugin that turns controlled spreadsheet handoffs into safer product price and stock updates.

This repository is documentation and sanitized portfolio proof only. It is not a source mirror, and it does not contain supplier sheets, upload-ready files, commercial pricing rules, customer data, or production implementation details.

## Review Summary

- **Problem:** manual WooCommerce price and stock updates from spreadsheet sources are slow, error-prone, and difficult to audit.
- **Solution:** a controlled import workflow that validates rows, normalizes product references, separates dry-run review from apply steps, and produces operator-readable reports.
- **Engineering focus:** matching safety, batch boundaries, admin workflow reliability, privacy separation, and reviewable operational outputs.
- **Public scope:** business context, architecture notes, risk boundaries, and future sanitized snippets.

## Business Context

Commerce operators often receive price and availability updates in spreadsheet form, while WooCommerce product records may use inconsistent titles, attributes, references, and set/bundle naming. A direct bulk update can create pricing mistakes, inventory drift, or hard-to-debug catalog changes.

The private plugin was designed around a safer workflow:

1. Accept a controlled CSV/spreadsheet handoff.
2. Normalize brand and reference values before matching.
3. Match products through explicit title and attribute rules.
4. Identify duplicate, missing, set, and not-listed products separately.
5. Generate reports that let an operator review what will change.
6. Apply approved updates through bounded WordPress/WooCommerce operations.

## What This Demonstrates

- Spreadsheet-to-WooCommerce workflow design for operational teams.
- Defensive product-reference matching instead of broad fuzzy updates.
- Report-first import UX for price and inventory changes.
- Handling for set/bundle products where stock behavior needs explicit rules.
- Private report storage and download boundaries for sensitive operational files.
- Documentation discipline: public portfolio proof without exposing production code.

## Architecture Overview

The private implementation is organized as a WordPress admin workflow with a matching and reporting pipeline:

- **Admin entry:** capability-protected screens and actions for upload, review, apply, and download flows.
- **Input normalization:** spreadsheet rows are reduced to brand, reference, and price/stock intent before catalog matching.
- **Matching layer:** product titles and reference attributes are checked with stricter boundaries to avoid accidental partial matches.
- **Set-product handling:** bundled/set products are detected and processed through separate stock rules rather than treated as normal single-reference items.
- **Job state:** import jobs are stored outside public output so long-running operations can be resumed, reviewed, or cleaned up safely.
- **Reports:** CSV reports are generated for changed products, missing references, duplicates, set products, and products that remain in stock but are not listed in the import.
- **Downloads:** generated files are served through guarded admin flows instead of public URLs.

See `docs/architecture-notes.md` for the detailed reviewer walkthrough.

## Key Engineering Decisions

- **Exact-ish reference boundaries:** product references must match clear title boundaries or explicit attributes, reducing false positives.
- **Dry-run before apply:** reports are treated as part of the workflow, not an afterthought.
- **Separate anomaly buckets:** missing rows, duplicates, set products, and not-listed stock are reviewed independently because they require different business decisions.
- **Private operational files:** generated reports and uploaded sheets stay outside public showcase scope.
- **No fake public metrics:** outcomes are described qualitatively unless anonymized operational baselines are approved for publication.

## Tech Stack

- WordPress plugin architecture
- WooCommerce product operations
- PHP
- CSV/spreadsheet handoff workflows
- Admin UX and report downloads
- Inventory and pricing operations

## Privacy Boundary

Public files describe the architecture and review path only. Production source code, supplier price lists, upload outputs, live catalog identifiers, margins, warranties, logs, and customer/order data remain private.

Read the full boundary in `docs/privacy-boundary.md`.

## Reviewer Path

- Start with this README for the business case and implementation shape.
- Read `docs/architecture-notes.md` for the import pipeline and design decisions.
- Read `docs/privacy-boundary.md` for what is intentionally excluded.
- Check `docs/update-notes.md` for public-facing change history.
- Review `samples/README.md` for the Phase 3 sanitized sample plan.

## Repository Structure

- `docs/architecture-notes.md` — architecture, workflow, and engineering decisions.
- `docs/privacy-boundary.md` — what is public versus private.
- `docs/update-notes.md` — public update log.
- `samples/README.md` — sanitized sample-code overview.
- `samples/php/` — short public-safe PHP snippets for matching, validation, and report building.

## Phase Status

- **Phase 1:** showcase skeleton, privacy boundary, and reviewer path.
- **Phase 2:** employer-friendly business context, architecture notes, and risk boundaries.
- **Phase 3:** sanitized code samples for matching, validation, and report-building style without exposing production logic.

## Links

- Portfolio: <https://amiraliyaghouti.com>
- GitHub profile: <https://github.com/shiny-a2>
- Private source: `shiny-a2/a2-excel-price-sync` (not public)

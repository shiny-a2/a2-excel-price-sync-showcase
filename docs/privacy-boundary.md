# Privacy Boundary

This public repository is designed for employer review and portfolio proof only.

## Public

- Business context for spreadsheet-driven WooCommerce operations.
- Architecture notes about validation, matching, job state, and reporting.
- Public-safe examples of reference normalization and dry-run reporting when added in Phase 3.
- Sanitized snippets that show coding approach without private data or production logic.

## Private

- Production source code.
- Supplier files, inventory sheets, price lists, upload outputs, logs, and commercial rules.
- Product IDs, stock data, warranties, margins, customer/order data, and operational exports.
- Real endpoint paths, nonces, report filenames, table names, option keys, cron/action identifiers, and deployment-specific settings where disclosure could help reproduce production behavior.

## Hard Rules

- Do not publish real supplier rows, SKUs, references, prices, warranties, margins, or stock quantities.
- Do not publish upload-ready CSV files or generated operational reports.
- Do not publish secrets, tokens, credentials, private keys, environment files, dumps, or logs.
- Do not mirror production implementation directly in public samples.

## Public Sample Standard

Samples may demonstrate shape and judgment, but they must use fictional inputs, generic names, and simplified implementations. Every sample should explain what it demonstrates and what was intentionally removed.

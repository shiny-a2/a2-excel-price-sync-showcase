# Reliable spreadsheet reference matching

Version 6.2.4 handles invisible direction marks inside product model references. Previously, a catalog title could look identical to an imported reference while failing the initial substring lookup. The new fallback checks only the existing brand scope and caches affected titles within a batch.

Exact model suffixes remain distinct. Family matching remains an explicit mode, duplicate matches remain reportable, and price-only imports do not acquire inventory side effects. UTF-8 byte-order marks are removed from imported brand cells.

Validation passed nine matcher checks, 12 brand-scope checks, 31 branch-stock checks and 40 paired-watch/workbook checks. A local replay against a read-only catalog snapshot recovered four additional exact matches. Production deployment used a complete plugin backup and file-hash verification. No price import was replayed and no inventory was modified as part of deployment.

Historical reports describe their original run. Installing a lookup fix does not retroactively apply missed prices; reconciliation must account for later updates before replaying supplier data.

## Price reconciliation follow-up

A guarded operational tool now prepares a private before-state and source-file hashes before applying increases. It checks stock, detects concurrent edits, uses each brand's latest file, preserves the original discount percentage and verifies every saved product. Whole-rial comparisons avoid treating spreadsheet floating-point residue as a price increase. Synthetic tests cover stock exclusion, discount preservation, repeat execution and changed input files. A subsequent authorized reconciliation was independently checked against stored prices and inventory; detailed commercial records remain private.

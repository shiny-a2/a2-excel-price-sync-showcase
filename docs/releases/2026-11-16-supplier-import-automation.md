# 6.3.0 — connected catalog follow-up and branch stock recovery

Completed spreadsheet imports now expose a stable report that the existing
product research and image review workflow can consume. Available company
products missing from the catalog become candidates after exact checks; unknown
availability, duplicate references and unverified brands remain review items.
Products in stock but absent from a price list are included in the report.

Branch sales retain separate stock ownership and dated event receipts. An
unchanged invoice can retry a failed update, while repeated imports cannot
subtract the same sale again. Historical sales already covered by an opening
count do not reduce inventory twice.

Validation passed 10 catalog-export, 36 branch-stock and 40 workbook/set checks,
plus 55 checks in a real isolated WordPress/WooCommerce/MariaDB fixture. These
tests used synthetic records. No production message or stock write was used as a
test. The reviewed version was installed after owner approval and the completed-import
bridge was enabled for future jobs.

Installation checks matched committed source hashes, validated backups and
confirmed the live API contract and rejection of unauthenticated requests. The
existing bot and image worker remained operational. Actual output from the next
genuine completed import and the next due reminder remain to be observed; no
fabricated transaction or test message was sent.

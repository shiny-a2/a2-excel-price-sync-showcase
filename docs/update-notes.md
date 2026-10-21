# Public Update Notes

## 2026-10-21 — Safer background import recovery

- Added bounded recovery for interrupted price and stock imports from their last saved batch checkpoint.
- Prevented a retry from scheduling alongside an existing continuation for the same import.
- Reduced batch size and added a bounded runner for the existing scheduler queue. Both affected production imports completed with reports and sampled price and inventory checks.

## 2026-10-11 — Independent price and stock modes

- Kept family-reference pricing independent from inventory changes.
- Restricted paired availability checks to explicit stock operations.
- Removed a storefront-wide availability override so price-only imports preserve existing stock states.

## 2026-10-11 — Paired product reconciliation

- Improved recognition of two-item sets across supported catalogue title formats.
- Made paired prices depend on both source prices, with no estimated price from one member.
- Based paired availability on the smaller member quantity and kept partial imports from clearing stock unless explicitly requested.
- Added a catalogue member check for explicitly requested inventory imports.
- Strengthened regression coverage for partial files, numeric stock, family references, and brand isolation.


## 2026-10-11 — Strict brand scope

- Restricted brand-level reports and out-of-list inventory actions to exact terms in dedicated brand taxonomies.
- Removed fuzzy matches across unrelated product attributes and prevented category descendants from entering another brand's run.
- Added regression coverage for dedicated brand precedence, bilingual legacy fallbacks, and compound-label false positives.
- Preserved operational privacy: no live product identifiers, supplier prices, report files, or catalog data are included here.

## 2026-06-08 — Phase 3

- Added three sanitized PHP snippets for reference normalization, import-row validation, and dry-run report building.
- Updated the sample documentation to clarify that snippets are simplified review samples, not production source code.
- Kept all examples fictional and excluded production identifiers, supplier files, endpoint details, and commercial rules.

## 2026-06-08 — Phase 2

- Expanded the showcase README with business context, architecture overview, engineering decisions, and reviewer path.
- Added architecture notes for the upload, matching, reporting, job-state, and guarded-download workflow.
- Tightened privacy rules for supplier data, operational files, implementation details, and future samples.
- Kept production source code, real spreadsheet data, and commercial logic private.

## 2026-06-08

- Created the Phase 1 public showcase skeleton.
- Added privacy boundary, reviewer path, tech stack, and sample-code placeholder.
- Kept production sheets, price data, and source code private.

# Supplier inventory updates

A supplier can withdraw a watch while a shop still has one on the shelf. The importer now clears the supplier's availability when a complete brand file omits that reference, including when physical-stock protection is selected. The watch remains available while another source carries it.

Family references can update prices. Inventory files require exact models and a compatible source. A missing price in a combined file is reported separately so the stock entry can still be processed.

The previous behavior was reproduced on an isolated WooCommerce installation. Sixteen worker checks covered branch quantities, retries, supplier withdrawals, paired watches and the job report. The three installed source files matched the tested release.

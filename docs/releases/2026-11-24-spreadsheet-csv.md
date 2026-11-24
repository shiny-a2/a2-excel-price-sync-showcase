# Spreadsheet CSV formats

Stock and price lists exported from different spreadsheet applications can now use comma, semicolon or tab separators. The upload process recognizes UTF-8, UTF-16 and Persian Windows-1256 text, and removes an optional heading row or Excel separator hint. Brand, reference, price and optional quantity keep their established positions.

Twenty-one parser checks covered valid exports and rejected input. A separate HTTP upload to an isolated WordPress installation verified that a UTF-16 semicolon file produced the expected job and product reference. The installed plugin version and source hashes were verified after publication.

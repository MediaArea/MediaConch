## Metadata Fixer CLI

### Functional Overview

The Matroska Metadata Fixer command line interface will provide repository systems with a means to automatically assess what potential fixes may be performed, selectively perform them, add or changes files metadata, or preform structural changes to the file.

Overall all the features documented in the Metadata Fixer GUI are also feasible within the CLI, although some scripting may be necessary around the CLI to emulate a fully programmatic performance of all anticipated GUI workflows.

Functional Requirements include:

- accept one or many Matorska files as well as one or many PreForma policy speciications (via xml) as an input
- generate a text based representation of the EBML structure in json or xml, which identifies and categories EBML sections and which includes attributes to associate sections of the EBML structure (or the file itself) with registered conformance or policy errors
- validate a Matroska file against conformance or policy errors  and generate a text based output which summarizes errors with associated fixes
- preform and log identified metadata fixes
- add, replace, or remove Matroska metadata values based on a developed EBML equivalent of XPath

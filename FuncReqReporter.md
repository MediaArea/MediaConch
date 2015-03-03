## Reporter

### Functional Overview

The Reporter portion of the conformance checker presents human and machine-readable information related to implemenation and policy checks, metadata fixes, check statistics, conformance priorities, and other associated session documentation. This information is derived from the database and multiple component project APIs, passed through the PREFORMA core and finally combined and transformed into a desired output. Several output formats allow for external software agents to futher process this reportage. 

The Reporter may accept a previously-generated PREFORMAXML or other supported output format for collation with other conformance checks. Previously-generated PREFORMAXML reports may also be transformedn into additional desired outputs. 

###Design and Functional Requirements

- human-readable supported output formats: PDF, TXT
- machine-readable supported output formats: PREFORMAXML, JSON
- optional machine-readable supported output formats: CSV/TSV
- report on implementation checks, policy checks, and metadata fixes
- report on information concerning preventative measures for non-conformed files
- option to report verbose bit traces of individual files
- batch reporting features the option to nest specific objects.

###Contents

Report Name ("eg., "Conch Report"), XXXX-XX-XX XX:XX:XX Date (ISO spec)

Implementation Checking Errors
Implementation Chcking Warnings

Policy Checking Errors
Policy Checking Warnings

Metadata Fixing Documentation (Action measures and preventative measures for non-conformed files)

Individual File General / Verbose bit metadata readouts

## Reporter - Graphical User Interface

The Reporter's Graphical User Interface displays human and machine-readable data to the end user. Through a drop-down menu, a user can select the above mentioned output handlers.

## Reporter - Command Line Interface

On the command line interface, a user would be able to export a report using flags designating output and output format (e.g., "--output=XML").

## Reporter - Web User Interface

Like the Graphical User Interface, the Reporter's Web User Interface displays human and machine-readable data to the end user. Through a drop-down menu, a user can select the above mentioned output handlers.

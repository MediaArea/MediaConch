## Reporter - Graphical User Interface

### Functional Overview

In the context of the Graphical User Interface, the Reporter presents human and machine-readable  information related to metadata readouts of individual files, policy checking errors, conformance checking errors, and metadata fixing documentation. This information is derived from multiple APIs, passed through the PreForma core and finally combined and transformed into a desired output. 

Reports may include an option to report verbose bit traces of individual files, as well as information on preventative measures for nonconformed files. Batch reporting features the option to nest specific objects. 

###Design and Functional Requirements

#####Reporter General Interface

The General Reporter Interface displays human and machine-readable data to the end user. Through a drop-down menu a user can select the following out formats:

Human-readable formats: PDF, TXT
Machine-readable formats: XML, JSON
Optional machine-readable formats: CSV/TSV

Several of these formats will allow for external software agents to futher process this information. 

## Reporter - Command Line Interface

### Functional Overview

In the context of the Command Line Interface the Reporter presents human and machine-readable reports to the end user, including individual metadata readouts, policy checking, conformance checking, and metadata fixing documentation. This data is derived from the PreForma core and transformed into a desired output. 

###Design and Functional Requirements

On the command line interface, a user would be able to export a report using flags designating output (eg., "-o") and output format (eg., "-of"). 

## Reporter - Web Interface
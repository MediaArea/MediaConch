## Policy Checker - Command Line Interface

### Functional Overview

In the context of the Command Line Interface the Policy Checker shall allow for the Policy Set XML and the file or files to be tested to be inputs to the command line utility. The output of the utility will be a report compliant with PreForma reporting format for the expression of conformance, policy and metadata information. The command line will provide various levels of verbosity in order to show progress in processing through multiple files and allow the policy results to be shown as they are assessed.

The Policy Checker will support exit codes to programmically inform to the output of the process.

###Design and Functional Requirements

Users of the command line interface will be prompted with several usage options to call specific project APIs, including the Reporter, Conformance Checker, Policy Checker, and Metadata Fixer. An additional call for "--Help" will prompt an extended options menu. The functions of the command line interface shall include allowing the user to:

- create, edit, and remove policy sets
- name and describe policy sets
- import, export, and validate XML files of policy sets
- allow new policies to be added, edited, or removed from policy sets
- allow policies to be encapsulated within over conditional tests with an if/else approach

####Batch Policy Checking

The command line interface allows for efficient batch policy checking through calls made to the API. 



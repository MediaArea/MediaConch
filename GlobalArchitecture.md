# PreForma Global Architecture

PreForma strives to offer access and ease to users with a structure that works cross-platform and functions in both an online and offline capacity.

## Architecture schema
![Global Architecture Schema](./GlobalArchitecture.png)

## Common to all elements

All elements can be installed on the same server or on different servers, depending on the expected workload and anticipated points of access. The flexibility the architecture allows for a single user to use the shell on one computer or to use it on multiple computers, depending on scalability and need. A distributed system can be set up to allow the conformance checker to process large files more quickly than working on a single machine with relative ease for the user.


### File access

#### File access using CLI

To place a file into the system, a user may execute the CLI name file manually, or the user can asynchronously run the file and test the readiness of a file. If the files are passed in batch format, the reports can be later retrieved by manually requesting updates from the Core.

#### File access using GUI
 
To place and use a file through the checker’s GUI, both technical and non-technical users will work within windows and dialog boxes that enable them to navigate to, open, and load system files directly through the interface. A standard open dialog box will search for and load files for processing within the software. The GUI runs within a human-readable, interactive environment with visually intuitive access to the file checking process. Direct access to checking individual files as well as scheduled batch file checking via special folders residing on the user’s computer/network can also be enabled directly within the GUI.

#### File access using Web
 
To place and check files through the web-based browser platform, the process will be similar to working within the conformance checker’s GUI. In this case, file loading will function visually, as with the GUI platform, but within the specific web browser’s user interface (UI) and without the user having to directly download the software. Local network access will power the checker within the browser (Firefox, Chrome, or IE). Similar to the CLI and GUI, the web-based (server-client) platform allows for individual file loading and checking (via a visually intuitive designed interface) as well as enabling the capability of calling up batch-scheduled checks directly via the UI.

#### Common to all

Files can be copied to a special folder somewhere on the user’s computer or local network, and this folder can be set to regularly check for new files at intervals and process the files accordingly. This can be set up in any of the three checker access methods (CLI, GUI, Web).

### File processing

The architecture allows for two modes of file processing: Direct access and asynchronous. Direct access allows for files to be processed one at a time, while asynchronous allows for files to be processed in batches and returned to at a later time.

### Internet Access

The architecture does not require internet access. Users can work with any version (CLI, GUI, Web) offline as long as it is installed on a user’s machine (or distributed machines). 

### Automation

PreForma includes automated checking allowing for users to receive notifications when new files come into the system.

A user can set up a system on the Core which will configure the system to run scheduled automatic checks for new files. This system can be configured within the user interface to run on a timed schedule.

### Batching

A user also has the option to batch file checking and schedule it to send at a later point in time.

### Prioritization

A user can also prioritize the checker to queue items based on priority, with a lower priority placed on periodical checks.

###

PreForma allows users to load and edit configurations within a REST API configuration.


The Web-based system allows users to work both on and outside of the network or locally if they choose. If the user chooses to work locally they will access the application server directly. This operation runs via a HTTP Daemon. 


Users will have access to a web interface for basic management. This will allow users to see list of files, as well as the processes happening to each file. Users will also be shown demarcation of which files pass testing successfully. 


## Core (Controller)

The Core serves as communication between all plugins within and outside of the PreForma MediaInfo system and between all layers. The Core is the main service and runs in a passive, background mode. For example, if a user updates The Core it will have no effect on the functionality of other systems. If a user begins using MySQL while running the conformance checker and decided to change to PostgreSQL, the Core could be adapted to address such a change. In essence, while components shift, the Core functions to present the data to all databases consistently and can adapt to different components.

The Core has several major functions:

* controls the checkers and manages data for the User Interface
* waits for commands from the Files listener and User Interface
* send commands to the scheduler for file-checking
* launch periodical checks
* communicates with the database to store and retrieve data from the checkers
* sends data to DIRECT

The Core supports the following requirements:

- Scheduling
- Statistics
- Reporting
- User management
- Policies management

Interface :

* Scheduler : Advanced Message Queuing Protocol
* Policy checker / Files listener / User Interface / DIRECT : REST API
* Database : native driver

Programming language : C++

## Database

The Database is responsible for storing the associated metadata and results of the conformance checker, including the policy checker rules and the user rights management.

* store metadata and results of the conformance checker
* store the policy checker rules
* user rights management
* trace (optionally)

Interface :

* Core : native driver

Software :

As the main purpose is to store flat datas it's more suitable to use a document oriented database (NoSQL) but a more traditional relational database can be used also.
Potential database management system options, contingent on open source licensing requirements.

* Relational database : MySQL (GPLv2) / PostgreSQL (PostgreSQL License) / SQLite (Public domain)
* Non relational database : MongoDB (AGPLv3) / Elasticsearch (Apache license 2)

## Scheduler

The Scheduler element is a form of software "middleware" that distributes the files to be checked across the conformance checkers by using a message broker interface. It translates the file data into one unified language for access within all aspects of the software.

The scheduler can take care of priority for the conformance checkers :
* high : for checks requested by user
* normal : for automated checks
* low : for periodical checks

* distributes files
* translates file data into unified language
* batch processing
* priority

Interface :

* Core : Advanced Message Queuing Protocol
* Checkers : Advanced Message Queuing Protocol

Software :

RabbitMQ (MPL 1.1) / Gearman (BSD) / ZeroMQ (LGPL v3)

## Files listener

The Files listener is a background process that listens for new files available for validating. Each time a new file is available or if a file is modified an event is sent to the Core which automatically request a check.

Different solutions can be implemented depending of the files storage and operating system : inotify notification system API for a Linux kernel, kqueue/kevent for a BSD kernel or files directory scanning.

* Automated checks

Programming language : C++

## Conformance Checker and Metadata Grabbing Module

This module can utilize one or more checkers for each media type. As the conformance checker process could be very long, we use an asynchronous system based on messaging system to not lock the system. Metadata and conformance check result are send back to the Core to be stored in the database.

* runs the conformance tests for the different type of media files
* grabs metadata (used for policy checking)

See [Checker Architecture](CheckerArchitecture.md) for more details.

Interface :

* Scheduler : Advanced Message Queuing Protocol

Programming language : C++ for MediaArea, depends on other participants for JPEG 2000, TIFF, PDF.

## Policy checker

The policy checker run tests on metadata grabbed by the conformance checker and metadata grabbing module (the Checker).

* runs the policy tests for the different type of media files.

Interface :

* Core : REST API

Programming language : C++

## Reporter

Within the user interfaces are ways to export raw metadata and human-readable JSON/XML.

* exports a machine readable report, including preservation metadata for each file checked
* exports a report that allows external software agents to further process the file
* exports a human readable report
* exports a "fool-proof" report which also indicates what should be done to fix the non-conformances

The machine readable report will be produced using a standard XML format, implemented by all conformance checkers in the PreForm ecosystem. This allows the reported module to combine output from multiple checker components in one report. The report will be based on a standard output format that will be made by the consortium.

The human readable report summarizes the preservation status of a batch of files as a whole, reporting to a non-expert audience whether a file is compliant with the standard specifications, and addressing improvements in the creation/digitisation process

Interface :

* Core : REST API

Programming language :

* CLI : C++

* GUI : C++ / Qt (LGPLv3+)

* Web : PHP/Symfony (MIT)

## User interface

This is the shell component to allow interaction between users (or other systems) and the PreForma components :

* displays test results
* control the Core
* allows metadata (descriptive and structural) to be edited
* edit configuration (periodical checks, policy checker, user rights)

PreForma MediaInfo will provide three different options for a human interface for maximum flexibility. These three interfaces are:

- CLI (Command line interface)

    A command line interface will be functional on nearly all kinds of operating systems, including those with very little graphical interface support. It allows for integration into a batch-mode processing workflow for analyzing files at scale.
    It's more intendeed for expert users and for non human interaction.

- GUI (Graphical user interface)

    Provide a graphical interface for expert and non-expert users
    The GUI, being based on Qt, has the strength of being versatile between operating systems and does not require additional development time to provide support for multiple platforms.

- Web UI (server/client)

    Provide an optional web based graphical interface for expert and non-expert users. An internet access is not needed, only local network access.
    The web interface will provide access to conformance checks without software installation.


Interface :

* Core : REST API

Programming language :

* CLI : C++

* GUI : C++ / Qt (LGPLv3+)

* Web : PHP/Symfony (MIT)

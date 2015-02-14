# PreForma Global Architecture

## Architecture schema
![Global Architecture Schema](./GlobalArchitecture.png)

## Common to all elements

All elements can be installed on the same server or on different servers, depending on the expected workload.

## Core

The Core is the main service and runs in a passive, background mode.

* controls the checkers and manages data for the User Interface
* waits for commands from new files daemon and User Interface
* send commands to the scheduler for files checking
* communicates with the database to store and retrieve data from the checkers

Interface :

* Scheduler : AMQP
* Policy checker / User Interface / DIRECT : REST API
* Database : native driver

Programming language : C++

## Database

* store metadata and results of the conformance checker
* store the policy checker rules
* user rights management

Interface :

* Core : native driver

Software :

Potential database management system options, contingent on open source licensing requirements.

* Relational database : MySQL (GPLv2) / PostgreSQL (PostgreSQL License) / SQLite (Public domain)
* Non relational database : MongoDB (AGPLv3) / Elasticsearch (Apache license 2)

## Scheduler

The Scheduler element is a form of software "middleware" that distributes the files to be checked across the conformance checkers by using a message broker interface. It translates the file data into one unified language for access within all aspects of the software.

* distributes files

Interface :

* Core : AMQP
* Checkers : AMQP

Software : 

RabbitMQ (MPL 1.1) / Gearman (BSD) / ZeroMQ (LGPL v3)

## New Files Daemon

The New Files Daemon is a background process that listen for new files available for validating. Use inotify notification system API for Linux kernel or kqueue/kevent for BSD kernel.

Programming language : C++

## Conformance Checker and Metadata Grabbing Module

The Conformance Checker and Metadata Grabbing Module This module can utilize one or more checkers for each media type.

As the conformance checker could be very long we use an asynchronous system based on messaging system to not lock the system.

Metadata and conformance check result are send back to the Core to be stored in the database.

* runs the conformance tests for the different type of media files.
* grabs metadata (used for policy checking).

See [Software Architecture](SoftwareArchitecture.md) for more details.

Interface :

* Scheduler : AMQP

Programming language : C++ for MediaArea, depends on other participants for JPEG 2000, TIFF, PDF.

## Policy checker

Run the policy tests for the different type of media files.

The policy checker run tests on metadata grabbed by the conformance checker and metadata grabbing module.

Interface :

* Core : REST API

Programming language : C++

## User Interface

Display test results and control the Core

Allow metadata (descriptive and structural) to be edited

Interface :

* Core : REST API

Programming language :

* CLI : C++

* GUI : C++ / Qt (LGPLv3+)

* Web : PHP/Symfony (MIT)


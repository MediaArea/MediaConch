# PreForma Global Architecture

## Architecture schema
![Global Architecture Schema](./GlobalArchitecture.png)

## Common to all elements

All elements can be installed on the same server or on different servers, depending on the expected workload.

## Core

Main service, in background, control the checkers and manage data for the User Interface.

Wait for commands from new files daemon and User Interface, send commands to the scheduler for files checking.

Communicate with the database to store and retrieve datas from the checkers.

Interface :

* Scheduler : AMQP

* Policy checker / User Interface / DIRECT : REST API

* Database : native driver

Programming language : C++

## Database

Store metadata and results of the conformance checker.

Store the policy checker rules.

User rights management

Interface :

* Core : native driver

Software :

* Relational database : MySQL (GPLv2) / PostgreSQL (PostgreSQL License) / SQLite (Public domain)

* Non relational database : MongoDB (AGPLv3) / Elasticsearch (Apache license 2)

## Scheduler

Distribute the files to be checked across the conformance checkers by using a message broker interface.

Interface :

* Core : AMQP

* Checkers : AMQP

Software : RabbitMQ (MPL 1.1) / Gearman (BSD) / ZeroMQ (LGPL v3)

## New files daemon

Background process that listen for news files available for validating. Use inotify notification system API for Linux kernel or kqueue/kevent for BSD kernel.

Programming language : C++

## Conformance checker and metadata grabbing module

Run the conformance tests for the different type of media files.

It can be one or more checkers for each media type.

As the conformance checker could be very long we use an asynchronous system based on messaging system to not lock the system.

Conformance checker also grab metadata (used for policy checking).

Metadata and conformance check result are send back to the Core to be stored in the database.

See "Conformance checker architectural layers" paragraph for more details

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


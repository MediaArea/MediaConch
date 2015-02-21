# PreForma MediaInfo
# Technical and Architecturual Report

Project Acronym: PREFORMA

Grant Agreement number: 619568

Project Title: PREservation FORMAts for culture information/e-archives

Prepared by: MediaArea.net SARL

  - Jérôme Martinez
  - Dave Rice
  - Tessa Fallon
  - Ashley Blewer
  - Erik Piil
  - Guillaume Roques

Prepared for:

Date: February 28, 2015

Licensed under: Creative Commons CC-BY v4.0

Summary: 

<!-- toc -->

# Introduction to Architecture

This is a roadmap for the technical components of the project, split into two categories: Global architecture and Checker architecture. The global architecture schema defines the context in which the PreFormaMediaInfo software is situated and gives a high-level understanding of the software. The Checker Architecture details the structural components of the conformance checker and metadata-grabbing module.

The conformance checker's goals are based on the following core principles:

### Portability

The checker has the capability to be packaged and run as an executible on a computer running any common operating system. For this reason, the shell has plans to be integrated into three platforms: Command line, graphical user interface, and web-based (server-client) platform. Qt was chosen as the core toolkit for the development of the graphical user interface because of its flexibility and ability to be deployed across many different operating system platforms.

add about web UI working on 3 major clients (FF, Chrome, IE)

### Scalability

Similar to the way in which MediaInfo can be built and expanded upon in archival institutions to perform media analysis at scale, the conformance checker can be integrated into scripts and systems that can validate files en masse and deliver computer-readable and human-readable metadata.

Each component may be used on separate computer

### Distribution

The source code will reside on Github for easy access and distribution during all stages of development, including the ability to extract nightly builds and deploy using continuous integration. The software can then be built on any platform.

### Modularity

MediaArea plans to collaborate with the other PREFORMA teams to support optimal interoperability with each other as well as with third-party developers of additional conformance checkers that will utilize the conformance checker shells. The checker's API allows for the checker to be integrated alongside other components and the future development of plug-in features.

Provided in C++ but is able to be compatible with other language
"bindings" to other language
C, C++, Python, Java, C#, 

### Deployment

The shell will be deployed on the PREFORMA website, as a stand alone shell, networked with other PREFORMA shells currently in development, and in test environments. Due to the levels of interoperability set up as an integral component of the conformance checker, it can be utilized within legacy systems as well as future systems.

### Interoperability

MediaArea's API will allow for the full integration and interoperability between all software systems.


## Global Architecture

This includes the following:

* Technical specifications
* Open source conformance compliancy
* Relationships between frameworks
* Framework traversal patterns

This is broken down by category and the categories are as follows:

* Common Elements
* Core
* Database
* Scheduler
* New file daemon
* Conformance checker and metadata grabbing module
* Policy Checker
* Reporter
* Shell(s)
** CLI (Command line interface)
** GUI (Graphical user interface)
** Web (Web based interface)

## Checker Architecture

This includes the following:

* Technical specifications
* Relationships between each structural component
* Relationships between plugins

This is broken down by category and the categories are as follows:

* Transport interface
* Container/wrapper implementation
* Container/wrapper demuxer
* Stream/essence implementation
* Stream/essence decoder (through plugin)
* Stream/container coherency check
* Baseband analyzer (optional, through plugin)

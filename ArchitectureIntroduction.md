# PreForma MediaInfo
# Technical and Architectural Report

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

This serves as a roadmap for the technical components of the project, split into two categories: Global architecture and Checker architecture. The global architecture schema defines the context in which the PreFormaMediaInfo software is situated and gives a high-level understanding of the software. The Checker Architecture details the structural components of the implementation checker and metadata-grabbing module.

The implementation checker's goals are based on the following core principles:

### Portability

The checker has the capability to be packaged and run as an executable on a computer running any common operating system. For this reason, the shell has plans to be integrated into three platforms: Command line, graphical user interface, and a web-based (server-client) platform. Qt was chosen as the core toolkit for the development of the graphical user interface because of its flexibility and ability to be deployed across many different operating system platforms.
 
The developed software will also have the capability to function as a micro-service application alongside other digital preservation systems defined by the OAIS Reference Model, such as Archivematica. With its micro-service approach, Archivematica serves as a wrapper for related task-specific software and is an open source system that also works to maintain standards based on providing access to digital collections. The implementation checker suits this systems’ design as an integrated micro-service suite, allowing for it to run alongside other third-party software tools that also serve to process digital objects and help to standardize a preservation focused ingest-to-access workflow. Within this design, various micro-services, including the implementation checker, can be built together into customized workflows and deployed across all operating systems and platforms.
 
As the shell will be developed to integrate into and perform within a web-based platform, the web user interface (UI) will function across 3 major web-based browsers. These platforms are to include Firefox, Google Chrome, and Internet Explorer.  The software’s UI and capabilities will function similarly across all of these relevant web-based environments.

### Scalability

Similar to the way in which MediaInfo can be built and expanded upon in archival institutions to perform media analysis at scale, the implementation checker can be integrated into scripts and systems that can validate files en masse and deliver computer-readable and human-readable metadata via standard XML reports.

The scalability of each built component of the implementation checker will allow the software to scale horizontally throughout multiple computers and servers in order to potentially meet a heavy and increased workload. The software can be deployed on more computers for added speed, dexterity and reliability, distributing and partitioning tasks to a cluster of machines in order to improve performance and increase the working capacity of the software. Built within this architecture, the implementation checker can be expanded upon and integrated into various workflow environments with the added ability to increase its number of file requests.

### Distribution

The source code will reside on an open development platform (Github) in order to provide easy access and distribution during all stages of development. It will also have the ability to extract nightly builds of the code and deploy using continuous integration. The subsequent builds and software releases can then be downloaded, built and run on any system.

### Modularity

MediaArea plans to collaborate with the other PREFORMA teams to support optimal interoperability with each other as well as with third-party developers of additional implementation checkers that will utilize the implementation checker shells. The checker's API allows for the checker to be integrated alongside other components and the future development of plug-in features. The architecture’s modularity will also allow the software’s features ongoing and improved maintenance as well as offering reliability as a freestanding shell.
 
The open source project will be programmed and provided in C++ but will be functionally compatible with other programming languages through the use of bindings. Other than C++, the team will support bindings to C, Python, Java, C# and other languages upon open request and feedback. The bindings will function as wrappers to allow the original code to be explicitly used and supported within other common languages. Supporting this capability will allow the API to be fully integrated within the open source community with the full potential of interoperability.

### Deployment

The shell will be deployed on the PREFORMA website, as a stand alone shell, networked with other PREFORMA shells currently in development and used within test environments. Due to the levels of interoperability set up as an integral component of the implementation checker, it can be utilized within legacy systems as well as future systems. The shell will also be released to run on all relevant deployment platforms, implying that any user will be able to download and operate the most up-to-date version of the implementation checker.

### Interoperability

MediaArea's API will allow for the full integration and interoperability between all software systems. The API will be developed to operate between the targeted systems while offering the ability to run and behave similarly across each, whether the user is operating within MS Windows, Mac OSX, or Linux distributions.
 
To enable growth within an open source environment, it is essential for the API and all corresponding data structures and software releases to be able to comply to and function within an interoperable architecture across different deployment platforms and software systems. System-to-system interoperability can be enhanced to meet user’s potential needs, and the implementation checker’s API will help implement an effective exchange and integration of the required data and information. This integration will suit other software and will work across whichever system the user is running the software. The implementation checker’s shell will also operate within legacy and future systems.

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
* implementation checker and metadata grabbing module
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
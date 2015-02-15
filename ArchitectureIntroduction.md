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

This is a roadmap for the technical components of the project.

## Global Architecture

The global architecture schema defines the context in which the PreFormaMediaInfo software is situated and gives a high-level understanding of the software.

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
* User Interface(s)
** CLI (Command line interface)
** GUI (Graphical user interface)
** Web (Web based interface)

## Checker Architecture

The Checker Architecture details the structural components of the conformance checker and metadata-grabbing module.

* Transport interface
* Container/wrapper implementation
* Container/wrapper demuxer
* Stream/essence implementation
* Stream/essence decoder
* Stream/container coherency check
* Baseband analyzer

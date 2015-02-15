# PreForma MediaInfo
# Appendix: Conformace Check Registry and Expression Snapshot

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


## Checker Design: Conformance and Coherency

Conformance checks for both container formats (such as Matroska) and streams (such as LPCM and FFV1) shall be defined, registered, and associated with the code that performs the check. PreForma MediaInfo will perform and report on a growing list of tests per format. Many of these tests will be derived directly from the specifications or standard documents of a given file format, but other tests will derive from expected patterns and structural incoherency. Some checks focus on coherency between a stream and a container (such as if the container and stream utilize contradictory aspect ratios).

These checks shall have logical cause and effect or conditional relationships and shall be documented by the citation of external standards documentation or by the project’s own research and development. MediaArea plans to provide guidance for user communities to develop and explain their own ruleset in shareable form. An XML schema for conformance definition is provided. MediaArea’s development of conformance and policy checkers will involve several categories of tests. In addition to supporting conformity checks and logical interpretation of selected file formats, there is user desire for checks performed based on internal or institutional policy that are not necessarily embedded in the file format technical specifications. A PreForma MediaArea 'shell' shall be able to load multiple sets of conformity/coherency rulesets so that users may select which rulesets they choose to adhere to as well as create their own.

Conformance and coherency rulesets specifically targeting specification compliance of FFV1, Matroska, and LPCM are currently under development.

The Conformance Check Registry defines the basis of how a conformance check may be expressed. MediaArea proposes developing online resources that define checks and relate them to sample files, associated code, rationale, potential responses and community discussion. The Conformance Check Registry provides a basis on how information on the implementation checks themselves can be communicated to users.

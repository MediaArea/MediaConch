---
layout: default
permalink: documentation/HowToUse.html
title: "Documentation: How To Use"
---

#How To Use

##Checker
- [Check local file](#check-local-file)
- [Check online file](#check-online-file)
- [Check local folder](#check-local-folder)
- [Reporting](#reporting)
- [Policy Report](#policy-report)
- [Implementation Report](#implementation-report)
- [MediaInfo Report](#mediainfo-report)
- [MediaTrace Report](#mediatrace-report)
- [Exporting Reports](#exporting-reports)

##Policies
- [Type](#type)
- [Field](#field) 
- [Occurrence](#occurrence)
- [Validator](#validator)
- [Value](#value)
- [Invalid Text](#invalid-text)
- [Editor and Free Text Mode](#editor-and-free-text-mode)

MediaConch currently consists of two main sections, "Checker" and "Policies." 

##Checker

In the "Checker" section, files may be checked for conformance using policies defined by the user. A user may choose from either an existing policy in MediaConch or from an imported XSLT or Schematron policy file. 

###Check local file

“Check local file” allows a user to select a file or files from a local computer. A user may choose from either an existing policy in MediaConch or  from an imported XSLT or Schematron policy file. Policies will be run when selecting the "Check files" button.

Example: /Users/mycomputer/mediafiles/ffv1.mkv

###Check online file

“Check online file” allows a user to select a file using a URL path. A user may choose from either an existing policy in MediaConch or  from an imported XSLT or Schematron policy file. Please note that this feature supports HTTP/HTTPS/FTP/FTPS application protocols. Policies will be run when selecting the "Check files" button.

Example: http://www.mywebsite.com/media/ffv1.mkv

###Check local folder

“Check local folder” allows a user to select a folder of files from a local computer or volume. A user may choose from either an existing policy in MediaConch or  from an imported XSLT or Schematron policy file. Policies will be run when selecting the "Check files" button.

Example: /Users/mycomputer/mediafiles/ 

###Reporting

Once a file or files are “checked,” several conformance checking reports are generated. These reports are made viewable by clicking on the “eye” icon next to each report, where, in ”View Mode,” a report is overlaid onto the GUI for review. 

###Policy Report

A policy report will declare whether a particular file is either VALID or NOT VALID according to the prescribed policy test. A file will only be considered VALID if all rules and asserts are found to be true. When declared not valid, a text-based Policy Report (File_PolicyReport.txt) will list all non-valid rules and asserts. 

For example, a line from a policy report states the following non-valid rule:

/MediaArea/media/MediaInfo line 10: General Format must be Matroska.

In this instance, the file failed the stated rule that the “Format” field found in the General or container metadata stream should be “Matroska.” 

###Implementation Report

An implementation report will declare whether a particular file is either VALID or NOT VALID according to the specifications of Matroska, FFV1, and LPCM. Currently, a text-based Implementation Report (File_ConformanceReport.txt) will list a general readout of container and video streams, including whether a required field has either passed or failed specification:

###MediaInfo Report

A MediaInfo report features a general readout of a file’s metadata information in XML format. 

###MediaTrace Report

A MediaTrace report features a verbose readout of a file’s metadata information in XML format. 

User Note: When opening MediaTrace in View Mode, offsets will be addressed in hexadecimal, or “hex” notation. This differs from the MediaTrace XML output, which addresses offset in decimal notation. 

###Exporting Reports

Reports can be downloaded by either clicking on the down arrow (↓) found directly to the right of each report, or by clicking on the “Download” button located at the bottom right of each report in View Mode. 

User Note: When switching from Checker to Policies, any analysis results will be discarded. An alert will prompt the user as a reminder to export all reports before the changeover. 

##Policies

In the "Policies" section, a user can create policy tests as well as import previously generated policy sets in either XSL or Schematron format. 

Policy sets consist of individual rules and asserts. A policy may contain one or more rules, and rules may consist of one or more asserts. Rules and asserts typically contain a metadata field (e.g., “Format”), that field’s associated metadata stream type (e.g., “General), a validator (e.g., “is_equal), and a desired value (e.g., “Matroska”). Rules and asserts are automatically saved during creation, but may be duplicated or deleted by the user using the associated buttons on each rule/assert window. 

For example, the following rule/assert would ensure that all reported files must contain a frame rate associated with the NTSC broadcast standard:

Type: General
Field: FrameRate
Validator: Equal
Value: 29.970

###Type

Allows a user to select from a list of available metadata stream types. These streams include General, Video, Audio, Image, Text, Menu, or Other. 

###Field

Allows a user to select from a list of associated fields. Fields vary according to what type of metadata stream is selected. 

###Occurrence

Allows a user to select whether a rule or assert occurs more than once in reportage. 

###Validator

Validators, such as is_true; is_equal; is_not_equal; is_greater than; is_less_than; is_greater_or_equal_than; is_less_or_equal_than; exists; does_not_exist; contains_string.

is_true: 

Example: Audio/ID is_true

is_equal:

Example: General/Format is_equal to Matroska

is_not_equal: 

Example: General/Format is_not_equal to MPEG-4

is_greater than:

Example: General/Duration is_greater_than 1 mn

is_less_than:

Example: Audio/Channels is_less_than 2 Channels

is_greater_or_equal_than:

Example: Video/FrameCount is_greater_or_equal_than 1

is_less_or_equal_than:

Example: Video/FrameRate is_less_or_equal_than 29.970

exists:

Example: Video/Width_Original exists

does_not_exist: 

Example: Video/Width_CleanAperture does_not_exist

contains_string:

Example: General/CompleteName contains_string ffv1

###Value

Allows a  user may select a desired value . 

User note: When creating a value, do not include any associated strings (e.g., "pixels"). 

###Invalid Text

Invalid text allows a user to provide a value in the event that there is not enough context for a pass/fail assert. 

###Editor and Free Text mode

Policies can be edited in either Editor or Free Text mode. An example of Free Text mode includes the following:

track[@type='General']/FileExtension = 'mkv'

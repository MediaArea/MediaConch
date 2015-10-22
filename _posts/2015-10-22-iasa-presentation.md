---
layout: default
title:  "MediaConch at IASA"
date:   2015-10-22 08:00:00 CET
categories: mediaconch standardization
---

# The MediaConch Presentation at IASA

In late September, Herman Lewetz of the [Österreichische Mediathek](http://www.mediathek.at/) presented a paper on behalf of the MediaArea team at the International Association of Sound and Audiovisual Archives (IASA) [46th Annual Conference](http://2015.iasa-web.org/) in Paris. The presentation focused on ongoing standardization efforts and archival adoption of Matroska and FFV1 and detailed the components of the [MediaConch](https://mediaarea.net/MediaConch/) development project and [PREFORMA](http://preforma-project.eu/)'s vision and structure for the project. The paper was warmly received and in response to requests for the paper to be made available we are reprinting here.
Thanks,
Dave Rice

## Introduction

Hello, I am Herman Lewetz of the Österreich Mediathek. I am presenting this paper on behalf of MediaArea’s project for PREFORMA. Jerome Martinez had a baby on Friday and is unable to be here. Both Dave Rice and Ashley Blewer were also scheduled to be here but for various reasons are unable to attend the conference in person, so you have me. Normally Dave Rice prepares for a presentation by making some notes on the back of the programme before making things up at the podium or Ashley Blewer assembles slides of animated gifs and Taylor Swift lyrics while relating it to archival subjects. Since they are unable to be here, they have accomplished a first in their professional careers and planned out a presentation ahead of time.

## PREFORMA

[PREFORMA](http://preforma-project.eu/) is an abbreviation of PREservation FORMAts for culture information/e-archives. The PREFORMA project began on January 1st, 2014 and is a Pre-Commercial Procurement project co-funded by the European Commission under its FP7-ICT Programme. The aim of the project is to address the challenge of implementing good quality standardised file formats for preserving data content in the long term. The main objective is to give memory institutions full control over the process of analyzing, checking, repairing, and reporting on files as ingested into and managed by archives.

In early 2014, the PREFORMA Consortium designed the framework of the project including their guiding document called the Challenge Brief and selected key open file formats to focus on throughout the project. These file formats included: PDF/A, TIFF, JPEG2000, FFV1, Matroska, and PCM audio. After a competitive application process, six suppliers were selected to participate in a design phase to create plans for the development of open source software to target these file formats. This software would include conformance checkers, implementation checkers, metadata fixers, and reporters to enable comprehensive levels of control over these file formats. The designed project also requires collaboration with memory institutions, standards bodies, and end users while also creating libraries of test files and documentation. Eventually three suppliers were selected to move forward with a two-year development project timeframe.

### veraPDF

Focusing on the PDF/A document file format, the VeraPDF Consortium, led by the Open Preservation Foundation and the PDF Association aims to create definitive conformance checking software for PDF/A-1, PDF/A-2 and PDF/A-3. Their work can be followed at [verapdf.org](https://verapdf.org/).

### DPF Manager

Focusing on the TIFF image container, Easy Innova is developing DPF Manager, designed to help archivists and digital content producers ensure that TIFF files are fit for long term preservation by automatically suggesting improvements and correct preservation issues. The team developing DPF Manager has decades of experience working with image formats and digital preservation, and has leveraged the support of 60+ memory institutions to draft a new ISO standard proposal (TIFF/A) specifically designed for long term preservation of still-images. Their work may be found at [https://www.dpfmanager.org](http://dpfmanager.org/).

### MediaConch

[MediaConch](https://mediaarea.net/MediaConch/), a shortening of Media CONformance CHecker,  is developed by [MediaArea](http://mediaarea.net/). The team is comprised of Jerome Martinez (the leader of MediaArea), Guillaume Roques, Ashley Blewer, Tessa Fallon, Florent Tribouilloy, Erik Piil, and Dave Rice.

MediaArea is best known for the open source application [MediaInfo](https://mediaarea.net/en/MediaInfo), which parses and decodes audiovisual files in order to comprehensively report on its technical aspects. MediaInfo supports the analysis of individual files or batches of files to report in metadata standards such as PBCore, EBUCore, and MPEG-7. MediaInfo can also report on one or many media files in text, XML, csv, or be configured to output mediainfo according to a user-designed template. Demonstrating its breadth of use, in 2014 MediaInfo had 4,000 downloads per day. MediaInfo is often advised as the first tool to use when a file is not playable, allowing the user to identify characteristics that would lead to usability, finding an appropriate playback or transcoding tool. 

For the PREFORMA project, MediaArea’s new effort, MediaConch, is the audiovisual component of the project and focuses on three formats, specifically Matroska, Linear Pulse Code Modulation (LPCM) and FF Video Codec 1 (FFV1). MediaConch intends to provide tools, documentation and an environment to better enable memory institutions to have thorough control over these formats. MediaConch shall provide detailed and batch-level conformance checking via an adaptable and flexible application program interface accessible by the command line, a graphical user interface, or a web-based shell. The MediaArea team is also dedicated to the further development of the standardization of the Matroska and FFV1 formats to ensure their longevity as a recommended digital preservation file format.

## Profile of the Formats

### Matroska

[Matroska](http://matroska.org/) is a open-licensed audiovisual container format with extensive and flexible features and an active user community. The format is supported by an existing set of core utilities for manipulating and assessing Matroska files, such as mkvtoolnix and mkvalidator. As an open format, Matroska is widely supported in hardware and software including out-of-the-box support in Windows 10, VLC, XBox One, and PlayStation 4.

Matroska is based on [EBML](https://github.com/Matroska-Org/ebml-specification), Extensible Binary Meta Language. An EBML file is comprised of one of many defined “Elements”. Each element is comprised of an identifier, a value that notes the size of the element’s data payload, and the data payload itself. The data payload can either be stored data or more nested elements. The top level elements of Matroska focus on track definition, chapters, attachment management, metadata tags, and encapsulation of audiovisual data. The Matroska element is analogous to QuickTime’s atom and AVI’s chunk structures.
Matroska integrates a flexible and semantically comprehensive hierarchical metadata structure as well as digital preservation features such as the ability to provide Cyclic Redundancy Check (CRC) checksums internally per selected elements. Because of its ability to use internal, regional CRC protection it is possible to update a Matroska file itself during OAIS events without any compromise to the fixity of its audiovisual payload.

Matroska has well written documentation and a draft specification but is not defined through an external standards organization although some drafts for such work have already been produced.

### FFV1

[FFV1](http://ffmpeg.org/~michael/ffv1.html) is an efficient lossless video stream that is designed in a manner responsive to the requirements of digital preservation. Version 3 of this lossless codec is highly self-descriptive and stores its own information regarding field dominance, aspect ratio, and colorspace so that it is not reliant on a container format to store this information. Other streams that rely heavily on its container for technical description often face interoperability challenges.

FFV1 version 3 stores CRCs in frame headers to allow verification of the encoded data and stores error status messages. FFV1 version 3 is also a very flexible codec allowing adjustments to the encoding process based on different priorities such as size efficiency, data resilience, or encoding speed.

With frame CRCs, an archivist is able to determine exactly which frame is affected by any error of digital storage. As a multithreaded codec, FFV1 frames may be slices into components to be encoded or decoded as distributed across the multiple processors of a computer. This multithreading support allows FFV1 to achieve speeds far greater than other lossless video codecs. Additionally FFV1 allows CRC at the slice level too. This feature enables an FFV1 decoder to conceal the specific damaged slice of a frame by substituting the corresponding slice of the previous frame. The decode can still log all CRC mismatches but with sliceCRC the damage may be effectively concealed as well as each frame may be documented by up to 31 individual CRC checksums.

### PCM

PCM is uncompressed audio. It is actually the simplest format to test since nearly all possible data streams can be considered PCM audio. 

## Standardization

MediaArea’s proposal for the PREFORMA project noted that the challenge of developing conformance checkers for Matroska and FFV1 was limited because of the state of the existing specifications for Matroska and FFV1. In order to facilitate strengthening the specification for the purposes of disclosure, transparency, and strengthening adoption, the MediaArea team proposed to include efforts to collaborate with user communities, the format authors, and open standards organizations to work towards and form community around standardization efforts. After getting permission from the format authors of Matroska and FFV1, MediaArea published an initial standardization plan.

As several standards organizations were considered, it was important to gain feedback on the process from several stakeholder communities. These discussions informed MediaArea’s decision to approach the [Internet Engineering Task Force](http://ietf.org/), or IETF, which appeared the most appropriate for the project needs as well as the needs of our communities. The PREFORMA project is designed with significant emphasis and mandate on an open source approach, including not only the licensing requirements of the results, but also a working environment that promotes disclosure, transparency, participation, and oversight. The IETF subscribes to these same ideals; the standards documents are freely and easily available without restrictive licensing and much of the procedure behind the standardization is open to research and review.

The IETF also strives to promote involvement and participation; their recent conferences include IRC channels, audio stream, video streams per meeting and an assigned IRC channel representative to facilitate communication between the room and virtual attendees. In addition to these attributes, the format communities involved (Matroska, FFmpeg, and libav) were already familiar with the IETF from earlier and ongoing efforts to standardize open audiovisual formats such as Opus, Ogg, VP8, and Daala. Through an early discovery process MediaArea gathered the requirements and qualities needed in a successful standardization process for Matroska and FFV1 from memory institutions, format authors, format implementation communities, and related technical communities. From here MediaArea assessed standards bodies according to traits such as disclosure, transparency, open participation, and freedom in licensing, confirming that IETF is the most appropriate venue for standardizing Matroska and FFV1 for preservation use.

As the coordinator of standardization efforts within the project, Tessa Fallon addressed a session of the Dispatch Working Group to present a proposal for the standardization of Matroska and FFV1 standardization at the July 2015 IETF93 conference in Prague. After soliciting additional input and feedback from IETF members and the development communities, Tessa proposed a working group charter under consideration that encompasses FFV1, Matroska, and FLAC. If accepted, this will provide a venue for the ongoing standardization work on these formats towards the specific goals of the charter.

Work on the Matroska specification has been quite active. The specification of the underlying binary XML format, EBML, has been under a new phase of development. Currently plans are forming for the design and standardization of the next version of Matroska. This was the subject of an unconference meeting last weekend at the Videolan Developer Days conference in Paris. Participants at the conference included Dave Rice, representing the PREFORMA project, and Steve Lhome, the Matroska association Chairman. Also present were representatives from YouTube, Google, FFmpeg, broadcast vendors, and developers to discuss the current state and future of Matroska standardization and development. The goals for the development of Matroska focus on enabling self-description and comprehensiveness for media whether coming from the worlds of broadcast video or computer video. Features currently under discussion include self-descriptive labelling for color matrices and sample ranges (such as broadcast versus full range). Additional discussions cover designing methods to handle legacy timecode systems, closed captioning and teletext, storage of VANC and VBI data, as well as management of newer HDR formats and virtual reality immersive video. Whereas FFV1 can fulfill a role of being a lossless video encoding, with continued efforts Matroska may play the role of a “lossless” container by storing and contextualizing all the ancillary data and presentational context that surrounds audiovisual data.

## MediaConch Components

MediaConch, as its related projects VeraPDF and DPF Manager, will be comprised of four components: a implementation checker, a policy checker, a metadata fixer, and a reporter. These are integrated into a shell component which handles scheduling, batch processing, and automation. Software developed within the project is required to be released under GPLv3+ and MPLv2+ open source license with documentation and test files released under Creative Commons CC-BY 4.0 licenses.

### Implementation Checker

For each supported format (Matroska, FFV1, and LPCM), an implementation checker will assess compliance and/or deviation between files through a series of adherence checks that are written by dissecting rules and logic from each format’s underlying specifications, including rules that may be deduced or inferred from a close reading of the specification or related authoritative documentation. MediaArea has drafted registries of conformance rules within the PREFORMA design phase and plans to collaborate with each format’s specification communities to refine them.

For streams such as FFV1, implementation checks may be performed frame-by-frame to discover frame-specific issues such as CRC (checksum) mismatches, invalid frame headers, slice incoherency or incomplete frames.

MediaArea has drafted a registry of metadata elements to be used in the description an implementation check, which provides unique identifier, the scope, and underlying rationale and authority for the check. Code created to perform checks is internally documented with references to conformance check’s unique identifiers, so that MediaArea may create resources for each conformance check that relate the identity of the check, its underlying authority, sample files, associated code, and user forums.

The implementation checker's goals are based on the following core principles: applicability, portability, scalability, distribution, modularity, deployment, and interoperability.

At the central of the implementation checker is a new MediaArea technical report called MediaTrace. MediaTrace provides a structure to detail all aspects of a parsed file format within a hierarchical XML format that clusters data into blocks with byte offsets, labels and any additional provided context. MediaTrace provides an efficient method of documenting the architecture of digital media for audiovisual files in their entirety. The MediaConch implementation checker documents checks within XSL documents that may be applied to the MediaTrace report in order to produce reporting about file conformity in an approachable XML-based language.

### Policy checker

Within the policy checker the user shall be able to comprehensively and conditionally apply policy checks to one or many files. The policy checker may be used to assess vendor deliverables, consistency in digitisation efforts, obsolescence or quality monitoring, in order to better control and manage digital preservation collections. The policy checker can test for specific traits within Matroska and FFV1, but because it is based on MediaInfo’s primary demuxing and decoding library, the policy checker may be applied to any set of audiovisual data to verify compliance to user-defined policies on traits such as frame size, codec properties, embedded metadata, or other significant characteristics.

### Metadata Fixer

MediaArea is producing a fixer that allows for editing Matroska files. Enabling this function will be performed with a substantial amount of caution as in some cases a user could use it to change a file considered a preservation master. The fixer will support assessing a file first to determine the risk of editing a structurally unhealthy file and provide suitable levels of warning to the user. The metadata fixer shall support both direct editing on the input file (with warning) or producing a new output file as a copy that the metadata change as requested.

### Reporter

The Reporter portion of the conformance checker presents human and machine-readable information related to implementation and policy checks, metadata fixes, check statistics, conformance priorities, and other associated session documentation. This information is derived from the database and multiple component project APIs, passed through the PREFORMA core and finally combined and transformed into a desired output. Several output formats allow for external software agents to further process this reportage. 

## CLI / GUI / MCO

MediaArea is simultaneously developing MediaConch in three forms: a command line application, a graphical user interface, and an online version that may be deployed on a hosted server or locally. Additionally MediaArea has a strong focus on cross-platform support with simultaneous releases and nightly builds available for Mac, Windows, and many forms of Linux.

## What’s Next

MediaArea anticipates a major release of MediaConch in late October as PREFORMA enters a re-design phase to evaluate and test the current states of our work before proceeding next year on a focused second round of development. MediaArea is eager to find collaborators, testers, and community to participate in, oversee, and use the results of the project. MediaConch has become well-integrated into MediaArea’s other software efforts and the development of this work anticipates that MediaArea will continue to develop support for other audiovisual file formats after the PREFORMA phase of the project has concluded next year.

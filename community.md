---
layout: default
permalink: /community.html
title: "MediaConch Community"
---

## Standardization of Formats

MediaArea proposes that the PREFORMA project may facilitate the standardization of featured file formats that face a documentation or standardization gap. A standardization effort will result in the development of conformance checkers that are more authoritative, stable, and credible. This plan is based upon MediaArea's research drawn from past audiovisual standardization efforts, related open source communiites, and standards organization.

The priorities here are largely focused on archival sustainability factors:

* Ensuring that complete, authoritative, open and accessible documentation is available
* Credibility
* Transparency

The goal of the PREFORMA project is to address the challenge of implementing good quality standardised file formats for preserving data content in the long term. Our objective in regards to standardization FFV1 and Matroska is to improve the sustainability factors for both formats including disclosure, credibility, and transparency while also creating a mechanism to clarify, authoritatively, the intent of the specifications. After careful research into past IETF work (in particular Daala and Opus), we are planning to prepare FFV1 and Matroska for submission to the IETF.

Following the establishment of informational standards, we would coordinate a community driven effort to contribute to the development of version 4 of Matroska and FFV1 and submission of the results through more formal and vetted IETF standardization procedures.

### About Matroska

Matroska is a open-licensed audiovisual container format with extensive and flexible features and an active user community. The format is supported by a set of core utilities for manipulating and assessing Matroska files, such as mkvtoolnix and mkvalidator.

Matroska is based on EBML, Extensible Binary Meta Language. An EBML file is comprised of one of many defined "Elements". Each element is comprised of an identifier, a value that notes the size of the element's data payload, and the data payload itself. The data payload can either be stored data or more nested elements. The top level elements of Matroska focus on track definition, chapters, attachment management, metadata tags, and encapsulation of audiovisual data. The Matroska element is analogous to QuickTime's atom and AVI's chunk.

Matroska integrates a flexible and semantically comprehensive hierarchical metadata structure as well as digital preservation features such as the ability to provide Cyclic Redundancy Check (CRC) checksums internally per selected elements. Because of its ability to use internal, regional CRC protection it is possible to update a Matroska file during OAIS events without any compromise to the fixity of its audiovisual payload.

Matroska has well written documentation and a draft specification but is not defined through an external standards organization although some drafts for such work have already been produced.

### Matroska Standardization

Work on Matroska is coordinated through [GitHub](https://github.com/Matroska-Org/ebml-specification) and the [Matroska.org devel mailing list](http://lists.matroska.org/cgi-bin/mailman/listinfo/matroska-devel). 

### About FFV1

FFV1 is an efficient lossless video stream that is designed in a manner responsive to the requirements of digital preservation. Version 3 of this lossless codec is highly self-descriptive and stores its own information regarding field dominance, aspect ratio, and colorspace so that it is not reliant on a container format to store this information. Other streams that rely heavily on its container for technical description often face interoperability challenges.

FFV1 version 3 mandates storage of CRCs in frame headers to allow verification of the encoded data and stores error status messages. FFV1 version 3 is also a very flexible codec allowing adjustments to the encoding process based on different priorities such as size efficiency, data resilience, or encoding speed.

The specification documentation for FFV1 is partially complete and has recently been funded by vendors utilizing FFV1 as a codec for audiovisual preservation and large-scale digitisation efforts.

### FFV1 Standardization

Work on FFV1 is coordinated through the [GitHub](https://github.com/MediaArea/FFV1) and the [ffmpeg-devel mailing list](http://ffmpeg.org/mailman/listinfo/ffmpeg-devel).

### About LPCM

Linear Pulse Code Modulation (LPCM) is a ubiquitous and simple audio stream. PCM audio streams may be comprised of signed or unsigned samples, arranged in little-endian or big-endian arrangements, in any number of audio channels. PCM is very flexible but is not self-descriptive. A raw PCM file can not properly be decoded without knowing the sample encoding, channel count, endianness, bit depth, and sample rate. LPCM is typically dependent on its container format (such as WAV) to store sufficient metadata for its decoding.

Because PCM streams contain only audio samples without any codec structure or metadata within the stream, any data by itself could be considered valid PCM and decoded as audio. Determining the conformity or technical health of PCM data requires the context of information provided by its container format. 

## Community Interviews

In December 2014, MediaArea started conducting interviews with FFV1, Matroska, and LPCM stakeholders in order to collect feedback and insights from the archives community. To date, interviews have been conducted with:
<ul>
  <li><a href="/interviews/InterviewLewetzBubestinger.html">Hermann Lewetz, Peter Bubestinger; Österreichische Mediathek</a>
    </li>
  <li><a href="/interviews/InterviewHenderson.html">Ian Henderson; UK National Archives</a>
    </li>
  <li><a href="/interviews/InterviewKummer.html">Christophe Kummer; NOA</a>
    </li>
  <li><a href="/interviews/InterviewBlood.html">George Blood; George Blood, L.P.</a>
    </li>
</ul>

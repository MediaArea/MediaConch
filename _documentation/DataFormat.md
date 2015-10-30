---
layout: default
permalink: documentation/DataFormat.html
title: "Documentation: Data Format"
---

# XML Reporting

This document describes four XML schemas designed by MediaArea for various types of file reportage. These schemas include the MediaInfo XML, the MediaConch XML, the MediaTrace XML, and the MediaAreaXML (MAXML). Brief descriptions of structure and operation can be found below. 

#### [MediaInfo XML](#mediainfo-xml)
- [Structure of a MediaInfo XML](#structure-of-a-mediainfo-xml)
- [Generating a MediaInfo XML](#generating-a-mediainfo-xml)
- [MediaInfo XML Schema](#mediainfo-xml-schema)

#### [MediaConch XML](#mediaconch-xml)
- [Structure of a MediaConch XML](#structure-of-a-mediaconch-xml)
- [Generating a MediaConch XML](#generating-a-mediaconch-xml)
- [MediaConch XML Schema](#mediaconch-xml-schema)

#### [MediaTrace XML](#mediatrace-xml)
- [Structure of a MediaTrace XML](#structure-of-a-mediatrace-xml)
- [Generating a MediaTrace XML](#generating-a-mediatrace-xml)
- [MediaTrace XML Schema](#mediatrace-xml-schema)

#### [MediaArea XML](#mediaarea-xml)
- [Structure of a MediaArea XML](#structure-of-a-mediaarea-xml)
- [Generating a MediaArea XML](#generating-a-mediaarea-xml)
- [MediaArea XML Schema](#mediaarea-xml-schema)

### MediaInfo XML

Using MediaArea’s principal software, MediaInfo, the MediaInfo XML presents a file’s basic metadata elements in the form of easily intelligible sets of track and stream information. These track types may include but are not limited to, “General,” or general container information; “Video” track or stream information; “Audio” track or stream information; and “Timecode” or other ancillary information. Additional information on MediaInfo general reporting is available [here](https://mediaarea.net/en/MediaInfo).

#### Structure of A MediaInfo XML

The root element of the MediaInfo XML exists as `<Mediainfo>`. A nested `<File>` sub-element containing a `ref` attribute specifies the path and filename of the file reported on. A `<track type>` child element defines MediaInfo's track types, and within `<track type>` elements are various sub-child elements corresponding to associated field metadata. For example, a "General" track type element will include such sibling elements as `<CompleteName>`, `<Format>`, and `<FileSize>`; a "Video" track type element will include such sibling elements as `<Width>`, <Height>, and <PixelAspectRatio>; an "Audio" track type element will include such sibling elements as `<Channels>`, `<SamplingRate>`, and `<SamplingCount>`; and so on, and so forth. 

The following is an example of a MediaInfo XML General type track element containing the sub-child elements "Format," "Format_profile," and "Codec_ID": 

        <track type="General">
		<Complete_name>/Users/mycomputer//files/ffv1.mkv</Complete_name>
		<Format>MPEG-4</Format>
		<Format_profile>QuickTime</Format_profile>
		<Codec_ID>qt</Codec_ID>
		</track>`

#### Generating a MediaInfo XML

A MediaInfo XML can be generated using the following tools and associated commands:

- With MediaInfo: `mediainfo --Output=XML file.mov`

- With MediaConch (CLI): `mediaconch -mi -fx file.mov`

- With MediaConch (GUI): Select View Mode in the `MediaInfo` tab from the resulting file Checker reports

#### MediaInfo XML Schema

An XML Schema for MediaAreaXML is available at . 

### MediaConch XML

The MediaConch XML is designed specifically for file conformance checking using MediaArea’s MediaConch software, and contains reportage pertaining to a user-defined policy or policies. Additional information on MediaConch is available [here](https://mediaarea.net/MediaConch/).

#### Structure of a MediaConch XML

The root element of the MediaConch XML exists as `<MediaConch>`, and initially contains a `<policyChecks>` element which encapsulates all policy rules. The `<title>` element denotes the title of the policy, while the `<media>` element contains the checked filename its associated path:

        <?xml version="1.0" encoding="UTF-8"?>
		<MediaConch xmlns="https://mediaarea.net/mediaconch" xmlns:mi="https://mediaarea.net/mediainfo" version="0.1">`
		<policyChecks>
		<title>Preservation Master File Recommendations - Matroska/FFV1</title>
		<media ref="/Users/mycomputer//files/ffv1.mkv">`

Within the <policyChecks> element are individual <policy> rules that contain the name of the policy rule, the associated track type and field, a user-declared value, the reported or “actual” value, and a “pass” or “fail” outcome:

	<policy title="General Format equals Matroska">
	<context field="Format" value="Matroska"/>
	<test tracktype="General" actual="Matroska" outcome="pass"/>
	</policy>

#### Generating a MediaConch XML

A MediaConch XML can be generated using the following tools and associated commands:

-With MediaConch (CLI): `mediaconch -mi -fx file.mov`

-With MediaConch (GUI): Select View Mode in the `Policy Report` tab from the resulting file Checker reports

#### MediaConch XML Schema

An XML Schema for MediaAreaXML is available at [url](url). 

### MediaTrace XML

The MediaTrace XML is a technical reporting tool that expresses the binary architecture of a file as interpreted by MediaArea’s principal software, MediaInfo. Additional information on MediaTrace is available [here](https://mediaarea.net/mediatrace/). A data dictionary is provided at the project’s Github repository [here](https://github.com/MediaArea/MediaAreaXml/blob/master/DataDictionary.md). 

### Structure of a MediaTrace XML

The root element of the MediaTrace XML exists as <MediaTrace>. This root element contains a `<creatingLibrary>` sub-element denoting the version of MediaInfo’s library used in generating the trace report:

	<MediaTrace
    xmlns="https://mediaarea.net/mediatrace"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="https://mediaarea.net/mediatrace https://mediaarea.net/mediatrace/mediatrace_0_1.xsd"
    version="0.1"
    ref="/Users/mycomputer//files/ffv1.mkv">
	<creatingLibrary version="0.7.78" url="https://mediaarea.net/MediaInfo">MediaInfoLib</creatingLibrary>`

Many audiovisual formats are based on chunk-based storage where a block of data will either contain a data payload or other blocks. In QuickTime parlance these blocks are called atoms, in AVI “chunks”, and in Matroska, “elements”. MediaTrace will attempt to parse apart each block into subdivisions and report on their contents. Whether the source format specification calls it element, atom, chunk, or another term, MediaTrace will call it a `<block>`. In MediaTrace the contents of the block are called `<data>`:

        <block offset="28" name="DocType" info="matroska" size="11">
            <block offset="28" name="Header" size="3">
                <data offset="28" name="Name">642</data>
                <data offset="30" name="Size">8</data>
            </block>
            <data offset="31" name="Data">matroska</data>
         </block>`

#### Generating a MediaTrace XML

A MediaTrace XML can be generated using the following tools and associated commands:

-With MediaInfo: `mediainfo --Details=1 --Output=XML file.mkv`

-With MediaConch (CLI): `mediaconch -mt -fx file.mkv`

-With MediaConch (GUI): Select Select View Mode in the `MediaTrace` tab from the resulting file Checker reports

#### MediaTrace XML Schema

An XML Schema for MediaTrace is available at https://mediaarea.net/mediatrace/mediatrace.xsd. 

### MediaArea XML 

The MediaArea XML (MAXML) is designed to bundle general reporting information from MediaInfo, binary file architecture reporting from MediaTrace, and conformance checking information from MediaConch into one condensed XML structure. 

#### Structure of a MediaArea XML

The root element of the MediaArea XML is `<MediaArea>`, followed by a `<media>` sibling element. A `<MediaInfo>` child element defines a MediaInfo general report. Sibling `<track type>` elements offer various sub-child elements corresponding to associated field metadata. 

#### Generating a MediaArea XML

A MediaTrace XML can be generated using the following tools and associated commands:

-With MediaInfo: `mediainfo --Details=1 --Output=MAXML file.mkv`

-With MediaConch (CLI): `mediaconch -mt -fx file.mkv`

#### MediaArea XML Schema

An XML Schema for MediaAreaXML is available at https://mediaarea.net/mediaarea/mediaarea_0_1.xsd.




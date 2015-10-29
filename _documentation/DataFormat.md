---
layout: default
permalink: documentation/DataFormat.html
title: "Documentation: Data Format"
---

# Data Format

This document describes four MediaArea XML schemas for file reporting. These schemas include the MediaConch XML, the MediaInfo XML, the MediaTrace XML, and the MediaAreaXML (MAXML). 

#### [MediaInfo XML](#mediainfo-xml)
- [Description](#description)
- [Structure](#structure)
- [Generating a MediaInfo XML](#generating-a-mediainfo-xml)
- [Schema](#schema)

#### [MediaConch XML](#mediaconch-xml)
- [Description](#description)
- [Structure](#structure)
- [Generating a MediaConch XML](#generating-a-mediaconch-xml)
- [Schema](#schema)

#### [MediaTrace XML](#mediatrace-xml)

- [Description](#description)
- [Structure](#structure)
- [Generating a MediaTrace XML](#generating-a-mediatrace-xml)
- [Schema](#schema)

#### [MediaArea XML](#mediaarea-xml)

- [Description](#description)
- [Structure](#structure)
- [Generating a MediaArea XML](#generating-a-mediaarea-xml)
- [Schema](#schema)

### MediaInfo XML

#### Description

MediaInfo XML is a reporting tool that 

Additional information on MediaInfo is available [here](https://mediaarea.net/en/MediaInfo).

#### Structure

The root element of the MediaInfo XML is `<Mediainfo>`. This element contains a nested `<File>` sub-element, which includes a `ref` attribute specifying the path and filename of the file reported on. A `<track type>` child element defines MediaInfo's track types (General, Video, Audio, etc.), and within `<track type>` elements are various sub-child elements corresponding to associated field metadata. For example, a "General" track type element will include such sibling elements as `<CompleteName>`, `<Format>`, and `<FileSize>`; a "Video" track type element will include such sibling elements as `<Width>`, <Height>, and <PixelAspectRatio>; an "Audio" track type element will include such sibling elements as `<Channels>`, `<SamplingRate>`, and `<SamplingCount>`; and so on, and so forth. 

Here's an example of a MediaInfo XML General type track element containing the sub-child elements "Format," "Format_profile," and "Codec_ID": 

`<track type="General">`
`<Complete_name>/Users/mycomputer//files/ffv1.mkv</Complete_name>`
`<Format>MPEG-4</Format>`
`<Format_profile>QuickTime</Format_profile>`
`<Codec_ID>qt</Codec_ID>`
`</track>`

#### Generating a MediaInfo XML

A MediaInfo XML can be generated using the following tools and commands:

- With MediaInfo: `mediainfo --Output=XML file.mov`

- With MediaConch (CLI): `mediaconch -mi -fx file.mov`

- With MediaConch (GUI): Select View Mode in the `MediaInfo` tab from the resulting file Checker reports

#### Schema

An XML Schema for MediaAreaXML is available at . 

### MediaConch XML

#### Summary

The MediaConch XML 

Additional information on MediaConch is available [here](https://mediaarea.net/MediaConch/).

#### Description

The root element of the MediaConch XML is `<MediaConch>`, followed by a <policyChecks> element which encapsulates individual policy rules. The `<title>` element denotes the title of the policy, while the `<media>` element contains the checked filename its associated path:

`<?xml version="1.0" encoding="UTF-8"?>`
`<MediaConch xmlns="https://mediaarea.net/mediaconch" xmlns:mi="https://mediaarea.net/mediainfo" version="0.1">`
`<policyChecks>`
`<title>Preservation Master File Recommendations - Matroska/FFV1</title>`
`<media ref="/Users/mycomputer//files/ffv1.mkv">`

Within the <policyChecks> element are individual <policy> rules that contain the name of the policy rule, the associated track type and field, a user-declared value, the reported or “actual” value, and a “pass” or “fail” outcome:

`<policy title="General Format equals Matroska">`
`<context field="Format" value="Matroska"/>`
`<test tracktype="General" actual="Matroska" outcome="pass"/>`
`</policy>`

#### Generating a MediaConch XML

A MediaConch XML can be generated using the following tools and commands:

-With MediaConch (CLI): `mediaconch -mi -fx file.mov`

-With MediaConch (GUI): Select View Mode in the `Policy Report` tab from the resulting file Checker reports

#### Schema

An XML Schema for MediaAreaXML is available at . 

### MediaTrace XML

#### Description

The MediaTrace XML is a technical reporting tool that expresses the binary architecture of a file as interpreted by MediaArea’s principal software, MediaInfo. 

Additional information on MediaTrace is available [here](https://mediaarea.net/mediatrace/).

### Structure

The root element of the MediaTrace XML is <MediaTrace>, followed by a <creatingLibrary> sibling element denoting the version of MediaInfo’s library used in generating the trace:

`<MediaTrace
    xmlns="https://mediaarea.net/mediatrace"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="https://mediaarea.net/mediatrace https://mediaarea.net/mediatrace/mediatrace_0_1.xsd"
    version="0.1"
    ref="/Users/mycomputer//files/ffv1.mkv">
<creatingLibrary version="0.7.78" url="https://mediaarea.net/MediaInfo">MediaInfoLib</creatingLibrary>`

Many audiovisual formats are based on chunk-based storage where a block of data will either contain a data payload or other blocks. In QuickTime parlance these blocks are called atoms, in AVI “chunks”, and in Matroska, “elements”. MediaTrace will attempt to parse apart each block into subdivisions and report on their contents. Whether the source format specification calls it element, atom, chunk, or another term, MediaTrace will call it a `<block>`. In MediaTrace the contents of the block are called `<data>`:

        `<block offset="28" name="DocType" info="matroska" size="11">
            <block offset="28" name="Header" size="3">
                <data offset="28" name="Name">642</data>
                <data offset="30" name="Size">8</data>
            </block>
            <data offset="31" name="Data">matroska</data>
        `</block>`

#### Generating a MediaTrace XML

A MediaTrace XML can be generated using the following tools and commands:

-With MediaInfo: `mediainfo --Details=1 --Output=XML file.mov`

-With MediaConch (CLI): `mediaconch -tt -fx file.mov`

-With MediaConch (GUI): Select Select View Mode in the `MediaTrace` tab from the resulting file Checker reports

#### Schema

An XML Schema for MediaTrace is available at https://mediaarea.net/mediatrace/mediatrace.xsd. Additionally, a data dictionary is provided at DataDictionary.md. The development history for both the XML Schema and data dictionary are available at Github.

### MediaArea XML 

#### Description

The MediaArea XML (MAXML) incorporates MediaInfo’s general reporting information, MediaConch's conformance checking, and MediaTrace’s binary architecture reporting into one condensed XML structure. 

#### Structure

The root element of the MediaArea XML is `<MediaArea>`, followed by a `<media>` sibling element. A `<MediaInfo>` child element defines a MediaInfo general report. Sibling `<track type>` elements offer various sub-child elements corresponding to associated field metadata. 

#### Generating a MediaArea XML

A MediaTrace XML can be generated using the following tools and commands:

-With MediaInfo: `mediainfo --Details=1 --Output=MAXML file.mov`

-With MediaConch (CLI): `mediaconch`

#### Schema

An XML Schema for MediaAreaXML is available at https://mediaarea.net/mediaarea/mediaarea_0_1.xsd.


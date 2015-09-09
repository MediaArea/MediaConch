---
layout: default
title:  "Announcing MediaTrace!"
date:   2015-09-08 21:27:48
categories: mediatrace
---

# Announcing MediaTrace
### A Comprehensive Architecture Report for AudioVisual Data

## What is MediaTrace?

MediaInfo is pleased to announce the first public release of MediaTrace, a new reporting feature for documenting the structure and contents of digital files with a particular concentration on audiovisual data. A complementary tool of MediaInfo that summarizes a file's significant characteristics, MediaTrace offers comprehensive documentation of file information in a powerful XML format for precision identification and conformance checking.

Most audiovisual formats are based on a hierarchical series of blocks of data, such as 'chunks' in AVI, 'atoms' in QuickTime, and 'elements' in Matroska. These blocks are reported in MediaTrace with the contents parsed and reported as discrete values as `<data>`. The `<block>` and `<data>` elements are then further contextualized with attributes that include data offset, size, as well as any information determined from a file format's associated specification documents. 
	
Here's an example of MediaTrace using transfer characteristic information found in a Digital Moving Picture Exchange (DPX) file. In MediaInfo's general XML readout, a user is able to discern that the image encoding of this specific file is "Linear":

```xml
<colour_primaries>Linear</colour_primaries>
```

In MediaTrace, the same information is expressed with an associated data offset (801, placing it squarely in DPX's Image Information Header), name ("Transfer characteristic"), and data value ("2", the code value for "Linear"), as referenced in SMPTE's S268M-2003 specification for DPX v2.0.

```xml
<data offset="801" name="Transfer characteristic" info="Linear">2</data>
```

Here's another MediaTrace example highlighting QuickTime's Pixel Aspect Ratio atom. This trace includes the atom's four-character code ("pasp"), as well as values related to the horizontal and vertical spacing of pixels (10 and 11, respectively). The ratio of hSpacing to vSpacing corresponds to a 4:3, non-square 525 (NTSC) pixel aspect ratio as defined by QuickTime's file format specifications. 

```xml
<block offset="2481264006" name="Pixel Aspect Ratio" size="16">
    <block offset="2481264006" name="Header" size="8">
        <data offset="2481264006" name="Size">16</data>
        <data offset="2481264010" name="Name">pasp</data>
    </block>
    <data offset="2481264014" name="hSpacing">10</data>
    <data offset="2481264018" name="vSpacing">11</data>
</block>
```

Instructions for the creation of MediaTrace reports may be found at the [MediaTrace namespace](https://mediaarea.net/mediatrace/). The development history and issue tracker are at [GitHub](https://github.com/MediaArea/MediaTrace). The MediaTrace format is documented by both an [XML Schema](https://mediaarea.net/mediatrace/mediatrace.xsd) and a [Data Dictionary](https://github.com/MediaArea/MediaTrace/blob/master/DataDictionary.md).

MediaTrace has been developed by [MediaArea](https://mediaarea.net) with collaboration with the [Museum of Modern Art](https://www.moma.org). MediaTrace is also developed as part of the [MediaConch](https://mediaarea.net/MediaConch/), a [PREFORMA](http://preforma-project.eu/) project, where it serves an integral role of communicating the architectural data of digital media for the purposes of conformance checking. 

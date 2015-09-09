---
layout: default
title:  "Annoucing MediaTrace!"
date:   2015-09-08 21:27:48
categories: mediatrace
---

# Announcing MediaTrace
### A Comprehensive Architecture Report for AudioVisual Data

## What is MediaTrace?

MediaInfo is pleased to promote the first public release of MediaTrace, a new reporting format for documenting the structure and contents of digital files with particular optimizations for audiovisual files. While MediaInfo's default report aims to summarize a file's significant characteristics from information gathered from a file assessment; MediaTrace aims to document the full assessment itself. The MediaTrace report is designed to present a file structure generically so that the same reporting structure may be applied to AVI, QuickTime, MXF, Matroska, and any other file format.

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
A breakdown of the QuickTime pasp atom's storage of pixel aspect ratio.

Most audiovisual formats are based on a hierarchical series of blocks of data; for instance, 'chunks' in AVI, 'atoms' in QuickTime, and 'elements' in Matroska. Each chunk is reported as a `<block>` in MediaTrace with the contents parsed and reported as discrete values as `<data>`. The `<block>` and `<data>` elements of MediaTrace are then contextualized with attributes which provide its data offset and size as well as its name as can best be determined from associated specification documents. The comprehensiveness of MediaTrace enables highly precise testing. This allows for advanced file format policy checks or conformance testing to occur via an XSLT or XPATH query processed against the MediaTrace XML.

```xml
<block offset="2481264062" name="Color Parameter" size="18">
    <block offset="2481264062" name="Header" size="8">
        <data offset="2481264062" name="Size">18</data>
        <data offset="2481264066" name="Name">colr</data>
    </block>
    <data offset="2481264070" name="Color parameter type">nclc</data>
    <data offset="2481264074" name="Primaries index" moreinfo="BT.601 NTSC">6</data>
    <data offset="2481264076" name="Transfer function index" moreinfo="BT.709">1</data>
    <data offset="2481264078" name="Matrix index" moreinfo="BT.601">6</data>
</block>
```
Presenting a QuickTime colr atom.

## Resources

Instructions for the creation of MediaTrace reports may be found at the [MediaTrace namespace](https://mediaarea.net/mediatrace/). The development history and issue tracker are at [GitHub](https://github.com/MediaArea/MediaTrace). The MediaTrace format is documented by both an [XML Schema](https://mediaarea.net/mediatrace/mediatrace.xsd) and a [Data Dictionary](https://github.com/MediaArea/MediaTrace/blob/master/DataDictionary.md).

## Credits

MediaTrace has been developed by [MediaArea](https://mediaarea.net) with collaboration with the [Museum of Modern Art](https://www.moma.org). MediaTrace is also developed as part of the [MediaConch](https://mediaarea.net/MediaConch/), a [PREFORMA](http://preforma-project.eu/) project, where it serves an integral role of communicating the architectural data of digital media for the purposes of conformance checking. 

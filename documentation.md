---
layout: default
permalink: /documentation.html
title: "Documentation"
---

# MediaConch Documentation

MediaArea's MediaConch strives to offer access and ease to users with a structure that operates similarly and efficiently cross-platform and functions in both an online and offline capacity within different interfaces.

[Command Line Interface](#command-line-interface)
[Graphical User Interface](#graphical-user-interface)
[MediaConchOnline](#mediaconchonline)

## Shells

The core infrastructure of MediaConch scales to work on three different platforms, or shells: a command line interface, a graphical user interface, and a web interface. Each shell will coordinate the actions of the implementation checker, policy checker, reporter and fixer.

### Schematron

Schematron is an [ISO/IEC Standard](http://standards.iso.org/ittf/PubliclyAvailableStandards/index.html) (ISO/IEC 19757-3:2006) for rule-based validation. Schematron can be thought of as a series of tests for structured XML. MediaConch and other PREFORMA projects use Schematron files to express policy rules for checking file conformance according to desired specifications.

Schematron patterns are based on rules of assertions or reports. An assertion seeks to pair a file's XPath with the expected answer and passes if the statement is true. A report is the opposite: it checks for if the test statement is true and raises an error.

Schematron sample:
{% highlight xml %}
    <sch:pattern name="Each file has unique ID">
        <sch:rule context="/Mediainfo/File">
            <sch:assert test="track[@type='General']/UniqueID">Unique ID must exist.</sch:assert>
        </sch:rule>
    </sch:pattern>
{% endhighlight %}

In the above example, the Schematron pattern checks one or multiple Mediainfo File XML for UniqueIDs in the General track. If the XML (and thus, the file being analysized) lacks a UniqueID, an assertion error will be raised: "Unique ID must exist."

Schematron also allows for the testing of ranges. 

{% highlight xml %}
  <sch:pattern name="Duration must be 1 second">
    <sch:rule context="/Mediainfo/File">
      <sch:assert test="(track[@type='General']/Duration &gt; 500 and track[@type='General']/Duration &lt; 5000)">Duration must be more than 500ms and less than 5 seconds.</sch:assert>
    </sch:rule>
  </sch:pattern>
{% endhighlight %}

In the above example, the Schematron pattern checks that files fall within a specific range of compliance. In this example, the file must be longer than half a second but less than five seconds. Any file with a duration in this range will validate.

Schematron validation can be tested using [xmllint](http://xmlsoft.org/xmllint.html) via the command line or [Oxygen XML Editor](http://www.oxygenxml.com/) via graphical user interface. Future releases of MediaConch will have schematron validation built in.

## Command Line Interface

A command line interface will be functional on nearly all types of operating systems and platforms, including those with very little graphical interface support. CLI use allows for integration into a batch-mode processing workflow for analyzing files at scale. This interface is more intended for technical and expert users and for non-human interaction.

### File information retrieval

After installation, MediaConch can be run on the command line by using the `mediaconch` command. Although MediaConch will result information about nearly any audiovisual file, it is specifically optimized for Matroska, FFV1, and/or PCM files.

`mediaconch --Tool=Info FileName` will print to the screen the most recent MediaInfo output.

`mediaconch --Tool=Info --Format=XML FileName` will print to the screen the most recent MediaInfo output in XML format.

`mediaconch -ti -fx FileName` is shorthand for the above command.

`mediaconch --Tool=Trace FileName` will print to the screen the most recent MediaInfo trace output.

`mediaconch --Tool=Trace --Format=XML FileName` will print to the screen the most recent MediaInfo trace output in XML. This XML format is undergoing early development and not suitable for use in production.

`mediaconch -tt -fx FileName` is shorthand for the above command.

### Policy Checker

In addition to checking files for conformance at a basic level, MediaConch is developing a policy checker that allows archives, museums, and other memory institutions to create their own policies to which files should comply. Policy checker schemas can check to verify that files fall into parameters specific to the institution or collection. The policy checker can limit files to a range, require that files have video and audio streams, or conform to a broadcast standard like PAL.

To test a media file against an existing Schematron policy document, use the following syntax:
`mediaconch -ti -fx FileName -s SchematronDocument`

## Graphical User Interface

A Graphical user interface (GUI) is available for both expert and non-expert users. The GUI, being based on Qt, has the strength of being versatile between operating systems and does not require additional development time to provide support for multiple platforms. The GUI can function similarly across all deployment platforms.

After installing the GUI, it should look like this when opened:

![Opening MediaConch GUI](/images/MediaConchGUI.png){: .center-image }

Media files can be dragged-and-dropped into the program or can be selected via File > Open and opening a video that way.

Schematron files can be imported into MediaConch as well, either through clicking on the Schematron tab or by importing a Schematron under the Policies tab. Schematron-based policies can also be created under the Policies tab and used on media files or exported for later use.

![MediaConch GUI Schematron](/images/MediaConchGUI2.png){: .center-image }

## MediaConchOnline

A web-based user interface (UI) is available for both expert and non-expert users. The web interface will provide access to conformance checks without having to directly download and install the software.




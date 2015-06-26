# Demo for MediaConch version 15.06

## 15.06 Release Notes

This release of MediaConch CLI builds on the development of MediaInfo 0.7.74 and the previous MediaConch release. It includes a file parser, conformance checker, and XML structure export. MediaConch is intended for use on Matroska, FFV1, and/or PCM files.

New to this release is the ability to check files against Schematron documents for policy-based file conformance checking. Instructions and files for initially testing this phase of development are below.


## MediaConch CLI version 15.06

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


### Schematron

Schematron is an [ISO/IEC Standard](http://standards.iso.org/ittf/PubliclyAvailableStandards/index.html) (ISO/IEC 19757-3:2006) for rule-based validation. Schematron can be thought of as a series of tests for structured XML. MediaConch and other PREFORMA projects use Schematron files to express policy rules for checking file conformance according to desired specifications.

Schematron patterns are based on rules of assertions or reports. An assertion seeks to pair a file's XPath with the expected answer and passes if the statement is true. A report is the opposite: it checks for if the test statement is true and raises an error.

Schematron sample:
```xml
    <sch:pattern name="Each file has unique ID">
        <sch:rule context="/Mediainfo/File">
            <sch:assert test="track[@type='General']/UniqueID">Unique ID must exist.</sch:assert>
        </sch:rule>
    </sch:pattern>
```

In the above example, the Schematron pattern checks one or multiple Mediainfo File XML for UniqueIDs in the General track. If the XML (and thus, the file being analysized) lacks a UniqueID, an assertion error will be raised: "Unique ID must exist."

Schematron also allows for the testing of ranges. 

```xml
  <sch:pattern name="Duration must be 1 second">
    <sch:rule context="/Mediainfo/File">
      <sch:assert test="(track[@type='General']/Duration &gt; 500 and track[@type='General']/Duration &lt; 5000)">Duration must be more than 500ms and less than 5 seconds.</sch:assert>
    </sch:rule>
  </sch:pattern>
```

In the above example, the Schematron pattern checks that files fall within a specific range of compliance. In this example, the file must be longer than half a second but less than five seconds. Any file with a duration in this range will validate.

Schematron validation can be tested using [xmllint](http://xmlsoft.org/xmllint.html) via the command line or [Oxygen XML Editor](http://www.oxygenxml.com/) via graphical user interface. Future releases of MediaConch will have schematron validation built in.

### Testing

For all tests, sample video files have been provided. For the first two tests, the FFmpeg command to create the files are provided as well.

Each test series includes XML created using the MediaConch CLI and Schematron files used to test against the XML. 

#### Test 0: General conformance

Files: 
Test0.mkv -- This is a normal file with associated passing Schematron.

Create a file:
`ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 1 -t 1 Test0.mkv`

[Schematron for file](Files/Test0.sch)
This policy checks that the file follows general rules of file conformance, such as the extension being mkv, the file including a video stream, and the file having a unique ID. It also checks for assertions specific to this file, such as the duration being 1 second, the frame rate being 25 frames per second, and the coder type being Golomb Rice.

To gather technical metadata with mediaconch run:

`mediaconch -ti -fx Test0.mkv -s Test0.sch`


#### Test 1: Conflicting tests

Files:
Test1.mkv -- This file has a PAL framesize but an NTSC rate, so testing for one standard or another will both cause a failure.

Create a file:
`ffmpeg -f lavfi -i testsrc=s=720x576:r=30000/1001 -t 1 -c:v ffv1 -g 1 -level 3 Test1.mkv`

Create associated XML:
`mediaconch -ti -fx Test1.mkv > Test1.xml`

[Schematron for PAL](Files/Test1_pal.sch)
This policy checks all files for a framesize of 720 x 576 and a framerate of 25.

[Schematron for NTSC](Files/Test1_ntsc.sch)
This policy checks all files for a framesize of 720 x 480 and a framerate of 29.970.

Testing each policy:

`mediaconch -ti -fx Test1.mkv -s Test1_ntsc.sch`

`mediaconch -ti -fx Test1.mkv -s Test1_pal.sch`

Testing one file against multiple policies:

`mediaconch -ti -fx Test1.mkv -s Test1_ntsc.sch -s Test1_pal.sch`


#### Test 2: Testing multiple files

Files:
Files are identical copies except Test2_2.mkv has had two bytes (value of 0000) removed and Test2_3.mkv is a copy of Test2_2.mkv with the two bytes replaced after copying.

Create files:
(Files provided).

[Schematron for multiple files](Files/Test2.sch)
This policy checks all the files for conformance. Test2_2.mkv and Test2_3.mkv fail because they have been manipulated, but they fail in different ways.

Testing many files against a policy document:

`mediaconch -ti -fx Test2_0.mkv Test2_1.mkv Test2_2.mkv Test2_3.mkv -s Test2.sch`

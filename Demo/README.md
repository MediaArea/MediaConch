# Demo for MediaConch CLI version 15.05

## 15.05 Release Notes

This initial release of MediaConch CLI builds on the development of MediaInfo 0.7.73

The priority for this release is the development of a file parser, conformance checker, and XML structure export. MediaConch is intended for use on Matroska, FFV1, and/or PCM files.

Forthcoming releases of MediaConch CLI and MediaConch Online will allow for the creation of and uploading of Schematron documents to facilitate file conformance checking. Instructions and files for initially testing this phase of development are below.


## File information retrieval

After installation, MediaConch can be run on the command line by using the `mediaconch` command. Although MediaConch will result information about nearly any audiovisual file, it is specifically optimized for Matroska, FFV1, and/or PCM files.

`mediaconch --Tool=Info FileName` will print to the screen the most recent MediaInfo output.

`mediaconch --Tool=Info --Format=XML FileName` will print to the screen the most recent MediaInfo output in XML format.

`mediaconch -ti -fx FileName` is shorthand for the above command and will print to the screen the associated XML with the file.

`mediaconch --Tool=Trace FileName` will print to the screen the most recent MediaInfo trace output.

`mediaconch --Tool=Trace --Format=XML FileName` will print to the screen the most recent MediaInfo trace output in XML. This XML format is undergoing early development and not suitable for use in production.

`mediaconch -tt -fx FileName` is shorthand for the above command.

## Policy Checker

In addition to checking files for conformance at a basic level, MediaConch is developing a policy checker that allows archives, museums, and other memory institutions to create their own policies to which files should conform. Policy checker schemas can check to verify that files fall into parameters specific to the institution or collection. The policy checker can limit files to a range, require that files have video and audio streams, or conform to a broadcast standard like PAL.


## Schematron

Schematron is an [ISO/IEC Standard](http://standards.iso.org/ittf/PubliclyAvailableStandards/index.html) (ISO/IEC 19757-3:2006) for rule-based validation. Schematron can be thought of as a series of tests for structured XML. MediaConch and other PREFORMA projects use Schematron files to express policy rules for checking file conformance according to desired specifications.

Schematron patterns are based on rules of assertions or reports. An assertion seeks to pair a file's XPath with the expected answer and passes if the statement is true. A report is the opposite: it checks for if the test statement is true and raises an error.

Schematron validation can be tested using [Oxygen XML Editor](http://www.oxygenxml.com/) or [Probatron](http://www.probatron.org/).

## Testing

For all tests, sample video files have been provided. For the first two tests, the FFmpeg command to create the files are provided as well.

Each test series includes XML created using the MediaConch CLI and Schematron files used to test against the XML. 

### Test 0

Files: 
Test0.mkv -- This is a normal file with associated passing Schematron.

Create a file:
`ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 1 -t 1 Test0.mkv`

Create associated XML:
`mediaconch -ti -fx Test0.mkv > Test0.xml`

[Schematron for file](Files/Test0.sch)
This policy checks that the file follows general rules of file conformance, such as the extension being mkv, the file including a video stream, and the file having a unique ID. It also checks for assertions specific to this file, such as the duration being 1 second, the frame rate being 25 frames per second, and the coder type being Golomb Rice.

### Test 1:

Files:
Test1.mkv -- This file has a PAL framesize but an NTSC rate, so testing for one standard or another will both cause a failure.

Create a file:
`ffmpeg -f lavfi -i testsrc=s=720x576:r=30000/1001 -t 1 -c:v ffv1 -g 1 -level 3 Test1.mkv`

Create associated XML:
`mediaconch -ti -fx Test1.mkv > Test1.xml`

[Schematron for PAL](Files/Test1_pal.sch)
This policy checks all files for a framesize of 720 × 576 and a framerate of 25.

[Schematron for NTSC](Files/Test1_ntsc.sch)
This policy checks all files for a framesize of 720 × 480 and a framerate of 29.970.

### Test 2: Testing multiple files

Files:
Files are identical copies except Test2_2.mkv has had two bytes (value of 0000) removed and Test2_3.mkv is a copy of Test2_2.mkv with the two bytes replaced after copying.

Create files:
(Files provided).

Create associated XML:
`mediaconch -ti -fx Test2_0.mkv Test2_1.mkv Test2_2.mkv Test2_3.mkv > Test2.xml`

[Schematron for multiple files](Files/Test2.sch)
This policy checks all the files for conformance. Test2_2.mkv and Test2_3.mkv fail because they have been manipulated, but they fail in different ways.

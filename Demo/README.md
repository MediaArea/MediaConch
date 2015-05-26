# Demo for MediaConch CLI version 15.05

## File information retrieval

After installation, MediaConch can be run on the command line by using the `mediaconch` command. Although MediaConch will result information about nearly any audiovisual file, it is specifically optimized for Matroska, FFV1, and/or PCM files.

`mediaconch --Tool=Info FileName` will print to the screen the most recent MediaInfo output.

`mediaconch --Tool=Info --Format=XML FileName` will print to the screen the most recent MediaInfo output in XML format.

`mediaconch -ti -fx FileName` will shorthand for the above and will print to the screen the associated XML with the file.

`mediaconch --Tool=Trace FileName` will print to the screen the most recent MediaInfo trace output.

`mediaconch --Tool=Trace --Format=XML FileName` will print to the screen the most recent MediaInfo trace output in XML. This XML format is undergoing early development and not suitable for use in production.

`mediaconch -tt -fx FileName` is shorthand for the above command.

## Policy Checker


## Schematron

Schematron is an [ISO/IEC Standard](http://standards.iso.org/ittf/PubliclyAvailableStandards/index.html) (ISO/IEC 19757-3:2006) for rule-based validation. Schematron can be thought of as a series of tests for structured XML. MediaConch and other PREFORMA projects use Schematron files to express policy rules for checking file conformance according to desired specifications.

Schematron patterns are based on rules of assertions or reports. An assertion seeks to pair a file's XPath with the expected answer and passes if the statement is true. A report is the opposite: it checks for if the test statement is true and raises an error.

## 15.05 Release Notes

The priority for this release is the development of a file parser and XML structure export for Matroska/FFV1/PCM files. Schematron validation can be tested using [Oxygen XML Editor](http://www.oxygenxml.com/) or [Probatron](http://www.probatron.org/). 

Forthcoming releases of MediaConch CLI and MediaConch Online will allow for the creation of and uploading of Schematron documents to facilitate file conformance checking.

## Testing

For all tests, sample video files have been provided. For the first two tests, the ffmpeg command to create the files are provided as well.

Each test series includes XML created using the MediaConch CLI and Schematron files used to test against the XML. 

### Test 0

Files: Test0.mkv

Create a file:
`ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 1 -t 1 Test0.mkv`

Create associated XML:
`mediaconch -ti -fx Test0.mkv > Test0.xml`

[Schematron for file](Files/Test0.sch)

### Test 1:
Test1.mkv -- This file has a PAL framesize but an NTSC rate, so testing for one standard or another will both fail.

Create a file:
`ffmpeg -f lavfi -i testsrc=s=720x576:r=30000/1001 -t 1 -c:v ffv1 -g 1 -level 3 Test1.mkv`

Create associated XML:
`mediaconch -ti -fx Test1.mkv > Test1.xml`

[Schematron for PAL](Files/Test1_pal.sch)

[Schematron for NTSC](Files/Test1_ntsc.sch)

### Test 2: Testing multiple files

Create files:
(Files provided). Files are identical copies except Test2_2.mkv has had two bytes (value of 0000) removed and Test2_3.mkv is a copy of Test2_2.mkv with the two bytes replaced after copying.

Create associated XML:
`mediaconch -ti -fx Test2_0.mkv Test2_1.mkv Test2_2.mkv Test2_3.mkv > Test2.xml`

[Schematron for multiple files](Files/Test2.sch)

---
layout: default
permalink: /demo.html
title: "MediaConch Demo"
---

# Demo for MediaConch

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
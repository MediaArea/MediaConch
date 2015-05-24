# Demo for MediaConch version 15.05

## File information retrieval

## Policy Checker

## Testing

### Test 0

Files: Test0.mkv

Create a file:
`ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 1 -t 1 Test0.mkv`

Create associated XML:
`mediaconch -ti -fx Test0.mkv > Test0.xml`

Schematron for file

### Test 1
Test1.mkv -- This file has a PAL framesize but an NTSC rate, so testing for one standard or another will both fail.

Create a file:
`ffmpeg -f lavfi -i testsrc=s=720x576:r=30000/1001 -t 1 -c:v ffv1 -g 1 -level 3 Test1.mkv`

Create associated XML:
`mediaconch -ti -fx Test1.mkv > Test1.xml`

Schematron for PAL

Schematron for NTSC
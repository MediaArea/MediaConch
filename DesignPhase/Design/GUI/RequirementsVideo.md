# Requirements for implementation checker GUI

Mockups forthcoming

## FFV1

- Video playback view (for MKV/FFV1)
- Support playback of FFV1 in other container formats (mov, avi, nut)
- Support presentation of decoded FFV1 video frames alongside metadata about that frame
- Support presentation of decoded FFV1 video frames alongside metadata about that frame and a selected number of neighboring frames
- Playback control deck (play, pause, step forward, step backward, etc.)
- Support keyboard shortcuts for playback (k=play/pause, j=play backwards, l=play forwards)
- Allow FFV1 video planes to be shown independently in grayscale
- Support waveform, vectorscope, and histogram presentations of video data
- Frame Metadata view (see more below)
- Support temporal annotations from the operator
- Verify an FFV1 stream against an external framemd5 or framecrc report

## MKV
### Structure
- Present graphical hierarchical view of MKV structure that is capable of representing all MKV components (tags, chapters, segments, attachments, tracks, etc)
- Allow hierarchical view of MKV structure to be expanded or condensed according to section
- Allow search for subsections of an MKV structure (for one or many open files)
- Support presentation of all features in the Matroska Test Suite
- Allow all EBML Elements with unknown ElementIDs to be identified and inspected even though contents aren't understood
- Show ElementIDs according to hex value, name, and associated definition via major versions of Matroska's XML representation of the specification, specdata.xml.
- Allow users to supply alternative versions of specdata.xml.
- Allow for a comparison between two Matroska structures.
- Allow data access to Void Element data payloads.

### Tags
- Allow MKV metadata tags to be created, read, updated and/or deleted
- Allow MKV metadata tags to be relocated or nested under other tags
- Verify the presence of metadata tags
- Verify metadata tag values against defined regular expressions

### Attachments
- Allow MKV attachments to be created, read, updated and/or deleted
- Allow MKV attachments to be relocated or nested under other tags

### MKV Fixity
- Present all CRC-32 elements where applicable
- Allow option to validate any effected CRC-32 before a file edit
- Support validating all CRC elements present

## Overall

- Allow more than one file to be open for inspection at once
- Error summary
- Option to export machine-readable metadata in XML
- Option to export human-readable metadata in TXT or PDF
- Option to export human-readable summary

## Metadata

Metadata integral to the file structure vs metadata that may/may not exist based on the file's origin circumstances

### Metadata (required)

Export sample, taken from the Issues page:
```
Sample_data sample_value
presentation_timestamp 00:00:00.880000
height 720
width 486
frame_size 220425
framemd5 f5d45832b63103108fe02d81fc0986e0
version 3
micro_version 4
crc value b344ba17
keyframe 1
coder_type 0
error_concealment 0
slices 4
slicecrc [ 764efa88 3dda1e11 db47671c 4a3bbd9e ]
colorspace_type 1
bits_per_raw_sample 8
chroma_planes 1
h_chroma_subsample 0
v_chroma_subsample 0
alpha_plane 1
num_h_slices_minus1 1
num_v_slices_minus1 1
other_data (38 bytes)
```

### Metadata (optional)

Other Matroska tags (like descriptive metadata, contributor metadata)
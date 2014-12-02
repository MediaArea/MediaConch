# Requirements for conformance checker GUI

Mockups forthcoming

- Video playback view (for MKV/ffv1)
- Playback control deck (play, pause, step forward, step backward, etc.)
- Filter options (view YUV, etc.)
- Metadata view (see more below)
- Error summary
- Option to export machine-readable metadata
- Option to export human-readable metadata
- Option to export human-readable summary (maybe diff from above, maybe not)

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
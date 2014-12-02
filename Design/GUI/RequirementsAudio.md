# Requirements for conformance checker GUI

Mockups forthcoming

- Audio playback view (graphs, left/right channel)
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
mean_volume
max_volume
EBU r128-momentary loudness
EBU r128-integrated loudness
EBU r128-loudness range
highest non-zero bit position
quantification of audio phase (if multi-channel)
```

### Metadata (optional)
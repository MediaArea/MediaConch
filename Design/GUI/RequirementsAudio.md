# Requirements for conformance checker GUI

Mockups forthcoming

- Audio playback view (bar graphs, mono/left/right channel, waveform in dB)
- Playback control deck (pause, play, stop, rewind, fast forward)
- Filter options (spectrogram, pitch)
- Metadata view (see more below)
- Log of errors and operations
- Verbose trace view with associated memory addresses
- Option to export machine-readable metadata (XML, CSV)
- Option to export human-readable metadata (TXT)
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

# Checker Architectural Layers

![Checker Architecture Layers](./CheckerArchitectureLayers.png)

The design of the implementation checker portion of the Conch application will be comprised of several layers which will communicate via a Core controller. The layers shall include:

* Transport interface
* Container/wrapper implementation
* Container/wrapper demuxer
* Stream/essence implementation
* Stream/essence decoder (optional, through plugin)
* Stream/container coherency check
* Baseband analyzer (optional, through plugin)

## Transport layer

### Conch: File on disk or direct memory mapping

Conch uses the native file API for each operating system to enable direct file access, including files that are still in the process or being written. The inclusion of MediaInfo also offers features for direct memory mapping which will be useful for third-party development or plugins.

### Plugin integration proof of concept: libcURL

libcURL is licensed under an MIT license that is compatible with both GPLv3+ and MPLv2+. We can relicense to be under GPLv3+ and MPLv2+. libcURL offers extensive support for transferring data through many protocols. By incorporating curl into Conch the tool will be able to assess files that may be accessible online by providing a URL (or list of URLs) in place of a filepath.

Since we will be generating a library of reference and sample files that will include large audiovisual files, users will be able to assess reference files without necessarily needing to download them.

Used as a proof of concept of plugin integration: 
HTTP/HTTPS/FTP/FTPS support via MediaInfo open source GPLv3+/MPL2+ and libcurl (MIT license, can be re-licensed to GPLv3+/MPL2+)


## Container/Wrapper implementation checker

### Conch

- Matroska checker

### Plugin integration proof of concept: mkvalidator
mkvalidator is a basic and no more maintained Matroska checker (BSD license, compatible with GPLv3+/MPL2+) which will be used mostly for demonstration of the plugin integration.

### Optional 

(Not part of the original PREFORMA tender but can potentially be added upon request after in context of professional services)

- MOV / ISO MP4
- AVI
- WAV
- MXF
- Any other container format on sponsor request (we have skills in OGG, MPEG-TS, MPEG-PS, DV, IMF…)

## Container/Wrapper Demultiplexing

### Conch

Conch will utilize MediaInfo's updated (for the project) demuxing libraries (re-licensed under GPLv3+/MPLv2+) which will allow for PREFORMA's selected video codecs, FFV1 and JPEG2000, to be assessed from within many formats found within archives although these container formats themselves aren't the focus of the current PREFORMA project. Through discovery interviews with archives and vendors we have found FFV1's archival implementations to use a variety of container formats such as AVI and QuickTime as well as Matroska. In order to allow developed tools to support FFV1 even if not contained within Matroska, Conch will support the following formats for demuxing (though not necessarily for conformity (yet)):

- MXF (commonly found within memory institutions)
- MOV/MP4 (often found containing FFV1, JPEG2000, and LPCM)
- DV (video stream format which uses LPCM)
- AVI (used with FFV1 by DV Profession, NOA, Austria Mediathek)
- WAV (a common container for LPCM)
- WAVE64 (64-bit extensions of WAV for 2GB+ files)
- RF64 (64-bit extensions of WAV for 2GB+ files)

By supporting the demultiplexing of these formats through MediaInfo, the developed tools will be applicable to a wide variety of files that contain PREFORMA's selected codecs: FFV1, JPEG2000, and LPCM. This demultiplexing support can be available through MediaInfo's existing libraries in a manner that is compatible with PREFORMA's licensing requirements.

## Stream/Essence implementation checker

Plugin

### Conch

- FFV1
- PCM (including D-10 Audio, AES3)

### Plugin integration proof of concept: jpylyzer
For JPEG 2000 (GPLv3+ license, compatible with GPLv3+ but not with MPL2+)

### Optional 

(Not part of the original PREFORMA tender but can potentially be added upon request after in context of professional services)

- MPEG-1/2 Video (including IMX, AS-07, D-10 Video)
- H.264/AVC (including AS-07)
- Dirac
- AC-3 (including AS-07)
- MPEG 1/2 Audio
- AAC
- Any other essence format on sponsor request (we have skills in DV, VC-1, VC-3, MPEG-4 Visual, H.263, H.265/HEVC, FLAC, Musepack, Wavepack, BMP, DPX, EXR, JPEG, PNG, SubRip, WebVTT, N19/STL, TTML…)

## Stream/Essence decoder

(Not part of the original PREFORMA tender but can potentially be added upon request after in context of professional services)

### Conch

- PCM (including D-10 Audio, AES3)

### Plugin integration proof of concept: OpenJPEG
OpenJPEG decoder (BSD license, compatible with GPLv3+/MPL2+)


## Container/Wrapper vs Stream/Essence Coherency Check

### Conch
Conch will support the coherency check between all suppoted formats (see Container/Wrapper implementation checker and Stream/Essence implementation checker parts)

## Baseband Analyzer

### Conch

- None (only creation of the API)


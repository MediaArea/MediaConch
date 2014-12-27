# Layers
## Transport interface
Preforma MediaInfo native:
Direct file access (file API of each operating system), including growing files (creation time)
Direct memory mapping (useful for third parties)

Used as a proof of concept of plugin integration:
HTTP/HTTPS/FTP/FTPS/  ? MediaInfo Open-Source GPLv3+/MPL2+ and libcurl (MIT license, compatible with GPLv3+/MPL2+)

Planned, optionally to be included in Preforma project:
ISO file (DVD-Video, used in some archives)
ZIP file (used for e.g. transporting a bunch of JPEG 2000 images)
Amazon S3

## Container/Wrapper implementation checker (and metadata fixer)
Preforma MediaInfo native:
WAV (a common container for PCM)
MKV (including WebM)

Used as a proof of concept of plugin integration:
mkvalidator for MKV (BSD license, compatible with GPLv3+/MPL2+)

Planned, optionally to be included in Preforma project:
MXF (including  AS specifications conformance checking)
MXF (lot of archive institutions use JPEG 2000 in MXF)
MOV/MP4 (lot of archive institutions use JPEG 2000 in MOV/MP4)
AVI (lot of archive institutions use FFV1 in AVI)
DCP / IMF
OGG
… Any other wrapper on sponsor request (we have skills in LXF, GXF, Flash video, DV, DASH, CDXA, HLS, HDS, ISM, MPEG-TS, MPEG-PS, Real Media, WMV/WMA…)

## Container/Wrapper Demultiplexing

### MediaInfo

PreForma MediaInfo will utilizing MediaInfo's existing demuxing libraries which will allow for PreForma's selected video codecs, FFV1 and JPEG2000, to be assessed from within many formats founds within archives although these container formats themselves aren't the focus of the current PreForma project. Through discovery interviews with archives and vendors we have found FFV1's archival implementations to use a variety of container formats such as AVI and QuickTime as well as Matroska. In order to allow developed tools to support FFV1 even if not contained within Matroska, PreForma MediaInfo will support the following formats for demuxing (though not necessarily for conformity (yet)):

- MXF (commonly found within memory institutions)
- MOV/MP4 (often found containing FFV1, JPEG2000, and LPCM)
- AVI (used with FFV1 by DV Profession, NOA, Austria Mediathek)
- WAV (a common container for LPCM)

By supporting the demultiplexing of these formats through MediaInfo, the developed tools will be applicable to a wide variety of files that contain PreForma's selected codecs: FFV1, JPEG2000, and LPCM. This demultiplexing support can be available through MediaInfo's existing libraries in a manner that is compatible with PreForma's licensing requirements.

### FFmpeg

FFmpeg is one of the most ubitiquous, comprehensive, and open tools for demultiplexing and decoding audiovisual data; however, although FFmpeg's GPLv2+ license is compatible with PreForma's selected GPLv3+ license, it is not compatible with PreForma's other selected license, MPLv2+. As the PreForma conformance project evolves to support additional formats and codecs through plugins the use of FFmpeg's features are expected to becoming more and more appealing. For instance the integration of FFmpeg can provide integration of very comprehensive decoding and demultiplexing support beyond what can be easily provided with MediaInfo's demuxing libraries. FFmpeg's libavfilter library also provides access to waveform monitoring, vectorscope, audio meters, and other essential audiovisual inspection tools.

Although PreForma MediaInfo won't incorporate FFmpeg in order to comply with the MPLv2+ licensing requirement, we would like to design plugin support for FFmpeg. In this way a memory institution using PreForma MediaInfo could separately download FFmpeg and link the two together to enable additional tools such as:

- Video Waveform Monitor
- Vectorscope
- Ability to inspect luminance and chroma planes separately
- Audio Meters

We anticipate that the implementation of FFmpeg plugin support will substantially simplify the development of other plugins for broader codec and format support so that an entire decoder or demuxer does not need to be written from scratch in order to extend support.

## Stream / Essence implementation checker
Preforma MediaInfo native:
FFV1
PCM (including D-10 Audio, AES3)
Used as a proof of concept of plugin integration:
jpylyzer for JPEG 2000 (GPLv3+ license, compatible with GPLv3+ but not with MPL2+)
DV Analyzer for DV (BSD license, compatible with GPLv3+ and MPL2+)

Planned, optionally to be included in Preforma project :
MPEG-1/2 Video (including IMX, AS-07, D-10 Video, FIMS…)
H.264/AVC (including AS-07)
Dirac
AC-3 (including AS-07)
MPEG 1/2 Audio
AAC
… Any other essence format on sponsor request (we have skills in DV, VC-1, VC-3, MPEG-4 Visual, H.263, H.265/HEVC, FLAC, Musepack, Wavepack, , BMP, DPX, EXR, JPEG, PNG, SubRip, WebVTT, N19/STL, TTML…)

## Stream / Essence decoder
Preforma MediaInfo native:
PCM (including D-10 Audio, AES3)

Used as a proof of concept of plugin integration:
FFmpeg decoder (GPLv2+ license, compatible with GPLv3+ but not with MPL2+)
OpenJPEG (BSD license, compatible with GPLv3+/MPL2+)

## Baseband analyzer
Preforma MediaInfo native:
None (only creation of the API)

Used as a proof of concept of plugin integration:
QCTools graphs (report on and graph data documenting video signal loss, flag errors in digitization, identify which errors and artifacts are in original format and which resulted from the digital transfer based on all the data collected in the past.)

## Hypervisor

Communication between all plugins
Shudeling
Statistics
Reporting
User management
Policies management
Human interface
Command line interface
GUI (based on Qt)
Web UI (server/client)

## Ideas to put in the final doc
We are Open-Source natives: we do Open-Source since the first days. We have an Open-Source business model based on sponsored support (bug correction and feature requests).
We don’t do Open-Source only because Performa wants it, we believe in Open-Source.
We are open to Open-source and non Open-Source (we can do non Open-source small developments on request, depending of the business model of the sponsor)
Do other project  think to demux (e.g. how do they plan to analyze JPEG 2000 in MOV)?

We are already involved in Open-Source with MediaInfo and recognized as it, e.g. we are officially provided by Open Source distros:
Debian: https://packages.debian.org/wheezy/mediainfo
Ubuntu: http://packages.ubuntu.com/utopic/mediainfo
RedHat / Fedora: https://apps.fedoraproject.org/packages/mediainfo
OpenSuse: http://packman.links2linux.org/package/mediainfo
Arch Linux: https://www.archlinux.org/packages/?q=mediainfo
FreeBSD: http://www.freshports.org/multimedia/mediainfo/

We see 4 projects: Text, Image, A/V except JPEG 2000, JPEG 2000. Only 3 selected entities for phase 2 (3-5 written in call to tender, 3 written in kickoff meeting report)?

Test files
PDF/A files buggy files: http://www.pdfa.org/2011/08/isartor-test-suite/
JPEG 2000 files: https://github.com/openplanets/jpylyzer-test-files
Matroska buggy files: Homemade + request to Matroska mailing list
FFV1 buggy files: Homemade+ request to FFmpeg mailing list

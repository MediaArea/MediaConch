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

## Container/Wrapper demuxer
Preforma MediaInfo native:
MKV (including WebM)
MXF (lot of archive institutions use JPEG 2000 in MXF)
MOV/MP4 (lot of archive institutions use JPEG 2000 in MOV/MP4)
AVI (lot of archive institutions use FFV1 in AVI)
WAV (a common container for PCM)

Used as a proof of concept of plugin integration:
FFmpeg demuxer (GPLv2+ license, compatible with GPLv3+ but not with MPL2+)
Available, optionally to be included in Preforma project:
AAF (ancestror of MXF, sometimes used in archive institutions)
DCP / IMF
OGG
XDCAM Clips
P2 camera XMLs

Planned, optionally to be included in Preforma project:
… Any other wrapper already developed for MediaInfo (LXF, GXF, Flash video, DV, DASH, CDXA, HLS, HDS, ISM, MPEG-TS, MPEG-PS, Real Media, WMV/WMA…)

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

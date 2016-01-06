# MediaConch README

MediaConch is an open source software project consisting of a toolset that aims to further develop the standardization and validation of preservation-level audiovisual files used within various memory institutions and communities. The software consists of an implementation checker, policy checker, reporter and fixer that will work together to offer its users an advanced level of ability to validate, assess and find solutions to repair the digital files within their collections. Accessible via either the command line, a graphical user interface (GUI), or web-based shell, the MediaConch project will serve to provide detailed individual and batch-level conformance checking analysis using its adaptable, flexible and interoperable software application interface. With a project focus dedicated to furthering the longevity of Matroska, Linear Pulse Code Modulation (LPCM) and FF Video Codec 1 (FFV1) as recommended digital preservation audiovisual formats, MediaConch will anticipate and contribute to the further development of the standardization of these formats. The MediaConch open source project was created and is currently under development by MediaArea, notable for the creation of MediaInfo, an open source media checker software application.

Website: <a href="https://mediaarea.net/MediaConch/">:shell: MediaConch project</a>.

# Table of Repositories

#### [MediaConch](https://github.com/MediaArea/MediaConch)
The original repository for the MediaConch project, this repository holds all public documentation related to Phase I of the project (the design phase) and some metadata-related work.

#### [MediaConch_SourceCode](https://github.com/MediaArea/MediaConch_SourceCode)
This repository hosts the source code for MediaConch, the GUI.

#### [MediaConchOnline](https://github.com/MediaArea/MediaConchOnline)
This is the source code for MediaConchOnline, the online version of the MediaConch shell.

#### [MediaConch-Website](https://github.com/MediaArea/MediaConch-Website)
This is the repository for content hosted on [https://mediaarea.net/MediaConch/](https://mediaarea.net/MediaConch/). 

#### [MediaAreaXml](https://github.com/MediaArea/MediaAreaXml)
This repository holds XSD (XML Schema Definitions) for MediaConch, MediaInfo, and MediaTrace.

# Release Schedule

MediaArea intends to release various versions of all relevant source codes and executables for each of the deployment platforms that the project will be configured to perform upon successfully. For stable versions of the software, new downloads and rolling releases will be provided and made available on a monthly basis. Stable versions will take into account software fixes, updates, and bug reports throughout the development phase and additionally will have gone through a QA process during that time.

Certain deployed (LTS) versions, upholding the build of the stable versions, will be provided and released during the required delivery stages of the PREFORMA project and will be developed as sustainable for a long period of time within the open source project.

New nightly builds and updates of the source code will also be made available to download during all stages. This ensures that all users and organizations will have access to downloading the most up-to-date version of code that exists throughout the project.

Downloads will be made available through a public repository with a functioning issue tracker (GitHub). In conjunction with the releases, a roadmap will be created in order to track these updates publically and encourage open collaborative usage and issue feedback. Both the older and more recent development, stable, and deployed (LTS) versions will be made available to users of any level, throughout these multiple platforms, for the entirety of the project. If a user wishes to download an older version of the source code or executable, MediaArea will have this option available.

All source codes and updates are and will be made accessible on the following platforms:

- MS Windows
- Mac OSX
- Linux (Ubuntu, Fedora, Debian, and Suse)

Monthly releases and nightly builds are available on the :shell: MediaConch [Downloads page](https://mediaarea.net/MediaConch/download.html) or via [MediaConchOnline](https://mediaarea.net/MediaConchOnline/).


# Funding and Licensing

This project has received funding from PREFORMA, co-funded by the European Commission under its FP7-ICT Programme. All software and source code developed by MediaArea during the PREFORMA project will be provided under the following two open source licenses: GNU General Public License 3.0 (GPLv3 or later), Mozilla Public License (MPLv2 or later).

All open source digital assets for the software developed by MediaArea during the PREFORMA project will be made available under the open access license: Creative Commons license attribution – Sharealike 4.0 International (CC BY-SA v4.0). All assets will exist in open file formats within an open platform (an open standard as defined in the European Interoperability Framework for Pan-European eGovernment Service (version 1.0 2004)).


# Licensing of third party libraries

The software relies on third party libraries. Such libraries have their own license:

- Media analysis library: MediaInfoLib, (c) MediaArea.net SARL, initialy BSD-2-Clause license, relicensed to GPLv3 or later / MPLv2 or later
- Base classes library: ZenLib, (c) MediaArea.net SARL, initialy zlib license, relicensed to GPLv3 or later / MPLv2 or later
- C++ standard library: [libstdc++](http://gcc.gnu.org/onlinedocs/libstdc++/manual/bk01pt01ch01s02.html) (GPLv3+ with linking exception), [libc++](http://llvm.org/docs/DeveloperPolicy.html#license) (MIT license, could be relicensed to GPLv3 or later / MPLv2 or later), [Visual C++ library](http://msdn.microsoft.com/en-us/library/vstudio/ms235299.aspx) (Microsoft proprietary license) or any other C++ standard library
- GUI (optional): [Qt](https://www.qt.io/qt-licensing-terms/), LGPLv3+ license, compatible with GPLv3 or later / MPLv2 or later
- WebUI engine (optional) : [Symphony](https://symfony.com/license), MIT license, could be relicensed to GPLv3 or later / MPLv2 or later
- WebUI design (optional) : [Bootstrap](http://getbootstrap.com/getting-started/), MIT license, could be relicensed to GPLv3 or later / MPLv2 or later
- XML parser (optional): [TinyXML-2](http://www.grinninglizard.com/tinyxml2docs/index.html), zlib license, could be relicensed to GPLv3 or later / MPLv2 or later
- gzip decompression routine (optional): [zlib](http://www.gzip.org/zlib/zlib_license.html), zlib license, could be relicensed to GPLv3 or later / MPLv2 or later
- FTP, FTPS, SFTP, HTTP, HTTPS (optional): [libcurl](http://curl.haxx.se/docs/copyright.html), MIT license, could be relicensed to GPLv3 or later / MPLv2 or later
- Base64 (optional): base64 by Bob Withers, public domain, could be relicensed to GPLv3 or later / MPLv2 or later
- AES (optional): aes by Brian Gladman, BSD-2-Clause license, compatible with GPLv3 or later / MPLv2 or later
- MD5 (optional): md5 by Colin Plumb, public domain, could be relicensed to GPLv3 or later / MPLv2 or later
- SHA-1 (optional): sha1 by Brian Gladman, BSD-2-Clause license, compatible with GPLv3 or later / MPLv2 or later
- SHA-2 (optional): sha2 by Brian Gladman, BSD-2-Clause license, compatible with GPLv3 or later / MPLv2 or later
- HMAC (optional): hmac by Brian Gladman, BSD-2-Clause license, compatible with GPLv3 or later / MPLv2 or later

Compilation has been tested with:

- [GCC](https://gcc.gnu.org/onlinedocs/libstdc++/manual/license.html) for Windows, Mac, Linux, GPLv3+ license
- [LLVM](http://llvm.org/docs/DeveloperPolicy.html#license) for Mac, Linux, NCSA Open Source License, could be relicensed to GPLv3 or later / MPLv2 or later
- [Microsoft Visual Studio](https://www.visualstudio.com/en-us/downloads/download-visual-studio-vs.aspx), Microsoft proprietary license
- [Apache web server](https://www.apache.org/licenses/LICENSE-2.0) for Windows, Mac, Linux, Apache license, compatible with GPLv3 or later / MPLv2 or later


# How to Contribute

Please see the [Contribution Guide](CONTRIBUTING.md) for contributing code. Contributions via feedback on our [Issues page](https://github.com/MediaArea/MediaConch/issues) is also very welcome.

# Test Files

MediaArea’s test files exist in the [SampleTestFiles repository](https://github.com/MediaArea/MediaConch_SampleFiles).

It is anticipated that a large library of reference media and test files will be created to highlight the different outcomes associated with issues and errors that may arise in regards to certain files and specifications push through the software. The test files will either be self-created, solicited, or pulled from a variety of online reference libraries.

This curated selection of tests will include the following:

- files that conform to the relevant file format’s technical specifications
- files that do not conform and therefore deliberately deviate from the file format’s technical specifications (in association with the appropriately coded error messages)
- specific files that originate from and/or adhere to the technical specifications of the file formats from participating memory institutions (including examples that both conform to and deviate from the requirements)

Because it is crucial to the stimulation of a sustained and well documented open sourced community, the resulting issues and feedback from the testing of these created and solicited files will also be documented and will contain information on the relevant version of software used for the test.

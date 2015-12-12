# MediaConch README

MediaConch is an open source software project consisting of a toolset that aims to further develop the standardization and validation of preservation-level audiovisual files used within various memory institutions and communities. The software consists of an implementation checker, policy checker, reporter and fixer that will work together to offer its users an advanced level of ability to validate, assess and find solutions to repair the digital files within their collections. Accessible via either the command line, a graphical user interface (GUI), or web-based shell, the MediaConch project will serve to provide detailed individual and batch-level conformance checking analysis using its adaptable, flexible and interoperable software application interface. With a project focus dedicated to furthering the longevity of Matroska, Linear Pulse Code Modulation (LPCM) and FF Video Codec 1 (FFV1) as recommended digital preservation audiovisual formats, MediaConch will anticipate and contribute to the further development of the standardization of these formats. The MediaConch open source project was created and is currently under development by MediaArea, notable for the creation of MediaInfo, an open source media checker software application.

Website: <a href="https://mediaarea.net/MediaConch/">:shell: MediaConch project</a>.


# Release Schedule

MediaArea intends to release various versions of all relevant source codes and executables for each of the deployment platforms that the project will be configured to perform upon successfully. For stable versions of the software, new downloads and rolling releases will be provided and made available on a monthly basis. Stable versions will take into account software fixes, updates, and bug reports throughout the development phase and additionally will have gone through a QA process during that time.

Certain deployed (LTS) versions, upholding the build of the stable versions, will be provided and released during the required delivery stages of the PREFORMA project and will be developed as sustainable for a long period of time within the open source project.

New nightly builds and updates of the source code will also be made available to download during all stages. This ensures that all users and organizations will have access to downloading the most up-to-date version of code that exists throughout the project.

Downloads will be made available through a public repository with a functioning issue tracker (GitHub). In conjunction with the releases, a roadmap will be created in order to track these updates publically and encourage open collaborative usage and issue feedback. Both the older and more recent development, stable, and deployed (LTS) versions will be made available to users of any level, throughout these multiple platforms, for the entirety of the project. If a user wishes to download an older version of the source code or executable, MediaArea will have this option available.

All source codes and updates will be made accessible on the following platforms:

- MS Windows
- Mac OSX
- Linux (Ubuntu, Fedora, Debian, and Suse)

The target release date will be the 15th of each month.


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

# Community outreach

The MediaArea team is active within the open source community and actively presents their work on MediaConch in order to bring attention to the project and draw in a wider audience for potential open source feedback.

In December 2014, MediaArea started conducting interviews with FFV1, Matroska, and LPCM stakeholders within the community in order to collect feedback and insights from the archival institutions. Notes and partial transcripts from the interviews are available within the Conch Github repository.


# Contribution Guide

## Rules for contributing code

MediaArea welcomes and encourages open source contributions to the software throughout the development stage. To participate and further the MediaConch project as it develops, contributions and additions can be made to the code and/or documentation residing within the project’s Github repository. Contributions and commits should be directed to Github and written in Qt as a branch submitted as a pull request. Individual commits should be created for each change and alteration made to the relevant file or code. All contributions should be clear, concise, and follow the standardized, applicable coding and naming conventions within the project’s style guidelines.

Contributions of code and/or additions to MediaArea’s PREFORMA project documentation must be written as follows:
```
Create your feature branch (git checkout -b my-new-feature)
Commit your changes (git commit -am 'adds some feature')
Push to the branch (git push origin my-new-feature)
Create a new Pull Request with a more verbose description of the proposed changes
```

## Rules for contributing feedback

The MediaArea project team welcomes contributions and feedback from contributing and/or interested institutions and individuals via issue tracking, various open source communication and social media channels, and other sources of public community outreach.
Open source feedback and participation of all kinds and from any interested party or institution is encouraged and can be made through opening an issue on GitHub or contacting the team directly at info@mediaarea.net.


### File Naming Conventions

All project files related to documentation regarding the PREFORMA project will be named using CamelCase. Project documentation’s actual sample data will be shared using the snake_case. These objects should carry a suitably descriptive file name that elaborates on the contents of the file and follow the standard practices and expectations of their corresponding naming conventions and specifications. File naming conventions and rules will be upheld in order to implement an efficient database of document and file releases within the open source community.

In regards to the required conventions for commit messages on the open source platform, all messages should be concise and clear and effectively summarize each contribution to the project. If more than one substantial change was made, users should not create one commit message to cover all feedback and changes. New individual commits should be made to cover each individual change made to the relevant file being altered. Effective commit messages, covering context of a change, will enable MediaArea to work within a speedier, more efficient review process and better alter development around this feedback.


### Rules for Qt/C++ code

MediaArea’s open source project will be programmed in C++ and will use the Qt application framework.

Guideline for Qt is as follows:

MediaArea will follow the applicable rules for programming within the Qt cross-platform application development framework.

Attention to detail will be given to the following rules/guidelines:

Indentation:

- Four spaces to should be given for indentation (not tabs)

Variables:

- Each variable should be declared on separate lines, only at the moment they are needed
- Avoid short names, abbreviations and single character names (only used for counters and temporaries)
- Follow the case conventions for naming

Whitespaces:

- Use only one blank line and use when grouping statements as suited. Do not put multiple statements onto one line.
- Also use a new line for the body of a control flow statement
- Follow the specific single space conventions when needed

Braces:

- Attached braces should be used (follow guidelines for rules and exceptions)
- Curly braces are used only when the body of a conditional statement contains 1+ line or when body of a conditional statement is empty (follow guidelines for rules and exceptions)

Parenthesis:

- Parenthesis should be used to group expressions

Switch Statements and Jump Statements:

- Case labels are in the same column as the switch
- Each case should have a break statement at the end or a comment to indicate there is no intentional break
- Do not use ‘else’ at the end of Jump Statements unless for symmetry purposes

Line Breaks:

- Lines should kept under 100 characters
- Wrap text if necessary
- Use commas at the end of wrapped text and operators at the beginning of new lines

Exceptions:

- Always try to achieve functional, consistent and readable code. When code does not look good, exceptions to the rules may pertain to fixing this situation.

For more specific rules, examples, exceptions and guidelines, please refer to the Qt Coding Style guide: http://qt-project.org/wiki/Qt_Coding_Style

### Guidelines for C++ code is as follows:

Manageability and productivity within the C++ coding atmosphere will be preserved by upholding to the Style and Consistency rules necessary for creating a readable and controlled code base. Attention to detail will be given to the rules governing the creation of a workable open source code in the following areas:

- Headers
- Scoping
- Classes
- Naming
- Comments
- Formatting
- Specific Features/Abilities of C++
- Relevant Exceptions

For a detailed account of specific rules, examples and guidelines for each section, please refer to the Google guide on C++: http://google-styleguide.googlecode.com/svn/trunk/cppguide.html

# Test Files

MediaArea’s test files exist in the [SampleTestFiles repository](https://github.com/MediaArea/MediaConch_SampleFiles).

It is anticipated that a large library of reference media and test files will be created to highlight the different outcomes associated with issues and errors that may arise in regards to certain files and specifications push through the software. The test files will either be self-created, solicited, or pulled from a variety of online reference libraries.

This curated selection of tests will include the following:

- files that conform to the relevant file format’s technical specifications
- files that do not conform and therefore deliberately deviate from the file format’s technical specifications (in association with the appropriately coded error messages)
- specific files that originate from and/or adhere to the technical specifications of the file formats from participating memory institutions (including examples that both conform to and deviate from the requirements)

Because it is crucial to the stimulation of a sustained and well documented open sourced community, the resulting issues and feedback from the testing of these created and solicited files will also be documented and will contain information on the relevant version of software used for the test.

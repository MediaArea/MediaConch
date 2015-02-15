# Style Guide

## Source Code Guide

### Portability

Source code MUST be built for portability between technical deployment platforms. 

### Modularity

Source code MUST be built in a modular fashion for improved maintainability.

### Deployment

The Conformance Checker MUST allow for deployment in these five infrastructures/environments: The PREFORMA website, an evaluation framework, a stand-alone system, a network-based system, and legacy systems.

To sufficiently demonstrate the scope and functionality of the Conformance Checker, it, along with associated documentation and guidelines, must be made available at the PREFORMA project website. The PREFORMA website will be considered as the deliverable for the PREFORMA project.

In order to gather sufficient structured feedback on the conformance checking process, the Conformance Checker will require deployment within the DIRECT infrastructure for test and evaluation of the tool in the PCP procedure. 

The Conformance Checker must have the capability to be packaged and run as an executible on a PC running any standard operating system (at least for: MS Windows 7, Mac OSX, common Linux distributions such as Ubuntu, Fedora, Debian, and Suse). This ensures the conformance checker can be used in small-scale institutions without centralized IT infrastructure. 

The Conformance Checker must allow for deployment in network-based solutions (dedicated server, cloud solutions) for digital repositories.

The Conformance Checker must have the capability of being plugged into legacy systems via written API integration.

### API's

The Conformance Checker MUST interface with other software systems via API’s. 

## Open Source Practices

### Development

Development of software in open source projects in PREFORMA MUST utilise effective open source work practices. Effective open source work practices include:

* use of nightly builds
    Nightly builds are automated neutral builds that reflect the current, most up-to-date status of a piece of developed software. Access made to nightly builds allow for groups of developers to work collaboratively and always assess the most current state of the software, with consideration to potential bugs or other hazards that could occur during the development process. Programmers are able to confidently determine if they "broke the build" (made the software inoperable) with their code and prevent or correct changes quickly, as needed.
* use of software configuration management systems (e.g. Git)
  	Using a software configuration management system allow for version and revision control, an essential component to developers working collaboratively. A version control system allows multiple people to work on same or similar sections of the source code base at the same time with awareness and prevention of overlapping or conflicting work. Git will be used as the software configuration management system for this project.
* use of an open platform for open development (e.g. Github)
  	An open platform on which to develop software facilitates the open development of that software. Public visibility and ability to contribute to the software by anyone allows for heartier, more reliable software. Feedback is more easily sought and more readily provided with the use of an open platform. Github will be used as the open platform for open development of this project.

### Open Source Platforms

All development of software and all development of digital assets (related to developed open source software) in PREFORMA MUST be conducted and provided in open source projects at open development platforms.

## Contribution Guide

### File Naming Conventions

Files related to documentation should be named in CamelCase. Sample data should be added in snake_case with a sufficiently descriptive title.

Commit messages should concisely summarize the contribution. Commits should be cohesive and only include changes to relevant files (e.g. do not fix a typo in the Style Guide, change scope paramaters, and fix a bug all in the same commit).

### Rules for Qt/C++ code:

4 spaces are used for indentation. Tabs are never used.

For more guidelines, refer to the Qt Coding Style guide: http://qt-project.org/wiki/Qt_Coding_Style
For even more guidelines, Google guide on C++: http://google-styleguide.googlecode.com/svn/trunk/cppguide.html

### Rules for contributing code

Contributions of code or additions to documentation must be written with Qt and must be made in the form of a branch submitted as a pull request. 

  1.  Fork this repository (https://github.com/MediaArea/PreFormaMediaInfo/fork)
  2.  Create your feature branch (`git checkout -b my-new-feature`)
  3.  Commit your changes (`git commit -am 'Added some feature'`)
  4.  Push to the branch (`git push origin my-new-feature`)
  5.  Create a new Pull Request with a more verbose description of the proposed changes

### Rules for contributing feedback

Feedback of all kind is encouraged and can either be made through [opening an issue](https://github.com/MediaArea/PreFormaMediaInfo/issues) or by contacting the team directly at info@mediaarea.net

### Linking

In order to facilitate self-description, intuitive discovery, and use of resulting code and documentation it is highly encouraged to utilize linking through documentation, tickets, commit messages, and within the code. For instance the registry itemizes individual conformance checks should link to code blocks and/or commits as software is developed that is associated to that conformance check. In this manner it should be feasible to easily review both human-readable descriptions of conformity checks and associated programmatic implementations.

## Test Files

Test files exist in the SampleTestFiles folder, separated into respective folders by file format and testing parameters. 

The test files include the following:
	* files that conform to the technical specification of the file format
	* files for the open source project that by design deliberately deviate from the technical specification of the file format (with proposed associated error messages)
	* files from memory institutions for the open source project that conform (or do not conform) to the technical specification of the file format

## Release Schedule

This project is expected to release a new development version of all source code each night to be available for download in a single file for each deployment platform. This implies that any user will be able to download and compile an up-to-date version of all source code for deployment platforms relevant for PREFORMA.

There shall always be source code available for download (provided in a single file) for several different deployment platforms (at least for: MS Windows 7, Mac OSX, common Linux distributions including Ubuntu, Fedora, Debian, and Suse). For each platform specific source code version (development version, stable version, and deployed (LTS) version) there shall always be an up-to-date corresponding executable that can be downloaded as a single file. In addition, all old versions (including nightly versions) of source code and corresponding executables shall be available for download over time.

This implies that for each deployment platform (at least for: MS Windows 7, Mac OSX, common Linux distributions including Ubuntu, Fedora, Debian, and Suse) the open source project shall provide a file which contains all necessary open source tools that can be used
(without access to the Internet) to create an executable for that platform. This means that at least six such files (containing open source tools) shall be available for download from the open source project. > For example, a user wishing to create of an executable for MS Windows 7 from the source code provided by the open source project on the open platform will (in principle) undertake the following steps:

	* The complete source code for MS Windows 7 is downloaded as a single file (e.g. “source-mswin7.zip”) from the open source project and extracted on the local machine.
	* The complete build environment for MS Windows 7 is downloaded as a single file (e.g. “buildenvironment-mswin7.zip”) from the open source project and extracted on the local machine.
	* The build enviroment is used on the local machine (which now is not connected to the Internet) to create an executable (e.g. “application-mswin7.exe”) from the extracted source code.

Further, as part of the content of the complete source code for each specific platform, detailed instructions for how to use the build environment to create the executable from the downloaded source code. The instructions must be provided for both technical and non-technical users, and there must be easy to follow detailed step-by-step instructions.

In addition, separate detailed instructions for how to build executables in which source code from different open source projects are integrated into one single executable must also be provided (see further section 2.4)

The source code will contain at minimum:

* Complete source code for MS Windows 7
* Complete source code for Mac OSX
* Complete source code for Ubuntu Linux
* Complete source code for Fedora Linux
* Complete source code for Debian Linux
* Complete source code for Suse Linux

The source code will be fully executible with text, images, and audiovisual files.

## License

The software and digital assets delivered by tenderer are made available under the following IPR conditions:
          
All software developed during the PREFORMA project MUST be provided under the two specific open source licenses: “GPLv3 or later” and “MPLv2 or later”.
          
All source code for all software developed during the PREFORMA project MUST always be identical between the two specific open source licenses (“GPLv3 or later” and “MPLv2 or later”).
          
All digital assets developed during the PREFORMA project MUST be provided under the open access license: Creative Commons CC-BY v4.0 and in open file formats, i.e. an open standard as defined in the European Interoperability Framework for Pan-European eGovernment Service (version 1.0 2004) 

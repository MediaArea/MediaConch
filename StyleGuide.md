# Style Guide

## Source Code Guide

### Portability

Excelling in cross-platform open source development, MediaArea will utilize tools throughout the development phase in order to provide users with a downloadable source code that offers functional portability between the different deployment platforms (MS Windows 7, Mac OSX, and Linux).

The source code can be shared and used between the targeted platforms and will run and behave similarly across different users’ machines. The various releases will be implemented with adaptable interoperability between these platforms and the software will run dependent on which downloadable source code and executable the user’s platform requires. This means MediaArea’s open source project, throughout the development and deployment phases, will continue to always provide downloadable access to software and support for each of these individual platforms.


### Modularity

MediaArea’s regularly released source codes will be developed within a modularized architecture in order to create an unrestricted atmosphere for the improvement of the project’s maintainability and assembly. Conforming to this development technique and creating distinct, interchangeable modules will allow the software, and its corresponding open source community, to remain sustainable in its growth and facilitate ongoing collaborative feedback throughout the development phase. Each module will have a documented interface (API) that defines its function and interactive nature within the software.

The construct and eventual structure of modularity within this project will be key to the health and sustainability of the project’s potential success as a fully integrated Conformance Checker. The regular release of source code for this project, built within this architecture, will enable better feedback and issue tracking from both users and memory institutions utilizing the software. 


### Deployment

MediaArea will develop a Conformance Checker that is designed to allow for deployment in the five following types of infrastructures and environments:

- PreForma’s website
- Within an evaluation framework
- Within a stand-alone system (MS Windows 7, Mac OSX, and Linux)
- Within a network-based system (server or cloud)
- Within various legacy systems

Access release for the intended targeted users will be supported within all of these environments. In order to demonstrate the project’s successful deployment within these infrastructures, MediaArea will, in addition to supplying the standard corresponding technical documentation for each, undertake the following considerations:

The project’s necessary PreForma website, including centralized links to all open source materials and community outreach, will be considered as the official deliverable for the entire project. The associated and required documentation, tools and instructional feedback will also be provided and accessible on the PreForma project website as well as the open source platform.

The Conformance Checker will also fulfill the requirement of being deployed within the direct infrastructure to facilitate evaluation and use within the PCP system.

For stand-alone users or smaller institutions, the Conformance Checker will be fitted with the capability to be packaged, downloaded and run as an executable on machine’s running any form of a standard operating system (MS Windows 7, Mac OSX, and Linux).

The Conformance Checker will be developed to deploy within different network-based solutions and environments (including dedicated servers and cloud solutions) hosting the memory institutions’ digital repositories.

Via written API integration, the Conformance Checker will also be able to properly function when plugged into various legacy systems.


### APIs

Via APIs, the developed and deployed Conformance Checker will be designed to interface and integrate with other software systems. Programming tools and software standards and practices will be upheld in order to allow for a potential software-to-software interface. A long-term sustainable usage and presence within the open source community will be further enhanced via correct implementation of this successful API integration.

The outcome of the ability to interface with other software systems is that the software and technical documentation will have ongoing support and integration within the individual workflows of the memory institutions’ preservation plans.


## Open Source Practices

### Development

MediaArea’s open source software development within the PreForma project will establish and uphold open source work practices and standards. These practices will abide by the following project rules:

- Use of nightly builds:
A nightly build is an automated build that reflects the most up-to-date version of developed software’s source code. Users will have access to these nightly builds as their release will allow for collaborative groups of developers and users to work together and continuously gain immediate feedback and fixes to the most current state of the software. With access to the absolute latest versions, MediaArea and all open source collaborators will more readily gain insight into potential bugs and issues that could arise during the development phase. Programmers will be able to determine if they “broke the build”, making the software inoperable with their latest code.  Immediate access to fixing these issues can be made more efficiently.

- Use of software configuration management systems:
Operating with a software configuration management system (Git) will allow MediaArea easy version control as well as knowledge of the revisions needed.  This is an essential part of the open source community that allows developers to be able to work together collaboratively. A version control system allows multiple people to work on the same or similar sections of the source code base, simultaneously and at the same time, with awareness and prevention of overlapping or conflicting work. Git will be used as the software configuration management system for this project.

- Use of an open platform for open development:
MediaArea will operate within an open source platform on which to develop software and better facilitate the open development of that software. Public visibility that allows anyone the ability to contribute to the software’s development allows for sturdier, more reliable outcomes. Feedback is more easily sought and more readily provided with the use of an open platform. Github will be used as the open platform for open development of this project.

### Open Source Platforms

All software development as well as the development of all relevant and corresponding digital assets and tools created by MediaArea during the PreForma project will exist and function as an open source project within an open source platform (Github). This open source development platform will offer full transparency and traceability throughout the development phase and facilitate a functional collaborative environment with developers, users, stakeholders, and institutions.

Source code, issue tracking, documentation, updates, release and various forms and channels of public outreach will be centralized within the open development platform and linked to within the PreForma project page.


## Contribution Guide

### File Naming Conventions

All project files related to documentation regarding the Preforma project will be named using CamelCase. Project documentation’s actual sample data will be shared using the snake_case. These objects should carry a suitably descriptive file name that elaborates on the contents of the file and follow the standard practices and expectations of their corresponding naming conventions and specifications. File naming conventions and rules will be upheld in order to implement an efficient database of document and file releases within the open source community.
In regards to the required conventions for commit messages on the open source platform, all messages should be concise and clear and effectively summarize each contribution to the project. If more than one change was made, users should not create one commit message to cover all feedback and changes. New individual commits should be made to cover each individual change made to the relevant file being altered. Effective commit messages, covering context of a change, will enable MediaArea to work within a speedier, more efficient review process and better alter development around this feedback.


### Rules for Qt/C++ code

MediaArea’s open source project will be programmed in C++ and will use the Qt application framework.

Guideline for Qt is as follows:

MediaArea will follow the applicable rules for programming within the Qt cross-platform application development framework.

Attention to detail will be given to the following rules/guidelines:

Indentation:
- Four spaces to should be given for indentation (not tabs)

Variables:
- Each variable should be declared on separate lines, only at the   moment they are needed
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


### Rules for contributing code

Contributions of code or additions to MediaArea’s Preforma project documentation must be written with Qt (following the advised standards and practices) and must be made in the form of a branch submitted as a pull request.

- Create your feature branch (git checkout -b my-new-feature)
- Commit your changes (git commit -am 'adds some feature')
- Push to the branch (git push origin my-new-feature)
- Create a new Pull Request with a more verbose description of the proposed changes

Link to github repository: (https://github.com/MediaArea/PreFormaMediaInfo/fork)


### Rules for contributing feedback

Feedback of all kind is encouraged and can either be made through opening an issue on Github or by contacting the team directly at info@mediaarea.net.

Issue tracking and feedback will be encouraged directly through the open source platform (Github) around which, in addition to PreForma’s Open Source Portal, MediaArea will function and centralize the anticipated infrastructure for a collaborative community environments. In addition, contributions and feedback can be left via either the IRC channel or the mailing lists pertaining to the project.


### Linking

MediaArea will implement linking throughout the open source community in order to create a sustainable and documented infrastructure that facilitates clarity in the progression of the project. In order to produce an environment that offers both the users and MediaArea a space for descriptive feedback, intuitive discoveries within the code, and the ability to resolve issues, linking will function through the released source code, the corresponding software documentation, a ticketing system, general feedback, and potential commit messages. In one such example, as the registry itemizes user’s individual conformance checks and tests, these tests will subsequently link to code blocks and commits so that the software can continue to be developed and associated to that conformance check.

If this habit is implemented efficiently, MediaArea will create an open source community that enables ease in interacting and reviewing with both user-friendly and human-readable descriptions of conformity checks combined with their related programmatic results.


### Test Files

MediaArea’s test files and media will exist in the SampleTestFiles folder within the open source platform. This designated sample folder will also be broken down into separate folders for each relevant file format and the separate specification parameters set for testing.

It is anticipated that a large library of reference media and test files will be created to highlight the different outcomes associated with issues and errors that may arise in regards to certain files and specifications push through the software. The test files will either be self-created, solicited, or pulled from a variety of online reference libraries.

This curated selection of tests will include the following:

- files that conform to the relevant file format’s technical specifications
- files that do not conform and therefore deliberately deviate from the file format’s technical specifications (in association with the appropriately coded error messages)
- specific files that originate from and/or adhere to the technical specifications of the file formats from participating memory institutions (including examples that both conform to and deviate from the requirements)

Because it is crucial to the stimulation of a sustained and well documented open sourced community, the resulting issues and feedback from the testing of these created and solicited files will also be documented and will contain information on the relevant version of software used for the test.


## Release Schedule

MediaArea intends to release various versions of all relevant source codes and executables for each of the deployment platforms that the project will be configured to perform upon successfully. For stable versions of the software, new downloads and rolling releases will be provided and made available on a monthly basis. Stable versions will take into account software fixes, updates, and bug reports throughout the development phase and additionally will have gone through a QA process during that time. 

Certain deployed (LTS) versions, upholding the build of the stable versions, will be provided and released during the required delivery stages of the PreForma project and will be developed as sustainable for a long period of time within the open source project. 

New nightly builds and updates of the source code will also be made available to download during all stages. This ensures that all users and organizations will have access to downloading the most up-to-date version of code that exists throughout the project.

Downloads will be made available through a public repository with a functioning issue tracker (Github). In conjunction with the releases, a roadmap will be created in order to track these updates publically and encourage open collaborative usage and issue feedback. Both the older and more recent development, stable, and deployed (LTS) versions will be made available to users of any level, throughout these multiple platforms, for the entirety of the project. If a user wishes to download an older version of the source code or executable, MediaArea will have this option available.

All source codes and updates will be made accessible on the following platforms:

- MS Windows 
- Mac OSX
- Linux (Ubuntu, Fedora, Debian, and Suse)

In regards to the nightly source code builds and monthly stable version releases, MediaArea will facilitate easy access for users to download each of these different versions with the creation and upkeep of a single file that contains all of the necessary open source tools. Taking into account the varying deployment platforms, a different file (containing all relevant documents) will be created for each. The expected and differing standard procedures and patterns between the different platforms, as well as their individual configurability rules, will be upheld throughout the development and release phases. Support will be accessible via all of these platforms.

Along with the downloadable codes and tools, full supplementary documentation, developed to suit users functioning on each platform, will be included within the release schedule and will stay up-to-date with those releases. The necessary steps required in downloading and extracting MediaArea’s source code and software build, in order to created a directly executable object on the user’s machine, will be fully documented for every type of user.  We intend on establishing and releasing informational documentation including detailed, step-by-step instructions for both a non-technical and highly technical user or institution.


## License

All software releases and digital assets delivered by MediaArea will be produced and made available under the following Intellectual Property Rights (IPR) conditions:

- All software developed by MediaArea during the PreForma project will be provided under the following two open source licenses:
       - GNU General Public License 3.0 (GPLv3 or later)
       - Mozilla Public License (MPLv2 or later)

- All source code for all software developed by MediaArea during the PreForma project will always be identical and functional between these two specific open source licenses (“GPLv3 or later” and “MPLv2 or later”).

- All open source digital assets for the software developed by MediaArea during the Preforma project will be made available under the open access license: Creative Commons license attribution – Sharealike 4.0 International (CC BY-SA v4.0). All assets will exist in open file formats within an open platform (an open standard as defined in the European Interoperability Framework for Pan-European eGovernment Service (version 1.0 2004)).

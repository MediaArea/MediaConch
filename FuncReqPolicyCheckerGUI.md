## Policy Checker - Graphical User Interface

### Introduction

The policy checker graphical user interface will allow set of policy rules to be created and configured to specfic workflows and then applied to selected collections of files or file-queries across a file system. Although predefined presets are available, users shall be able to use the interface to create or edit policy check presets for reuse. A policy check preset will include a list will essentially be a recipe for evaluating the technical aspects of a set of files. Although MediaArea's implementation here will focus specifically on the selected formats of Matroska, FFV1, and LPCM, the policy checker will be able to preform checks on any type of file supported by MediaInfo.

MediaInfo currently manages a registry of terminology to express a diverse set of technical metadata characteristics, including information about containers, streams, contents, and file attributes. Such information is derived from container demuxing and specialized bitstream analysis. The approach of MediaInfo's design is to trace through the entire structure of a file and interpret all data in a manner that categorizes it to the content of the utilized formats underlying specifications. This interpretation of audiovisual data is comprehensive and specification based, but to supported more generalized use within media workflows, the information is then aligned to a pre-defined set of technical metadata terminology.

MediaArea will extend its matroska demultiplexer to focus on the complete potential expression allowed by Matroska 3 finalized and 1 experimental version as well as common Matroska format profiles such as webM. Additionally MediaInfo will continue work on its FFV1 bitstream filter to efficiently analyze single frame, partial streams, or whole streams. Such work will distinguish between contextual and technical metadata unique to the 4 existing versions of ffv1.

Within the use of the policy checker the user shall be able to comprehensive and conditional policy checks to apply to one or many files. The policy checker may be used to assess vendor deliverables, consistency in digitization efforts, obsolescence or quality monitoring, in order to better control and manage digital preservationc collections.

### Design & Functional Requirements

#### Standardizing Policy Expressions

To faciliate inter-operability between Preforma's developed Policy Checkers and the Shells of all suppliers, MediaArea proposes that all suppliers collaborate to define a common data expression for policy. The policy expression standard to cover a shared registry of technical metadata that shares overlapping scope amongst all supplier policy checkers (for example: policy expressions to test against file size or file name should express those technical concepts identically). Additional policies expressions from all Suppliers should share a concept list of operators such as 'must equal', 'greater than', 'matches regex', etc. A common policy expression shall also share methods to define conditional policy checks, for instance to conditionally test if the frame size is 720x576 is the frame rate is 25 fps and to test if the frame size is 720x486 if the frame rate is 30000/1001.

MediaArea recommends the policy expressions be standardizing with an XML Schema co-defined by all Suppliers, managed with version control in a common GitHub account, and accessible through the documentation of the Open Source Portal.

#### Policy Designer Interface

The policy designer interface enables users to create, edit, and share sets of policies. The functions of the policy designer interface shall include allowing the user to:

- create, edit, and remove policy sets
- name and describe policy sets
- import, export, and validate XML files of policy sets
- allow new policies to be added, edited, or removed from policy sets
- synchronize a vocabulary between the terminology registered in MediaInfo and the user interface
- use a list of policy test operators as defined in the policy expression XSD
- allow policies to be encapsulate within over conditional tests with an if/else approach

The policy designer interface will inform the user with a general indicator as to how time-consuming the test if. For instance to test that all selected Matroska files are version 3 or higher may be done with a quick header parse, but to test that all FFV1 frames have valid embedded CRCs would take a lot more time. Although policy sets may provide an indicator as to the amount of time required (i.e. which sets are quick and which are intensive). This information may be used to set up task scheduling efficiently.

#### File Selection Interface

The file selection interface shall allow the operator to load files through such methods as drag-and-drop, selection through system dialogs, or file system queries. Such sets of files or queries to identify files may then be saved, name, and described. Thus an operator may define a particular directory as an entry point for acquisitions, a queue for quality control assessment, or archival storage.

#### Policy Test Interface

Within the Policy Test Interface, the user may associate policy sets and file selections to form a policy test. Policy tests may contain name and descriptions which will be passed through to the resulting report to provide context. The policy tests may then be run directly or assigned to the task scheduler of the Shell. Within the Policy Checker GUI the results of the policy tests may then viewed or analysis within the Reporter GUI.

The policy test interface will provide access to a log of policy tests, the context of each test, and any errors in running the policy test (such as the file selection being unavailable).

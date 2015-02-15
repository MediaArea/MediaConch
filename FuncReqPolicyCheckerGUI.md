## Policy Checker GUI

### Introduction

The policy checker graphical user interface will allow set of policy rules to be created and configured to specfic workflows and then applied to selected collections of files or file-queries across a file system. Although predefined presets are available, users shall be able to use the interface to create or edit policy check presets for reuse. A policy check preset will include a list will essentially be a recipe for evaluating the technical aspects of a set of files. Although MediaArea's implementation here will focus specifically on the selected formats of Matroska, FFV1, and LPCM, the policy checker will be able to preform checks on any type of file supported by MediaInfo.

MediaInfo currently manages a registry of terminology to express a diverse set of technical metadata characteristics, including information about containers, streams, contents, and file attributes. Such information is derived from container demuxing and specialized bitstream analysis. The approach of MediaInfo's design is to trace through the entire structure of a file and interpret all data in a manner that categorizes it to the content of the utilized formats underlying specifications. This interpretation of audiovisual data is comprehensive and specification based, but to supported more generalized use within media workflows, the information is then aligned to a pre-defined set of technical metadata terminology.

MediaArea will extend its matroska demultiplexer to focus on the complete potential expression allowed by Matroska 3 finalized and 1 experimental version as well as common Matroska format profiles such as webM. Additionally MediaInfo will continue work on its FFV1 bitstream filter to efficiently analyze single frame, partial streams, or whole streams. Such work will distinguish between contextual and technical metadata unique to the 4 existing versions of ffv1.

Within the use of the policy checker the user shall be able to comprehensive and conditional policy checks to apply to one or many files. The policy checker may be used to assess vendor deliverables, consistency in digitization efforts, obsolescence or quality monitoring, in order to better control and manage digital preservationc collections.


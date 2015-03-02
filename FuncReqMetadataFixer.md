## Metadata Fixer -- Graphical User Interface

### Introduction

Although many audiovisual formats contain comprehensive support for metadata, archivists are eventually faced with a dilemma regarding its application. On one hand, a bit-by-bit preservation of the original data comprising the object is a significant objective. On the other hand, archivists prioritize having archival objects be as self-descriptive as possible. While the OAIS model aims to mitigate such a dilemma through the creation of distinct Information Packages, this is not often the case. For an institution managing digital files as objects for preservation, a change to the file's metadata is a change to the object itself; significant attributes such as file size and checksum are irreversibly altered. Because such revisions to the object prevent fixity functions, the decision on whether or not to fix or add metadata within the OAIS structure is oftentimes complex.

The intrinsic design of the Matroska file format aims to find a balance between these two considerations. Rather than relying on an external checksumming process to validate the fixity of the file, Matroska provides a mechanism for doing so internally. The CRC elements of Matroska may be used within any Element to document the subsequent data of the parent element's payload. With this feature a Matroska file may be edited in one particular section while the other sections maintain their ability to be easily validated. Thus in addition to (or possibly in lieu of) generating a file checksum during acquisition, a archive may use PREFORMA's Matroska tools to embed CRC elements if they do not already exist. When a Matroska file is internally protected by CRCs, the sections of the file may be edited or fixed while maintaining a function to verify the un-edited functions.

Because of these Matroska features, we are very interested in how archivists may work more actively with internal file metadata through various parts of the OAIS framework. For instance reports on file edits, repairs, and outcomes of preservation events may be added directly to the file. With such tools as proposed by this project, archivists and repository systems may work with living Matroska preservation objects which internally define the context and lifecycle of themselves over time while maintaining the fixity features of the contained audiovisual data which is the essence of the overall preservation focus and what the Matroska container may be used to describe, validate, and support.

Although the Metadata Fixer can provide comprehensive levels of control over metadata creation and editing, the central objective of the metadata fixer is to facilitate repair procedures for conformance or policy issues. The [Tag validation status](######validation-status) will be presented in detail or summarization dependent on the active layout and related problematic aspects of the file with designed repair solutions. Because metadata fixes or repairs will alter a preservation file, MediaArea has dedicated a signficiant level of caution to the design of these operations. Learning more our similar experience with BWF MetaEdit, such designs will be based off a thorough programmatic understanding of the file, the actions to move the file towards a greater level of conformity, and the risks associated with doing so. The interfaces designed here will serve to intuitively relate file issues, with programatically proposed fixes, and inform to provide the user with an understand of the context and risk of the fix.

### Design & Functional Requirements

#### File List Layout

The GUI version of the metadata fixer will provide an interface to see a table of summarized metadata for one or many open files. The intent is to go allow files to be sorted by particular technical qualities or the content of embedded metadata. A table-based presentation will also allow the inconsistancies of technical metadata to be easily revealed and repaired.

MediaArea has developed such interfaces in other conformance- and metadata-focused projects such as BWF MetaEdit and QCTools and plans to use the File List Layout as an interface center for batch file metadata operations.

##### Customizable Sections

The contents of the File List will be configurable according to the metadata values indexed by MediaInfo during a file parse. In the case of Matroska files these metadata values will also be categorized according to their enclosing Matroska section. These sections include:

    - Header
    - Meta Seek
    - Segments
    - Tracks
    - Chapters
    - Clusters
    - Cueing Data
    - Attachment
    - Tagging
    
In additional to Matroska sections a category of file attribute data will also be provided to show information such as file size, file name, etc. Additional a 'global' section is provided to show summarization of the file's status and structure.
    
A toolbar in the File List Layout will enable the user to select one or many sections to allow for focus on a particular section.

As an example, checking to show the columns associated with the Matroska Header shall reveal columns such as:

    - File format (Matroska, Webm, etc)
    - Format version (version of Matroska, etc)
    - Minimum read version

A global section would provide informational columns such as:

    - Amount of VOID data with the Matroska file
    - Percentage of CRC coverage with the Matroska file
    - Number of metadata tags
    - Number of chapters
    - Number of attachments

As metadata tags may vary substantially, the tagging section of the File List Layout will show selected level 4 metadata tags as well as a column to summarize what level 4 metadata tags are unshown. Columns values which show level 4 metadata tags which contain child elements shall note visually when that tag contains child tags and reveal a summarization of child values over mouse-over. Further interaction with of metadata tags in level 5 and below can be better found in the (Metadata Editor Layout)[####mkv-metadata-editor-layout] which shall be linked from each row of the File List Layout. Within the tag setion of the of the File List Layout the shown Level 4 metadata tags may be edited directly.

The order and selection of viewed columns within the File List Layout may be saved and labelled to configure the display. This feature will allow users to design and configure layouts for particular metadata workflows. MediaArea plans to provide specific layouts in accordance with the objective of particularly OAIS functions, such as to supply contextual metadata about a digitization or acquisition event.

##### Managing State of Metadata Edits/Fixes

A toggle within the toolbar will switch the table's editable entries from read-only to editable, to help prevent inadvertant edits. Each row of the File List Layout shall contain a visual status icon (File Edit State Icon) to depict the state of the file's metadata state. The File Edit State Icon will show if the file has been edited through the UI to different values than the file actually has; for instance, if the file must be saved before the shown changes are written back to the file. Metadata values within editable layouts shall appear in a different font, style or color depending on if they show what is actually stored or altered data that has not yet been saved back to the file. By selected a row which has an edited but unsaved state, the user shall be able to selet a toolbar option to revert the file's record back to its original saved state (to undo the unsaved edit).

##### Relational to Conformance / Policy Layouts

The File List Layout shall contain a column to summarize conformance and policy issues with each open file and link back to the associated sections to reveal more information about these issues.

#### MKV Metadata Editor Layout

The Metadata Editor Layout is designed to efficiency create, edit, of fix metadata on a file-by-file basis. The interface will show the contents of the Matroska tag section and provide various UI to facilitate guided metadata operations, such as providing a date and time interface to provide expresses for temporal fields, but also allowing text string expressions for all string tags as Matroska allows.

- Provide a table to show one row per metadata tag
- Provide columns with following values
    - [Hierarchy](#hierarchy)
        - A relator to link tags to one another in parent/child relationships
        - A UI toggle to show or hide child metadata tags 
    - Target Section
        - TargetTypeValue
        - TargetType
        - [TargetSummarization](#target-summarization) of track, edition, chapter, and attachment targets
    - Metadata Section
        - TagName
        - TagLanguage
        - TagDefault (boolean)
        - TagContent (combination of TagString, TagStringFormatted, and TagBinary UI)
    - Tag Status Section
        - [Tag validation status](######validation-status) (alert on tags adherance to specification rules, logical positioning, and formatting recommendation)

##### Interface Notes

###### Hierarchy

Each row of the metadata tag table may be freely dragged and dropped into a new position. Although this is usually semantically meaningless, the user should be able to organize the metadata tags into a preferred storage order. An example of this express in the UI could be that the Hierarchy column shall contain a positioner icon that the user may grab with the mouse to position the row in a different order. The positioner icon should also be able to be dragged left or right to affect the neighbor or child relationship to the metadata tag positioned above. For instance if there are two tags in the table at the same level called with the first called ARTIST and the second URL then both the ARTIST value and URL value refer to the declared target. However if the positioner icon of the URL tag row is moved to the right then the UI should indictate that the URL tag is now a child of the ARTIST tag, and thus the URL documents the URL of the ARTIST rather than the target.

###### Target Summarization

Each metadata tag may be associated with the context of the whole file or many specfic targets. For instance a DESCRIPTION may refer to one or many attachments or a particular chapter or a particular track, etc. In order to show the targets concisely the UI should present a coded summary to show one value that indicates the type and number of related target. The TargetSummarization may how "A3" to indicate that it refers to the third attachment, or "T4" to indicate that it refers to the fourth track. When the TargetSummarization is moused over a popup should reveal a list of associated targets with the UID and perteninet details of each target as well as a link to jump to a focus of that target within its corresponding layout (such as the Chapter Layout or Attachment Layout).

###### Tag Content Bahavior

Matroska tags may contain either a TagString or TagBinary element. When single-clicking or tabbing into a TagContent field then if the TagContent is a TagString it shall be directly editable and if the TagContent is a TagBinary the TagContentModalWindow shall appear selected to the Binary tab with a guided hex editor.

###### Tag Content Modal Window

The TagContent Modal Window is a UI designed to accommodate editing of TagContent or TagBinary values. The UI shall contain three tabs:

- String Editor
- Formatted String Editor
- Hexadecimal Editor

When creating a new metadata tag in a matroska file. If the TagName corresponds to a binary type it will open the Tag Content Modal Window to allow to the binary data to be provided, else it will default to allowing the metadata tag value to be edited within the string box of the layout in which the metadata tag was created. If the tag name of the newly created metadata tag corresponds to a binary type then the Hex Editor tab of the Tag Content Modal Window will be used.

The Hex Editor tab of the Tag Content Modal Window will allow for hexadecimal editing, allow data to be loaded to TagBinary from a selected file, or saved out to a new file.

When doubling clicking on an existing metadata tag in an editing or file list layout the Tag Content Modal Window shall open to reveal the most appropriate editing tab. If TagBinary is used then the Modal Window shall open to the Hex Editor tab. If TagString is used than it should use the Formatted String Editor tab if the data complies with the formatting rules, else use the String Editor.

###### Validation Status

The validation status indicators and associated procedures are central to the objectives of the Metadata Fixer. The Matroska specifications is rich with precise formatting rules and recommendations that are intended to facilitate the predictability and inter-operability of the file format; however, many Matroska tools and workflows make it easy to inadvertantly violate the specifications or cause conformance issues. The Metadata Fixer layouts will provide a visual indicator of validation status issues, so that when files are opened any validation issues are clearly show in relation to the invalid section and linked to appropriate documentation to contextual the issue. Additionally is an operator makes a modification that is consider a validation issues, the user will be informed to this issue during the edit and before the save. If the users tries to save metadata edits back to a Matroska file while their metadata edit contains validation issues, the user must confirm that this is intended and that the result will be invalid.

In many cases repairs to well defined validation issues are repairable programmatically. The Validation Status section of layouts will show related repair procedures (if defined) and summarize (to the extent feasible) the before-and-after effects on the file.

#### Metadata Import / Export

Both the GUI and CLI of the Metadata fixer will allow Matroska metadata tags to be imported into or exported from a Matroska file using Matroska existing XML tagging form. In addition to information typically found in Matoroska's XML tag format, information on validation status will be included.

#### Layout Preferences

- Checkboxes to disable appearance of columns in File List Layout
- Functions to allow the currently selected File List Layout options to be saved and labelled
- An ability to load pre-designed or user-created File List Layout options
- A list to specify level 4 Matroska tags to appear in File List Layout as a column
- Default value to use for the default value of TagLanguage on new metadata tags

## Metadata Fixer -- Command Line Interface

### Functional Overview

The Matroska Metadata Fixer command line interface will provide repository systems with a means to automatically assess what potential fixes may be performed, selectively perform them, add or changes files metadata, or preform structural changes to the file.

Overall all the features documented in the Metadata Fixer GUI are also feasible within the CLI, although some scripting may be necessary around the CLI to emulate a fully programmatic performance of all anticipated GUI workflows.

Functional Requirements include:

- accept one or many Matorska files as well as one or many PREFORMA policy speciications (via xml) as an input
- generate a text based representation of the EBML structure in json or xml, which identifies and categories EBML sections and which includes attributes to associate sections of the EBML structure (or the file itself) with registered conformance or policy errors
- validate a Matroska file against conformance or policy errors  and generate a text based output which summarizes errors with associated fixes
- preform and log identified metadata fixes
- add, replace, or remove Matroska metadata values based on a developed EBML equivalent of XPath

## Metadata Fixer -- Web Interface

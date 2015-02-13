## Metadata Fixer

### Design & Functional Requirements

#### File List Layout

- List open files in a table with the following metadata
    - File name
    - File size
    - File format (Matroska, Webm, etc)
    - Format version (version of Matroska, etc)
    - Percentage of CRC protection
    - Number of metadata tags
    - Number of chapters
    - Number of attachments
    - Selected Level 4 Matroska tag names

#### MKV Metadata Editor Layout

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
    - Status Section
        - Tag validation status (alert on tags adherance to specification rules, logical positioning, and formatting recommendation)

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

When doubling clicking on a metadata tag in an editing layout the Tag Content Modal Window shall open to reveal the most appropriate editing tab. If TagBinary is used then the Modal Window shall open to the Hex Editor tab. If TagString is used than it should use the Formatted String Editor tab if the data complies with the formatting rules, else use the String Editor.

The Formatted String Editor

#### Layout Preferences

- Checkboxes to disable appearance of columns in File List Layout
- A list to specify level 4 Matroska tags to appear in File List Layout as a column
- Default value to use for the default value of TagLanguage on new metadata tags

## OAIS Workflow

### Matroska Fixity

The fixity features of Matroska make it well suited for digital preservation. Each Element of Matroska may contain a CRC sub-Element which provides a checksum for the rest of the Element. Because of this the fixity of the contents may be verified even as the file may be changed from metadata editing, addition of attachments, or other modifications that result from the application of an OAIS workflow to the file.

# File implementation checker UI Design Report

Overview of similar software tools used for analysis and quality control.


## [QCTools](http://www.bavc.org/qctools)

*QCTools (Quality Control Tools for Video Preservation) is a free and open source software tool that helps users analyze and understand their digitized video files through use of audiovisual analytics and filtering. QCTools is funded by the National Endowment for the Humanities and developed by the Bay Area Video Coalition.*

Review of design elements:

QCTools provides charted graph analytics as well as video playback and filters for multiple video files with separate views for each.

Incorporation:

Much of the QCTools design elements can be brought into a implementation checker GUI. QCTools has fully functional video playback capabilities that can be replicated and used to do frame-by-frame analysis of video file with note to specific frame-based errors.

## [MediaInfo](https://mediaarea.net/us/MediaInfo)

*MediaInfo is a convenient unified display of the most relevant technical and tag data for video and audio files.*

Review of design elements: 

MediaInfo provides a basic text summary of the metadata elements of a large variety of file formats. Although available in a GUI format, the results are similar to its CLI output. Technical data is available only as viewing and cannot be edited.

Incorporation: 

MediaInfo is a powerful and valuable tool  with which to base metadata standards off of but is less inclined to provide a substantial basis for a graphical interface for conformance checking software.

[Images](https://mediaarea.net/en-us/MediaInfo/Screenshots)

## [BWF Metaedit](http://sourceforge.net/projects/bwfmetaedit/)

*BWF MetaEdit was developed by the Federal Agencies Digitization Guidelines Initiative (FADGI) supported by AudioVisual Preservation Solutions. BWF MetaEdit permits embedding, validating, and exporting of metadata in Broadcast WAVE Format (BWF) files.*

Review of design elements:

BWF Metaedit extracts a lot of useful metadata from WAVE files but the GUI design is bare-bones, so there is not much to review. Technical and core metadata options are straightforward and can be toggled as needed. 

Incorporation:

If a variety of rules/guidelines are to be considered in the implementation checker, options to change will have to be integrated into the software.

## [Dumpster](http://www.atomicdumpster.com/)

*Atomic Dumpster is a tool for inspecting the structure of a QuickTime movie file. It is designed to give QuickTime movie authors, and the other curious individuals a look at the structural composition of QuickTime movie files.*

Review of design elements: 

Dumpster has a straightforward execution and its strengths lie in the presentation of the file metadata as well as the ability to modify that metadata within the GUI. Elements are viewable in a nested, JSON-like structure which makes it easier for the user to see the hierarchical file structure of the metadata elements.

Incorporation: 

The implementation checker’s metadata should follow a hierarchical structure when possible so that the contents are broken up in an aesthetically pleasing and easy-to-read way. The metadata should be able to be edited when and where possible within the software.

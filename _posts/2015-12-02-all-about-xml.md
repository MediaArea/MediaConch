
# Building a Conformance Check Framework for the Future

Although initally focused on a select set of file formats, the vision of the PreForma project is to build conformance checkers that are well-prepared to expand to incorporate support for other file formats. Many aspects of checking the conformity of digital files are complex, involving the comprehensive parsing of file formats, interpretation of the contents, assessment of the contents against relevant specifications, transform of those specifications into  a programmatic language, logical reasoning and assessment, and the expression and display of the results. Each one of these aspects is complex enough on its own but to then redo this work within the content of multiple distinct file formats potentially creates a scenario for the escalation of programmatic chaos.

At the moment the development of MediaConch focuses on three formats: Matroska, FFV1, and LPCM. To develop a conformance checker for these formats that is also scalable to the future formats that we plan to support (ahem: QuickTime, MXF, DPX), we determined to reduce the amount of changing parts from format to format and attempt to find analogies between checking file format conformance and the more well-known validation environment of XML Schemas.

# XML Schema vs Conformance Check

XML Documents may be written to adhere to a specification detailed in an XML Schema and that XML Schema may then be used to test if the XML Document is valid or if not then to express problems in the XML Document. XML representations of metadata schemas are well used within archives and memory institutions as XML formats such as PBCore, EBUCore, METS, PREMIS, and others are applied in order to provide descriptive and technical metadata for archival objects. Because the level of expertise within the preservation community for XML validation is more available than the expertise of binary file format validation, the use of an XML-based approach for file format validation in PreForma may allow for resulting source code that is reviewable, comprehensable, and scalable.

However, binary file formats are quite unlike XML Documents. Binary files are not human readable like XML. Binary files are generally far more massive than XML files. Additionally, whereas the methodology to parse and interpret any format of XML is fairly intuitive and straightforward, the parsing and interpretation of binary file formats varies significantly from format to format.

Generally the standardization of XML Documents includes two pieces: an XML Schema, in the form of an XSD file, and a Data Dictionary, which explains the usage and meaning in human readable form. The XML Schema may be used to programatically test conformance of the XML Document to the standard whie the Data Dictionary explains the usage, meaning, and structure of the XML Document. Feasibly one could mostly validate an XML Document manually through careful interpretation of the Data Dictionary, but the use of an XML Schema programitically makes this effort nearly instantaneous.

For binary file formats there is typically an equivalent of the XML's Data Dictionary, such as a specification that documents how the file is constructed and intended to be interpreted. Ideally the specification of a binary file format is sufficient for a developer to build a comprehensive parser or interpreter for that format. However, for binary file formats it is highly unusual for there to exist the equivalent of the XML Schema which allows for programatically verification of the file format's conformance to the specification.

One excpetion to this is the Matroska file format where the authors of the specification have simultaneously developed an XML document that defines the Matroska structure and a utility called mkvalidate which can interpret that conformance of any Matroska file to that defined structure. In other cases such as MXF, the authors of 

TODO (all the rest of the post)

# MediaTrace

# XSL and Schematron

# Standardized Reporting
# Development of an Open Source Conformance Checker

The conformance checker developed within the PreForma project must document and associate conformance rules with data types (such as containers or frames) and authorities (such as specifications, community practices, or the local rules of a memory institution).

## Compliance with Standard Specifications

## Compliance with Community-Driven Implementation Standards

## Compliance with Local Institutional Criteria


## Performance of Fixes

Substantial care should be exercised to ensure that the Conformance Checker properly associates risk, user warnings, and assessments with each fix allowed. In order to allow a fix the software must properly understand and classify what may be fixed and be aware of how the result may be an improvement. Adjustments directly to a preservation file must be handled programmatically with great caution with diligent levels of information provided to the user.

An example of a fix that could be enabled in the RIFF format could be verifying that any odd-byte length chunk is properly followed by a null-filled byte. Odd-byte length chunks that do not adhere to this rule cause substantial interoperability issues with data in any chunk following the odd-byte length one (this is particularly found in 24 bit mono WAV files). If the odd-byte length chunk is not followed by a null-filled padding byte, then most typically the next chunk starts where the padding byte is and the padding byte may be inserted so that other following chunks increase their offset by one byte. This scenario can be verified by testing chunk id and size declaration of all following bytes so that the software may know beforehand if the fix (inserting the null-filled padding byte) will succeed in correcting the RIFF chunk structure’s adherence to its specification.

Fixes for Matroska files could include fixing metadata tags that don’t include a SimpleTag element or re-clustering frames if a cluster does not start on a keyframe.

# Ecosystem around Open Source Reference Implementation

## Feedback and Reporting

## Advance Improvement of Standard Specification

### FFV1 Specification

Efforts to create an FFV1 specification began in April 2012, continuing through the August 2013 release of FFV1 version 3. Currently the specification remains in development at http://github.com/ffmpeg/ffv1. Ideally a specification should fully inform the development of a decoder or parser without the need to reference existing implementations (such as the ffv1 implementations within ffmpeg and libav); however MediaArea's initial research and prototyping efforts with FFV1 found the current specification insufficient to create a decoder. As a result MediaArea utilized ffmpeg’s FFV1 implementation to fully interpret the specification. Several threads on the ffmpeg-devel and libav-devel listserv reference discussions about the development of the FFV1 specification and consideration of efforts to standardize the specification through a standards organization, such as IETF (Internet Engineering Task Force) [1].

In consideration of FFV1’s utilization within preservation contexts, the standardization of the codec through an open standards organization would better establish FFV1 as a trustworthy, stable, and documented option. At the moment FFV1 can be seen at a tipping point in its use within preservation context. It’s speed, accessibility, and digital preservation features make it an increasingly attractive option for lossless video encoding that can be found in more and more large scale projects; the standardization of FFV1 through an open standards organization would be of broad interest to digital preservation communities and facilitate greater accessibility of lossless encoding options that are both efficient and standardization.

MediaArea proposes working closely with the lead authors of the FFV1 specification in order to update the current FFV1 specification to increase its self-reliance and increase its clarity. Development of the FFV1 specification early within the PreForma project will generate substantial feedback to the authors of the specification which could then be offered through the specification’s github page via pull requests or the issue tracker. MediaArea proposes at a later stage of development that the Preforma project serve as a catalyst to organize, facilitate, and sponsor the IETF standardization process for FFV1.

Considering the 2 year timeline of the PreForma project and usual pace of IETF standardization projects, we proprose at least submitting FFV1 as an Independent Submission to IETF which could provide workable timeline, encourage a detailed review process, and assign a formal RFC number to the specification.

[1]: http://www.ietf.org/

### Matroska Specification

Both the Matroska specification and its underlying specification for EBML are at mature and stable stage with thorough documentation and existing validators, but several efforts of the PreForma project can serve as contributions to this specifications. The underlying EBML specification [1] has already been drafted into RFC format but is has not yet been submitted to IETF as an Independent Submission or otherwise.

Matroska has a detailed metadata specification at http://www.matroska.org/technical/specs/tagging/index.html. Each tag has an official name and description while provides rules and recommendations for use. Many of these tags could be associated with validation rules, such as expressed by regular expression to assure that the content of the tag conforms to expectations. For instance tag such as URL, EMAIL, or ISBN have specific allowable patterns for what may be contained. As part of build a conformance tool for Matroska, MediaArea will generate conformance tests for individual tags and these tests may be contributed back to the Matroska specification in a list of regex values, an XML schematron file, or other acceptable contribution method.

[1]: http://matroska.org/technical/specs/rfc/index.html

### Other Suggested Improvements or Contributions to Standard Specifications

Register an official mime type via IETF for Matroska.

Register dedicated FFV1 codecid with Matroska (current use is via fourcc).

Proposal of a tagging extension to Matroska based on the requirements of the digital preservation community.

Feedback for features and functions of FFV1 version 4, which is currently under development.

Creation of metadata translators to convert common descriptive metadata formats within memory institution. For instance convert EBUCore into the XML representation of the Matroska tagging specification so that such metadata may be easily imported and exported between EBUCore and Matroska.

## Advance Business Cases for Managing Preservation Files

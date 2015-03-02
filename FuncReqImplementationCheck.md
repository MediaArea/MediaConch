## Implementation Checker

### Introduction

The implemententation checker is the centerpiece of the project and where development efforts shall be the most consequential to memory institutions and the underlying standards organizations. MediaArea plans to use the utmost precision and transparency within the development of the implementation checker so that it may, to the greatest extent feasible, produce an accurate and referenced analysis regarding the adherence or transgression of a selected file format to its associated specifications.

Measuring the extent of the adherence of files to associated specifications can be adjusted by the user, for instance the user may wish to only verify files against a particular version of a specification, or choose to exempt or excuse certain violations, or choose to only assess part of a file (for instance to only test the frame X frames of FFV1 for adherance) in the interest of time.

The design of the implementation checker will enable the user to have some control over the comprehensiveness or extent of the checking process. Additionally the expression of violations should provide both new and advanced users with enough context to the understand the outcome. For instance as the implementation checker reports conformance errors (such as a FFV1 frame expressing an invalid aspect ratio, an MKV file omitting required metadata for an attachment, or that the data size of an LPCM stream contradicts the metadata of the encapsulating format) the output should associate that error with contextual information to reference to violated section of the specification, document potential response, and advise the user to the consequence and meaning of the error.

Ultimately the implementation checker (supported by the other components of the conformance checker) should enable memory institutions to fully understand, validate, and control the file formats selected by the project.

### Registry of Checks

The implementation checker must be associated with an active and open registry of checks. The registry shall describe each conformance test in easy to understand, approachable language, with citations to the associated specification, and details of any logic, deductive reasoning, or inferrence clearly detailed. The registry should associate each test to the source code that enacts the so that the human-defined and computer-defined implementations of each check may be strongly linked.

The Registry must allow support community involvement, such as associated forums, issue trackers, links to asscoiated sample files, etc. The design of the Registry and its intertwinement with the Implementation Checker will provide users with a means to navigate from their discovery to sample files, source code, community knowledge, and context.

The registered checks shall be categorized according to its associated authority and specification document. The grouping of rules shall enable the user to select parts of an implementation check if necessary. For instance the Matroska specificiation is comprised of several versions and several underlying specifications, such as Extensible Binary Meta Language (EBML). The implementation checker should be able to test if a file is valid according to all known checks asscoiated with Matroska, but should also be able to validate a file against only the rules derived from the Extensible Binary Meta Language specification.

### Demultiplexing

MediaArea's project focus includes two formats of encoded audiovisual data (FFV1 and LPCM) that are usually found within other container formats (which may or may not be Matroska). We intend the implementation checker to function properly for FFV1 and LPCM even if they are not contained within Matroska. MediaInfo already contains the ability to parse encoded streams from container formats such as AVI, QuickTime, MXF, and many others. By re-licensing MediaInfo under Preforma's licesning requirements we can ensure that the implementation checker maintain relevance for file formats such as FFV1 in AVI and FFV1 in QuickTime (both found widely in early discovery interviews and surveys). In these cases the Implementation Checker will report on the implemetnation of the supported formats specifically (here FFV1) and not focus on unsupported container formats which happen to be deployed.

### Implementation Checker

The implementation checker receives the incoming data from the file added to the system to be inspected and the desired specification chosen within the Policy Checker and verifies that they match or that the file's parameters fit within the range of the policy's rule set.

The results of this check is sent to the Reporter (via the Core), which then translates the errors into the expected output.

An API call is required for this component only, for use in batch processing.
# Conformance Check Registry

## Introduction

This documentation explains the elements, structure, and intent of the Preforma Mediainfo Conformance Check Registry.
A conformance check is a particular test applied to a files or section of a file in order to quantify the adherence of such data to associated sets of rules and practices.

## Conformance Check Registry Requirements
Open documentation must be maintained for each Conformance Check.
Documentation for Conformance Checks must offer hierarchical relationships between related checks.
Conformance Checks must be documented according to their CCID (Conformance Check Identifier) and Version number.
Any revised Conformance Check must maintain a changelog as well as records of all past versions of the conformity check.
The following keywords to indicate requirement levels when used in a conformance check description MUST be used according to their definitions provided by (RFC2119)[http://tools.ietf.org/html/rfc2119]: "MUST", "MUST NOT", "REQUIRED", "SHALL", "SHALL NOT", "SHOULD", "SHOULD NOT", "RECOMMENDED",  "MAY", and "OPTIONAL".

## Elements

### Name
A human-readable name for the conformance check.

### CCID
Conformance Check Identifier. An alphanumeric identifier used to reference or identify the conformance check to order to relate code, documentation, and reports that reference the check.

### Version
The version number of the reference Conformance Check. This value should be expressed as a standard GNU version number in major.minor.revision format. A value of "0" may be used to indictate draft status.

### Authority
The authority associates each conformance check with a standards organization, community, or logic from which the conformance check is derived. Examples: EBU, Microsoft.
Within the use of a Conformance Checker, the user may enable or disable check from certain authorities; for instance to perform checks against specifications of Standards Organization A and Community Practice B, but not Standards Organization C or Community Practice D.

### Target Format
The name of the file format, codec, or bit stream that is to be test.

### Target Format Version
Identify the version of range of versions of the target format which are eligible for the conformance test. A numeric range should be used or the word "all" if the rule applies to all known versions.

### Target Format Part
The name of a chunk, atom, element, bitstream, or other smaller component of the target format that the conformance check relates to.

### Citation
A reference of the specific document, specification, or reference from which the conformance check is derived. Typically the citation will be a publication or expression of the 'Authority'.

### Test Type
The 'Test Type' classifies the outcome of the conformance test to say it the result is true/false, quantitative, or subject to personal judgement.
Restricted Vocabulary:
    True/False
    Numerical Range
    Warnings

### Threshold
If 'Test Type' is set to Numerical Range, the threshold provides an equation applied to the number to achieve a True/False result.

### Definition
A clear description of conformanace check.

## Definitions

### Codec

### Container

### Frame

### Conformance

## Abbreviations

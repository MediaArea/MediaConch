[[TOC]]

# INTRODUCTION

Within a PREFORMA project to design tools and workflows to assess and verify the adherence of open file formats to their specifications, the specifications themselves are a crucial foundation to the ongoing stability and efficiency of the project. In the case of Matroska and FFV1 specification work have been under development but has been undertaken the vetting processes associated with a more formal standardization process. MediaArea finds that strengthening the disclosure, transparency, and credibility of Matroska and FFV1 are relevant objectives to the development of conformance checkers and present this plan to coincide with our larger proposal for software development to meet the PREFORMA Challenge.

# OBJECTIVES

The priorities here are largely focused on FFV1 sustainability factors:

* Ensuring that complete, authoritative, open and accessible documentation is available
* Credibility
* Transparency

MKV v3 and FFV1 v3 to be submitted to the IETF as informational streams. In this way both can be standardized without IETF changing what is already in use. The objective here is to improve the sustainability factors for both formats including disclosure, credibility, and transparency.

## Advantages of Pursuing Standardization Within IETF

*"The review that comes with the process leads to better designs (or at least more confidence in them by others), and less fear of the format being changed arbitrarily." * (NOTE:  From an email conversation between the PreForma project team and a project interviewee)

Three options were initially considered for pursuing standardization: IETF, SMPTE (Society of Motion Picture and Television Engineers), and ISO(International Organization for Standardization. Foremost among a number of factors that made SMPTE and ISO unsuitable for this endeavor was the fact that both SMPTE and ISO have a paywall in place.  Payment for access to standards runs counter to the ideals of the PreForma project. Within the context of digital preservation it is imperative for file formats to be well-disclosed, understood, and controlled within an archival setting; specification paywalls provide an obstacle to this objective.

Our research and conversations with users and experts led us to conclude that IETF is the most relevant body for ffv1 and MKV work. Furthermore, IETF has experience with open audiovisual file formats (e.g. RFC 3533 for OGG container format, RFC 6386 for VP8 video format and RFC 6716 for Opus audio format).

## Preliminary Outreach

* Conversations with experts and OPUS standard lead authors
* Communication with IETF members and Working Group Area-Directors
* Confirmed following persons to serve as expert advisors:
 - Michael Niedermayer (FFV1 - FFmpeg)
 - Luca Barbato (FFV1 - libav)
 - Moritz Bunkus (MKV)
 - Ian Henderson (FFV1/MKV user)
 - Richard Barnes (implementation, standardization)

## Precedent/Templates

The following standards will be useful in mapping out the most effective route to standardization.

* OPUS
    * [http://opus-codec.org](http://opus-codec.org) 
    * [https://tools.ietf.org/html/rfc6716](https://tools.ietf.org/html/rfc3533)

* OGG
    * [https://tools.ietf.org/html/rfc3533](https://tools.ietf.org/html/rfc3533)

    * [https://tools.ietf.org/html/rfc5334](https://tools.ietf.org/html/rfc5334)
* OAuth: this is of particular interest because the process for publication informs how we intend to pursue publication, namely by submitting an Internet-Draft and using feedback from the IETF community to inform creation of a Standards proposal.
    * [http://oauth.net/2/](http://oauth.net/2/) 
    * [https://tools.ietf.org/html/rfc5849](https://tools.ietf.org/html/rfc5849)
    * [https://tools.ietf.org/html/rfc6749](https://tools.ietf.org/html/rfc6749)
* VP8
    * [https://tools.ietf.org/html/rfc6386](https://tools.ietf.org/html/rfc6386) 

# PLANNING

## Timeline: 18 months (April 2015 - October 2016)

*Divided into 3 month segments.*

**Potential Tracks for Standardization within the IETF**

![IETF process: potential tracks](ietf-process-3.jpg)

### April 2015 - June 2015 (Part 1A)

1. Finalize recruitment and project staff

    - Coordinating author: coordinate refining existing documentation, identify gaps, coordinate and utilize feedback, manage issue tracker status

    - Standards coordinator: liaison between the IETF community, the authors, and the development and user communities of MKV and FFV1

    - Expert panel/advisory board: contribute to, peer review, guide, co-write, and advise upon standards documentation for both formats

    - IETF adviser: possesses expertise and knowledge of IETF procedures and protocol; advises team on IETF submissions, planning, and best practices

    - IETF document shepherd: this role may be merged with the coordinating author and/or standards coordinator

2. Establish public forums and Git repository

3. Prepare 6 month benchmarking outline

4. Monthly Skype meeting: introductions, project goals, primary objectives and concerns

5. Request Birds of a Feather (BOF) meeting at July 2015 IETF 93 meeting (IETF deadline: June 05)

6. Submit first working Internet Draft to I-D Announce list prior to meeting (IETF deadline: July 06)

### July 2015 - September 2015 (Part 1B)

1. Attend IETF 93; meet with stakeholders, and solicit in-person feedback

2. BOF meeting

3. Incorporate BOF/IETF 93 feedback into revision of I-D v.2

4. Submit I-D v. 2 to I-D Announce list and other appropriate forums

5. Evaluation of Part I benchmarks

6. Disseminate 1 year benchmarks for remaining 12 months of project

7. Open Forum: online meeting for community to ask questions directly to project staff and discuss project

### October 2015 - December 2015 (Part 2A)

1. Ranking of improvements and requested features/changes

2. Submit I-D v. 3 to I-D Announce list and other appropriate forums

3. Final decision on creation of new working group vs. existing working group

4. Open Forum: online meeting for community to ask questions directly to project staff and discuss project

### January 2016 - March 2016 (Part 2B)

1. Submit final I-D to I-D Announce list and other appropriate forums

2. Working group meeting proposal (either as part of existing working group OR new working group)

3. Prepare documentation for transition from Internet-Draft to Standards track (NOTE:  "A Proposed Standard specification is stable, has resolved known design choices, has received significant community review, and  appears to enjoy enough community interest to be considered valuable." (IETF RFC 7127) http://www.rfc-editor.org/rfc/rfc7127.txt )

4. Open Forum: online meeting for community to ask questions directly to project staff and discuss project

### April 2016 - September 2016 (Part 3; 6 months: final phase)

1. IETF 95: present proposed Standard

2. Standards track: working group consensus, AD review, IESG review

3. FInal revisions to Standard proposal

4. IETF 96: present comprehensive project report

## Personnel

1. Experts: Michael Niedermayer, Luca Barbato, Moritz Bunkus, Ian Henderson

2. IETF Advisor (to be confirmed): Richard Barnes, RAI Area Director to March 2015

3. Working Group-Area Director contact: Ben Campbell, RAI AD after March 2015

4. Coordination Author: (NOTE:  The coordinating author and standards facilitator may or may not be the same person. The coordinating author and standards facilitator shall be outside of FFmpeg/MKV community in order to avoid conflict or perception of bias.) TBD

5. Standards Facilitator: TBD

6. Document Shepherd (NOTE:  http://tools.ietf.org/html/rfc4858 ): may be IETF member or project member 

**Partners**

Confirmed participation from staff affiliated with the following institutions/companies; we intend to include more partners as the project progresses.

1. National Library of Wales
2. Artefactual Systems
3. UK National Archives

## Community

As with the larger project, we seek a great deal of transparency and participation in the process.  Engagement with relevant communities and stakeholders will be of paramount importance to making the standardization effort successful.  To that end, the following will be implemented to ensure constructive, cooperative, and inclusive participation:

* Code of Conduct
    * Procedures for addressing conflicts, blocking issues, etc
    * Templates:
        * Django Code of Conduct [https://www.djangoproject.com/conduct/](https://www.djangoproject.com/conduct/)
        * libav Code of Conduct: [https://libav.org/about.html](https://libav.org/about.html)
* IRC channel for discussion
* IETF mailing lists (ID-Announce, Dispatch, relevant working groups)
* Project website including documentation, updates, and contact information
* Social media hub maintained through Diaspora (NOTE:  https://diasporafoundation.org )
* GitHub public repository
* Project representation at relevant conferences (primarily IETF; others as time and budget permit)

### Membership

ISOC: IETF recommends participation and membership in the Internet and Society. Membership at the small business level is €1117 (membership for individuals is free).

# IETF Documentation

Below are links to some of the IETF documents that are relevant to this project and have not been cited elsewhere in this document..  An outline of the Internet Draft to Independent Stream process (from The Tao of the IETF)  is also included to provide some reference for a timeline.

IESG Procedures for Handling of Independent and IRTF Stream Submissions [https://tools.ietf.org/html/rfc5742](https://tools.ietf.org/html/rfc5742)

IETF editor model (2012)

[https://tools.ietf.org/html/rfc6548](https://tools.ietf.org/html/rfc6548) 

Function and responsibilities of the RFC,  Independent Submission Editor (ISE) [https://www.rfc-editor.org/indsubs.html](https://www.rfc-editor.org/indsubs.html)

Independent Stream, IETF Data tracker

[https://datatracker.ietf.org/](https://datatracker.ietf.org/) 

Independent Submissions to the RFC Editor 

[http://www.ietf.org/about/process-docs.html#RFC4846](http://www.ietf.org/about/process-docs.html#RFC4846) 

Rights Handling, Independent Submission Stream

[http://www.ietf.org/about/process-docs.html#RFC5744](http://www.ietf.org/about/process-docs.html#RFC5744) 

The Tao of the IETF, Broad Outline of the Internet Draft to WG/Independent Stream Submission
[http://www.ietf.org/tao.html](http://www.ietf.org/tao.html) 

1. Publish the document as an Internet-Draft (TF: Informational Document)
2. Receive comments on the draft.
3. Edit your draft based on the comments.
4. Repeat steps 1 through 3 a few times.
5. Ask an Area Director to take the draft to the IESG (if it's an individual submission). If the draft is an official Working Group product, the WG chair asks the AD to take it to the IESG.
6. If the Area Director accepts the submission, they will do their own initial review, and maybe ask for updates before they move it forwards.
7. Get reviews from the wider IETF membership. In particular, some of the Areas in the IETF have formed review teams to look over drafts that are ready to go to the IESG. Two of the more active review teams are from the Security Directorate ("SecDir") and the General Area Review Team (Gen-Art). Remember that all these reviews can help improve the quality of the eventual RFC.
8. Discuss concerns with the IESG members. Their concerns might be resolved with a simple answer, or they might require additions or changes to the document.
9. Wait for the document to be published by the RFC Editor.

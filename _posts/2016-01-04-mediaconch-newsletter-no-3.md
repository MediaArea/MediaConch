---
layout: default
title:  "MediaConch Newsletter No. 3 (4 Jan 2015)"
date:   2016-01-04 13:30:00 CET
categories: newsletter
---

![Complete logo](/MediaConch/images/ms-icon-310x310.png) 

# MediaConch Newsletter #3 (January 2016)

### Happy New Year from the MediaArea team!

**New Release**

What’s new in MediaConch 15.12?

* Database support introduced

With an introduction of a database built into the GUI, the most noticeable improvement is speed. Instead of parsing a file every time it is analyzed, it will only be parsed once, with subsequent policies then applied to the pre-analyzed content. Having a database will, in the future, allow users to apply custom policies to the full library content without having to wait a long time. This will also allow for the generation of custom statistics based on collections instead of just individual files. For example, if a percentage of the parsed library has "Error X," it will be easier to gather similar files and determine which writing library was producing the error. This is one of many ideas other developers could implement with so much data available in the database.

* New logo

MediaConch finally has its own logo, never to be confused with MediaInfo again! More details about the logo can be found in this [blog post](https://mediaarea.net/MediaConch/2016/01/04/MediaConch-now-has-a-logo/) about the design.

* More explicit licences

MediaConch and MediaInfo library are licensed as GPLv3+ and MPLv2+, as stated in the software. Additionally, a list of third party libraries and their licences are available on our [Github ](https://github.com/MediaArea/MediaConch#licensing-of-third-party-libraries)[readme](https://github.com/MediaArea/MediaConch#licensing-of-third-party-libraries)[ page](https://github.com/MediaArea/MediaConch#licensing-of-third-party-libraries).

* Implementation test improvements

Implementation tests now load logic from an XML representation of the Matroska EBML Schema. The XML tests on valid parent elements, element multiplicity, and mandated child elements, among other things.

* EBML

As part of our goal to standardize and clarify the formats, Matroska/EBML draft specifications are being regularly updated. These changes are reflected in MediaConch 15.12.

* Other bug resolutions

Support for negative timecodes in Matroska files 

Better support of non-English filenames 

Display format is now also applied on invalid files 

MediaTrace now documents the parser used for raw streams within Matroska. 

MediaConch releases updated software on a monthly basis. Nightly builds are also available for testing the most recent development.

**Homebrew**

For Mac users, MediaConchCLI can now be downloaded via Homebrew. `brew install mediaconch` will install the latest version of the software. Moving forward, `brew upgrade mediaconch` will upgrade the package to the latest release.

**Artefactual Collaboration**

MediaConch will be working with the Artefactual team to integrate into their Archivematica software during the upcoming year. Artefactual will provide testing and feedback on software tools being developed by MediaArea as part of the PreForma project. Artefactual will also integrate select MediaConch tools into [Archivematica](https://www.archivematica.org) and provide associated documentation and support for those features.

**CELLAR**

Ongoing work towards the standardization of Matroska and FFV1 can be followed via the recently-founded IETF working group, CELLAR (Codec Encoding for LossLess Archiving and Realtime transmission).

More information on CELLAR and opportunities to join in the discussion via mailing list are available on their website: [https://datatracker.ietf.org/wg/cellar/charter/](https://datatracker.ietf.org/wg/cellar/charter/)

**FOSDEM**

Project lead Jérôme Martinez will be presenting on our work at the upcoming FOSDEM conference in Brussels (30-31 January, 2016). FOSDEM is a conference held annually for open source software developers. The title of his talk is "CELLAR, Status report on an IETF Working Group for Matroska, FFV1, and FLAC."

Conference website: [https://fosdem.org/2016/](https://fosdem.org/2016/)

[Event page: https://fosdem.org/2016/schedule/event/mediaconch/](https://fosdem.org/2016/schedule/event/mediaconch/)

**Past and future events**

In case you missed it, MediaConch was represented at the Association of Moving Image Archivists  in Portland (20 November) and Fédération Internationale des Archives de Télévision / The International Federation of Television Archives (FIAT/IFTA) World Conference in Vienna (8 October). If you weren’t able to make it, we covered the events on our blog.

AMIA: [https://mediaarea.net/MediaConch/2015/12/02/MediaArea-presents-at-AMIA/](https://mediaarea.net/MediaConch/2015/12/02/MediaArea-presents-at-AMIA/)

FIAT/IFTA: [https://mediaarea.net/MediaConch/2015/12/02/MediaArea-presents-at-AMIA/](https://mediaarea.net/MediaConch/2015/12/02/MediaArea-presents-at-AMIA/)

MediaConch will be holding a webinar in January or February. More details to come soon.

Team member Ashley Blewer will be speaking at Code4lib (7-10 March, Philadelphia, PA, USA) about [community-driven audiovisual archiving microservices](http://2016.code4lib.org/talks/Free-your-workflows-and-the-rest-will-follow-communitydriven-AV-solutions-through-open-source-workflow-development/), including MediaConch development. Project lead Dave Rice will also be attending. 

MediaConch will be presenting at the PREFORMA Open Source Preservation Workshop in Stockholm on 7 April, 2016 at the National Library of Sweden. Registration is free and open until 31 March: [http://www.digitalmeetsculture.net/article/preforma-open-source-preservation-workshop/](http://www.digitalmeetsculture.net/article/preforma-open-source-preservation-workshop/)

In July, MediaConch will be attending the IETF conference held in Berlin (17-22 July) and plans to hold an open source workshop for MediaConch users at that time.

## Feedback

MediaArea is eager to build a community of collaborators and testers to participate in and use the results of the project. You can contact us [here](https://mediaarea.net/newsletter/lt.php?id=LEkECU0EAURUBQ) for more information.

Best,

The MediaConch Team

Follow us on Twitter: [@MediaConch](https://mediaarea.net/newsletter/lt.php?id=LEkGAU0EAURUBQ)


---
layout: downloads
permalink: download.html
title: "Download MediaConch"
---

# Downloads

## 15.12 Release Notes

### CLI, GUI and Onlinve version

New icon
Database support (speed improvement: file is parsed once, then policies are applied to the pre-analyzed content)
More explicit licences (MediaConch and MediaInfo library are GPLv3+ and MPLv2+, list of third party libraries and their licences)
Matroska: negative timecodes were not correctly handled
Better support of non-English filenames
Display format is applied also on invalid files
Implementation tests now load logic from an XML representation of the Matroska EBML Schema
Implementation tests on valid parent elements, element multiplicity, mandated child elements
MediaTrace now documents the parser used for raw streams within Matroska.
Sync tests with latest Matroska/EBML draft specifications.


### Historical Release Notes

{% for post in site.releasenotes reversed %}
  [{{ post.date }}]({{ post.url | remove_first:'/'}})
{% endfor %}

### Snapshots

You can test ongoing developments for MediaConch by downloading our [daily builds](/MediaConch/downloads/snapshots.html).

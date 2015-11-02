---
layout: downloads
permalink: download.html
title: "Download MediaConch"
---

# Downloads

## 15.10 Release Notes

### CLI

Implementation checker with some EBML tests
Help updated and split (standard / advanced)
More output combinations (e.g. implementation checker with Text, HTML, or XML output)
MediaInfo XML export
Text/HTML/XSL output support
Several bug fixes

### GUI

Implementation checker with some EBML tests
New set of default Policy reports
About box and Help documentation added
More coherent list of options
MediaTrace UI changed, with a grid (offset on the left, value on the right)
MediaInfo report UI
MediaInfo XML export
Policy XSL editor updated
Display XSL import / export
Text/HTML/XSL display examples
Several bug fixes

### Online

[MediaConchOnline](https://mediaarea.net/MediaConchOnline/) is not yet synchronized with MediaConch 15.10, ETA 2015-11-04.

### Historical Release Notes

{% for post in site.releasenotes reversed %}
  [{{ post.date }}]({{ post.url | remove_first:'/'}})
{% endfor %}

### Snapshots

You can test ongoing developments for MediaConch by downloading our [daily builds](/MediaConch/downloads/snapshots.html).

---
layout: downloads
permalink: download.html
title: "Download MediaConch"
---

# Downloads

## 15.11 Release Notes

### CLI, GUI and Onlinve version

Detection of truncated Matroska files
Support of MKVMerge statistics tags (duration frame count, stream size, bit rate) per track
Count of subtitle elements
Frame rate detection algorithm revisited
Showing precision of 1/1.001 frame rates (e.g. "23.976 (24000/1001) fps" and "23.976 (23976/1000) fps")

### Historical Release Notes

{% for post in site.releasenotes reversed %}
  [{{ post.date }}]({{ post.url | remove_first:'/'}})
{% endfor %}

### Snapshots

You can test ongoing developments for MediaConch by downloading our [daily builds](/MediaConch/downloads/snapshots.html).

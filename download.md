---
layout: downloads
permalink: download.html
title: "Download MediaConch"
---

# Downloads

## 15.09 Release Notes

### CLI

Support of XSLT policies.  
Support of HTTP/HTTPS/FTP/FTPS URLs in input.  

### CLI and GUI

Design of the report is changed (similar to MediaConchOnline).  
Examples of policies provided by default.  
Support of XSLT policies.  
Drag and drop of several files.  
MediaTrace UI.  
Save of MediaTrace output in XML format.  
Support of HTTP/HTTPS/FTP/FTPS URLs in input.  

### Online

[MediaConchOnline](https://mediaarea.net/MediaConchOnline/) features MediaTrace user interface and XSLT support.

### Historical Release Notes

{% for post in site.releasenotes reversed %}
  [{{ post.date }}]({{ post.url | remove_first:'/'}})
{% endfor %}

### Snapshots

You can test ongoing developments for MediaConch by downloading our [daily builds](/MediaConch/downloads/snapshots.html).

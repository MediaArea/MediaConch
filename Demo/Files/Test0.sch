<?xml version="1.0" encoding="UTF-8"?>
<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron">
  
  <sch:pattern name="Each file has unique ID">
    <sch:rule context="//File/track[@type='General']">
      <sch:assert test="UniqueID">Unique ID must exist.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="General Format must be Matroska">
    <sch:rule context="//File/track[@type='General']">
      <sch:assert test="Format = 'Matroska'">General Format must be Matroska.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="Extension must be mkv">
    <sch:rule context="//File/track[@type='General']">
      <sch:assert test="FileExtension = 'mkv'">File extension must be mkv.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="Duration must be 1 second">
    <sch:rule context="//File/track[@type='General']">
      <sch:assert test="Duration = 1000">Duration must be 1 second.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="Frame rate must be 25">
    <sch:rule context="//File/track[@type='General']">
      <sch:assert test="FrameRate = 25">Frame rate must be 25.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="File has a video stream.">
    <sch:rule context="//File">
      <sch:assert test="track[@type='Video']">Video stream must exist.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="Video file has unique ID">
    <sch:rule context="//File/track[@type='Video']">
      <sch:assert test="UniqueID">Video track Unique ID must exist.</sch:assert>
    </sch:rule>
  </sch:pattern>

  <sch:pattern name="Video Format">
    <sch:rule context="//File/track[@type='Video']">
      <sch:assert test="Format = 'FFV1'">Video Format must equal FFV1.</sch:assert>
    </sch:rule>
  </sch:pattern>
 
  <sch:pattern name="DisplayAspectRatio must be 1.333">
    <sch:rule context="//File/track[@type='Video']">
      <sch:assert test="DisplayAspectRatio = 1.333">DisplayAspectRatio must be 1.333.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
  <sch:pattern name="Coder type should be Golomb Rice">
    <sch:rule context="//File/track[@type='Video']">
      <sch:assert test="coder_type = 'Golomb Rice'">Coder type must be Golomb Rice.</sch:assert>
    </sch:rule>
  </sch:pattern>
  
</sch:schema>
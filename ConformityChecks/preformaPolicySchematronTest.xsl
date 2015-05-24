<?xml version="1.0" encoding="UTF-8"?>
<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron">
  <sch:ns uri="https://mediaarea.net/MediaConch/PolicyXML" prefix="ex"/>

<!-- This replicates Erik's very specific test policy -->

    <sch:pattern name="Format must be Matroska">
      <sch:rule context="ex:File">
          <sch:assert test="(@Format = 'Matroska'">Format must be Matroska</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- Needs to convert 157 to integer to make this logic work -->
<!-- If it always converts to Mbps it can be input as only an int value -->
    <sch:pattern name="OverallBitRate must be greater/equal to 157 Mbps">
      <sch:rule context="ex:track[@type='General']">
          <sch:assert test="@OverallBitRate ge 157">OverallBitRate must be greater/equal to 157 Mbps</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- Same problem, more difficult -->
    <sch:pattern name="Duration must be less than 3s 671ms">
      <sch:rule context="ex:track[@type='General']">
          <sch:assert test="@Duration lt 4">Duration must be less than 3s 671ms</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Format_Version must be ">
      <sch:rule context="ex:track[@type='General']">
          <sch:assert test="(@Format_Version = 'Version 4 / Version 2'">Format_Version must be Version 4 / Version 2</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Video format must be FFV1">
      <sch:rule context="ex:track[@type='Video']">
          <sch:assert test="(@Format = 'FFV1'">Video Format must be FFV1</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- Same issues as Line 22 for Video track only -->
    <sch:pattern name="Duration must be less than 3s 671ms">
      <sch:rule context="ex:track[@type='Video']">
          <sch:assert test="@Duration lt 4">Duration must be less than 3s 671ms</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="DisplayAspectRatio must equal 16:9">
      <sch:rule context="ex:track[@type='Video']">
          <sch:assert test="@DisplayAspectRatio = '16:9'">DisplayAspectRatio must equal 16:9</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Video Width must equal 1920 pixels">
      <sch:rule context="ex:track[@type='Video']">
          <sch:assert test="@Width = 1920">Video Width must equal 1920 pixels</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Audio must be PCM">
      <sch:rule context="ex:track[@type='Audio']">
          <sch:assert test="(@Format = 'PCM'">Audio Format must be PCM</sch:assert>
      </sch:rule>
    </sch:pattern>

</sch:schema>
<?xml version="1.0" encoding="UTF-8"?>
<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron">
  <sch:ns uri="https://mediaarea.net/MediaConch/PolicyXML" prefix="ex"/>

    <sch:pattern name="Each file has unique ID">
      <sch:rule context="ex:File">
          <sch:assert test="@Unique_ID">Unique ID must exist.</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Track has an ID">
      <sch:rule context="ex:track">
          <sch:assert test="@track">Every track must have an ID.</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- But other file extensions can be Matroska too -->
    <sch:pattern name="If Complete_name ends in .mkv, Format must be Matroska">
      <sch:rule context="ex:File">
          <sch:assert test="(@Format = 'Matroska' and ex:Complete_name[ends-with(.mkv)]) or @Format != 'Matroska'">Format must be Matroska</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- Maybe this works -->
    <sch:pattern name="Duration must be equal in all tracks">
      <sch:rule context="ex:track//Duration">
          <sch:assert test="@Duration">Duration must be equal in all tracks</sch:assert>
      </sch:rule>
    </sch:pattern>

<!-- Else this logic-->
    <sch:pattern name="Duration must be equal in all tracks">
      <sch:rule context="ex:track//Duration">
          <sch:assert test="(@Duration = ex:track[@type='Video']/Duration and ex:track[@type='Video']/Duration = ex:track[@type='Audio']/Duration">Duration must be equal in all tracks</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Video format must be FFV1">
      <sch:rule context="ex:track[@type='Video']">
          <sch:assert test="(@Format = 'FFV1'">Video Format must be FFV1</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Audio must be PCM">
      <sch:rule context="ex:track[@type='Audio']">
          <sch:assert test="(@Format = 'PCM'">Audio Format must be PCM</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Format_Version must be ">
      <sch:rule context="ex:track[@type='General']">
          <sch:assert test="(@Format_Version = 'Version 4 / Version 2'">Format_Version must be Version 4 / Version 2</sch:assert>
      </sch:rule>
    </sch:pattern>

</sch:schema>
<?xml version="1.0" encoding="UTF-8"?>
<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron">
  <sch:ns uri="https://mediaarea.net/MediaConch/PolicyXML" prefix="ex"/>

    <sch:pattern name="Extension Test">
      <sch:rule context="ex:File">
          <sch:assert test="(@Format = 'Matroska' and ex:Complete_name[ends-with(.mkv|.mka|.mks|.mk3d|webm)])">The file extension SHOULD be one of the following (MKV, MKA, MKS, MK3D, WEBM)</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MKV">
      <sch:rule context="ex:File">
          <sch:assert test="(@Complete_name[ends-with(.mkv)] and ex:track[@type='Video'])">If the file extension is MKV, the file SHOULD contain at least one video track.</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MKA Audio">
      <sch:rule context="ex:File">
          <sch:assert test="(@Complete_name[ends-with(.mka)] and ex:track[@type='Audio'])">If the file extension is MKA, the file SHOULD contain at least one audio track.</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MKA Audio only">
      <sch:rule context="ex:File">
          <sch:report test="(@Complete_name[ends-with(.mka)] and ex:track[@type='Video'])">If the file extension is MKA, the file SHOULD NOT contain any other type of track, i.e. "audio-only".</sch:report>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MKS Audio">
      <sch:rule context="ex:File">
          <sch:assert test="(@Complete_name[ends-with(.mks)] and ex:track[@type='Subtitle'])">If the file extension is MKS, the file SHOULD contain at least one subtitle track.</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MKS Audio only">
      <sch:rule context="ex:File">
          <sch:report test="(@Complete_name[ends-with(.mks)] and ex:track[@type='Video'] or ex:track[@type='Audio'])">If the file extension is MKS, the file SHOULD NOT contain any other type of track, i.e. "subtitle-only".</sch:report>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MK3D Video">
      <sch:rule context="ex:File">
          <sch:assert test="(@Complete_name[ends-with(.mkv3d)] and ex:track[@type='Video'])">If the file extension is MKV3D the file SHOULD contain at least one video track.</sch:assert>
      </sch:rule>
    </sch:pattern>

    <sch:pattern name="Extension Test MK3D StereoMode">
      <sch:rule context="ex:File">
          <sch:assert test="(@Complete_name[ends-with(.mkv3d)] and @StereoMode)">If the file extension is MKV3D the file SHOULD contain at least one StereoMode element.</sch:assert>
      </sch:rule>
    </sch:pattern>

</sch:schema>
<?xml version="1.0" encoding="UTF-8"?>
<sch:schema xmlns:sch="http://www.ascc.net/xml/schematron">
    
    <sch:pattern name="File should have PAL framesize">
        <sch:rule context="//File/track[@type='Video']">
            <sch:assert test="Width = 720 and Height = 576">Framesize must be 720 × 576.</sch:assert>
        </sch:rule>
    </sch:pattern>
    
    <sch:pattern name="File should have PAL framerate">
        <sch:rule context="//File/track[@type='General']">
            <sch:assert test="FrameRate = 25">FrameRate must be 25.</sch:assert>
        </sch:rule>
    </sch:pattern>
    
</sch:schema>
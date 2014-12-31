#!/bin/bash
report_basename="PreformaMediainfoDesignReport"
pwd=$(pwd)
cd $(dirname "${0}")
cd ..
echo "" > "tmp_${report_basename}.md"
for report in Introduction.md Narrative.md Architecture.md StyleGuide.md ; do
    if [ -f "${report}" ] ; then
        cat "${report}" >> "tmp_${report_basename}.md"
    else
        echo "Warning: ${report} is missing"
    fi
done


# Report on conformance check registry
cat ConformityChecks/ConformanceChecksHeader.md >> "tmp_${report_basename}.md"
echo "" >> "tmp_${report_basename}.md"
cat ConformityChecks/ConformanceCheckRegistry.md >> "tmp_${report_basename}.md"
echo "" >> "tmp_${report_basename}.md"

echo "## Matroska Conformance Checks (Draft)" >> "tmp_${report_basename}.md"
cat ConformityChecks/ConformanceChecksMatroska.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${report_basename}.md"

echo "## FFV1 Conformance Checks (Draft)" >> "tmp_${report_basename}.md"
cat ConformityChecks/ConformanceChecksFFV1.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${report_basename}.md"

echo "## LPCM Conformance Checks (Draft)" >> "tmp_${report_basename}.md"
cat ConformityChecks/ConformanceChecksLPCM.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:\n    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${report_basename}.md"

echo "## Container/Stream Coherency Checks (Draft)" >> "tmp_${report_basename}.md"
cat ConformityChecks/CoherencyChecks.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:\n    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${report_basename}.md"

toc "tmp_${report_basename}.md"

pandoc -V geometry:margin=1in -o "DesignReport/${report_basename}.pdf" "tmp_${report_basename}.md"
pandoc -o "DesignReport/${report_basename}.html" "tmp_${report_basename}.md"
cd "${pwd}"

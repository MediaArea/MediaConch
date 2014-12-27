#!/bin/bash
report_basename="PreformaMediainfoDesignReport"
pwd=$(pwd)
cd $(dirname "${0}")
echo "" > "${report_basename}.md"
for report in ../Introduction.md ../Narrative.md ../Architecture.md ../StyleGuide.md ; do
    echo "${report}"
    if [ -f "${report}" ] ; then
        cat "${report}" >> "${report_basename}.md"
    else
        echo "Warning: ${report} is missing"
    fi
done

# Report on conformance check registry
cat ../ConformityChecks/ConformanceChecksHeader.md >> "${report_basename}.md"

echo "### Matroska Conformance Checks (Draft)" >> "${report_basename}.md"
cat ../ConformityChecks/ConformanceChecksMatroska.csv | csvprintf -i '### %1$s\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n|Rule Clarify|%10$s|\n\nQuote:\n    %9$s\nDefinition:\n    %11$s\n\n\n'  >> "${report_basename}.md"

echo "### FFV1 Conformance Checks (Draft)" >> "${report_basename}.md"
cat ../ConformityChecks/ConformanceChecksFFV1.csv | csvprintf -i '### %1$s\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n|Rule Clarify|%10$s|\n\nQuote:\n    %9$s\nDefinition:\n    %11$s\n\n\n'  >> "${report_basename}.md"

echo "### LPCM Conformance Checks (Draft)" >> "${report_basename}.md"
cat ../ConformityChecks/ConformanceChecksLPCM.csv | csvprintf -i '### %1$s\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarify:\n    %10$s\n\nQuote:\n    %9$s\nDefinition:\n    %11$s\n\n\n'  >> "${report_basename}.md"

echo "### Container/Stream Coherency Checks (Draft)" >> "${report_basename}.md"
cat ../ConformityChecks/CoherencyChecks.csv | csvprintf -i '### %1$s\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n|Rule Clarify|%10$s|\n\nQuote:\n    %9$s\nDefinition:\n    %11$s\n\n\n'  >> "${report_basename}.md"

toc "${report_basename}.md"

pandoc -V geometry:margin=1in -o "${report_basename}.pdf" "${report_basename}.md"
pandoc -o "${report_basename}.html" "${report_basename}.md"
cd "${pwd}"

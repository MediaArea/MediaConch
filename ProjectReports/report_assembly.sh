#!/bin/bash
design_report_basename="PreformaMediainfoDesignReport"
technical_report_basename="PreformaMediainfoTechnicalReport"
conformance_check_appendix_basename="PreformaMediainfoAppendixConformanceCheckRegistry"
pwd=$(pwd)
cd $(dirname "${0}")
cd ..
# design report
echo "" > "tmp_${design_report_basename}.md"
for report in \
    DesignIntroduction.md \
    DesignNarrative.md
do
    if [ -f "${report}" ] ; then
        cat "${report}" >> "tmp_${design_report_basename}.md"
    else
        echo "Warning: ${report} is missing"
    fi
done

# technical report
echo "" > "tmp_${technical_report_basename}.md"
for report in \
    ArchitectureIntroduction.md \
    GlobalArchitecture.md \
    CheckerArchitecture.md \
    FuncReqConformanceCheckGUI.md \
    FuncReqConformanceCheckCLI.md \
    FuncReqConformanceCheckWeb.md \
    FuncReqPolicyCheckerGUI.md \
    FuncReqPolicyCheckerCLI.md \
    FuncReqPolicyCheckerWeb.md \
    FuncReqMetadataFixerGUI.md \
    FuncReqMetadataFixerCLI.md \
    FuncReqMetadataFixerWeb.md \
    FuncReqReporterGUI.md \
    FuncReqReporterCLI.md \
    FuncReqReporterWeb.md \
    StyleGuide.md
do
    if [ -f "${report}" ] ; then
        cat "${report}" >> "tmp_${technical_report_basename}.md"
    else
        echo "Warning: ${report} is missing"
    fi
done

# Report on conformance check registry
echo "" > "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/ConformanceChecksHeader.md >> "tmp_${conformance_check_appendix_basename}.md"
echo "" >> "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/ConformanceCheckRegistry.md >> "tmp_${conformance_check_appendix_basename}.md"
echo "" >> "tmp_${conformance_check_appendix_basename}.md"

echo "## Matroska Conformance Checks (Draft)" >> "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/ConformanceChecksMatroska.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${conformance_check_appendix_basename}.md"

echo "## FFV1 Conformance Checks (Draft)" >> "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/ConformanceChecksFFV1.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${conformance_check_appendix_basename}.md"

echo "## LPCM Conformance Checks (Draft)" >> "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/ConformanceChecksLPCM.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:\n    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${conformance_check_appendix_basename}.md"

echo "## Container/Stream Coherency Checks (Draft)" >> "tmp_${conformance_check_appendix_basename}.md"
cat ConformityChecks/CoherencyChecks.csv | csvprintf -i '### %1$s\n\n|Descriptor|Value|\n|:---------|:----|\n|CCID|%2$s|\n|Version|%3$s|\n|Authority|%4$s|\n|Target Format|%5$s|\n|Target Format Version|%6$s|\n|Target Format Part|%7$s|\n|Citation|%8$s|\n\nRule Clarity:\n    %10$s\n\nQuote:\n    %9$s\n\nDefinition:\n    %11$s\n\n\n'  >> "tmp_${conformance_check_appendix_basename}.md"

for reportbase in "${design_report_basename}" "${technical_report_basename}" "${conformance_check_appendix_basename}" ; do
    toc "tmp_${reportbase}.md"
    pandoc -V geometry:margin=1in -o "ProjectReports/${reportbase}.pdf" "tmp_${reportbase}.md"
    pandoc -o "ProjectReports/${reportbase}.html" "tmp_${reportbase}.md"
done
cd "${pwd}"

#!/bin/bash
report_basename="PreformaMediainfoDesignReport"
pwd=$(pwd)
cd $(dirname "${0}")
echo "" > "${report_basename}.md"
for report in ../Introduction.md ../Architecture.md ../Narrative.md ../StyleGuide.md ; do
    echo "${report}"
    if [ -f "${report}" ] ; then
        cat "${report}" >> "${report_basename}.md"
    else
        echo "Warning: ${report} is missing"
    fi
done
pandoc -V geometry:margin=1in -o "${report_basename}.pdf" "${report_basename}.md"
pandoc -o "${report_basename}.html" "${report_basename}.md"
cd "${pwd}"
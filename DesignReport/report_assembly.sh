#!/bin/bash
pwd=$(pwd)
cd $(dirname "${0}")
echo "" > DesignReport.md
for report in ../Introduction.md ../Architecture.md ../Narrative.md ../StyleGuide.md ; do
    if [ -f "${report}" ] ; then
        cat "${report}" >> DesignReport.md
    else
        echo "Warning: ${report} is missing"
    fi
done
cd "${pwd}"
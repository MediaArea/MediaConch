#!/bin/bash

for ar in 44100 48000 96000 128000; do
    for ac in 1 2 4 8 16; do
            outputname="pcm_test_u8_ar-${ar}_ac-${ac}"
            export FFREPORT="file=${outputname}.txt"
            ffmpeg -y -f lavfi -i sine -c:a pcm_u8 -ar "${ar}" -ac "${ac}" -t 1 "${outputname}.wav"
    done
done
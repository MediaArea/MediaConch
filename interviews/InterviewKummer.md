---
layout: default
permalink: interviews/InterviewKummer.html
title: "Interview with Christopher Kummer"
---

# Interview with Christopher Kummer

Date: 12/23/2014

Interviewers: Dave, Jerome, Tessa

D: Why does NOA recommend FFV11 for a few large scale projects?

C: We were one of the first companies asking for 96khz and 24-bit linear PCM. And that was regarded as crazy.  We were quite alone on the market, and now it's become standard. At that time, the BWF extension of the specification was in the hands of a few vendors; we could not just jump into the BWF extensions. In 2000, why don't we store that data in Access? We can use the chunks from the db to create BWF.

In 2006-2009, we started to do very large migration projects with Swedish TV, we were trying to convince them to go with mjpeg2000. Then they decided to go for DVCPro50.  They did an analysis which showed that they didn't have the technology to include it in the production process.  At that time we were developing a lot towards video, but much less on the codec and container side, more on the file logistics and container side. That was the moment we thought we have a huge market in legacy archiving and legscy digitisation.  In 2010 we started to develop our product called FrameVector[?]. It is a two channel SD ingest machine which monitors our RF signals from the heads which collects [10:11] all the interactive supports from the sony[?] machine and gives you an transfer tool specially for analog material where you can move the question of proactive [?] machines to a reactive scenario. This machine is recording to a lossless mezzanine format that we call "ffvhuff", a combination of HuffYUV and FFV1.  Huffyuv goes up to 10 bits and has half the payload of uncompressed. So we have a mezzanine format which can be transferred to whatever broadcast archive format you need.

Why do we use FFV1? The situation that we try to give our clients is that if you go for archives, please choose something you are able on access to transcode whatever format you want to have on access without a quality loss.  So that was our starting point.

Peter Bubestinger suggested FFV1.  We found some deficiencies with FFV1 when using AVI. Our current implementation is based on FFV1 in an AVI container.  We decided against Matroska; the decision was a pure on access speed decision. AVI codec can be immediately fed to a transcoder without an additional file copy.  Example: As a user, I would like to have 20 segments of 20 different films, 20 segments of 2-3 minutes, within an acceptable time on my machine.  That is time for transfer from tape storage to cache to transcoding mechanism…so you have several copy mechanisms until you get to the file. And this must not exceed a certain time, or should be as low as possible, and that's why we ruled out jpeg2K. jpeg2K is sometimes 4 times slower than FFV1.3.  Speed in combination with accessibility of technology in combination with no license cost in combination with I can play it on every machine in combination with it is an open-format so whoever decides to use it does not have to invest in a technology so that in 10 years to be able to read the format but he can also read out the complete information without the hope of NOA.

D/J: is it a problem that FFV1 is not standardized?

C: As an archive, you're not only responsible to trust some SMPTE organization, you're responsible for buying enough replay equipment to replay the material. If you're not able to secure the software replay mechanism to be able to replay your essence in a way which gives you access to the complete technology--that's what we do with the current archive implementations. Ex: ffmpeg.  At any time I'm able to reproduce the information not only with the compiled code but with the machine code. It's a huge structural advantage for clients.  It's a question of can I secure the technology and all its code towards the essence?  If I rely only on the SMPTE standard but I don't have the technology available, what is the SMPTE standard worth?

J:  the standard is not important for you?

C:  No.  I'm saying that having source code available to be able to replay your essence is a significant advantage vs mjpeg2000. At the moment. [Problems with licensing terms for jpeg2000].  Open source doesn't mean no money.

D: FFV1 standardization?

C: An excellent idea.

D: What motivated your sponsorship for Niedemayer's FFV1 specification document?

C: Compared to what we would have to develop in some proprietary codec technology, we're always open to sponsoring ffmpeg development.

D: What motivated your sponsorship for original FFV1 specification?

C: The same motivation for saying in 2000 that 96 kHz is better. We believe in mathematically lossless codecs first; second, we see that we have an implementation that is easy to use, it's very fast, it's open.

D: with FFV1, are there particular aspects of the codec that are harder to control? Are there needs for tool development around FFV1?

C: You have decided to recommend Matroska?

D: No, that was a decision before we got involved in the project.

C:  [SEE FILE:  https://api.asm.skype.com/s/i?0-neu-d1-87c1d638991f4e8295e1c68125001de2]
How we compensate all the deficiencies of the AVI container.  If Matroska would have had a bigger cartography on the professional side, we would have chosen Matroska.
[Discussion of AVI deficiencies: 30:00]


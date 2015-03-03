# Interview with Hermann Lewetz and Peter Bubestinger

Date: 12/16/2014

Interviewers: Dave, Erik, Tessa

Dave: why did you decide to use FFV1 and not Matroska?

Hermann: We started with MXF and jpeg2000, and then we realized we couldn't use these without having machine to write to the format. We didn't want to use a format that was dependent on a vendor. We wanted to use something where we we had access to the technology that creates the format; we wanted to use a very common format but didn’t work out, so we wanted to use the best thing we could find, which was FFV1. We thought about Matroska, but at the time it was quite new and not so widespread; and the AVI container was very widespread and in use.  We were already worried about decision to use FFV1 and since AVI is an old format we wouldn’t have to defend that as well. [Making this decision in 2009]

Peter: Matroska was still not widely accepted as a professional container

Dave: would you make the same decision now?

Peter: I don’t think from a personal POV the position of Matroska has not changed that much yet; I like it from the technical point of view. As Hermann already said, it has a stigma of 'oh yeah this is the the thing that people download stuff from the internet with."

Dave: for FFV1, same decision?

Both: Yes

P: now even easier

Dave: how would you prioritize openness and standardization in these kind of decisions?

Peter:  Openness is extremely import in comparing standardization.  MXF jpeg200: implementations vary.  The only importance of the standardization for us is political; it would make things easier. As a technician/developer, if I have right to use source code as I wish, I can archive my source code and this is worth more to sustainability than having a paper which may or may not match my actual implementations.

Dave:  ...any containers you worked with you struggled to understand the technology?

Peter: For video, we've received some but not too many MXF files; not just during evaluation of which format to choose but from broadcasters, and some times some parts worked, some didn’t, and you couldn’t figure out what was going on. Problem with born-digital files created in not really known detailed conditions.  EX: conference recordings where a photo camera was used for video recording. Playing back with VLC worked fine, but transcoding it caused the audio-video to go out of sync.

Dave:  Lessons learned from use of FFV1?

Hermann: What I’ve learned in 4 years about fflv1 is it just works; it was the right decision. If we want to change, we can migrate from this without a loss, but meanwhile I don’t think I’ve thought about migrating from this codec because it is still the best thing I can imagine.

Peter: Lessons learned: to be less afraid of using something because everyone is using something else. After 5 years, many institutions I’ve talked with, they were very skeptical about something new working; if it could work, someone else would have done it.  This first step of trying something that is not accepted within the community or domain we’re working in.  And I’ve also seen that in other areas where IT is used and people are super cautious about which horse to bet on.

Hermann: In the beginning, I tried to find people; for example, I talked with James Snyder from Culpepper and I tried to find out why jpeg2000 was so important to him, what he thinks about FFV1 as another option, what about the problem that I can't open it with any other tool.  I had the same doubts; if this is so good, why weren’t other people using it or trying it?

Dave: talk more about conformance and validation; how do you assess quality or conformance? Workflow for conformance checking?

Peter:  ffmpeg running for transcoding; we autocreate mpg2 DVD access copy of FFV1 files; the mpg2 is checked during the transition workflow. Ff mpeg plays well audio is there from beginning to end, everything is sync--we do not deeply inspect bitstream for standards compliance; but we do have ffmpeg tell us if something is wrong. I don’t think there is a need to do bitstream analysis, but it would be really nice for the newer version to know whether the right parameters have actually been set. Currently I don’t know if there is a possibility of actually checking that.

Dave: debug1; intended encoding and actual

Hermann: Necessary to have it in a standard workflow; and as problem accumulate, it would be great to have it

Peter: During development of FFV1 v. 3, I ran massive test suites in all variations; what is lacking there (and what I'm really looking forward to making) are fake tests.  I’m a bit afraid of silent regressions currently happening.

Hermann: Another advantage of FFV1: there are few different implementations; few implementations, and all use the same implementation; what I fear is moment when big vendors accept FFV1 as a standard and they start to create different implementations; same thing as happened to jpeg2000.  A standardization/implementation checker would be more important now.

Peter: It could be suggested once the integrity check exists that people who intend to buy any product using FFV1 should only do if the product complies to your checker. [Will send citation for AMIA-list quote]

Erik:  reformatting workflow?

Hermann: When we ingest analog material we directly ingest in FFV1; no intermediate format.

Erik:  FFV1 not too incorporated with analog-digital converters...

Hermann: We started having a converter converting all into SDI; and we have a DeckLink card with SDI input, and we capture FFV1 directly using ffShot trial and [REtrotap?] as an application; but because we are not very happy with the converters, we will try some other options.

Peter: But it was not necessary to have FFV1 directly in the converter hardware; we prefer having uncompressed coming and use the software to choose.  It turned out in the past hardware implementations might be nice but very often you’re locked into whatever they offer you and you have no ability to change it unless it's an open hardware. Other parts of workflow where we use FFV1: for born-digital we have whitelist of codecs that we allow into archive for the time being because of space considerations, so we don’t transcode those to fFFV1; everything else is blown up to FFV1. For all edits, minor or opening it in a non-linear video editing system, we use FFV1 as a internal working format. We edit directly with FFV1, then export to FFV1 again.

A very important key factor is the support of FFV1 as a codec in tools one is using through tool chain. We use KDN Live (editing) and VirtualDub (in and out points).  When it's necessary to transcode to FFV1 (Velocity, Avid, FileCut), that is a major turn-off for people.

H: Adobe Premier for example can import.

P: Yes, with plugins.  If those few applications would have built-in support for FFV1, that would be an incredible breakthrough.  You can do full HD lossless on a regular computer with FFV1 v. 3; we did this with tools like ShotCut, KDN Live to edit stuff in real time using FFV1 directly. We know that this works, it's just the fault of the applications if they can't support it.

H: Mpg2 was the proof for the archive copy because in 2010, computer couldn't handle FFV1 or SDI.  We check the FFV1 directly, with the E family, 3,5,7 you don't need any special thing, and with SDI size it uses about 30% processing power. We realized that in fact we don't need the access copy for the checking.

P: We were also were surprised that people in-house were opening archive lossless copies without complaining or realizing that they're playing lossless on their office computers.





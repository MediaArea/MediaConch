# Process to create samples

## ffv1_0.mov
ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 0 -t 1 ffv1_0.mov

## ffv1_1.mov
ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 1 -t 1 ffv1_1.mov

## ffv1_2.mov
ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 2 -t 1 -strict experimental ffv1_2.mov

## ffv1_3.mov
ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 3 -t 1 ffv1_3.mov

## ffv1_4.mov
ffmpeg -f lavfi -i testsrc -t 1 -c:v ffv1 -level 4 -t 1 -strict experimental ffv1_4.mov

<?php
require 'image.compare.class.php';
 
/*
	these two images are almost the same so the hammered distance will be less than 10
	try it with images like this:
		1. the example images
		2. two complatly different image
		3. the same image (returned number should be 0)
		4. the same image but with different size, even different aspect ratio (returned number should be 0)
	you will see how the returned number will represent the similarity of the images.
*/ 
$class = new compareImages;
echo $class->compare('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTRXKu59hX1GygCS62pz4Zxop9gXdJ4UAAGVtbSbRk-N0_MP4bkn2X7Ch0','https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcRsjKYkMJgjxWcEy77vst3Ar6XbMJvpH2AToLmK4pyaJJ5_tndg6J8LLA');
  
?>

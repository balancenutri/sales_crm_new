<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------ by nitin ------------------------------------------       

    if ( ! function_exists('merge_photo'))
    {
	    
	     function merge_photo($filename_x, $filename_y, $filename_result,$uid) {
	         
                         
         // Get dimensions for specified images

         list($width_x, $height_x) = getimagesize($filename_x);
         list($width_y, $height_y) = getimagesize($filename_y);
        
         // Create new image with desired dimensions
        
         $image = imagecreatetruecolor($width_x + $width_y, $height_x);
        
         // Load images and then copy to destination image
        
         $image_x = imagecreatefrompng($filename_x);
         $image_y = imagecreatefrompng($filename_y);
        
         imagecopy($image, $image_x, 0, 0, 0, 0, $width_x, $height_x);
         imagecopy($image, $image_y, $width_x, 0, 0, 0, $width_y, $height_y);
        
         // Save the resulting image to disk (as JPEG)
        
         //imagejpeg($image, $filename_result);
         imagepng($image, $filename_result);
        
        
         $dest = imagecreatefrompng(ROOTBASEPATH .'media/bg.png');
         
         $src = imagecreatefrompng($filename_result);
        
         imagealphablending($dest, false);
         imagesavealpha($dest, true);
        
         imagecopymerge($dest, $src, 0, 46, 100, 0, 600, 528, 100); //have to play with these numbers for it to work for you, etc.
        
        
        
        // header('Content-Type: image/png');
        
        
         $dir = ROOTBASEPATH .'media/merge_img';
         if ( ! is_dir($dir)) {
            mkdir($dir, 0777, TRUE);
            chmod($dir, 0777);
         }
             
         $img_name='/final_image_'.$uid.'.png';
         $file_location=$dir.$img_name;
      
         imagepng($dest,$file_location);
        
        
         imagedestroy($dest);
         imagedestroy($src);
        
         // Clean up
        
         imagedestroy($image);
         imagedestroy($image_x);
         imagedestroy($image_y);
        
         unlink($filename_result);
          return($img_name);   


        }

	    
    }
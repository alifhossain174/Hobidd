<?php

	class Image
	{
		public static $image_quality = 65;
	

		public static function resize($image, $path, $size = 120, $min_width = false, $min_height = false)
		{
			list($width, $height) = getimagesize($image);
			if (!($width && $height)) {
				return false;
			}
			if (($width < $size) && ($height < $size)) {
				$size = ($width > $height ? $width : $height);
			}
			
			$ratio = $width / $height;
			
			//width > height
			if ($ratio > 1) {
				$b_width = $size;
				$b_height = $size / $ratio;
				if ($min_height) {
					$b_height = ($size > $height ? $height : $size);
					$b_width = $b_height / $ratio;
				}
			} else {
				$b_height = $size;
				$b_width = $size * $ratio;
				if ($min_width) {
					$b_width = ($size > $width ? $width : $size);
					$b_height = $b_width / $ratio;
				}
			}

			switch(self::fileinfoMimeType($image)) {
				case 'image/jpeg':
					$source = imagecreatefromjpeg($image);
					break;
				case 'image/gif':
					$source = imagecreatefromgif($image);
					break;
				case 'image/png':
					$source = imagecreatefrompng($image);
					break;				
				default:
					return false;
			}
			if (!$source) {
				return false;
			}
			if (!$tmp = imagecreatetruecolor($b_width, $b_height)) {
				return false;
			}
			
			if (self::fileinfoMimeType($image) == 'image/png') {
				imagealphablending($tmp, false);
				imagesavealpha($tmp, true);
			}
			
			if (!imagecopyresampled($tmp, $source, 0, 0, 0, 0, $b_width, $b_height, $width, $height)) {
				return false;
			}
			
			switch(self::fileinfoMimeType($image)) {
				case 'image/jpeg':
					imagejpeg($tmp, $path, self::$image_quality);
					break;
				case 'image/gif':
					imagegif($tmp, $path);
					break;
				case 'image/png':
					imagepng($tmp, $path);
					break;				
			}

			chmod($path, 0777);
			imagedestroy($tmp);
			
			return true;
		}
		
		public static function crop($image, $path, $width = 120, $height = 120)
		{
			list($orig_width, $orig_height) = getimagesize($image);
			if (!($orig_width && $orig_height)) {
				return false;
			}
			
			$ratio = $orig_width / $orig_height;

			if ($orig_width < $width) {
				$width = $orig_width;
			}
			if ($orig_height < $height) {
				$height = $orig_height;
			}
			//width > height
			if ($ratio > 1) {
				$t2_width = $width;
				$t2_height = $width / $ratio;
				if ($t2_height < $height) {
					$t2_height = $height;
					$t2_width = $t2_height * $ratio;
				}
			} else {
				$t2_height = $height;
				$t2_width = $height * $ratio;
				if ($t2_width < $width) {
					$t2_width = $width;
					$t2_height = $t2_width / $ratio;
				}				
			}
			
			switch(self::fileinfoMimeType($image)) {
			case 'image/jpeg':
				$source = imagecreatefromjpeg($image);
				break;
			case 'image/gif':
				$source = imagecreatefromgif($image);
				break;
			case 'image/png':
				$source = imagecreatefrompng($image);
				break;				
			default:
				return false;
			}
			if (!$source) {
				return false;
			}	
			if (!$tmp = imagecreatetruecolor($t2_width, $t2_height)) {
				return false;
			}
			if (!imagecopyresampled($tmp, $source, 0, 0, 0, 0, $t2_width, $t2_height, $orig_width, $orig_height)) {
				return false;
			}
			$x = ($t2_width - $width) / 2;
			$y = ($t2_height - $height) / 2;
			if (!$out = imagecreatetruecolor($width, $height)) {
				return false;
			}
			if (!imagecopyresampled($out, $tmp, 0, 0, $x, $y, $width, $height, $width, $height)) {
				return false;
			}
			imagejpeg($out, $path, self::$image_quality);
			chmod($path, 0777);
			imagedestroy($tmp);
			imagedestroy($out);
			
			return true;
		}
		
		public static function fileinfoMimeType($file)
		{
			$info = finfo_open(FILEINFO_MIME_TYPE);
			return finfo_file($info, $file);
		}
	}

?>
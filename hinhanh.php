<?php 
header('Content-Type: image/jpeg'); 
$string = isset($_GET['s']) && !empty($_GET['s'])? html_entity_decode($_GET['s']):"Duy"; 
$im_file = "cailoncocacola.jpg"; 
$targetfile = "coke4u.jpg"; 
$photo = imagecreatefromjpeg($im_file); 
$fotoW = imagesx($photo); 
$fotoH = imagesy($photo); 
$logoImage = _2($string); 
$logoW = imagesx($logoImage); 
$logoH = imagesy($logoImage); 
$photoFrame = imagecreatetruecolor($fotoW,$fotoH); 
$dest_x = $fotoW - $logoW; 
$dest_y = $fotoH - $logoH; 
imagecopyresampled($photoFrame, $photo, 0, 0, 0, 0, $fotoW, $fotoH, $fotoW, $fotoH); 
imagecopy($photoFrame, $logoImage, $dest_x, $dest_y, 0, 0, $logoW, $logoH);
imagejpeg($photoFrame);  
	
function _2($string) {
$source = imagecreatefrompng( 'texture.png' );
$mask = _1($string);
imagealphamask( $source, $mask );
return $source;
}

function imagealphamask( &$picture, $mask ) {
    $xSize = imagesx( $picture );
    $ySize = imagesy( $picture );
    $newPicture = imagecreatetruecolor( $xSize, $ySize );
    imagesavealpha( $newPicture, true );
    imagefill( $newPicture, 0, 0, imagecolorallocatealpha( $newPicture, 0, 0, 0, 127 ) );
    if( $xSize != imagesx( $mask ) || $ySize != imagesy( $mask ) ) {
        $tempPic = imagecreatetruecolor( $xSize, $ySize );
        imagecopyresampled( $tempPic, $mask, 0, 0, 0, 0, $xSize, $ySize, imagesx( $mask ), imagesy( $mask ) );
        imagedestroy( $mask );
        $mask = $tempPic;
    }
    for( $x = 0; $x < $xSize; $x++ ) {
        for( $y = 0; $y < $ySize; $y++ ) {
            $alpha = imagecolorsforindex( $mask, imagecolorat( $mask, $x, $y ) );
            $alpha = 127 - floor( $alpha[ 'red' ] / 2 );
            $color = imagecolorsforindex( $picture, imagecolorat( $picture, $x, $y ) );
            imagesetpixel( $newPicture, $x, $y, imagecolorallocatealpha( $newPicture, $color[ 'red' ], $color[ 'green' ], $color[ 'blue' ], $alpha ) );
        }
    }
	imagedestroy( $picture );
    $picture = $newPicture;
}

function create_blank($width, $height){
    $image = imagecreatetruecolor($width, $height);
    imagesavealpha($image, true);
    $transparent = imagecolorallocatealpha($image, 0, 0, 0, 127);
    return $image;
}

function _1($string){
	$im = create_blank(2241,1170);
	$font = "Coke4U.ttf";
	$size = "200";
	$tmp = imagettfbbox($size,0,$font,$string);
	if(($tmp[4]-$tmp[6])+1 > (1818-330)+1)
	{
		while(($tmp[4]-$tmp[6])+1 > (1818-330)+1)
		{
			$tmp = imagettfbbox($size,0,$font,$string);
			$size--;
		}
	}
	$x = abs(imagesx($im)/2-($tmp[4]-$tmp[6]+1)/2-25);
	$y = abs(500+($tmp[1]-$tmp[7]+1)/2);
	$color = ImageColorAllocate($im, 255, 255, 255);
	imagettftext($im,$size,0,$x,$y,$color,$font,$string);
	return $im;
}
?>
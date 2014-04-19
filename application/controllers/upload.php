<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends Controller {
  
  
  private $row;

  public function __construct() {
    parent::__construct();
    
  }
  
  function index() {  

  }
  function crop_to_file(){
    $imgUrl = $_POST['imgUrl'];
    $imgInitW = $_POST['imgInitW'];
    $imgInitH = $_POST['imgInitH'];
    $imgW = $_POST['imgW'];
    $imgH = $_POST['imgH'];
    $imgY1 = $_POST['imgY1'];
    $imgX1 = $_POST['imgX1'];
    $cropW = $_POST['cropW'];
    $cropH = $_POST['cropH'];
    
    $jpeg_quality = 100;
    
    $output_filename = "images/account/croppedImg_".rand();
    
    $what = getimagesize($imgUrl);
    switch(strtolower($what['mime']))
    {
    case 'image/png':
        $img_r = imagecreatefrompng($imgUrl);
		$source_image = imagecreatefrompng($imgUrl);
		$type = '.png';
        break;
    case 'image/jpeg':
        $img_r = imagecreatefromjpeg($imgUrl);
		$source_image = imagecreatefromjpeg($imgUrl);
		$type = '.jpeg';
        break;
    case 'image/gif':
        $img_r = imagecreatefromgif($imgUrl);
		$source_image = imagecreatefromgif($imgUrl);
		$type = '.gif';
        break;
    default: die('image type not supported');
    }
	
	$resizedImage = imagecreatetruecolor($imgW, $imgH);
	imagecopyresampled($resizedImage, $source_image, 0, 0, 0, 0, $imgW, 
				$imgH, $imgInitW, $imgInitH);	
	
	
	$dest_image = imagecreatetruecolor($cropW, $cropH);
	imagecopyresampled($dest_image, $resizedImage, 0, 0, $imgX1, $imgY1, $cropW, 
				$cropH, $cropW, $cropH);	


	imagejpeg($dest_image, $output_filename.$type, $jpeg_quality);
	
	$response = array(
			"status" => 'success',
			"url" => base_name().$output_filename.$type 
		  );
	 print json_encode($response);

  } 
  function save_to_file(){
    $imagePath = "images/account/";

	$allowedExts = array("gif", "jpeg", "jpg", "png", "GIF", "JPEG", "JPG", "PNG");
	$temp = explode(".", $_FILES["img"]["name"]);
	$extension = end($temp);

	if ( in_array($extension, $allowedExts))
	  {
	  if ($_FILES["img"]["error"] > 0)
		{
			 $response = array(
				"status" => 'error',
				"message" => 'ERROR Return Code: '. $_FILES["img"]["error"],
			);
			echo "Return Code: " . $_FILES["img"]["error"] . "<br>";
		}
	  else
		{
			
		  $filename = $_FILES["img"]["tmp_name"];
		  list($width, $height) = getimagesize( $filename );

		  move_uploaded_file($filename,  $imagePath . $_FILES["img"]["name"]);

		  $response = array(
			"status" => 'success',
			"url" => base_url().$imagePath.$_FILES["img"]["name"],
			"width" => $width,
			"height" => $height
		  );
		  
		}
	  }
	else
	  {
	   $response = array(
			"status" => 'error',
			"message" => 'something went wrong',
		);
	  }
	  
	  print json_encode($response);
  } 
  
}
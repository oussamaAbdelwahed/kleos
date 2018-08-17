<?php
namespace Upload;
trait ImageUploader{

public static function getExtension(string $inputName){
	return strtolower(substr(strrchr($_FILES[$inputName]['name'],'.'),1));
}

 public static function generateUniqName(){
 	return md5(uniqid());
 }

 public static function isImage($ext){
    $arrayImages=["jpg",'jpeg','png','gif']; 
    return (bool)in_array(strtolower($ext),$arrayImages);
 }

 public static function mooveImage(string $inputName,string $destFolder,string $extension,string $subFolder=""){
    $file=self::generateUniqName().".".$extension;
    $destination=imagecreatetruecolor(120,120);
    $dest='';
 	if(self::isImage($extension)){
		 if($subFolder != "") {
			$dest="http://localhost/kleos/images/".$subFolder."/".$file;
		 }else {
			$dest="http://localhost/kleos/images/".$file;
		 }	 
 		if(strtolower($extension)=='jpg' OR strtolower($extension)=='jpeg'){
            move_uploaded_file($_FILES[$inputName]['tmp_name'],$destFolder.$file);
           	$source=imagecreatefromjpeg($destFolder.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,120,120,imagesx($source),imagesy($source));
	    	imagejpeg($destination,$destFolder.$file);
       }else if(strtolower($extension)=='png'){
       	    move_uploaded_file($_FILES[$inputName]['tmp_name'],$destFolder.$file);
           	$source=imagecreatefrompng($destFolder.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,120,120,imagesx($source),imagesy($source));
	    	imagepng($destination,$destFolder.$file);
       }else{
       	    move_uploaded_file($_FILES[$inputName]['tmp_name'],$destFolder.$file);
           	$source=imagecreatefromgif($destFolder.$file);
	    	imagecopyresampled($destination,$source,0,0,0,0,120,120,imagesx($source),imagesy($source));
	    	imagegif($destination,$destFolder.$file);
       }
 	}
    return $dest;
 }

}
?>
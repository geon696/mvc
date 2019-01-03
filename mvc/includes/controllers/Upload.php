<?php 

class Upload extends Controller 
{
	public static function uploadstory($file){
		$baseDir = $_SERVER['DOCUMENT_ROOT'].BASEDIR;
	    $uploadDirectory = "static/stories/";

	    $errors = []; // Store all foreseen and unforseen errors here

	    $fileExtensions = ['txt','pdf','json']; // Get all the file extensions

	    $fileName = $file['files']['name'][0];
	    $fileSize = $file['files']['size'][0];
	    $fileTmpName  = $file['files']['tmp_name'][0];
	    $fileType = $file['files']['type'][0];
	    $extension = explode('.', $fileName);
	    $extension = end($extension);
	    $fileExtension = strtolower($extension);

	    $uploadPath = $baseDir . $uploadDirectory . basename($fileName); 
	    if (! in_array($fileExtension, $fileExtensions)) {
	        $errors[] = "Wrong file type! This is place for stories not images!";
	    }

	    if ($fileSize > 2000000) {
	        $errors[] = "Oh! WOW! That's a looooooooooooong story for me to handle!";
	    }

	    if (empty($errors)) {
	        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

	        if ($didUpload) {
	            echo "The file " . basename($fileName) . " has been uploaded";
	        } else {
	            echo "An error occurred somewhere. Try again or contact the admin";
	        }
	    } else {
	        foreach ($errors as $error) {
	            echo $error ."\n";
	        }
	    }
	}
}

?>
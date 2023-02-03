<?php

class Select {
	
	private $imageArray = array();
	private $videoArray = array();
	
	public function image($path){
        $this->imageArray = glob($path.'*.png');
		$random_keys=array_rand($this->imageArray,1);
		echo $this->imageArray[$random_keys];
    }
	
	public function video($path){
        $this->videoArray = glob($path.'*.mp4');
		$random_keys=array_rand($this->videoArray,1);
		echo $this->videoArray[$random_keys];
    }	
}

class DownloadFile{
	
	private $filePath;
	
	public function downloadThisFile($filePath){
		if (file_exists($filePath)){
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($filePath).'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($filePath));
			readfile($filePath);
			exit;
		}
		else{
			echo "File Not Found";
		}
	}
}

?>
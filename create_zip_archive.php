<?php

// https://stackoverflow.com/questions/4914750/how-to-zip-a-whole-folder-using-php
// user 

class FlxZipArchive extends ZipArchive 
{
 public function addDir($location, $name) 
 {
       $this->addEmptyDir($name);
       $this->addDirDo($location, $name);
 } 
 private function addDirDo($location, $name) 
 {
    $name .= '/';
    $location .= '/';
    $dir = opendir ($location);
    while ($file = readdir($dir))
    {
        if ($file == '.' || $file == '..') continue;
        $do = (filetype( $location . $file) == 'dir') ? 'addDir' : 'addFile';
        $this->$do($location . $file, $name . $file);
    }
 } 
}


$the_folder = $_POST['folderloc'];
$zip_file_name = $the_folder. '/archive.zip';
$za = new FlxZipArchive;
$res = $za->open($zip_file_name, ZipArchive::CREATE);
if($res === TRUE) 
{
    $za->addDir($the_folder, basename($the_folder));
    $za->close();
}
else{
echo 'Could not create a zip archive';
}




?>

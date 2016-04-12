<?php
##############################################################################
#Authored by W. Ryan Parker for secure file sharing via wordpress login      #
# Copyright 2016 W. Ryan Parker                                              #
#      You must place this file in the /wpsite/ directory!       
##############################################################################

#####################
#  Custom Variables #
#####################

#Path of Files that are protected by .htaccess
$protected_path = "/var/www/secret_files/";

#Wp-URL, URL path of your wordpress site.  (Url where index.php resides)
$wp_url = "http://example.com/wpsite/";

#Website Name
$web_name ="Example Site";


require( dirname(__FILE__) . '/wp-load.php');  #bootstrap Wordpress
global $current_user; 
get_currentuserinfo();

if(isset($_GET["name"])){
    $fileName = sanitize($_GET["name"]); 
    if($current_user->user_login and file_exists($protected_path.$fileName)) {
        /* stream the file */
        header('Content-disposition: attachment;filename='.$fileName); 
        header("Content-type: application/octet-stream");
        header("Content-Length: ".filesize($protected_path.$fileName));
        header('Content-Transfer-Encoding: binary');
        ob_end_clean();
      // stream the file
        $fp = fopen($protected_path.$fileName, 'rb');
        fpassthru($fp);
        fclose($fp);
    }
    else if(!file_exists($protected_path.$fileName)){
        echo "ERR: No Such File Exists.";
    }
    else{
    echo "ERR: No authorization.";
    }
}
###########################################
#No get variable, but logged in.          #
#List files and URL that streams them.    #
###########################################
else if($current_user->user_login){
	echo "<h1><center>".$web_name." Authorized Link Access</center></h1>";
	echo "<B> NOTE***</b> Files may not contain anything but alphanumeric characters and underscores or else they wont be streamed properly i.e NO SPACES or +_)(*&^%$#@!}{ etc.... <br>";
	echo "<table border='1'><tr><td>Name</td><td>Link</td></tr>";
	$dir = new DirectoryIterator($protected_path);
	foreach ($dir as $fileinfo) {
	    if (!$fileinfo->isDot()) {
            if(substr($fileinfo->getFilename(),0,1) != '.'){
                echo "<tr><td>".$fileinfo->getFilename()."</td><td>".$wp_url."protected_user_files.php?name=".$fileinfo->getFilename()."</td></tr>";
            }
	    }
	}
       echo "</table>";
    }
else{
    echo "ERR: No authorization.";
}

##########################################################################
#Sanitize function below this line is from Chyrp (helpers.php).          #
#Source code of Chyrp licensed under modified MIT license.               #
#Source: https://github.com/vito/chyrp/                                  #
#Copyright (c) 2009 Alex Suraci and individual contributors.             #
##########################################################################
function sanitize($string, $force_lowercase = false, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "=", "+", "[", "{", "]",
                   "}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;",
                   "—", "–", ",", "<", ">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
       $clean;
}

?>
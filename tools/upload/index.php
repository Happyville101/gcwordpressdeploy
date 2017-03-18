<html><head><style type="text/css">
<!-- body { font-family: "Trebuchet MS",Verdana,Arial,Helvetica,sans-serif; font-size: 10pt; background-color: #eee;} -->
</style>
<?php 
// A simple, minimalist, personal file/image hosting script. - version 0.5
// Only you can upload a file or image, using the password ($PASSWORD).
// Anyone can see the images or download the files.
// Files are stored in a subdirectory (see $SUBDIR).
// This script is public domain.
// Source: http://sebsauvage.net/wiki/doku.php?id=php:imagehosting
$PASSWORD='creepy_central2989';
$SUBDIR='files'; // subdirectory where to store files and images.
if (!is_dir($SUBDIR)) 
{
    mkdir($SUBDIR,0705); chmod($SUBDIR,0705);
    $h = fopen($SUBDIR.'/.htaccess', 'w') or die("Can't create .htaccess file.");
    fwrite($h,"Options -ExecCGI\nAddHandler cgi-script .php .pl .py .jsp .asp .htm .shtml .sh .cgi");
    fclose($h);
    $h = fopen($SUBDIR.'/index.html', 'w') or die("Can't create index.html file.");
    fwrite($h,'<html><head><meta http-equiv="refresh" content="0;url='.$_SERVER["SCRIPT_NAME"].'"></head><body></body></html>');
    fclose($h);
}
$scriptname = basename($_SERVER["SCRIPT_NAME"]);
if (isset($_FILES['filetoupload']) && isset($_POST['password']))
{   
    sleep(3); // Reduce brute-force attack effectiveness.
    if ($_POST['password']!=$PASSWORD) { print 'Wrong password.'; exit(); }
    $filename = $SUBDIR.'/'.basename( $_FILES['filetoupload']['name']); 
    if (file_exists($filename)) { print 'This file already exists.'; exit(); }
    if(move_uploaded_file($_FILES['filetoupload']['tmp_name'], $filename)) 
    {
        $serverport=''; if ($_SERVER["SERVER_PORT"]!='80') { $serverport=':'.$_SERVER["SERVER_PORT"]; }
        $fileurl='http://'.$_SERVER["SERVER_NAME"].$serverport.dirname($_SERVER["SCRIPT_NAME"]).'/'.$SUBDIR.'/'.basename($_FILES['filetoupload']['name']);
        echo 'The file/image was uploaded to <a href="'.$fileurl.'">'.$fileurl.'</a>';
    } 
    else { echo "There was an error uploading the file, please try again !"; }
    echo '<br><br><a href="'.$scriptname.'">Upload another file.</a>';
    exit();
}  
print <<<EOD
<form method="post" action="$scriptname" enctype="multipart/form-data">        
    File/image to upload: <input type="file" name="filetoupload" size="60">
    <input type="hidden" name="MAX_FILE_SIZE" value="256000000"><br>
    Password: <input type="password" name="password"><br>
    <input type="submit" value="Send">   
</form>
<small>Self-hosting php script by <a href="http://sebsauvage.net/wiki/doku.php?id=php:filehosting">sebsauvage.net</a></small>
EOD;
?>
</body>
</html>
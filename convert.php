<?php 
/**
*
* FileConverter PHP 7.0 with GD project
*
**/


/*echo 'working<br/>'; 


$actualFile = $_FILES['myfile']['tmp_name'];

if(move_uploaded_file($actualFile, '/tmp'))
{
	echo 'it worked';
}
else
{
echo "not so much";
}

*/

// This function takes any of the main filetypes and with the switch statement creates a manipulatable image in the proper format (grabbed from php doc)
function imageCreateFromAny($filepath) {
    $type = exif_imagetype($filepath); // [] if you don't have exif you could use getImageSize()
    $allowedTypes = array(
        1,  // [] gif
        2,  // [] jpg
        3,  // [] png
        6   // [] bmp
    );
    if (!in_array($type, $allowedTypes)) {
        return false;
    }
    switch ($type) {
        case 1 :
            $im = imageCreateFromGif($filepath);
        break;
        case 2 :
            $im = imageCreateFromJpeg($filepath);
        break;
        case 3 :
            $im = imageCreateFromPng($filepath);
        break;
        case 6 :
            $im = imageCreateFromBmp($filepath);
        break;
    }   
    return $im; 
}



var_dump($_FILES['myfile']);
$fileTmpName = $_FILES['myfile']['tmp_name'];
$fileName = $_FILES['myfile']['name'];
$target_file = 'tmp/' . $fileName;
$kaboom = explode( '.', $fileName);
$ext = $kaboom[1];



$preppedImage = imageCreateFromAny($fileTmpName);

imagepng($preppedImage, 'tmp/2newpng.png');
 //if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
   //   echo "<P>FILE UPLOADED TO: $target_file</P>";
   //} else {
     // echo "<P>MOVE UPLOADED FILE FAILED!</P>";
     // print_r(error_get_last());
 //  }
?>
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
var_dump($_FILES['myfile']);
$fileTmpName = $_FILES['myfile']['tmp_name'];
$fileName = $_FILES['myfile']['name'];
$target_file = 'tmp/' . $fileName;
$kaboom = explode( '.', $fileName);
$ext = $kaboom[1];



switch ($ext){
	case 'jpeg' : $image = imagecreatefromjpeg($fileTmpName);
	break;

	default : echo 'default running';
};

imagepng($image, 'tmp/newpng.png');
 //if (move_uploaded_file($_FILES["myfile"]["tmp_name"], $target_file)) {
   //   echo "<P>FILE UPLOADED TO: $target_file</P>";
   //} else {
     // echo "<P>MOVE UPLOADED FILE FAILED!</P>";
     // print_r(error_get_last());
 //  }
?>
<!DOCTYPE html>
<html>
<body>

<h1> Web Scraper </h1>

<?php

//import html dom parser.
include_once('simple_html_dom.php'); // http://simplehtmldom.sourceforge.net/

$html = new simple_html_dom();

//load the html page from this given url.
$html->load_file('https://youtube.com/');


//for each ahref found, display them in a list.
foreach($html->find('a') as $element)
       echo $element , "\n" , $element->href ,"\n"; 

echo $html;

foreach($html->find('img') as $element) {
    echo $element->src, "\n";

}

//Handle elements if they are an image.
function Thumbnail($url, $filename, $width = 150, $height = true) {

 // download and create gd image
 $image = ImageCreateFromString(file_get_contents($url));

 // calculate resized ratio
 // Note: if $height is set to TRUE then we automatically calculate the height based on the ratio
 $height = $height === true ? (ImageSY($image) * $width / ImageSX($image)) : $height;

 // create image 
 $output = ImageCreateTrueColor($width, $height);
 ImageCopyResampled($output, $image, 0, 0, 0, 0, $width, $height, ImageSX($image), ImageSY($image));

 // save image
 ImageJPEG($output, $filename, 95); 

 // return resized image
 return $output; // if you need to use it
}


?>


</body>
</html>

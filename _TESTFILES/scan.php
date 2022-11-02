<?php

// GET URL TO SCAN
// $fileList = glob('../*.php');
// foreach($fileList as $filename){
//     if(is_file($filename)){
//         $urltoscan = str_replace("cronjob/","",'http://' . $_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'],0,-strlen(basename($_SERVER['SCRIPT_NAME']))).str_replace("../","",$filename));
//         echo $urltoscan."<br>";
//     }   
// }
?>

<?php 
echo "===================================================================================<br>";
?>

<?php

    // GET URL
    $urlContent = file_get_contents('http://localhost/isearch.asticom.com.ph');
    $dom = new DOMDocument();
    @$dom->loadHTML($urlContent);
    $xpath = new DOMXPath($dom);
    $hrefs = $xpath->evaluate("/html/body//a");
    for($i = 0; $i < $hrefs->length; $i++){
        $href = $hrefs->item($i);
        $url = $href->getAttribute('href');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        echo '<a href="'.$url.'">'.$url.'</a><br />';
    }
?>

<?php 
echo "===================================================================================<br>";
?>

<?php
    // GET TITLE AND TEXTCONTENT

    // include_once('html_dom.php');
    // $url = 'http://plmun.edu.ph/article.php?id=164';
    // $page = file_get_contents($url);
    // $title = preg_match('/<title[^>]*>(.*?)<\/title>/ims', $page, $match) ? $match[1] : null;
    // echo $title."<br>";
    // echo file_get_html($url)->plaintext;
?>
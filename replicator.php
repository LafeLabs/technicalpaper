<?php


$dnaurl = "https://raw.githubusercontent.com/LafeLabs/technicalpaper/master/data/dna.txt";
$baseurl = explode("data/",$dnaurl)[0];
$dnaraw = file_get_contents($dnaurl);
$dna = json_decode($dnaraw);

mkdir("iconsymbols");
mkdir("data");
mkdir("php");
mkdir("figures");
mkdir("jupyter");

$oldscrollexists = false;
if(file_exists("README.md")){
    $README = file_get_contents("README.md");
    $oldscrollexists = true;
}

foreach($dna->html as $value){
    copy($baseurl.$value,$value);
}


foreach($dna->iconsymbols as $value){
    copy($baseurl."iconsymbols/".$value,"iconsymbols/".$value);
}



foreach($dna->data as $value){
    
    copy($baseurl."data/".$value,"data/".$value);
    
}


foreach($dna->figures as $value){
    
    copy($baseurl."figures/".$value,"figures/".$value);
    
}

foreach($dna->jupyter as $value){
    
    copy($baseurl."jupyter/".$value,"jupyter/".$value);
    
}

foreach($dna->php as $value){
    copy($baseurl."php/".$value,"php/".$value);
    copy($baseurl."php/".$value,explode(".",$value)[0].".php");
}


if($oldscrollexists){
    file_put_contents("README.md",$README);
}

?>
<a href = "index.html">CLICK TO GO TO PAGE</a>
<style>
a{
    font-size:3em;
}
</style>

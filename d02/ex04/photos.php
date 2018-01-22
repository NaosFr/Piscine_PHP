#!/usr/bin/php
<?php
	if ($argc != 2)
		exit();
	function name($val)
	{
		return $val[2].$val[3];
	}
	$url = $argv[1];	 
	$html = curl_init($argv[1]);
	curl_setopt($html, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($html, CURLOPT_BINARYTRANSFER, true);
	$val = curl_exec($html);
	curl_close($html);

	$start = '#(.+?)(www)(.+)#';
	$dossier = preg_replace_callback($start, "name", $argv[1]);
	if(!is_dir($dossier)){
  		mkdir($dossier);
	}
	$masque = '#(<img)(.+?)(src=")(.+?)(")(.+?)(>)#';
	preg_match_all($masque, $val, $resultats);
	foreach ($resultats[4] as $element) {
		if (substr($element, 0, 7) != "http://" && substr($element, 0, 8) != "https://") {
	    	$element = $argv[1]."/".$element;
	    }
		$ch = curl_init($element);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	    $raw = curl_exec($ch);
	    curl_close ($ch);
	    $id = substr($element, strrpos($element, '/') + 1);
	    $name = $dossier."/".$id;
	    if(file_exists($name)){
	        unlink($name);
	    }
	    $fp = fopen($name,'x');
	    fwrite($fp, $raw);
	    fclose($fp);
    }
?>
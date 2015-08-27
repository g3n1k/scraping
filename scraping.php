<?php
# function to make GET request using cURL
function curlGet($url, $post=null){
	
	$ch = curl_init();
	
	// setting cURL options
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_URL, $url);
	
	// send value post via curl
	if($post){
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	}
	
	// set header value
	curl_setopt($ch,CURLOPT_HTTPHEADER,array('KeyToken:This Value 123ds4'));
	
	$result = curl_exec($ch); // executing cURL session
	curl_close($ch); // closing cURL session
	
	return $result; // return the result
}

//  to return XPath object
function returnXPathObject($item){	
	$xmlPageDom = new DomDocument();
	@$xmlPageDom->loadHTML($item); // load download page
	$xmlPageXPath = new DOMXPath($xmlPageDom); // init new xpath dom object
	return $xmlPageXPath;
}

function getFile($url, $opt=null){
	
	$fname = isset($opt['name']) ? $opt['name'] : end(explode('/', $url)); // Retrieving image name from URL
	
	if(isset($opt['path'])) {
		$slash = (substr($opt['path'], -1) !== '/') ? '/' : ''; 
		$fname = $opt['path'].$slash.$fname;
	}
	
	if (getimagesize($url)) {
		$imageFile = curlGet($url); // Download image using cURL
		$file = fopen($fname, 'w'); // Opening file handle
		fwrite($file, $imageFile); // Writing image file
		fclose($file); // Closing file handle
	}
}

?>

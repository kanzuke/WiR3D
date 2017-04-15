<?php
	include('lib/simple_html_dom.php');

	$url = "http://rss.wired.dynalias.org";
	
	$html = new simple_html_dom();

	// Load HTML from an URL 
	$html->load_file($url);
	
	$ret = $html->find('ul#stats li span.unread');
	
	
	echo $ret[0];
?>
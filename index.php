<?php
/*
 Copyright (c) slickplaid labs 2011
 */

 // Change to the name/path of the directory you're wanting to watch
 $dir = 'images/banners';

 $today = (date('z') * 24) + date('G'); // use this for hourly rotation.
 // $today = date('z'); // use this for daily rotation
 $files = scandir($dir); // scan directory for files

 array_shift($files); // remove .
 array_shift($files); // remove ..
 $count = count($files); // get the number of images to display

 // modulus of date for picking which image to display
 $displayNumber = $today % $count;

 // init for loop
 $i = 0; $d = 0 + $displayNumber;

?>
<!doctype html>
<html>
<head></head>
<body>
	<ul>
<?php
while($i < $count){
	if($d >= $count) $a = $d - $count;
	else $a = $d;
	if(preg_match('/\.jpg$/i', $files[$a])){
		$addr = preg_replace('/\.jpg$/i', '', $files[$a]);
	} else if(preg_match('/\.gif$/i', $files[$a])){
		$addr = preg_replace('/\.gif$/i', '', $files[$a]);
	} else if(preg_match('/\.png$/i', $files[$a])){
		$addr = preg_replace('/\.png$/i', '', $files[$a]);
	} else {
		// hope that extension is only 4 chars
		$addr = substr($files[$a], 0, -4);
	}
	echo "    ".'<li><a href="http://'.$addr.'/" position="'.($i+1).'" class="'.$addr.' banner" title="'.$addr.'"><img src="'.$dir.'/'.$files[$a].'" alt="'.$addr.'"></a></li>'."\n";
	$i++; $d++;
}
?>
	</ul>
</body>
</html>

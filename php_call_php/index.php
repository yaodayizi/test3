<?php 
	$fileContent = file_get_contents("php_in_php.php");
	//echo $fileContent;
?>

<?php 
$padding = 1; // origin value.

$pattern = '/\<\?php([^\?\>]+)\?\>/';
preg_match_all($pattern, $fileContent, $matches );

echo "<br>Origin \$padding =" . $padding . ";";

if( null !=  $matches ){
	// print_r($matches);
	foreach( $matches[1] as $code ){
		//echo $code;
		eval($code);
	}
	echo "<br>Changed \$padding =" . $padding . ";";
	echo "<br>call generate_val_from_php: ". generate_val_from_php();

}
?>
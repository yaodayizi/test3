<?php
$nativeImgSize =array(
	'960*640'=>array('w'=>960,'h'=>640),
	'600*500'=>array('w'=>600,'h'=>500),
	'1280*720'=>array('w'=>1280,'h'=>720),
	'600*200'=>array('w'=>600,'h'=>200),
	'720*405'=>array('w'=>720,'h'=>405),
	'150*200'=>array('w'=>150,'h'=>200),
	'200*150'=>array('w'=>200,'h'=>150),
	'200*200'=>array('w'=>200,'h'=>200),
	'405*720'=>array('w'=>405,'h'=>720),
	'300*250'=>array('w'=>300,'h'=>250),
	'720*360'=>array('w'=>720,'h'=>360),
	'720*240'=>array('w'=>720,'h'=>240)
);

$nativeTeamplateConfig = array(
	1=>array('padding' => 20, 'minWidth' =>320,'addHeight'=>146),
	2=>array('padding'=>10,'minWidth'=>0,'addHeight'=>0),
	3=>array('padding' =>20,'minWidth'=>320,'addHeight'=>90)
);

$nativeSize = array(
	'600' => array(
	    '960*640' => array(
	        'w' => 980,
	        'h' => 730
	    ),'600*500' => array(
	        'w' => 620,
	        'h' => 590
	    ),'1280*720' => array(
	        'w' => 1300,
	        'h' => 810
	    ),'600*200' => array(
	        'w' => 620,
	        'h' => 290
	    ),'720*405' => array(
	        'w' => 740,
	        'h' => 495
	    ),'150*200' => array(
	        'w' => 346,
	        'h' => 200
	    ),'200*150' => array(
	        'w' => 458,
	        'h' => 150
	    ),'200*200' => array(
	        'w' => 458,
	        'h' => 200
	    ),'405*720' => array(
	        'w' => 425,
	        'h' => 810
	    ),'300*250' => array(
	        'w' => 682,
	        'h' => 250
	    ),'720*360' => array(
	        'w' => 740,
	        'h' => 450
	    ),'720*240' => array(
	        'w' => 740,
	        'h' => 330
	    )
	),'601' => array(
	    '960*640' => array(
	        'w' => 980,
	        'h' => 786
	    ),'600*500' => array(
	        'w' => 620,
	        'h' => 646
	    ),'1280*720' => array(
	        'w' => 1300,
	        'h' => 866
	    ),'600*200' => array(
	        'w' => 620,
	        'h' => 346
	    ),'720*405' => array(
	        'w' => 740,
	        'h' => 551
	    ),'150*200' => array(
	        'w' => 340,
	        'h' => 346
	    ),'200*150' => array(
	        'w' => 340,
	        'h' => 296
	    ),'200*200' => array(
	        'w' => 340,
	        'h' => 346
	    ),'405*720' => array(
	        'w' => 425,
	        'h' => 866
	    ),'300*250' => array(
	        'w' => 340,
	        'h' => 396
	    ),'720*360' => array(
	        'w' => 740,
	        'h' => 506
	    ),'720*240' => array(
	        'w' => 740,
	        'h' => 386
	    )
	)
   );


function getTemplatePath($type,$width,$height){
	switch ($type) {
		case '600':
			$ratio = $width / $height;
			if($ratio >= 0.75 && $width < 400)
		    	return 2;
		   	else
		   		return 3;
			break;
		case '601':
			return 1;
		default:
			return 2;
			break;
	}

} 

function getWidth($width,$minWidth,$padding,$height,$type){

		if($type == 600){
			$ratio = $width / $height;
			if($ratio >= 0.75 && $width < 400){
				
				$reWidth = $width * 2.24 +$padding;
				echo 'scale:'.$reWidth.' ';
				return $reWidth;
			}
		}

		return $minWidth > 0 && $width < $minWidth ?  $minWidth + $padding :  $width + $padding;
}



function getTemplateSize($type,$width,$height,$type)
{
	global $nativeTeamplateConfig;
	echo $type.' '.$width.' '.$height.'<br>';
	$teamplateNum = getTemplatePath($type,$width,$height);
	//echo $teamplateNum.' |';
	$size = array('w'=>'0','h'=>'0');
	$config = $nativeTeamplateConfig[$teamplateNum];
	$size['w'] = getWidth($width,$config['minWidth'],$config['padding'],$height,$type);
	
	//var_dump($config);
	$size['h'] = $height + $config['addHeight'];
	//var_dump($size);
	return $size;

}

/*$nativeTeamplateSize;
$typeArr = array(600,601);
for($i=0;$i<2;$i++)
{
	
	foreach ($nativeImgSize as $key => $value) {
		//var_dump($value);

		$nativeTeamplateSize[$typeArr[$i]][$key]  = getTemplateSize($typeArr[$i],$value['w'],$value['h'],$typeArr[$i]);
	}
}

//print_r($nativeTeamplateSize);
print_r($nativeTeamplateSize);

echo json_encode($nativeTeamplateSize,true);*/


?>
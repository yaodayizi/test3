<?

//echo rand(0,1);

$type=isset($_GET['type']) ? $_GET['type'] : 'web';

$sss=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z','-'];


$m=0;

$indexCount = 27;
$siteCount = rand(3,10);
$chanelCount = rand(3,10);
$adPlaceCount = rand(5,10);

if($type == 'web'){
		for($i=0;$i<$indexCount;$i++)
		{

			$arr1[] = Array("index"=>$sss[$i],"items"=>Array());
			
			
			
			for($j=0;$j<$siteCount;$j++)
			{
				$tmpArr=Array("id"=>"$i"."_"."$j","label"=>"网站".$j,"children"=>Array());
			
				array_push($arr1[$i]["items"], $tmpArr);
				//$arr1[$i]['items'][$j] = $tmpArr;
				
				for($n=0;$n<$chanelCount;$n++)
				{
					array_push($arr1[$i]["items"][$j]["children"],Array("id"=>"$i"."_"."$j"."_"."$n",
							"label"=>"频道".$n,
							"children"=>Array()
						));
					
					for($k=0;$k<$adPlaceCount;$k++)
					{
						$m++;
						$select = rand(0,1) ==0 ? false : true;
						array_push($arr1[$i]["items"][$j]["children"][$n]["children"],Array("id"=>"$i"."_"."$j"."_"."$n"."_"."$k",
								"label"=>"广告位".$m,
								"selected"=>$select,
								"state" =>rand(0,1),
								"total" =>rand(1000,99999999)
							));
					}
				}
				//var_dump($arr1[$i]["items"][$j]);
			}

		}

}else{
	for($i=0;$i<$indexCount;$i++)
	{

		$arr1[] = Array("index"=>$sss[$i],"items"=>Array());
		
		
		
		for($j=0;$j<$siteCount;$j++)
		{
			$tmpArr=Array("id"=>"$i"."_"."$j","label"=>"网站".$j,"children"=>Array());
		
			array_push($arr1[$i]["items"], $tmpArr);
			//$arr1[$i]['items'][$j] = $tmpArr;
			
/*			for($n=0;$n<$chanelCount;$n++)
			{
				array_push($arr1[$i]["items"][$j]["children"],Array("id"=>"$i"."_"."$j"."_"."$n",
						"label"=>"频道".$n,
						"children"=>Array()
					));*/
				
				for($k=0;$k<$adPlaceCount;$k++)
				{
					$m++;
					$select = rand(0,1) ==0 ? false : true;
					array_push($arr1[$i]["items"][$j]["children"],Array("id"=>"$i"."_"."$j"."_"."$k",
							"label"=>"广告位".$m,
							"selected"=>$select,
							"state" =>rand(0,1),
							"total" =>rand(1000,99999999)
						));
				}
			//}
			//var_dump($arr1[$i]["items"][$j]);
		}

	}
}
//print_r($arr1);
//var_dump($arr1);
echo json_encode($arr1);
?>
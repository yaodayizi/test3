<?

//echo rand(0,1);

$sss=['a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z'];


$m=0;
for($i=0;$i<26;$i++)
{

	$arr1[] = Array("index"=>$sss[$i],"items"=>Array());
	$siteCount = rand(1,5);
	
	
	for($j=0;$j<$siteCount;$j++)
	{
		$tmpArr=Array("id"=>"$i"."_"."$j","label"=>"网站".$j,"children"=>Array());
	
		array_push($arr1[$i]["items"], $tmpArr);
		//$arr1[$i]['items'][$j] = $tmpArr;
		$chanelCount = rand(1,7);
		for($n=0;$n<$chanelCount;$n++)
		{
			array_push($arr1[$i]["items"][$j]["children"],Array("id"=>"$i"."_"."$j"."_"."$n",
					"label"=>"频道".$n,
					"children"=>Array()
				));
			$adPlaceCount = rand(0,10);	
			for($k=0;$k<$adPlaceCount;$k++)
			{
				$m++;
				$select = rand(0,1) ==0 ? false : true;
				array_push($arr1[$i]["items"][$j]["children"][$n]["children"],Array("id"=>"$i"."_"."$j"."_"."$n"."_"."$k",
						"label"=>"广告位".$m,
						"select"=>$select,
						"state" =>rand(0,1),
						"total" =>rand(1000,99999999)
					));
			}
		}
		//var_dump($arr1[$i]["items"][$j]);
	}

}
//print_r($arr1);
//var_dump($arr1);
echo json_encode($arr1);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">    
	<title>原生广告</title>
    <link type="text/css" rel="stylesheet" href="css/base.css">
</head>


<?php
	$adId = $_GET["id"]; 
	$mockJSON = array(
		"1280*720" => array(
				"logoImgUrl" => "../images/sn-logo.png",
				"title" => "苏宁易购",
				"subtitle" => "苏宁电器旗下新一代B2C网上购物平台",
				"content" => "是苏宁电器旗下新一代B2C网上购物平台（www.suning.com）。",
				"adImgUrl" => "../images/sn-image.jpg",
				"adImgWidth" => "1280",
				"adImgHeight" => "720",
				"landingPageUrl" => "http://www.suning.com/",
				"buttonText" => "点击下载",
				"type"=>"info"
			),
		"600*200" => array(
				"logoImgUrl" => "../images/sn-logo.png",
				"title" => "苏宁易购",
				"subtitle" => "苏宁电器旗下新一代B2C网上购物平台",
				"content" => "是苏宁电器旗下新一代B2C网上购物平台（www.suning.com）。",
				"adImgUrl" => "../images/sn-image.jpg",
				"adImgWidth" => "600",
				"adImgHeight" => "200",
				"landingPageUrl" => "http://www.suning.com/",
				"type"=>"content"
			)
	);


	$adJson = $mockJSON[$adId];
	$bodyPadding = 20; // left + right
	
	function generate_val_from_php(){ 
		global$or_height;$or_width;
		$or_width = $adJson["adImgwidth"] + $bodyPadding;
		$or_height = $adjson["adImgHeight"] + $bodyPadding;
		$header_h = 56;
		$desc_h = "";//margin=10*2
		$button_h = 31;
		if($adJson["type"]=="info" && isset($adJson['buttonText']))
		{
			$or_height += $button_h;
		}
		
	}



?>
<body>

	<?php 
		// if undefined ad.
		if( empty($adJson) ){
			die("无效的id.");
		}
		// else 
		//		show ad html.
	?>
	<div class="qt-mm-native-ads"  style="width:<?php echo $adJson["adImgWidth"] + $bodyPadding ;?>px;">
		<div class="qt-mm-native-ads-header">
			<img src="<?php echo $adJson["logoImgUrl"];?>" width="52" height="52">
			<h3>
				<a href="<?php echo $adJson["landingPageUrl"];?>" target="_blank">
					<?php echo $adJson["title"];?>
				</a>
			</h3>
			<em>
				<?php echo $adJson["subtitle"];?>
			</em>

		</div>
		<div class="qt-mm-native-ads-body" style="width:<?php echo $adJson["adImgWidth"];?>px;">
			<p class="cnt-text"><a href="<?php echo $adJson["landingPageUrl"];?>" target="_blank">
				<?php echo $adJson["content"]?>
			</p></a>			
			<a href="<?php echo $adJson["landingPageUrl"];?>" target="_blank">
				<img src="<?php echo $adJson["adImgUrl"];?>" width="<?php echo $adJson["adImgWidth"];?>" height="<?php echo $adJson["adImgHeight"];?>">
				<button type="button">点击</button>
			</a>
		</div>
	</div>
</body>
</html>
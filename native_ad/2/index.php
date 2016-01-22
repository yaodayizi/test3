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
		"200*200" => array(
				"logoImgUrl" => "../images/sn-logo.png",
				"title" => "苏宁易购",
				"subtitle" => "苏宁易购，是苏宁电器旗下新一代B2C网上购物平台（www.suning.com），现已覆盖传统家电、3C电器、日用百货等品类。2011年，苏宁易购将强化虚拟网络与实体店面的同步发展，不断提升网络市场份额。",
				"adImgUrl" => "../images/sn-image.jpg",
				"adImgWidth" => "200",
				"adImgHeight" => "200",
				"landingPageUrl" => "http://www.suning.com/"
			),
		"200*150" => array(
				"logoImgUrl" => "../images/sn-logo.png",
				"title" => "苏宁易购",
				"subtitle" => "苏宁易购，是苏宁电器旗下新一代B2C网上购物平台（www.suning.com），现已覆盖传统家电、3C电器、日用百货等品类。2011年，苏宁易购将强化虚拟网络与实体店面的同步发展，不断提升网络市场份额。",
				"adImgUrl" => "../images/sn-image.jpg",
				"adImgWidth" => "200",
				"adImgHeight" => "150",
				"landingPageUrl" => "http://www.suning.com/"
			)
	);
	$adJson = $mockJSON[$adId];
	$headerPadding = 10; // left + right
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
	<div class="qt-mm-native-ads" style="width:<?php echo $headerPadding + 2.7 * $adJson["adImgWidth"];?>px;
			height:<?php echo $adJson["adImgHeight"] + $headerPadding;?>px;
			padding: <?php echo $headerPadding/2;?>px;">
		<div class="qt-mm-native-ads-body" style="width:<?php echo $adJson["adImgWidth"];?>px;">
			<a href="<?php echo $adJson["landingPageUrl"];?>" target="_blank">
				<img src="<?php echo $adJson["adImgUrl"];?>" width="<?php echo $adJson["adImgWidth"];?>" height="<?php echo $adJson["adImgHeight"];?>">
			</a>
		</div>
		<div class="qt-mm-native-ads-header" style="padding-left: <?php echo $adJson["adImgWidth"] + $headerPadding/2 ;?>px;">
			<h3>
				<a href="<?php echo $adJson["landingPageUrl"];?>" target="_blank">
					<?php echo $adJson["title"];?>
				</a>
			</h3>
			<em>
				<?php echo $adJson["subtitle"];?>
			</em>
		</div>
	</div>
</body>
</html>
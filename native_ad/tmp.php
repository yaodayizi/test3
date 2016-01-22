<?php
/*$aa=array(
				"logourl" => "",
				"title" => "苏宁易购",
				"stitle" => "苏宁电器旗下新一代B2C网上购物平台",
				"desc" => "是苏宁电器旗下新一代B2C网上购物平台（www.suning.com）。现已覆盖传统家电、3C电器、日用百货等品类",
				"image" => array(
					'url'=>"/images/nativeTeamplate/sn-image.jpg",
					"w" => '',
					"h" => '',
				"clkurl" => "http://www.suning.com/",
				"btnname" => "有货"
			)
);
var_dump($aa);
echo json_encode($aa);
*/



$sss='{"data":[{
			"buyer": "mediamax-winmax",
			"code": "",
			"creative": "/ssp_new4/admin/creative/preview/listView?id=11111142",
			"viewUrl": "/ssp_new4/admin/creative/preview/View?id=11111142",
			"date": "2015/12/11",
			"modified": "2015-12-11 15:45:44",
			"expiredStatus": "0",
			"height": 730,
			"id": "D-146-120304",
			"CreativeID": "11111142",
			"name": "",
			"state": "3",
			"targetUrl": "http://allyes.com",
			"type": 600,
			"vocation": "化妆浴室用品类-化妆品护肤品",
			"width": 980，
			"native":{
				"logourl": "",
				"title": "苏宁易购",
				"stitle": "苏宁电器旗下新一代B2C网上购物平台",
				"desc": "是苏宁电器旗下新一代B2C网上购物平台（www.suning.com）。现已覆盖传统家电、3C电器、日用百货等品类",
				"image": {
					"url": "/images/nativeTeamplate/sn-image.jpg",
					"w": "",
					"h": "",
					"clkurl": "http://www.suning.com/",
					"btnname": "有货"
				}
			}
		  }, {
			"buyer": "lj_buyer02",
			"code": "",
			"creative": "/ssp_new4/admin/creative/preview/listView?id=11111139",
			"viewUrl": "/ssp_new4/admin/creative/preview/View?id=11111139",
			"date": "2015/12/09",
			"modified": "2015-12-09 10:39:28",
			"expiredStatus": "0",
			"height": 590,
			"id": "D-274-7549",
			"CreativeID": "11111139",
			"name": "",
			"state": "3",
			"targetUrl": "http://renren.com\u0001baidu.com",
			"type": 600,
			"vocation": "IT产品类-全部",
			"width": 620，
			"native":{
				"logourl": "",
				"title": "苏宁易购",
				"stitle": "苏宁电器旗下新一代B2C网上购物平台",
				"desc": "是苏宁电器旗下新一代B2C网上购物平台（www.suning.com）。现已覆盖传统家电、3C电器、日用百货等品类",
				"image": {
					"url": "/images/nativeTeamplate/sn-image.jpg",
					"w": "",
					"h": "",
					"clkurl": "http://www.suning.com/",
					"btnname": "有货"
				}
			}
		}]}';
$arr = json_decode($sss);
var_dump(json_decode($sss));
?>
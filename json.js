/**
 * 广告位买卖关系配置页面UI数据结构
 */

var testJson=[{ // a
        "index": "a", //拼音首字母
        "items": [{
            id: "1",
            label: "A6网站",
            children: [{
                id: "1_1",
                label: "频道5",
                children: [{
                    id: "1_1_1", //保证ID唯一就可以
                    label: "广告位1",
                    selected: true, //是否已选中,频道和网站是否选择前端计算
                    state:0,//0代表停用，1代表正常。 广告位名称颜色说明：其中置灰部分代表该广告位目前是停用状态，黑色代表启用状态。
                    total: 5000000 //数值  单位k(千),w(万),m(百万)前端转换
                }, {
                    id: "1_1_2",
                    label: "广告位2",
                    selected: false,
                    state:1,
                    total: 5000000
                }]
            }]
        }, {
            id: "2",
            label: "a2网站",
            children: [{
                id: "2_1",
                label: "频道1",
                children: [{
                    id: "2_1_1",
                    label: "广告位1",
                    selected: true,
                    state:1,
                    total: 5000000
                }]
            }]
        }]
    }, { // b
        "index": "b",
        "items": [
            //...
        ]
    }, { // c
        "index": "c",
        "items": [
            //...
        ]
    }
    //...n
]

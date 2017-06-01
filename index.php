<?php
/**************************************************
 *    Filename:      index.php
 *    Copyright:     (C) 2017 All rights reserved
 *    Author:        Theast
 *    Email:         Daidong123654@126.com
 *    Description:   ---
 *    Create:        2017-06-01 17:30:12
 *    Last Modified: 2017-06-01 18:30:56
 *************************************************/ 

require 'vendor/autoload.php';

use QL\QueryList;

error_reporting(0);

$oriUrl = 'https://lf.lianjia.com/ershoufang/yanjiao/';

$rules = [
    'houseInfo'    => ['.houseInfo', 'text'],
    'positionInfo' => ['.positionInfo', 'text'],
    'totalPrice'   => ['.totalPrice', 'text'],
    'unitPrice'    => ['.unitPrice', 'text'],
];

for($page=1; $page<=100; $page++){
    $url = $oriUrl . "pg{$page}";
    $data = QueryList::Query($url, $rules)->data;

    // 循环设置[房屋信息, 位置信息, 单价, 总价]
    foreach($data as $key => $value){
        $info = implode("\t", $value) . "\n";
        file_put_contents('燕郊房价.txt', $info, FILE_APPEND);
    }
    var_dump($page);
}



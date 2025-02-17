<?php
$species = [
    '00' => '吳郭魚',
'01' => '鰻魚',
'02' => '鱸鰻',
'03' => '其他鰻',
'04' => '虱目魚',
'05' => '虱目魚苗越冬養殖',
'06' => '文蛤',
'07' => '九孔',
'08' => '西施貝',
'09' => '蜆',
'10' => '盤鮑',
'11' => '海膽',
'12' => '日本黑蜆',
'13' => '其他貝類',
'14' => '烏魚',
'15' => '龍膽石斑',
'16' => '老虎斑',
'17' => '龍虎斑',
'18' => '青斑(點帶及瑪拉巴石斑)',
'19' => '金錢斑',
'20' => '其他石斑',
'21' => '七星鱸魚',
'22' => '金目鱸',
'23' => '其他鱸魚',
'24' => '黃臘魚參',
'25' => '花身雞魚',
'26' => '黃鰭鯛',
'27' => '赤鰭笛鯛',
'28' => '黑鯛',
'29' => '黃錫鯛',
'30' => '白點笛鯛',
'31' => '其他鯛魚類',
'32' => '海鱺',
'33' => '白蝦',
'34' => '淡水長腳蝦',
'35' => '斑節蝦',
'36' => '草蝦',
'37' => '沙蝦',
'38' => '紅尾蝦',
'39' => '淡水鯰',
'40' => '鱒魚',
'41' => '香魚',
'42' => '泥鰍',
'43' => '花跳',
'44' => '觀賞魚',
'45' => '蛙類',
'46' => '甲魚(鱉)',
'47' => '鱷魚',
'48' => '龍鬚菜',
'49' => '鯉科魚(含草鰱魚)',
'50' => '鱘',
'51' => '錦鯉及大型觀賞魚',
'52' => '慈鯛及中小型觀賞魚',
'53' => '觀賞蝦',
'54' => '大閘蟹',
'55' => '蟳蟹類',
'56' => '金鐘',
'57' => '筍殼魚',
'58' => '變身苦',
'59' => '七星鮸',
'60' => '其他鯧鰺魚類',
'61' => '其他笛鯛類',
'62' => '休養或廢棄池',
'63' => '空池(整池)',
'64' => '包公魚',
'65' => '午仔',
'66' => '餌料池(輪虫)',
'67' => '加州鱸魚',
'68' => '其他',
'69' => '拒訪',
'70' => '非魚塭',
];

$thisYear = date('Y') - 1911;
$basePath = dirname(__DIR__);

// Add SSL context to skip verification and enable legacy renegotiation
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'verify_host' => false,
        'allow_self_signed' => true,
        'disable_compression' => true,
        'SNI_enabled' => false,
        'ciphers' => 'ALL:!COMPLEMENTOFDEFAULT:!eNULL'
    ]
]);

foreach($species AS $specieKey => $specie) {
    $rawPath = $basePath . '/raw/specie/' . $specie;
    if(!file_exists($rawPath)) {
        mkdir($rawPath, 0777, true);
    }
    for($i = 89; $i <= $thisYear; $i++) {
        $rawFile = $rawPath . '/' . $i . '.csv';
        $url = 'https://fadopen.fa.gov.tw/fadopen/service/getSpeciesSummaryYearlyCSV.htmx?year=' . $i . '&city=-1&townlist=&species=' . $specieKey;
        if($i !== $thisYear) {
            if(!file_exists($rawFile)) {
                file_put_contents($rawFile, file_get_contents($url, false, $context));
            }
        } else {
            file_put_contents($rawFile, file_get_contents($url, false, $context));
        }
    }
}


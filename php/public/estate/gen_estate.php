<?php
//$raw_json_string = file_get_contents('1_DummyEstateData_tmp.json');
$raw_json_string = file_get_contents('1_DummyEstateData.json');
$estates = json_decode($raw_json_string);
foreach ($estates as $estate){
    $out = [
        'id' => (int)$estate[0],
        'thumbnail'=> $estate[1],
        'name'=> $estate[2],
        'latitude'=> (float)$estate[3],
        'longitude'=> (float)$estate[4],
        'address'=> $estate[5],
        'rent'=> (int)$estate[6],
        'doorHeight'=> (int)$estate[7],
        'doorWidth'=> (int)$estate[8],
        'popularity'=> (int)$estate[9],
        'description'=> $estate[10],
        'features'=> $estate[11],
    ];
    $out_json = json_encode($out, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    file_put_contents($out['id'], $out_json);
}

<?php
$pdo = new PDO(
    'mysql:host=10.162.36.103;dbname=isuumo;port=3306',
    'isucon',
    'isucon'
);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->setAttribute(PDO::ATTR_PERSISTENT, true);

$query = 'SELECT id, name, description, thumbnail, address, latitude, longitude, rent, door_height, door_width, features, popularity FROM estate ORDER BY rent ASC, id ASC LIMIT :limit';
$stmt = $pdo->prepare($query);
$stmt->bindValue(':limit', NUM_LIMIT, PDO::PARAM_INT);
$stmt->execute();

//$estates = $stmt->fetchAll(PDO::FETCH_CLASS, Estate::class);
$estates = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (count($estates) === 0) {
    header("Content-Type: application/json; charset=utf-8");
    echo json_encode([
        'chairs' => []
    ]);
}

foreach ($estates as $estate){
    $estate['id'] = (int)$estate['id'];
    $estate['latitude'] = (float)$estate['latitude'];
    $estate['longitude'] = (float)$estate['longitude'];
    $estate['rent'] = (int)$estate['rent'];
    $estate['door_height'] = (int)$estate['door_height'];
    $estate['door_width'] = (int)$estate['door_width'];
    $estate['popularity'] = (int)$estate['popularity'];
}

//$response->getBody()->write(json_encode([
//    'estates' => array_map(
//        function(Estate $estate) {
//            return $estate->toArray();
//        },
//        $estates
//    )
//]));

//return $response->withHeader('Content-Type', 'application/json');
header("Content-Type: application/json; charset=utf-8");

<?php
require_once __DIR__ . "/Classes.php";
require_once __DIR__ . "/funcs.php";

//-----[создаем объекты и получем данные]
$getUsers = new Users();
$users = $getUsers->selectAll();

$getCities = new Cities();
$cities = $getCities->selectAll();

$getEducation = new Education();
$education = $getEducation->selectAll();

$getCityOfUsers = new CityOfUsers();
$cityOfUsers = $getCityOfUsers->selectAll();

//-----[при обращении передаем данные в формате JSON]
$resArr = [];

for ($i = 0; $i < count($users); $i ++) {
    $resArr[] = [
        'fio' => getName($cityOfUsers[$i]->user_id, $users),
        'education' => ['educ' => getEduc($cityOfUsers[$i]->user_id, $users, $education), 'id' => getEducId($cityOfUsers[$i]->user_id, $users)],
        'city' => ['ct' => getCity($cityOfUsers[$i]->city_id, $cities), 'id' => $cityOfUsers[$i]->city_id]
    ];
}


echo json_encode($resArr);
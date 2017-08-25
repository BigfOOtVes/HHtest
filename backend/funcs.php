<?php
//-----[получаем имя юзера]
function getName ($userID, $arrUsers) {
    for ($i = 0; $i < count($arrUsers); $i ++) {
        if ($arrUsers[$i]->id === $userID) 
            return $arrUsers[$i]->name;
    }
    return "ERROR";
}
//-----[получаем город юзера]
function getCity ($cityID, $arrCities) {
    $arr = explode(',', $cityID);
    
    if (count($arr) < 2) {
        for ($i = 0; $i < count($arrCities); $i ++) {
            if ($arrCities[$i]->id === $cityID) 
                return $arrCities[$i]->name;
        }
    } else {
        $res = [];
        for ($i1 = 0; $i1 < count($arr); $i1 ++) {
            for ($i2 = 0; $i2 < count($arrCities); $i2 ++) {
                if ($arrCities[$i2]->id === $arr[$i1]) 
                    $res[] = $arrCities[$i2]->name;
            }
        }
        return implode(', ', $res);
    }
    return "ERROR";
}
//-----[получаем образование юзера]
function getEduc ($userID, $arrUsers, $arrEduc) {
    for ($i1 = 0; $i1 < count($arrUsers); $i1 ++) {
        if ($arrUsers[$i1]->id === $userID) {
            for ($i2 = 0; $i2 < count($arrEduc); $i2 ++) {
                if ($arrEduc[$i2]->id === $arrUsers[$i1]->qual_id) 
                    return $arrEduc[$i2]->name;
            }
        }
    }
    return "ERROR";
}
//-----[получаем ID образования юзера]
function getEducId ($userID, $arrUsers) {
    for ($i1 = 0; $i1 < count($arrUsers); $i1 ++) {
        if ($arrUsers[$i1]->id === $userID) 
            return $arrUsers[$i1]->qual_id;
    }
    return "ERROR";
}
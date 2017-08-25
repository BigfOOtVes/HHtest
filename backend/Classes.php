<?php
require_once __DIR__ . "/AbstModel.php";

class Cities extends AbstModel {
    protected static $table = 'cities';
}

class CityOfUsers extends AbstModel {
    protected static $table = 'city_of_users';
}

class Education extends AbstModel {
    protected static $table = 'education';
}

class Users extends AbstModel {
    protected static $table = 'users';
}
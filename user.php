<?php

require_once('database.php');

class User {

    public static function all()
    {
        global $db;
        $q = "SELECT * FROM users ORDER BY id DESC";
        return $db->fetch($q);
    }

    public static function find($id)
    {
        global $db;
        $q = "SELECT * FROM users WHERE id=$id";
        return $db->get($q);
    }

    public static function store($arr)
    {
        global $db;
        $q = "INSERT INTO users (username, password, first_name, last_name)";
        $q .= " VALUES ('".$arr['username']."', '".$arr['password']."', '".$arr['first_name']."', '".$arr['last_name']."')";
        return $db->execute($q);
    }

    public static function update($id, $arr)
    {
        global $db;
        $q = "UPDATE users SET first_name='".$arr['first_name']."', last_name='".$arr['last_name']."', username='".$arr['username']."' WHERE id=$id";
        return $db->execute($q);
    }

    public static function destroy($id)
    {
        global $db;
        $q = "DELETE FROM users WHERE id=$id";
        return $db->execute($q);
    }

}

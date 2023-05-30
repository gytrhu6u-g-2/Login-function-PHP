<?php

require_once '../dbconnect.php';

class UserLogic
{
    /**
     * ユーザを登録する
     * @param array $userData
     * @return bool $result 
     */
    public static function createUser($userData)
    {
        $result = false;

        $sql = 'INSERT INTO users (name, email, password) VALUES (?,?,?)';

        // ユーザデータを配列に入れる
        $arr = [];
        $arr[] = $userData['username'];
        $arr[] = $userData['email'];
        $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT); // パスワードをハッシュ化する

        try {
            $stmt = connect()->prepare($sql);
            $result = $stmt->execute($arr);
            return $result;
        } catch (\Exception $e) {
            return $result;
        }
        
        return $result;
    }
}
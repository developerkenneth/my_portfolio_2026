<?php
require_once dirname(__DIR__) . "/init/Database.php";


class User
{
    public static function update(array $userData, int $userId): array
    {
        // get db connection
        $db = new Database();
        $connect = $db->getConnection();

        // create fields and value for string
        $setData = "";

        if (isset($userData['password'])) {
            // hash the password
            $hashedPassword = password_hash($userData['password'], PASSWORD_DEFAULT);
            $userData['password'] = $hashedPassword;
        }

        foreach ($userData as $column => $value) {
            $setData .= "`$column` = :$column, ";
        }
        // clean setdata and remove the last coma and space

        $setData = substr(
            $setData,
            0,
            strlen($setData) - 2
        );
        $sql = "UPDATE `admins` SET $setData WHERE `id`= $userId";

        try {

            $stmt = $connect->prepare($sql);
            if ($stmt->execute($userData)) {
                return [
                    'message' => 'you have successfully updated your account.',
                    'status'  => 201,
                    'success' => true
                ];
            }
        } catch (\PDOException $error) {
            return [
                'message' => $error->getMessage(),
                'status'  => 500,
                'success' => false
            ];
        }
    }
}

<?php

namespace Model;

class UsersModel extends \W\Model\UsersModel {

    public function __construct() {
        parent::__construct();
        $this->setPrimaryKey('id');
    }

    /**
    * We will retrieve the ID from the table in the database for a given token
    * with the help of the following function
    * @param type $token
    * @return boolean
    */
    public function getIdByToken($token) {

        $requestToGetToken = '
            SELECT id
            FROM users
            WHERE usr_token = :token
            AND usr_token_created + 4*60*60 >= :timestampNow
        ';

        // We must prepare the statement, so we can bind the values to the stand-ins
        $stmt = $this->dbh->prepare($requestToGetToken);
        $stmt->bindValue(':token', $token);
        $stmt->bindValue(':timestampNow', date('Y-m-d H:i:s'));

        // Now we can execute the request and show an error message in case it does not work
        if ($stmt->execute() === false) {
            debug($stmt->errorInfo());
        } else {
            if ($stmt->rowCount() > 0) {
                $data = $stmt->fetch(\PDO::FETCH_ASSOC);
                return $data['id'];
            }
        }

        return false;
    }



    public function deleteUserAccount($userId) {

        $sqlRequest = '
            DELETE FROM users
            WHERE id = :id
        ';

        $stmt = $this->dbh->prepare($sqlRequest);
        $stmt->bindValue(':id', $userId);

        if ($stmt->execute() === false) {
            $stmt->errorInfo();
        }
    }

}

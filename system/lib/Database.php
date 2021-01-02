<?php

class Database extends PDO {

    public function __construct($dsn, $user, $pass) {

        parent::__construct($dsn, $user, $pass);
    }

    public function select($sql) {
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getcategorybyid($id) {
        $sql = "select * from title where id =  $id";
        $stmt = $this->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $data) {
        $keys = implode(',', array_keys($data));
        $values = ':' . implode(',  :', array_keys($data));
        $sql = "insert into $table ($keys) values ($values)";
        $stmt = $this->prepare($sql);
        foreach ($data as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function update($table, $condition, $id) {
        $updatekey = null;
        foreach ($condition as $key => $val) {
            $updatekey .= "$key = :$key,";
        }
        $updatekey = rtrim($updatekey, ',');

        $sql = "update $table set $updatekey where  $id ";
        $stmt = $this->prepare($sql);
        foreach ($condition as $key => $val) {
            $stmt->bindValue(":$key", $val);
        }
        return $stmt->execute();
    }

    public function delete($table, $id) {
        $sql = "delete from $table where id = $id ";
        return $this->exec($sql);
    }

}

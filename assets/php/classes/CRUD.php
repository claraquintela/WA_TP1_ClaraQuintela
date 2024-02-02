<?php

class CRUD extends PDO
{

    public function __construct()
    {
        parent::__construct("mysql:host=localhost;dbname=onlineclass;port=3308;charset=utf8", 'root', '');
    }

    public function select($table, $field = 'id', $order = 'asc')
    {

        $sql = "SELECT * FROM $table ORDER BY $field $order";
        $stmt = $this->query($sql);
        return $stmt->fetchAll();
    }

    public function selectId($table, $value,  $url, $field = 'id',)
    {
        $sql = "SELECT * FROM $table where $field = :$field";
        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();
        $count = $stmt->rowCount();

        if ($count == 1) {
            return $stmt->fetch();
        } else {
            header("location:$url.php");
        }
    }

    public function insert($table, $data)
    {

        $fieldName = implode(', ', array_keys($data));
        $fieldValue = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO $table ($fieldName) VALUE ($fieldValue)";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if ($stmt->execute()) {
            header("location:../../index.php");
        } else {
            print_r($stmt->errorInfo());
        }
    }

    public function update($table, $data, $field = 'id')
    {

        $fieldName = null;
        foreach ($data as $key => $value) {
            $fieldName .= "$key = :$key, ";
        }
        $fieldName = rtrim($fieldName, ', ');

        $sql = "UPDATE $table SET $fieldName WHERE $field = :$field;";

        $stmt = $this->prepare($sql);
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            header("location:../../index.php");
        } else {
            print_r($stmt->errorInfo());
        }
    }

    public function delete($table, $value, $field = 'id')
    {

        $sql = "DELETE FROM $table WHERE $field = :$field";

        $stmt = $this->prepare($sql);
        $stmt->bindValue(":$field", $value);
        $stmt->execute();

        $count = $stmt->rowCount();
        if ($count == 1) {
            header("location:../../index.php");
        } else {
            print_r($stmt->errorInfo());
        }
    }
}

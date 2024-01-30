<?php
require_once('classes/CRUD.php');
$crud = new CRUD;
$update = $crud->update('students', $_POST);

echo $update;

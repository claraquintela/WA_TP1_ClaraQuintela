<?php
$id = $_POST['id'];
require_once('classes/CRUD.php');
$crud = new CRUD;
$insert = $crud->delete('students', $id);

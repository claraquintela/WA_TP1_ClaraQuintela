<?php
if (isset($_GET['id']) && $_GET['id'] != null) {
    require_once('assets/php/classes/CRUD.php');
    $crud = new CRUD;
    $selectId = $crud->selectId('students', $_GET['id'], 'index');
    extract($selectId);
} else {
    header('location:index.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Do it Yourself</title>
</head>

<body>
    <header>

        <a href="index.php">
            <img class="logo" src="./assets/img/Do it.svg" alt="logo Do it">
        </a>
        <ul>
            <a href="index.php">
                <li>Home</li>
            </a>
            <a href="student-create.php">
                <li>Create your account</li>
            </a>
        </ul>

    </header>

    <div class="container">


        <h2>Student list</h2>

        <div class="student-edit">
            <p><strong>Name: </strong><?= $name; ?></p>
            <p><strong>E-mail: </strong><?= $email ?></p>
            <p><strong>Birthday: </strong><?= $birthday ?></p>

            <div class="div-btn">
                <a href="index.php" class="btn">Home</a>
                <a href="student-edit.php?id=<?= $id ?>" class="btn">Edit</a>


            </div>

        </div>

        <form action="assets/php/student-delete.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <button class="btn">Delete this account?</button>
        </form>

    </div>
</body>

</html>
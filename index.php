<?php
require_once('assets/php/classes/CRUD.php');
$crud = new CRUD;
$select = $crud->select('students', 'name', 'asc');

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

            <a href="student-show.php">
                <li>List des élèves</li>
            </a>
        </ul>
    </header>

    <main>
        <h1>Student list</h1>

        <table>
            <thread>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Birthday</th>
                </tr>
            </thread>
            <tbody>
                <?php
                foreach ($select as $row) {

                ?>
                    <tr>
                        <td><a href="student-show.php?id=<?= $row['id']; ?>"><?= $row['name'] ?></a></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['birthday'] ?></td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
        <a href="student-create.php" class="btn">Create your account</a>

    </main>

</body>

</html>
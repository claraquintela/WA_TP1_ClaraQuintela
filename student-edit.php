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

    <div class="container">
        <h2>Client Edit</h2>
        <form action="client-update.php" method="post">
            <input type="hidden" name="id" value="<?= $id; ?>">
            <label>Name
                <input type="text" name="name" value="<?= $name; ?>">
            </label>

            <label>E-mail
                <input type="email" name="email" value="<?= $email ?>">
            </label>

            <label>Birthday
                <input type="date" name="birthday" value="<?= $birthday ?>">
            </label>
            <input type="submit" class="btn" value="Update">
        </form>
    </div>
</body>

</html>
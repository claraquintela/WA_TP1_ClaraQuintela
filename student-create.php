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
        <h2>Crée votre compte</h2>

        <form action="assets\php\student-store.php" method="post">
            <label> Nom
                <input type="text" name="name">
            </label>
            <label>Email
                <input type="email" name="email">
            </label>
            <label>Date de naissance
                <input type="date" name="birthday">
            </label>

            <label>
                <input type="submit" class="btn" value="Save">
            </label>
        </form>
    </div>
</body>

</html>
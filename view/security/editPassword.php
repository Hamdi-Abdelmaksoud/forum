<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    



        <form action="index.php?ctrl=security&action=editPassword" method="post">
                <h2>Modifier mot de passe</h2>
                <input type="password" name="old_pass" placeholder="ancienne mot de passe"><br />
                <input type="password" name="new_pass" placeholder="nv mot de passe"><br />
                <input type="password" name="confirm_pass" placeholder="confirmation mot de passe"><br />
                <button type="submit" name="btn_edit"> Modifier </button>

        </form>
</body>
</html>
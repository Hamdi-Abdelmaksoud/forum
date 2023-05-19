<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h3> Profile Page</h3>

    <?php
      if(App\Session::getUser()){
            if(App\Session::getUser()->hasRole("Admin")){ ?>

            <h1> hello admin </h1>

           <?php }
            else{  ?>
<h1> hello user </h1>
          <?php  }
        } ?>
</body>
</html>
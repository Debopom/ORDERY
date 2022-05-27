<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <?php include 'navbar.html'?>
    <br><br><br><br>
<form action="search.php" method="post">  
                   <input type="text" style=" width: 300px;
                  box-sizing: border-box;
                  border: 2px solid #ccc;
                  border-radius: 4px;
                  margin-left: 80px;
                  font-size: 12px;
                  background-color: white;
                  background-image: url('searchicon.png');
                  background-position: 10px 10px; 
                  background-repeat: no-repeat;
                  padding: 10px 10px 10px 20px;
                  transition: width 0.4s ease-in-out;
                " name="search" placeholder="Search Restaurant to Place a Reservation Request "
                  >
                  <input type="submit" name="submit" value="Search"style=" width: 100px;"class="btn btn-outline-primary">
</body>
</html>
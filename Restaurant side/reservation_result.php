<html>

<head>
    <title>Record Insert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">

</head>

<style>
    h2 {
        text-align: left;
    }
</style>

<body>

 <!-- ID	DATE	TIME	NUM_OF_PEOPLE	 -->


    <?php


    //$id= $_GET["ID"];
   
    $date = $_GET["DATE"];
    $time = $_GET["TIME"];
    $num_of_people = $_GET["NUM_OF_PEOPLE"];
    
   

    require_once('db_connect.php');

    $connect = mysqli_connect(HOST, USER, PASS, DB)

        or die("Can not connect");



    mysqli_query($connect, "INSERT INTO (res_date,res_time,res_people) reservation VALUES (
                             NULL,
                             '$date',
                             '$time',
                             '$num_of_people')")

        or die("OPPS!! Peter you did sothing wrong!!");



    echo " <h2 class='ui header' >Reservation Done!</h2><br>";
    echo " <h2 class='ui header' >Thanks for choosing ORDERY</h2>";

    echo "<p><br><a href=menu_read.php> <button class='ui primary button'>
                                VIEW RECORD </button> </a></p>";



    ?>

</body>

</html>
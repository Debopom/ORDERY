<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="navbar.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Order Track</title>
    <?php
    include_once 'dbconnect.php';
    include 'navbar.html';


    session_start();
    $order_id = $_POST['order_id'];
    $table_id = $_SESSION['table_id'];
    $restaurant_id = $_SESSION['restaurant_id'];
    if (isset($_POST['call'])) {
        $sql2 = "UPDATE tables SET status = 'calling' WHERE table_id = $table_id AND restaurant_id = $restaurant_id;";
        $rs = $conn->query($sql2);
        if ($rs) {
            echo '<script>alert("Your request has been placed. Restaurant will respond soon!")</script>';
        }
    }
    if (isset($_POST['cancel'])) {
        $sql3 = "DELETE FROM orders WHERE order_id=$order_id;";
        $rs3 = $conn->query($sql3);
        if ($rs3) {
            echo '<script>alert("You order has been cancelled"); window.location.replace("instascan-master/docs")</script>;';
        }
    }


    $sql1 = "SELECT * FROM orders WHERE order_id=$order_id;";
    $rs2 = $conn->query($sql1);
    $data = mysqli_fetch_array($rs2);
    $status = $data['order_status'];
    $restaurant_id = $data['restaurant_id'];


    ?>
    <div class="order_track">
        <?php
        if ($status == 'pending') { ?>
            <h5> Your Order is Now pending</h5>
            <img src="https://icon-library.com/images/progress-icon-gif/progress-icon-gif-28.jpg" alt="Italian Trulli">
            <br>
            <br>
            <br>

            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <input type="submit" name="cancel" value="Cancel Order">
            </form>
        <?php
        } else if ($status == 'accepted') { ?>
            <h5> Your Order is Accepted</h5>
            <img src="https://cdn.dribbble.com/users/1573866/screenshots/6791067/first-screen.gif" alt="Italian Trulli">
            <br>
            <br>
            <br>

            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
                <input type="submit" name="cancel" value="Cancel Order">
            </form>

        <?php
        } else if ($status == 'declined') { ?>
            <h5> Sorry your order has been declined by the restaurant</h5>
            <img src="https://i.gifer.com/origin/22/22133af5b0f5dfa0021a84d4c886b42b.gif" alt="Italian Trulli">
            <h5> Want to order again?</h5>
            <button type="button" class="btn btn-primary" style="margin-left: 130px;          
               
                 background-image: linear-gradient(to right, #D31027 0%, #EA384D  51%, #D31027  100%);
                 margin-left: 90px;
                 margin-top: 30px;
                 padding: 15px 45px;
                 text-align: center;
                 text-transform: uppercase;
                 transition: 0.5s;
                 background-size: 200% auto;
                 color: white;            
                 box-shadow: 0 0 20px #eee;
                 border-radius: 10px;
                 display: block;
                 
                
               
                 "><a href="..\instascan-master\docs">Order Now </a></button>
        <?php
        } else if ($status == 'preparing') { ?>
            <h5>Your food is being prepared</h5>
            <img src="https://c.tenor.com/0FQZ-mfV6oEAAAAC/food-cooking.gif" alt="Italian Trulli">


        <?php
        } else if ($status == 'ready') { ?>
            <h5>Sit tight!!</h5>
            <h5>Your food is ready to serve</h5>
            <img src="https://media4.giphy.com/media/cgnNSzn6wKWirkoHqR/giphy.gif" alt="Italian Trulli">


        <?php
        } else if ($status == 'delivered') { ?>
            <h5>Your food is served</h5>
            <img src="https://classroomclipart.com/images/gallery/Animations/Food/chef-animation.gif" alt="Italian Trulli">
            <h5>Don't forget to leave a review</h5>
            <form method="post" action = "rating.php">
                <fieldset class="rating">
                    <input id="demo-1" type="radio" name="demo" value="1">
                    <label for="demo-1">1 star</label>
                    <input id="demo-2" type="radio" name="demo" value="2">
                    <label for="demo-2">2 stars</label>
                    <input id="demo-3" type="radio" name="demo" value="3">
                    <label for="demo-3">3 stars</label>
                    <input id="demo-4" type="radio" name="demo" value="4">
                    <label for="demo-4">4 stars</label>
                    <input id="demo-5" type="radio" name="demo" value="5">
                    <label for="demo-5">5 stars</label>

                    <div class="stars">
                        <label for="demo-1" aria-label="1 star" title="1 star"></label>
                        <label for="demo-2" aria-label="2 stars" title="2 stars"></label>
                        <label for="demo-3" aria-label="3 stars" title="3 stars"></label>
                        <label for="demo-4" aria-label="4 stars" title="4 stars"></label>
                        <label for="demo-5" aria-label="5 stars" title="5 stars"></label>
                    </div>
                    <input type="hidden" name="restaurant_id" value = "<?php echo $restaurant_id;?>">
                    <input type="submit" value="Submit">
                    </fieldset>
      
                <script>
                    (function() {
                        var rating = document.querySelector('.rating');
                        var handle = document.getElementById('toggle-rating');
                        handle.onchange = function(event) {
                            rating.classList.toggle('rating', handle.checked);
                        };
                    }());
                </script>
            </form>


        <?php
        }
        ?>
        <br>
        <br>
        <br>

        <form name="form" action="order_track.php" method="post">
            <input type="hidden" name="order_id" value=<?php echo $order_id ?>>
            <input class="btn" type="submit" name="call" value="Call Waiter">
        </form>
    </div>
</head>

<body>

</body>

</html>
<style>
    .order_track {
        margin: -1px 10px;
        padding: 10px;
        text-align: center;

    }

    .btn {
        border-radius: 12px;

    }
    /* 
        Use :not with impossible condition so inputs are only hidden 
        if pseudo selectors are supported. Otherwise the user would see
        no inputs and no highlighted stars.
    */
    .rating input[type="radio"]:not(:nth-of-type(0)) {
        /* hide visually */    
        border: 0;
        clip: rect(0 0 0 0);
        height: 5px;
        margin: -1px;
        overflow: hidden;
        padding: 0;
        position: absolute;
        width: 1px;
    }
    .rating [type="radio"]:not(:nth-of-type(0)) + label {
        display: none;
    }
    
    label[for]:hover {
        cursor: pointer;
    }
    
    .rating .stars label:before {
        content: "★";
    }
    
    .stars label {
        color: lightgray;
    }
    
    .stars label:hover {
        text-shadow: 0 0 1px #000;
    }
    
    .rating [type="radio"]:nth-of-type(1):checked ~ .stars label:nth-of-type(-n+1),
    .rating [type="radio"]:nth-of-type(2):checked ~ .stars label:nth-of-type(-n+2),
    .rating [type="radio"]:nth-of-type(3):checked ~ .stars label:nth-of-type(-n+3),
    .rating [type="radio"]:nth-of-type(4):checked ~ .stars label:nth-of-type(-n+4),
    .rating [type="radio"]:nth-of-type(5):checked ~ .stars label:nth-of-type(-n+5) {
        color: orange;
    }
    
    .rating [type="radio"]:nth-of-type(1):focus ~ .stars label:nth-of-type(1),
    .rating [type="radio"]:nth-of-type(2):focus ~ .stars label:nth-of-type(2),
    .rating [type="radio"]:nth-of-type(3):focus ~ .stars label:nth-of-type(3),
    .rating [type="radio"]:nth-of-type(4):focus ~ .stars label:nth-of-type(4),
    .rating [type="radio"]:nth-of-type(5):focus ~ .stars label:nth-of-type(5) {
        color: darkorange;
    }
</style>
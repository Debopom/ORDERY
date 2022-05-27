<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

    <title>Success Payment</title>
<style>
    #main_card_div{
        margin-left: 500px;
        margin-right: 500px;
        /* padding: 100px; */
    }

    #button{
        margin-left: 250px;
        margin-right: 250px;
    }

</style>


</head>

<body>
    

    <?php

    include_once 'dbconnect.php';
    include 'navbar.html';
        





        ?>
        <div class="text-center my-4">
            <h1>Click here to track your current order</h1>
        </div>
        <form name="update" action="order_track.php" method="post">
            <input type="hidden" name="order_id" value="<?php echo $last_id; ?>">

            </select>
            <!-- <div class="text-center my-4"> <input type="submit" value="Track"> </div> -->
            <input type="submit" class="btn btn-primary btn-rounded" style="margin-left: 720px;" value="Track Order">
        </form>
        <?php

    $val_id = urlencode($_POST['val_id']);
    $store_id = urlencode("order62874053e1342");
    $store_passwd = urlencode("order62874053e1342@ssl");
    $requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=" . $val_id . "&store_id=" . $store_id . "&store_passwd=" . $store_passwd . "&v=1&format=json");

    $handle = curl_init();
    curl_setopt($handle, CURLOPT_URL, $requested_url);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

    $result = curl_exec($handle);

    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if ($code == 200 && !(curl_errno($handle))) {

        # TO CONVERT AS ARRAY
        # $result = json_decode($result, true);
        # $status = $result['status'];

        # TO CONVERT AS OBJECT
        $result = json_decode($result);

        # TRANSACTION INFO
        $status = $result->status;
        $tran_date = $result->tran_date;
        $tran_id = $result->tran_id;
        $val_id = $result->val_id;
        $amount = $result->amount;
        $store_amount = $result->store_amount;
        $bank_tran_id = $result->bank_tran_id;
        $card_type = $result->card_type;

        # EMI INFO
        $emi_instalment = $result->emi_instalment;
        $emi_amount = $result->emi_amount;
        $emi_description = $result->emi_description;
        $emi_issuer = $result->emi_issuer;

        # ISSUER INFO
        $card_no = $result->card_no;
        $card_issuer = $result->card_issuer;
        $card_brand = $result->card_brand;
        $card_issuer_country = $result->card_issuer_country;
        $card_issuer_country_code = $result->card_issuer_country_code;

        # API AUTHENTICATION
        $APIConnect = $result->APIConnect;
        $validated_on = $result->validated_on;
        $gw_version = $result->gw_version;


        // echo $status . " " . $tran_date . " " . $tran_id . " " . $card_type . " ";
    } else {

        echo "Failed to connect with SSLCOMMERZ";
    }
    ?>



<div id="main_card_div" class="card text-center">
  <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
    <img src="ordery_logo.png" class="img-fluid"/>
    <a href="#!">
      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
    </a>
  </div>
  <div  class="card text-center">
    <h2 class="card-title">Payment Successfull</h2>
    <p class="card-text"><?php echo $status . " "?></p>
    <p class="card-text"><?php echo  "Date: ".$tran_date .""?></p>
    <p class="card-text"><?php echo "TRansection ID: ".$tran_id ."" ?></p>
    <p class="card-text"><?php echo  "CARD Type: ".$card_type .""?></p>
    <p class="card-text"><?php echo "Amount: ".$amount ."Taka" ?></p>
  </div>
  <div class="card-footer text-muted">Thanks For choosing ORDERY!</div>
</div>


    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
</body>

</html>

<html>

<head>
  <title>QR Scan</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <link rel="stylesheet" href="style.css">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css" rel="stylesheet" />

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
  <script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
</head>

<body>
  <?php include 'navbar.html' ?>
  <?php
  session_start();
  ?>
  <div style="position: absolute; top: 0; right: 10; border: 0; z-index: 1">
    
    <div style="position: absolute; top: 30; right: 10; border: 0; z-index: 1 ;color: white;">
      
    </div>
  </div>
  <div class="bg-white" id="app" >

    
    
    <div class="preview-container"class="bg-white" >

    <section class="cameras">
      <h2>Cameras</h2>
      <ul>
        <li v-if="cameras.length === 0" class="empty">No cameras found</li>
        <li v-for="camera in cameras">
          <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active">{{ formatName(camera.name) }}</span>
          <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
            <a @click.stop="selectCamera(camera)">{{ formatName(camera.name) }}</a>
          </span>
        </li>
      </ul>
    </section>

      <video id="preview"></video>

      <section class="scans">
      <h2>Scans</h2>
      <ul v-if="scans.length === 0">
        <li class="empty">No scans yet</li>
      </ul>
      <transition-group name="scans" tag="ul">
        <li v-for="scan in scans" :key="scan.date" :title="scan.content">{{ scan.content }}
          <form action="../../restaurants.php" method="post">
            <input type="hidden" name="qr" :key="scan.date" :value="scan.content" />
            <input type="submit" value="Submit" />
          </form>
        </li>
      </transition-group>
    </section>
    </div>
</div>


 <div class = "modal-btn"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Enter QR code manually
                    </button>
          </div>   
    
    
    
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <form name="qrscan" class="needs-validation" method="post" action="../../restaurants.php"> <!things will be like this for every forms>
                                      <div class="form-row">
                                        <div class="form-group row-cols-md-20">
                                          <input type="text" class="form-control" name="qr" placeholder="Enter QR code"> <!  id should be replaced with "name" for every input;>
                                        </div>
                                        </div>
                                      <input type="submit" class="btn btn-success" style="margin-top: 10px; margin-left: 67px; margin-top: 5px;"></input> 
                                </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <br><br><br><br>
                    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    
    <script type="text/javascript" src="app.js"></script>
</body>

</html>
<style>
  .btn {
        border-radius: 12px;
        margin-left: auto;
        margin-right: auto;

    }
    .modal-btn{
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;
      text-align: center;
    }

</style>
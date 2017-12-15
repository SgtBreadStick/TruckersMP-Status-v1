<html>
    <head>
        <title>TruckersMP Status</title>
        <link rel="icon" type="image/png" href="img/truckersmp-icon.png"/>
        <meta name="viewport" content="initial-scale=1">
        <link href="fontawesome/css/font-awesome.css" rel="stylesheet">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/metro-bootstrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/jquery.dataTables.min.css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <strong>
            <center>
                <img class="fit" src="img/truckersmp.png" width="600" height="auto">
            </center>
            <h1>TruckersMP Status</h1>
        </strong><hr>
 
<?php
    $servers = json_decode(file_get_contents("https://api.truckersmp.com/v2/servers"), true);
?>
<?php
        foreach($servers['response'] as $serv){
            if($serv['online']){
                $status = '<strong><font color="green">Online</font></strong>';
            } else {
                $status = '<strong><font color="red">Offline</font></strong>';
            }
            
            if($serv['speedlimiter']){
                $speedlimiter = '<font color="green">Enabled</font>';
            } else {
                $speedlimiter = '<font color="red">Disabled</font>';
            }

            if($serv['policecarsforplayers']){
                $police = '<hr><i class="fa fa-car fa-3x" aria-hidden="true"></i><strong><font color="blue">Enabled</font></strong><br>Police For Players';
            } else {
                $police = '';
            }
            
            
            echo '<div>
                    <div class="col-md-4">
                    <div class="panel panel-default">
                      <div class="panel-heading">
                        <h3 class="panel-title">'. $serv['name'] . ' - ' . $serv['game'] .'</h3>
                      </div>
                      <div class="panel-body" style="box-sizing: border-box; border: 15px solid #f2f2f2">
                        <i  class="fa fa-users fa-3x" aria-hidden="true"></i><strong><big>'. $serv['players'] .'</strong></big><small> / '. $serv['maxplayers'] .'</strong></small><br>Players<hr>
                        <i class="fa fa-user-o fa-3x" aria-hidden="true"></i><strong>'. $serv['queue'] .'</strong><br> Queue<hr>
                        <i class="fa fa-server fa-3x" aria-hidden="true"></i><strong>'. $status .'</strong><br>Server Status<hr>
                        <i class="fa fa-tachometer fa-3x" aria-hidden="true"></i><strong>'. $speedlimiter .'</strong><br>Speedlimiter
                        '. $police .'
                      </div>
                    </div>
                    </div>
                </div>';
        } 
    ?>
    </div>
    <!--Author Section-->
    <center><a href="https://github.com/SgtBreadStick" class="w" target="_blank">Developed By SgtBreadStick</a></center>
    <br><br>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/holder.js"></script>
    <script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
    <script type="text/javascript" src="js/dataTables.min.js"></script>
    <script type="text/javascript" src="js/dataTables.bootstrap.min.js"></script>
</body>
</html>
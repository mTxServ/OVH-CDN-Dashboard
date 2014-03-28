<?php

/**
 * Convert octect to Mo
 * 
 * @param decimal $octet
 * 
 * @return decimal
 */
function formatBytes($octet)
{
    return round($octet/(1024*1024), 2);
}

require_once 'inc/OvhApi.php';
require_once 'inc/config.php';

$api = new OvhApi($api_url, $api_ak, $api_as, $api_ck);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dashboard CDN</title>

        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="http://getbootstrap.com/examples/dashboard/dashboard.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">CDN</a>
            </div>
          </div>
        </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li><a href="index.php">Overview</a></li>
            <li><a href="index.php?page=rules">Rules</a></li>
            <li><a href="index.php?page=tasks">Tasks</a></li>
            <li><a href="index.php?page=quota">Quota</a></li>
            <li><a href="index.php?page=stats">Stats</a></li>
            <li><a href="index.php?page=ssl">SSL</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <?php
          if (isset($_GET['page']) && file_exists('pages/' . $_GET['page'] . '.php')) {
              $page = $_GET['page'];
          } else {
              $page = 'index';
          }
          
          require_once 'pages/' . $page . '.php';
          ?>
        </div>
      </div>
    </div>
</body>
</html>
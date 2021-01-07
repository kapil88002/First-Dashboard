<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel='stylesheet' href='style.css'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


    <title>Data Dashboard</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">DataDashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">EDA(Exploratory Data Analysis</a></li>
            <li><a class="dropdown-item" href="#">NLP</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Predictive Analysis</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="#" tabindex="-1" aria-disabled="true">Contact</a>
        </li>
      </ul>
      </div>

      <div class='col-mr-3 pd-3'>
      <button type="button" class="btn btn-outline-primary">SignUp</button>
</div>
<div class='col-mr-3'>
      <button type="button" class="btn btn-outline-primary">Login</button>
</div>


</nav>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="bar-chart-2"></span>
              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="layers"></span>
              Analysis
            </a>
          </li>
        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>


    <div class="container">
     <div class="row">
         <div class='col-md-6'>
         <h2>Sources</h2>

      <?php

          $ch = curl_init("http://127.0.0.1:5000/");

          curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

          $result = curl_exec($ch);
          curl_close($ch);

          $arr=json_decode($result,true);


          $arr = $arr['response'];

          $hashtag = array();
          $count = array();

          foreach($arr as $a) {
            $hashtag[] = explode(" ", $a)[0];
            $count[] = explode(" ", $a)[1];
            $link = explode(" ", $a)[2];
          
            $count = preg_replace('~\D~', '', $count);
            echo "<h2>Sources</h2>"[0];
            echo "<a href='".$link."'>$link </a><br>";
        
            
          }
          

?>

   </div>
</div>
</div>



<?php

          $cht = curl_init("http://127.0.0.1:5001/");

          curl_setopt($cht, CURLOPT_RETURNTRANSFER, 1);

          $re = curl_exec($cht);
          curl_close($cht);

          $arr=json_decode($re,true);

          foreach($arr as $pd){
      
            // echo implode(',',$pd);
        }
        
          

?>


<div class="container mt-5 pd-3 ">
  <div class="row ">
    <div class="col-6 ">
          <h3>Top Trending twitter </h3>

              <canvas 
                    id="TwitterTags" 
                    aria-label="Tag"
                    role='img'
                    width='500'
                    height="400">
             </canvas>
    
    <script>
      const ctx = document.getElementById('TwitterTags').getContext('2d');
      const chart = new Chart(ctx, {
          // The type of chart we want to create
          type: 'horizontalBar',

          // The data for our dataset
          data: {
              labels: [<?php foreach($hashtag as $tag) { echo '"'.$tag.'",'; } ?>],
              datasets: [{
                  backgroundColor: "green",
                  borderColor: "green",
                  data: [<?php echo implode(',',$count) ?>],
              borderWidth: 1,
              hoverBackgroundColor:"#000"
              }]  
          }
        });
  </script>
 </div>
 



 <div class="col-6 ">
  <div>
    <h2>Sentimental Score</h2>
    <div id="Sentimental"></div>
  </div>
    <script>
        const options = {
            series: [<?php echo implode(',',$pd) ?>],
            chart: {
            height: 350,
            type: 'radialBar',
          },  
          plotOptions: {
            radialBar: {
              dataLabels: {
                name: {
                  fontSize: '22px',
                },
                value: {
                  fontSize: '16px',
                },
                total: {
                  show: false,
                  label: 'Total',
                }
              }
            }
          },
          labels: ['Positive','Negative','Neutral'],
          };

          const chartss = new ApexCharts(document.querySelector("#Sentimental"), options);
          chartss.render();
     </script>
     </div>
     



     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
 integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
 crossorigin=""/>
 <script  src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
 integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
 crossorigin=""></script>
 

<style>
#mapid { 
	width:1000px;
	height: 300px;
     }
</style>
      

 <div class="container">
   <div class="row">
    <div class="col-md">
        <h3>Geolocation representation</h3>


<div id="mapid"></div>

<script>
  
  var mymap = L.map('mapid').  setView([40.730610, -73.935242], 13);

      const attribution=
      '$copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetmap </a> contributors';
      const tileUrl="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";
      const tiles = L.tileLayer(tileUrl,{attribution});
      tiles.addTo(mymap);
      L.marker([40.730610, -73.935242]).addTo(mymap);

      </script>
     </div>
   </div>
</div> 



<div class="container mt-5 pd-3">
<div class="col">
<h3>Content</h3>

<?php 
 $curlcommand = curl_init("http://127.0.0.1:5002/");

curl_setopt($curlcommand, CURLOPT_RETURNTRANSFER, 1);


$tp = curl_exec($curlcommand);
curl_close($curlcommand);

$mpp=json_decode($tp,true);

$mpp = $mpp['response'];

$text = array();
$created_at = array();
$screen_names = array();
$location = array();

foreach($mpp as $ed){
  $text[] = explode("`", $ed)[0];
  $created_at[] = explode("`", $ed)[1];
  $screen_names[] = explode("`", $ed)[2];
  $location[] = explode("`", $ed)[3];

  echo explode("`", $ed)[0]."<br>";
  echo explode("`", $ed)[1]."<br>";
  echo explode("`", $ed)[2]."<br>";
  echo explode("`", $ed)[3]."<br>";

} 

?>


</div>
</div>


<h4>Google Search Result</h4>

      <div class="col-5 ">
      <input type="text" id="search_query"/>
      <button onclick="searchGoogle();" type="submit" class="btn btn-info" >Search</button>
      <div class="gcse-search"></div>
</div>
  </div>



  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>© 2017-2020 Virtual Analytica, Inc. · <a href="#">Privacy</a> · <a href="#">Terms</a></p>
  </footer>

  <script>
  function searchGoogle() {
    var search_term = $('#search_query').val();

    $.ajax({
      type: 'GET',
      url: 'http://http://127.0.0.1:5003/',
      data: {"search_query": search_term},
      crossDomain: true,
      success: function(response) {
        console.log("ok");
        console.log(response);
      },
      error: function(data) {
        console.log("fail");
        console.log(data);
      }
    });
  }
  </script>

    <!-- Optional JavaScript; choose one of the two! -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/
    js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
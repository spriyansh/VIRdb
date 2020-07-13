<HTML lan='en'>
<HEAD>
    <TITLE>VIRdb: A comprehensive resource for Vitiligo</TITLE>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Vitiligo Information resource (<b>VIRdb</b>) is a comprehensive database which systematically mounts all the information relating to vitiligo in terms of Potential protein targets and differentially expressed genes in a user-friendly database.">
    <meta name="keywords" content="Vitiligo, VIRdb, Vitiligo Information">
    <meta name="author" content="Samuel Bharti">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://kit.fontawesome.com/d797833248.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="./resources/js/bootstrap.min.js" crossorigin="anonymous"></script>

</HEAD>
<BODY>
    <div class="menu d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-1">
    <a class="my-0 mr-md-auto" id="logo" href="index.php" ><h5>VIRdb</h5></a>
    <nav class="my-2 my-md-0 mr-md-3 navbar">
    <a class="mr-4 text-white py-1" href="about.php">About</a>
    <a class="mr-4 text-white py-1" href="browse.php">Browse</a>
    <a class="mr-4 text-white py-1" href="download.php">Download</a>
    <a class="mr-4 text-white py-1 " href="contact.php">Contact Us</a>
<!--dropdowns-->    
    <div class=" dropdown show">
    <a class="mr-4 py-1 dropdown-toggle text-white" data-display="static"  role="button" id="dropdownMenuLink" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">Github</a>
    <div class="dropdown-menu dropdown-menu-sm-right dropdown-menu-sm-left" aria-labelledby="dropdownMenuLink">
    <a class="dd  dropdown-item" style="font-size: 60%;" target="_blank" href="https://github.com/Samuel-Bharti/VIRdb">Database Source Code</a>
     <div class="dropdown-divider"></div>
    <a class="dd  dropdown-item" style="font-size: 60%;" target="_blank" href="https://spriyansh.github.io/Micro-Array-Data-Analysis/" >Scripts used in Analysis</a>
    </div></div>

    </nav>
    </div>
    
<?php 
    
    function dbconnect(){
        
     $link= mysqli_connect("localhost","root","","virdb");
        if (mysqli_connect_error()) 
        {
            echo "There was a error"; 
        }
        else
        {
            return $link;
        }    }?>

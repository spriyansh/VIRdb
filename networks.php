<?php include 'header.php'?>
<?php 
    if(isset($_GET['network'])){
        $net = $_GET['network'];
        $link = dbconnect();
        $query = "SELECT * FROM network WHERE Name = '$net' ";
        $result = mysqli_query($link,$query);
        $row = mysqli_fetch_assoc($result);
    $net = "./resources/network/". $net . ".json";
echo '
<div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
    <h4>'.$row['net_name'].' Network</h4>
    <p class="text-center mx-auto" style="font-size:80%;">-Click <a href="networks.php"><b>here</b></a> to go back to gallery</p>
</div>
<div class="container-fluid pb-1 ">
<div class="row p-2 d-flex flex-column flex-md-row">
<div class="col">
    <h5 class="text-center">Description</h5>
    <div class=""><p class=""  style="font-size:120%;">'.$row['Description'].' </p></div>
</div></div>
<div class="row p-2 d-flex flex-column flex-md-row">
<div class="col mb-3"><div class="row mb-5 " >
    <div id="container" class="mx-auto mb-5 shadow border svg-container"></div></div>
</div></div></div>';mysqli_close($link);}
    else {
        echo '
    <div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
    <h4>Network Gallery</h4></div>
        <div class="container-fluid pt-md-4 pb-md-4 p-3">
<section class="p-4">
<div class="row mb-4 d-flex flex-column flex-md-row">
<div class="col py-3">
    <h6 class="mb-3 p-1 text-center">GGI Network <br> (Differential Genes)</h6><a href="networks.php?network=combined_ggi">
    <figure class=" mx-auto hover-zoomin " style="width:8em;"><img class="border" src="./resources/image/combined_ggi.png" ></figure></a></div>
<div class="col py-3">
    <h6 class="mb-3 p-1 text-center"> PPI Network <br> (Protein Targets)</h6><a href="networks.php?network=combined_ppi">
    <figure class=" hover-zoomin mx-auto" style="width:8em;"><img class="border" src="./resources/image/combined_ppi.png"></figure></a></div>
<div class="col py-3">
    <h6 class="mb-3 p-1 text-center">Intersecting GGI with <br>Multiple Sclerosis</h6><a href="networks.php?network=v_MS_intersection">
    <figure class=" hover-zoomin mx-auto" style="width:8em;"><img class="border" src="./resources/image/v_MS_intersection.png" ></figure></a></div>
<div class="col py-3">
    <h6 class="mb-3 p-1 text-center">Intersecting GGI with <br>Rheumatoid Arthritis</h6><a href="networks.php?network=v_RA_intersection">
    <figure class=" hover-zoomin mx-auto" style="width:8em;"><img class="border" src="./resources/image/v_RA_intersection.png" ></figure></a></div>
<div class="col py-3">
    <h6 class="mb-3 p-1 text-center">Intersecting GGI with <br>Psoriasis</h6><a href="networks.php?network=v_Psorasis_intersection">
    <figure class=" hover-zoomin mx-auto" style="width:8em;"><img class="border" src="./resources/image/v_Psorasis_intersection.png" ></figure></a></div></div></section></div>';}?>
<script src="./resources/js/d3.min.js"></script>
<script id="net" data-name="<?php echo $net?>" src="./resources/js/net.js"></script>
<?php include 'footer.php'?>
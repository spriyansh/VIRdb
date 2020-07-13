<?php include 'header.php';

    $link = dbconnect();
    $check = 'Unavailable';
    $query = "SELECT VIRID FROM protein_target WHERE `PDB ID` != '$check' ";
    $result = mysqli_query($link,$query); 
    $i = 1;?>

<div class="p-1"><div class="pricing-header px-2 py-2 pt-md-1 pb-md-1 mx-auto text-center">
<h5>Natural Leads</h5></div>
<p class="text-center mx-auto" style="font-size:85%;">-Click on lead to see docking results</p></div>
<div class="container-fluid mb-3">
<div class="row p-2 mb-3 mx-auto d-flex flex-column text-center flex-md-row"><div class="col py-2">   

<?php
    while($row = mysqli_fetch_assoc($result)){
        $path = 'nl.php?virid=' . $row['VIRID'];
        if($i == 4 ){
        echo 
        "<a href='".$path."'><button class='nleads'>". $row['VIRID'] ."
        <i class='ml-1 fas fa-eye'></i></button></a></div>
        <div class='col py-2'>";
            $i = 1;}
        else{
        echo 
        "<a href='".$path."'><button class='nleads'>". $row['VIRID'] ."
        <i class='ml-1 fas fa-eye'></i></button></a>";
        $i = $i + 1;} }?>
</div>
</div>
        
<?php 
    if(isset($_GET['virid'])){

    $link = dbconnect();
    $virid = $_GET['virid'];
    $query = "SELECT * FROM all_dock WHERE VIRID = '$virid' ";
    $result = mysqli_query($link,$query);
    $npassb = 'http://bidd2.nus.edu.sg/NPASS/compound.php?compoundID=';
    echo"
    <div class='container-fluid mb-4'>  
    <div class='p-1'>
    <div class='pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center'>
    <h6> Docking Results For " .$virid . " </h6>
    </div></div>
    <div class='row pb-3'>
    <div class= 'col mb-5'>
            <table class='tg mb-3' style= 'width:90% !important; font-size:90% !important;'>
            <thead>
              <tr>
                <th class='tg-qi21'>NPASS ID</th>
                <th class='tg-qi21'>Docking Scores</th>
                <th class='tg-qi21'>Glide Scores</th>
                <th class='tg-qi21'>Glide Energy</th>
              </tr>
            </thead>
            <tbody>";
    while($row = mysqli_fetch_assoc($result)){
         $npass = $row['NPASS ID'];
         $dock = $row['Docking Scores'];
         $sglide = $row['Glide Scores'];
         $eglide = $row['Glide Energy'];            
echo"
  <tr>
    <td class='tg-1svo l'><a target='_blank' class='db' href='". $npassb.$npass . "'>". $npass ."</a></td>
    <td class='tg-0lax'>". $dock ."</td>
    <td class='tg-0lax'>". $sglide ."</td>
    <td class='tg-0lax'>". $eglide ."</td>
  </tr>"; } mysqli_close($link); }?>
</tbody></table></div></div></div></div>
<?php include 'footer.php'?>
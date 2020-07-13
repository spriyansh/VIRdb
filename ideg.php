<?php include 'header.php';?>
<div class="container-fluid">
<div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
<h5>Intersecting Differential Genes with Other Diseases</h5></div>
<div class="row pt-md-1 pb-md-1 p-4 d-flex flex-column flex-md-row text-center mx-auto">
<div class="col py-3"><a href="ideg.php?type=Multiple_Sclerosis"><div class="spot2">Multiple Sclerosis
</div></a></div>
<div class="col py-3"><a href="ideg.php?type=Psoriasis"><div class="spot2">Psoriasis</div></a></div>
<div class="col py-3"><a href="ideg.php?type=Rheumatoid_Arthritis"><div class="spot2">Rheumatoid Arthritis</div></a></div></div></div>
<div class="container-fluid mb-4">  
<?php 
if(isset($_GET['type'])){
    $link = dbconnect();
    $type = $_GET['type'];
    $query = "SELECT * FROM intersecting_deg WHERE Disease = '$type' ";
    $result = mysqli_query($link,$query);
    $hgncb = 'https://www.genecards.org/cgi-bin/carddisp.pl?gene=';

    echo
        '<div class="p-1">
<div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
<h6>Results For Intersecting ' . $type.' Genes   </h6>
</div>
<div class="row mb-4 ">
<div class= "col mb-4">';

    echo "
<table class='tg mb-4' style= 'width:85% !important; font-size:2vw !important;'>
<thead>
  <tr>
    <th class='tg-qi21'>Symbol</th>
    <th class='tg-qi21'>Fold Change in " . $type. " </th>
    <th class='tg-qi21'>FDR in " . $type. " </th>
    <th class='tg-qi21'>Fold Change in Vitiligo</th>
    <th class='tg-qi21'>FDR in Vitiligo</th>
  </tr>
</thead>
<tbody>";

    while($row = mysqli_fetch_assoc($result)){
$symb  = $row['Symbol'];
$fc = $row['FC'];
$fdr = $row['FDR'];
$fcv = $row['FCV'];
$fdrv = $row['FDRV'];

echo "
  <tr>
    <td class='tg-1svo l'><a target='_blank' class='db' href='". $hgncb . $symb . "'>". $symb . "</td>
    <td class='tg-0lax'>". $fc ."</td>
    <td class='tg-0lax'>". $fdr ."</td>
    <td class='tg-0lax'>". $fcv ."</td>
    <td class='tg-0lax'>". $fdrv ."</td>
  </tr>"; } mysqli_close($link); }?>    
</tbody>
</table>
</div>
</div>
</div>

<?php include 'footer.php'?>
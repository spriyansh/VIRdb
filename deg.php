<?php include 'header.php';?>

<div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
<h5>Browse Differentially Expressed Genes</h5></div>
<div class="row pt-md-1 pb-md-1 mx-auto text-center p-2 d-flex flex-column flex-md-row">
  <div class="col py-3 "><a href="deg.php?type=Lesional" class=""><div class="spot2">Expressed in Lesional Vitiligo</div></a></div>
  <div class="col py-3 "><a href="deg.php?type=Non_Lesional" class=""><div class="spot2">Expressed in Non-Lesional Vitiligo </div></a></div>
  <div class="col py-3 "><a href="deg.php?type=Peri_Lesional" class=""><div class="spot2">Expressed in Peri-Lesional Vitiligo</div></a></div>
  <div class="col py-3 "><a href="deg.php?type=Lesional_Peri_Non" class=""><div class="spot2">Combined Expression</div></a></div></div>
<div class="container-fluid mb-4">  
<?php 
        if(isset($_GET['type'])){
    $link = dbconnect();
    $type = $_GET['type'];
    $query = "SELECT * FROM deg_main WHERE gene_type = '$type' ";
    $result = mysqli_query($link,$query);
    $hgncb = 'https://www.genecards.org/cgi-bin/carddisp.pl?gene=';

    echo
        '
<div class="pricing-header px-2 py-2 pt-md-3 pb-md-3 mx-auto text-center">
<h6>Results For ' . $type.' Genes   </h6>
</div>
<div class="row mb-5">
<div class= "col mb-5">';

echo"

<table class='tg' style= 'width:85% !important; font-size:1vw !important;'>
<thead>
  <tr>
    <th class='tg-qi21'>VIRID</th>
    <th class='tg-qi21'>HGNC Symbol</th>
    <th class='tg-qi21'>Status</th>
    <th class='tg-qi21'>Chromosome</th>
    <th class='tg-qi21'>Map Location</th>
    <th class='tg-qi21'>Description</th>
    <th class='tg-qi21'>Type Of Gene</th>
    <th class='tg-qi21'>Fold Change</th>
    <th class='tg-qi21'>P-Value</th>
    <th class='tg-qi21'>False Discovery Rate</th>
    <th class='tg-qi21'>Probe Id</th>
  </tr>
</thead>
<tbody>
";
    while($row = mysqli_fetch_assoc($result)){

$virid = $row['VIRID'];
$hgnc  = $row['HGNC Symbol'];
$status = $row['Status'];
$chromo = $row['Chromosome'];
$map = $row['Map Location'];
$desc = $row['Description'];
$typeg = $row['Type'];
$fc    = $row['Fold Change'];
$pvalue = $row['P-Value'];
$fdr   = $row['False Discovery Rate'];
$probe = $row['Probe ID'];

echo "
  <tr>
    <td class='tg-0lax'>". $virid ."</td>
    <td class='tg-1svo'><a target='_blank' class='db' href='". $hgncb . $hgnc . "'>". $hgnc . "</td>
    <td class='tg-0lax'>". $status ."</td>
    <td class='tg-0lax'>". $chromo ."</td>
    <td class='tg-0lax'>". $map ."</td>
    <td class='tg-0lax'>". $desc ."</td>
    <td class='tg-0lax'>". $typeg ."</td>
    <td class='tg-0lax'>". $fc ."</td>
    <td class='tg-0lax'>". $pvalue ."</td>
    <td class='tg-0lax'>". $fdr ."</td>
    <td class='tg-0lax'>". $probe ."</td>
  </tr>"; } mysqli_close($link);} ?>    
</tbody>
</table>
</div>
</div>

<?php include 'footer.php'?>
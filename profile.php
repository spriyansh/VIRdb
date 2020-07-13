<?php include 'header.php';

    $link = dbconnect();
    $pid = $_GET['virid'];
    $query = "SELECT * FROM protein_target WHERE VIRID = '$pid' ";
    $result = mysqli_query($link,$query);
    $row = mysqli_fetch_assoc($result);
//base url
    $swissb = 'https://www.uniprot.org/uniprot/';
    $stringb = 'https://string-db.org/network/';
    $asiterefb = 'https://doi.org/';
    $pdbb = 'https://www.rcsb.org/structure/';
    $geneb = 'https://www.genecards.org/cgi-bin/carddisp.pl?gene=';
    $keggb = 'https://www.genome.jp/dbget-bin/www_bget?hsa+';
    $viridb = 'profile.php?virid=';
//variables
    $virid = $row['VIRID'];
    $ps    = $row['Protein Symbol'];
    $desc  = $row['Description'];
    $swiss = $row['SwissProt ID'];
    $string  = $row['String ID'];
    $gene   = $row['Gene Name'];
    $kegg  = $row['KEGG ID'];
    $kegg = substr($kegg, 4);
    $method = $row['Method'];
    $resol = $row['Resolution'];
    $pdbid = $row['PDB ID'];
    $asite = $row['Active Site'];
    $chain = $row['Chain'];
    $asiteref = $row['Active Site Reference'];

//final paths 
    $swissb = $swissb . $swiss; 
    $stringb = $stringb . $string;
    $asiterefb = $asiterefb . $asiteref;
    $pdbb = $pdbb . $pdbid;
    $geneb = $geneb . $ps;
    $keggb =  $keggb . $kegg;
    $viridb = $viridb . $virid;
    $pdb_url = 'load ./resources/pdb/' .$virid. '.pdb';
    $spof = 'javascript:Jmol.script(jmolApplet0,"spin off")';
    $spon = 'javascript:Jmol.script(jmolApplet0,"spin on")';?>


<div class="p-1">
<div class="pricing-header px-2 py-2 pt-md-1 pb-md-1 mx-auto text-center">
<h5>Protein Profile</h5></div></div>
<div class="container-fluid p-1" style="margin-bottom: 2.5rem;">  
<div class="row d-flex flex-column flex-md-row mx-auto">
<div class= "col">
<table class="tg mb-4" style= "width:85% !important; font-size: !important;">
<thead><tr><th class='tg-qi21'>Feature</th><th class='tg-qi21'>Value</th></tr></thead>
<?php
echo"
<tbody>
  <tr>
    <td class='tg-qi21'>VIRID:</td>
    <td class='tg-ycr8'>$virid</td>
  </tr>
  <tr>
    <td class='tg-qi21'>Protein Name:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $geneb ."'>". $ps ."</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>Description:</td>
    <td class='tg-0lax'>$desc</td>
  </tr>
  <tr>
    <td class='tg-qi21'>SwissProt Id:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='".$swissb."'>". $swiss ."</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>String ID:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $stringb . "'>". $string ."</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>Gene Name ID:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $geneb . "'>". $gene ."</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>KEGG ID:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $keggb . "'>".$kegg ."</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>PDB ID:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $pdbb . "'>". $pdbid."</a></td>
  </tr>
    <tr>
    <td class='tg-qi21'>Method:</td>
    <td class='tg-ycr8'>".$method ."</td>
  </tr>
  <tr>
    <td class='tg-qi21'>Resolution:</td>
    <td class='tg-ycr8'>".$resol ."</td>
  </tr>
  <tr>
    <td class='tg-qi21'>Active Target Site:</td>
    <td class='tg-ycr8'>".$asite ."</td>
  </tr>
  <tr>
    <td class='tg-qi21'>Active Site Refrence:</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $asiterefb . "'>". $asiteref . "</a></td>
  </tr>
  <tr>
    <td class='tg-qi21'>Chain:</td>
    <td class='tg-ycr8'>".$chain ."</td>
  </tr>
</tbody>
</table> 
    </div>
<div class='col mb-5'><div class='row mx-auto' style= 'width:85% !important;'>
<div id='appdiv'style='height:20em !important; width:35em !important;'></div></div>
<div class='row mb-5 mt-1 mx-auto' style= 'width:85% !important;'>

<a class='jcontrol' href='".$spon."'>Spin on</a>
<a class='jcontrol' href='".$spof."'>Spin off</a>                        
<a class='jcontrol' href='". $pdb_url. "'download>Download PDB</a>
</div></div>
</div>
</div>";
    mysqli_close($link); ?>
<script type="text/javascript" src="./resources/js/JSmol.min.js"></script>
<script type="text/javascript" id='pdbu' data-name="<?php echo $pdb_url?>" src="./resources/js/jm.js"></script>

<?php include 'footer.php'?>
<!--<a class='jcontrol' href=javascript:Jmol.script(jmolApplet0,'load" .$pdb_url. "')>Structure</a>-->
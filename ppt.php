<?php include 'header.php';
    $link = dbconnect();
    $query = "SELECT * FROM protein_target";
    $result = mysqli_query($link,$query); ?>
            <div class="p-1">
            <div class="pricing-header px-2 py-2 pt-md-3 mx-auto text-center">
            <h5>Browse Potential Protein Targets</h5></div></div>
            <div class="container-fluid pt-md-3">  
            <div class="row mb-5">
            <div class= "col mb-5">
            <table class="tg mb-2" style= "width:90% !important; font-size:1.5vw !important;">
            <thead>
              <tr>
                <th class='tg-qi21'>VIRdb ID</th>
                <th class='tg-qi21'>Protein</th>
                <th class='tg-qi21'>Description</th>
                <th class='tg-qi21'>SwissProt ID</th>
                <th class='tg-qi21'>String ID</th>
                <th class='tg-qi21'>PDB ID</th>
                <th class='tg-qi21'>Gene Name</th>
                <th class='tg-qi21'>KEGG ID</th>
              </tr>
            </thead>
            <tbody>
<?php
    while($row = mysqli_fetch_assoc($result)){
    //base paths
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
/*    $kegg =  substr($kegg, 0, 4);*/
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
echo"
  <tr>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $viridb ."'>". $virid ."</a></td>
    <td class='tg-1svo'>". $ps ."</td>
    <td class='tg-0lax '>". $desc ."</td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='".$swissb."'>". $swiss ."</a></td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $stringb . "'>". $string ."</a></td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $pdbb . "'>". $pdbid."</a></td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $geneb . "'>". $gene ."</a></td>
    <td class='tg-0lax l'><a target='_blank' class='db' href='". $keggb . "'>".$kegg ."</a></td>
  </tr>"; } mysqli_close($link); ?>
</tbody></table></div></div></div>
<?php include 'footer.php'?>
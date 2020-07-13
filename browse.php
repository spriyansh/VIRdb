<?php include 'header.php'?>

<div class="container-fluid pt-md-3 pb-md-3 p-3 py-2">
<div class="row p-1 mx-auto text-center d-flex flex-column flex-md-row">
  <div class="col py-3">
    <div class="card mx-auto shadow" style="width: 80%; ">
    <div class="card-body">
    <a href="ppt.php" class="card-link"><div class="spot2">
    Protein Targets</div></a><p class="p-1 card-text">Explore protein Targets from the original PPI-network published in Malhotra et al., 2017. Scout relative information of the proteins from various sources such as SwissProt, STRING db et cetera. </p>
        </div></div></div>
  <div class="col py-3">
    <div class="card mx-auto shadow" style="width: 95%;">
    <div class="card-body">
    <a href="networks.php" class="card-link"><div class="spot2">Networks</div></a><p class=" p-1 card-text">Visualize the network with D3-Fore. The networks are designed using GeneMania plugin from Cytoscape.</p></div></div>
    </div>
  <div class="col py-3">
    <div class="card mx-auto shadow" style="width: 85%; ">
    <div class="card-body">
    <a href="nl.php" class="card-link"><div class="spot2">
    Natural Leads</div></a><p class="p-1 card-text">Inspect natural compounds from NPASS db that show significant GLIDE-Scores (Docking Scores)to curated protein targets. Data is projected for top 50 docked conformations along with Glide-Energies.</p>
        </div></div></div></div>
<div class="row p-3 mb-5 pb-md-3 mx-auto text-center d-flex flex-column flex-md-row ">
  <div class="col py-3">
    <div class="card mx-auto shadow" style="width: 95%; ">
    <div class="card-body">
    <a href="deg.php?type=Lesional" class="card-link"><div class="spot2">Differential Genes</div></a><p class="p-1 card-text">Investigate differentially expressed genes in various phenotypes of Vitiligo (i.e. Lesional Vitiligo, Peri-Lesional Vitiligo and Non-Lesional Vitiligo).The genes are derived through t-test and false-discovery rates for each test situation was computed using Storey–Tibshirani procedure (Storey &amp; Tibshirani, 2003).
    </p></div></div>
    </div></div>

</div>

<?php include 'footer.php'?>
<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

        <link rel="shortcut icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png" />
        <link rel="apple-touch-icon" href="<?= base_url(); ?>assets/images/logo-gonusa.png">
		<title>G-EXPORT</title>
		<!-- <meta name="keywords" content="" />
		<meta name="description" content="">
		<meta name="author" content=""> -->

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?= base_url(); ?>assets/master/css/master.css" />

        <!-- Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/select2/select2.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/css/datatables.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/template/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?= base_url(); ?>assets/template/vendor/modernizr/modernizr.js"></script>

		<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>

#loader {
    position: absolute;
    left: 50%;
    top: 50%;
    z-index: 1;
    width: 120px;
    height: 120px;
    margin: -76px 0 0 -76px;
    border: 16px solid #f3f3f3;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
  }
  
  @-webkit-keyframes spin {
    0% { -webkit-transform: rotate(0deg); }
    100% { -webkit-transform: rotate(360deg); }
  }
  
  @keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
  }
  
  /* Add animation to "page content" */
  .animate-bottom {
    position: relative;
    -webkit-animation-name: animatebottom;
    -webkit-animation-duration: 1s;
    animation-name: animatebottom;
    animation-duration: 1s
  }
  
  @-webkit-keyframes animatebottom {
    from { bottom:-100px; opacity:0 } 
    to { bottom:0px; opacity:1 }
  }
  
  @keyframes animatebottom { 
    from{ bottom:-100px; opacity:0 } 
    to{ bottom:0; opacity:1 }
  }

</style>


	</head>
	<body>

<!-- Notifications -->

<?php
  if($this->session->flashdata('warns') != null){ 
?>

<script>
  Swal.fire({
        icon: 'error',
        title: 'Failed',
        text: '<?php echo $this->session->flashdata('warns') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<?php
  if($this->session->flashdata('success') != null){ 
?>

<script>
  Swal.fire({
        icon: 'success',
        title: 'Success',
        text: '<?php echo $this->session->flashdata('success') ?>',
        // footer: '<a href="">Why do I have this issue?</a>'
      });
</script>

<?php
 }
?>

<!-- End Notifications -->

<div id="preloader" class="preloader">

  <!-- <div class="loading">
      <h1 class="inoaload">G-EXPORT</h1>
      <p>Please Wait..</p>
  </div> -->
<center>
        <div id="loader"></div>
</center>


</div>

<div class="wrapet">
  <section class="body">

  <!-- start: header -->
  <header class="header">
				<div class="logo-container">
					<a href="#" class="logo">
						<img src="<?= base_url(); ?>assets/images/gexim_600.png" height="35" alt="Gonusa" />
					</a>
					<div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html" data-fire-event="sidebar-left-opened">
						<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
					</div>
				</div>
			
				<!-- start: search & user box -->
				<div class="header-right">
			
					<!-- <span class="separator"></span> -->
			
					<span class="separator"></span>
			
					<div id="userbox" class="userbox">
						<a href="#" data-toggle="dropdown">
							<figure class="profile-picture">
								<img src="<?= base_url(); ?>assets/template/images/!logged-user.jpg" alt="Images" class="img-circle" data-lock-picture="assets/images/!logged-user.jpg" />
							</figure>
							<div class="profile-info" data-lock-name="John Doe" data-lock-email="johndoe@okler.com">
								<span class="name"><?php echo($this->session->userdata('logged_gexp_in')->AccountName); ?></span>
								<span class="role"><?php echo($this->session->userdata('logged_gexp_in')->UserName); ?></span>
							</div>
			
							<i class="fa custom-caret"></i>
						</a>
			
						<div class="dropdown-menu">
							<ul class="list-unstyled">
								<li class="divider"></li>
								<li>
									<a role="menuitem" tabindex="-1" href="#"><i class="fa fa-user"></i> My Profile</a>
								</li>
								
								<li>
									<a role="menuitem" tabindex="-1" href="<?php echo base_url('LoginSys/doLogout'); ?>"><i class="fa fa-power-off"></i> Logout</a>
								</li>

							</ul>
						</div>
					</div>
				</div>
				<!-- end: search & user box -->
	</header>
			<!-- end: header -->


            <div class="inner-wrapper">
				<!-- start: sidebar -->
				<aside id="sidebar-left" class="sidebar-left">
				
					<div class="sidebar-header" style="background-color: #172774;">
						<div class="sidebar-title">
							<h6 style="color: white; font-weight:bold;">G-EXPORT</h6>
						</div>
						<div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
							<i class="fa fa-bars" aria-label="Toggle sidebar"></i>
						</div>
					</div>
				
					<div class="nano">
						<div class="nano-content" style="background-color: #172774;">

						<nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

							<?php include_once "mastermenus.php"; ?>

								<ul>
						</nav>

						<!-- Start Menus -->

							<!-- <nav id="menu" class="nav-main" role="navigation">
								<ul class="nav nav-main">

									<li>
										<a href="index.html">
											<i class="fa fa-home" aria-hidden="true"></i>
											<span>Dashboard</span>
										</a>
                                    </li>
									<li class="nav-parent">
										<a>
											<i class="fa fa-copy" aria-hidden="true"></i>
											<span>Pages</span>
										</a>
										<ul class="nav nav-children">
											
											<li>
												<a href="pages-404.html">
 													<i class="fa fa-copy" aria-hidden="true"></i> 404
												</a>
											</li>
											<li>
												<a href="pages-500.html">
													<i class="fa fa-copy" aria-hidden="true"></i> 500
												</a>
											</li>
											<li>
												<a href="pages-log-viewer.html">
													<i class="fa fa-copy" aria-hidden="true"></i> Log Viewer
												</a>
											</li>
											
										</ul>
									</li>

								</ul>
							</nav> -->

							<!-- End Menus -->
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-tasks">
								<div class="widget-header">
									<h6 style="color: white;">User Group</h6>
									<div class="widget-toggle">+</div>
								</div>
								<div class="widget-content">
									<ul class="list-unstyled m-none">
										<li><a style="color: white;" href="#"><?php echo $groupname->GroupDesc; ?></a></li>
									</ul>
								</div>
							</div>
				
							<hr class="separator" />
				
							<div class="sidebar-widget widget-stats">
								<div class="widget-header"></div>
								<div class="widget-content">
									<ul>
									</ul>
								</div>
							</div>
						</div>
				
					</div>
				
				</aside>
<!-- end: sidebar -->
<section role="main" class="content-body">
<!-- start: page -->

<header class="page-header" style="background-color: #172774;">
	<h2>Packing List</h2>				
	<div class="right-wrapper pull-right">
		<ol class="breadcrumbs">
								<!-- <li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li> -->
								<!-- <li><span>Icons</span></li> -->
		</ol>			
		<a class="sidebar-right-toggle"><i class="fa fa-cube"></i></a>
	</div>
</header>

<section class="panel panel-primary">
							<header class="panel-heading">
								<div class="panel-actions">
									<a href="#" class="fa fa-caret-down"></a>
									<!-- <a href="#" class="fa fa-times"></a> -->
								</div>
						
								<h5>Dashboard PL : Packing List Details</h5>
							</header>
							<div class="panel-body">

<div class="container-fluid">

	<a class="btn btn-warning" href="<?php echo base_url('MenuPackingList/'); ?>"><i class="fa  fa-arrow-left"></i> Back</a>
	<a class="btn btn-danger" href="<?php echo base_url('MenuPackingList/packing_list_print/'.$rowdetailspack->gexp_packlistdet_id); ?>"><i class="fa fa-print"></i> PRINT</a>

</div>

							<hr>

							<form class="form-horizontal form-bordered" method="get">

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">PL Number</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $packno; ?>" id="inputDefault" disabled>
												</div>
											</div>


							</form>
<br>

											<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('MenuPackingList/Updates_container/'.$detailspack->gexp_packlist_id);?>">

												<div class="form-group">
													<label class="col-md-1 control-label" for="inputDefault">Container</label>
													<div class="col-md-3">
														<input type="text" class="form-control" name="container_no" value="<?php echo $detailspack->gexp_packlist_container; ?>" id="container_no" required>
													</div>
													<div class="col-md-3">
														<button type="submit" class="btn btn-warning">Updates</button>
													</div>
												</div>

											</form>

											<br>


							<form class="form-horizontal form-bordered" method="POST" action="<?php echo base_url('MenuPackingList/UpdateSettings_Print');?>">

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Invoice No</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $packdets->gexp_invoice_no; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">PO</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $detailspack->gexp_pi_po; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<br>

											<div class="form-group">
												<label class="col-md-1 control-label" style="font-weight: bold;" for="inputDefault">Consignee</label>
												<div class="col-md-3">
													<!-- <input type="text" class="form-control" value="<?php echo $detailspack->gexp_pi_po; ?>" id="inputDefault" disabled> -->
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $detailspack->CustCompanyName; ?>" id="inputDefault" disabled>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Address</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CustAddress; ?>" id="inputDefault" disabled>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Country</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->Consig_country; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Phone</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CtPhone; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Attention Contact Person</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CtName; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" style="font-weight: bold;" for="inputDefault">Notify</label>
												<div class="col-md-3">
													<!-- <input type="text" class="form-control" value="<?php echo $detailspack->gexp_pi_po; ?>" id="inputDefault" disabled> -->
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $detailspack->CustCompanyName; ?>" id="inputDefault" disabled>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Address</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CustAddress; ?>" id="inputDefault" disabled>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Country</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->Consig_country; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Phone</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CtPhone; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Attention Contact Person</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->CtName; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" style="font-weight: bold;" for="inputDefault">Shipper</label>
												<div class="col-md-3">
													<!-- <input type="text" class="form-control" value="<?php echo $detailspack->gexp_pi_po; ?>" id="inputDefault" disabled> -->
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Name</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="<?php echo $detailspack->BeneficiaryDesc; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Company Address</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->BeneficiaryAddr; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Port Of Discharge</label>
												<div class="col-md-3">
													<input type="text" class="form-control" value="" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Port Of Loading</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->LoadPortDesc; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault">Country Of Origin</label>
												<div class="col-md-4">
													<input type="text" class="form-control" value="<?php echo $detailspack->Benef_country; ?>" id="inputDefault" disabled>
												</div>
											</div>

											<hr>



											<input type="hidden" name="invoice_no" value="<?php echo $packdets->gexp_invoice_no; ?>">

											<input type="hidden" name="id_pack" value="<?php echo $packdets->gexp_packlist_id; ?>">

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
														<div class="checkbox">
														<label>
															<input type="checkbox" value="1" name="ctn_barcode">
															Carton Barcode
														</label>
														</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
													<div class="checkbox">
														<label>
															<input type="checkbox" value="1" name="batch">
															Batch
														</label>
													</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
														<div class="checkbox">
														<label>
															<input type="checkbox" value="1" name="exp_date">
															Expired Date
														</label>
														</div>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
														<div class="checkbox">
														<label>
															<input type="checkbox" value="1" name="prod_date">
															Production Date
														</label>
														</div>
												</div>
											</div>

											<div class="form-group">
												<label class="col-md-1 control-label" for="inputDefault"></label>
												<div class="col-md-2">
													<button type="submit" class="btn btn-block btn-primary"><i class="fa fa-filter"></i> Filter</button>
												</div>
											</div>

							</form>

<!-- Button trigger modal -->
<!-- <button type="button" class="mb-md mt-xs mr-xs btn btn-success" data-toggle="modal" data-target="#exampleModal">
  NEW
</button> -->

<!-- Modal Start -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">

        <h5 class="modal-title" id="exampleModalLabel">Create Master TOP</h5>
        
      </div>
      <div class="modal-body">

	  <form class="form-horizontal form-bordered form-bordered" action="<?php echo base_url('DataSetTop/createnewtop');?>" id="inputdatagroup" method="POST">
                                           
											<div class="form-group">
												<label class="col-md-3 control-label" for="textareaDefault">TOP Description</label>
												<div class="col-md-8">
													<input class="form-control" name="topdesc" data-plugin-maxlength maxlength="50" />
													<p>
														<code>max-length</code> set to 50 character <code>uppercase</code>.
													</p>
												</div>
                                            </div>
											
											
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-success">Save changes</button> -->
		<input type="submit" class="btn btn-success" value="Confirm">
		</form>
      </div>
    </div>
  </div>
</div>

<!-- End Modal Insert Group -->

<br>
<hr>

<?php if($printoutview->inv_print_carton_barcode=='1') { ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="" checked>
															 Carton Barcode
														</label>
													</div>
<?php }else{ ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															 Carton Barcode
														</label>
													</div>
<?php } ?>

<?php if($printoutview->inv_print_batch=='1') { ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="" checked>
															Batch
														</label>
													</div>
<?php }else{ ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Batch
														</label>
													</div>
<?php } ?>

<?php if($printoutview->inv_print_expired_date=='1') { ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="" checked>
															Expired Date
														</label>
													</div>
<?php }else{ ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Expired Date
														</label>
													</div>
<?php } ?>

<?php if($printoutview->inv_print_production_date=='1') { ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="" checked>
															Production Date
														</label>
													</div>
<?php }else{ ?>
													<div class="checkbox">
														<label>
															<input type="checkbox" value="">
															Production Date
														</label>
													</div>
<?php } ?>


								<table class="table table-bordered table-striped mb-none" id="tables3">
									<thead>
										<tr>
											<th>No</th>
<?php if($printoutview->inv_print_carton_barcode=='1') { ?>
											<th>Carton Barcode</th>
<?php } ?>
											<th>Description Of Goods</th>
											<th>HS Code</th>
											<th>Packing</th>
											<th>Qty ( CTNS )</th>
<?php if($printoutview->inv_print_batch=='1') { ?>
											<th>Batch</th>
<?php } ?>
<?php if($printoutview->inv_print_expired_date=='1') { ?>
                                            <th>Expired Date</th>
<?php } ?>
<?php if($printoutview->inv_print_production_date=='1') { ?>
                                            <th>Production Date</th>
<?php } ?>
                                            <th>Net Weight</th>
                                            <th>Gross Weight</th>
                                            <th>Total Measurement ( CBM )</th>
                                            <th>Dimensions Each Carton ( MM )</th>
											<th>Update</th>
										</tr>
									</thead>
									<tbody>

<?php

if(!empty($lsdetpack)){
  // Jika data pada database tidak sama dengan empty (alias ada datanya)
$no_urut=1;
  foreach($lsdetpack as $gaa){

$m=1000000000;
$q=$gaa->Length*$gaa->Width*$gaa->Height;
$z=$q/$m*$gaa->gexp_packlistdet_qty; 

    echo "<tr>";
	echo "<th scope='row'>".$no_urut++."</th>";
	if($printoutview->inv_print_carton_barcode=='1') {
		echo "<td>".$gaa->gexp_packlistdet_carton_bar."</td>";
	}else{
		echo "";
	}
	echo "<td>".$gaa->gexp_packlistdet_descgod."</td>";
	echo "<td>".$gaa->gexp_packlistdet_hscode."</td>";
    echo "<td>".$gaa->gexp_packlistdet_packing."</td>";
	echo "<td>".$gaa->gexp_packlistdet_qty."</td>";
	if($printoutview->inv_print_batch=='1') {
		echo "<td>".$gaa->gexp_packlistdet_batch."</td>";
	}else{
		echo "";
	}
	if($printoutview->inv_print_expired_date=='1') {
		echo "<td>".$gaa->gexp_packlistdet_expdate."</td>";
	}else{
		echo "";
	}
	if($printoutview->inv_print_production_date=='1') {
		echo "<td>".$gaa->gexp_packlistdet_proddate."</td>";
	}else{
		echo "";
	}
	
    echo "<td>".$gaa->gexp_packlistdet_netweight."</td>";
    echo "<td>".$gaa->gexp_packlistdet_grossweight."</td>";
    echo "<td>".
	round($z,2)."</td>";
    echo "<td>".$gaa->Length." x ".$gaa->Width." x ".$gaa->Height."</td>";
	// echo "<td>";
	// 	if($gaa->gexp_packlist_statrows==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";
	// echo "<td>";
	// 	if($gaa->CountryStats==1){
	// 		echo "Aktif";
	// 	}else{
	// 		echo "Tidak Aktif";
	// 	}
	// echo"</td>";
	echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' href='".base_url("MenuPackingList/preview_update_detailpack/".$gaa->gexp_packlistdet_id)."'><i class='fa fa-pencil-square-o'></i></a></td>";
    // echo "<td style='text-align:center; font-size:18px;'><a style='font-size:18px;' class='btn small-btn-ic-info shadow-sm' href='".base_url("MenuPackingList/DetailPack/".$gaa->gexp_packlist_id)."'><i class='fa fa-pencil-square-o'></i></a></td>";
    echo "</tr>";
  }
}else{ // Jika data tidak ada
  echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
}
?>		
										
									</tbody>
								</table>
							</div>
</section>


<!-- end: page -->
</section>
</div>






  </section>
</div>


<!-- Vendor -->
        <script src="<?= base_url(); ?>assets/template/vendor/jquery/jquery.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap/js/bootstrap.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/nanoscroller/nanoscroller.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/magnific-popup/magnific-popup.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-placeholder/jquery.placeholder.js"></script>
		
<!-- Specific Page Vendor -->
		<script src="<?= base_url(); ?>assets/template/vendor/select2/select2.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/bootstrap-multiselect/bootstrap-multiselect.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/media/js/jquery.dataTables.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables/extras/TableTools/js/dataTables.tableTools.min.js"></script>
		<script src="<?= base_url(); ?>assets/template/vendor/jquery-datatables-bs3/assets/js/datatables.js"></script>
		
<!-- Theme Base, Components and Settings -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?= base_url(); ?>assets/template/javascripts/theme.init.js"></script>


		<!-- Examples -->
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.default.js"></script>
		<script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.row.with.details.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/tables/examples.datatables.tabletools.js"></script>
        <script src="<?= base_url(); ?>assets/template/javascripts/ui-elements/examples.modals.js"></script>

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

		<!-- <script src="<?= base_url(); ?>assets/template/javascripts/forms/examples.advanced.form.js"></script> -->
        
<script>

$('#tables1').dataTable();
$('#tables2').dataTable();
$('#tables3').dataTable({
				columnDefs: [{
					"defaultContent": "-",
					"targets": "_all"
				}]
			});
$('#tables4').dataTable();
$('#tables5').dataTable();
$('#tables6').dataTable();
$('#tables7').dataTable();
$('#tables8').dataTable();

$( window ).on("load", function() {
        // Handler for .load() called.
        // alert("window is loaded");
        $(".preloader").delay(1000).fadeOut("slow");
});

// POST GROUP

$(document).ready(function(){

$("#tambahgroup").click(function(){
    var kirim = $('#inputdatagroup').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/GroupMaster/simpanMasterGroup",
        data     : kirim,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){

                    // Swal.fire({
                    //     title: 'Sedang Di Proses',
                    //     showDenyButton: false,
                    //     showCancelButton: false,
                    //     confirmButtonText: 'OK',
                    //     denyButtonText: `Don't save`,
                    //     }).then((result) => {
                    //     /* Read more about isConfirmed, isDenied below */
                    //         if (result.isConfirmed) {
                    //             Swal.fire(response.messages, '', 'error')
                    //         }
                    //     });
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                        // Swal.fire({
                        // title: 'Sedang Di Proses',
                        // showDenyButton: false,
                        // showCancelButton: false,
                        // confirmButtonText: 'OK',
                        // denyButtonText: `Don't save`,
                        // }).then((result) => {
                        // /* Read more about isConfirmed, isDenied below */
                        //     if (result.isConfirmed) {
                        //         Swal.fire(response.messages, '', 'success')
                        //     }
                        // });
                    
                    // alert(response.messages);
                    // Swal.fire({
                    //     icon: 'success',
                    //     title: 'Success',
                    //     text: 'response.messages',
                    //     // footer: '<a href="">Why do I have this issue?</a>'
                    // });
                    // location.reload("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser");
                    // $('#suksesgroup').load("<?php echo base_url(); ?>/MasterUserTest/crudmasteruser"); 
                    // $('#tampil').load("<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa"); 

                }
        }
        // error    : function(data){
        // //         console.log(data.status); 
        //            alert('Eror');

        
        
    });
   
    
});


// $.ajax({
//         type: 'POST',
//         url: "<?php echo base_url(); ?>/mahasiswa/tampilMahasiswa",
//         cache: false,
//         success: function(data) {
//             $("#listingmastergroup").html(data);
//         }
// });


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});


$("#tambahusers").click(function(){
    var user = $('#inputdatausers').serialize();
    
    $.ajax({
        type	 : 'POST',
        url	     : "<?php echo base_url(); ?>/RootTest/simpanMasterUser",
        data     : user,
        dataType : "JSON",
        cache	 : false,
        success	 : function(response){

                if(response.success == "1"){
                    
                    alert(response.messages);
                    location.reload();

                }else if(response.success == "0"){

                    alert(response.messages);
                    location.reload();

                }
        }
    
    });
      
});



});

</script>

	</body>
</html>
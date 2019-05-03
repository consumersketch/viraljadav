<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css"href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
	<link rel="stylesheet" type="text/css"href="<?php echo base_url('assets/css/developer.css') ?>">


</head>
<body>
	
<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p>Invoice Page</p>
                </div>
            <form name="form" id="form" action="" method="POST" >    
                <div class="form-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">

                                <select onchange="getProduct(this.value)" required class="form-control" name="client_id" id="client_id">
                                	<option value="">--SELECT CLIENT--</option>
                                	<?php if($clients){ 
                                		  foreach($clients as $user){ ?>
                                	<option value="<?php echo $user['client_id'] ?>"><?php echo $user['client_name'] ?></option>	  		

                                <?php 	}} ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <select class="form-control" name="product_id" id="product_id" required>
                                	<option value="">--Select Product--</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">

                                <select  required class="form-control" name="date" id="date">
                                	<option value="">--Relative Date--</option>
                                	<option value="1">LastMonth to Date </option>
                                	<option value="2">This Month</option>
                                	<option value="3">This Year</option>
                                	<option value="4">Last Year</option>
                                	
                                </select>
                            </div>
                        </div>

                    </div>
                    <button type="Submit" class="btnSubmit">Submit</button>
                </div>
            </form>
            </div>
        </div>

   <div id='records_table'></div>
</body>
</html>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script type="text-javascript" src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
<script type="text/javascript">
	var baseurl = '<?php echo base_url(); ?>';
</script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

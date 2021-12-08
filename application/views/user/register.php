<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
    
    <title>Register page</title>
</head>
<style>
.content
{
    width:80%;
    float:none;
    margin:auto;
    background:#e0e0e0;
    justify-content:center;
 
}

.full{
    width:95%;
    height:30px;
    margin-bottom:7px;
    
}

</style>
<body>
<div class="container">
    <h2 style="margin-top: 10px;">Regitser Form </h2>
    <br>
    <br>
    <?php echo validation_errors(); ?> 
<p id="txtHint"></p>
    
    <form id="ajax_form" method="post" action="javascript:void(0)">
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>

        <i class="fa fa-User"></i> <input type="text" name="name" class="form-control" id="formGroupExampleInput" placeholder="Please enter name">
      </div>
 
      <div class="form-group">
        <label for="email">Email </label>
        <input type="text" name="email" class="form-control" id="email" placeholder="Please enter email id">
      </div>   
 
      <div class="form-group">
        <label for="Password">password</label>
        <input type="text" name="pass" class="form-control" id="mobile_number" placeholder="Please enter mobile number" maxlength="10">
      </div>
 
      <div class="alert alert-success d-none" id="msg_div">

      </div>
 
      <div class="form-group">
       <button type="submit" id="button" class="btn btn-success">Submit</button>
      </div>
    </form>
  
</div>


<script type='text/javascript' src="<?php echo base_url(); ?>assest/js/singup.js"></script>

</body>
</html>
<html>
<head>
<title>Login</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width,initial-scale=1'>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<style>
.container{
    text-align: center;
    border: 1px solid #495057;
    margin-top: 20px;
    padding: 10px;
    border-radius: 5px;
}

.form-control,button{
    display: inline; 
    width: 30%;
}
/* button{
    width: 30%;
} */
</style>
</head>

<body>
<div class="container">
<h3>Login</h3>
<?php
foreach($errors->all() as $error){
    echo "<p style='color:red;'>".$error."</p>";
}
?>
  <form action="/login" method="post">
    <input type="hidden" name="_token" value="<?php echo csrf_token();?>" />
    <div class="form-group">
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
    </div>
    <!-- <div class="form-group form-check">
      <label class="form-check-label">
        <input class="form-check-input" type="checkbox" name="remember"> Remember me
      </label>
    </div> -->
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
<?php
include 'includes/header.php' ;
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">


        <!-- BEGIN CONTAINER -->   
<div class="container margin-bottom-40">
  <div class="row">
  <div class="col-md-12 page-404">
    

<?php
$msg="";
if(isset($_POST['submit']))
{
	$valid=validateUsers($conn,$_POST);
	$msg=($valid ==0)?"you are inactive please contact administrator":"Invalid Username/Password";
}

if($msg!="")
{?><!--To handle the events after submitting the form-->
<div><center><font color="red" size="-1"><?PHP echo $msg; ?><!--To print an error message that is raised from the form-->
</font></center></div>
<?php }?>         
 <div class="details">
    <div class="panel panel-default">  
    <div class="panel-heading">
    <h3 class="panel-title">Login</h3></div>
    <div class="panel-body">
    <form name="loginform" id="loginform" method="post" action='#'>
    <div class="form-body">
       <div class="form-group">
          <label for="uname" class="bmd-label-floating">UserName</label>
          <input type="text" class="form-control" id="uname" name="uname" placeholder=" ">    
      </div>
      <div class="form-group">
         <label for="password" class="bmd-label-floating">Password</label>                   
          <input type="password" class="form-control" id="password" name="password" placeholder=" " > 
      </div>    
  </div>
  <div class="form-actions">                
  <input type="submit" class="btn blue" name="submit" id="submit" value="Login">  
  <input type="button" name="signup" id="signup" class="btn btn-default" value="Sign Up!" onclick="location='register.php'" /> 
  </div>                
        
  </form>
  </div>
  </div>
                  
 </div>
 </div>
 </div>
 </div>
 <!-- END CONTAINER -->

 </div>
    <!-- END PAGE CONTAINER -->  

    
<?php
include 'includes/footer.php';
 ?> 
<script type= "text/javascript">
$( "#loginform" ).validate({
  rules: {
password:{
required:true
},
uname:{
required:true
}
  },
  messages:{
  uname:"Please Enter UserName",
  password:"Please Enter Password"
  }
});</script>
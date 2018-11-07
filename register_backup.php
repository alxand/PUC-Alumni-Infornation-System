<?php
include$_SERVER['DOCUMENT_ROOT'].'/dev/includes/header.php';
$dept=getdepartments($conn);
$sprt=getsport($conn);
$com=getcom($conn);
 ?> 
<!-- BEGIN PAGE CONTAINER -->  
  
  <div class="page-container">
  
        <!-- BEGIN BREADCRUMBS    
        <div class="row breadcrumbs">
           
             <div class="container">
                <div class="col-md-4 col-sm-4">
                    <h1 name='login' id='login'>Register</h1>
  
              </div>
                <div class="col-md-8 col-sm-8">
               
                </div>
            </div>
  
      </div>
      END BREADCRUMBS -->

        <!-- BEGIN CONTAINER -->   
        <div class="container margin-bottom-40">
  
        <div class="row">
            <div class="col-md-12 page-404">
   
<?php
$msg="";
if(isset($_POST['submit']))
{
	$valid=createUsers($conn,$_POST);
	$msg=($valid ==1)?"Registered Successfully!!!":"Unable to register please try again.";
}
if($msg!="")
{?>
<div><center><font color="green" size="-1"><?PHP echo $msg;
 ?></font></center></div>
<?php }?>  
<div class="row">  
<div class="col-md-3 col-sm-12">
    
</div>
 <div class="col-md-6 col-sm-12 details">
    <div class="panel panel-default"> 
      <div class="panel-heading">
        <h3 class="panel-title">Register</h3></div>
          <div class="panel-body">
            
           <form name="registerform" id="registerform" method="post" action="" onsubmit="return checkuname();"> <div class="form-body">
              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                   <label for="uname" class="bmd-label-floating" >User Name</label>
                   <input type="text" class="form-control" id="uname" name="uname" placeholder="" onkeyup="checkdata();" autocomplete='off'>          
                  </div>
                </div>
                <div class="col-md-8 col-sm-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Email Address</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="">
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label for="password" class="bmd-label-floating">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder=""> 
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                   <label for="password" class="bmd-label-floating">Re-enter Password</label>              
                   <input type="password" class="form-control" id="repassword" name="repassword" placeholder="" equalto="#password">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4 col-sm-12">
	               <div class="form-group">
                  <label class="bmd-label-floating">First Name</label>
                  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="">  
                 </div>
               </div>
               <div class="col-md-4 col-sm-12">
                 <div class="form-group">
                   <label  class="bmd-label-floating" >Middle Name</label>
                   <input type="text" class="form-control" name="middlename" id="middlename" placeholder="">
                 </div>
                </div>
               <div class="col-md-4 col-sm-12">
                 <div class="form-group">
                  <label class="bmd-label-floating" >Last Name</label>
                   <input type="text" class="form-control" name="lastname" id="lastname" placeholder="">       
                </div>
               </div>
              </div>

               <div class="form-group">
                  <label class="bmd-label-floating">Address Line 1</label>
                  <input type="text" class="form-control" name="addrline1" id="addrline1" placeholder="">
                </div>
                <div class="form-group">
               
                <label class="bmd-label-floating" >Address Line 2</label>
                <input type="text" class="form-control" name="addrline2" id="addrline2" placeholder="">
                </div>
						   <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                    <label class="bmd-label-floating" >City</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder=" ">
                  </div>
                </div>
                <div class="col-md-4 col-sm-12">
                 <div class="form-group">
                   <label class="bmd-label-floating" >State</label>
                   <input type="text" class="form-control" name="state" id="state" placeholder=" ">
                 </div>
                </div>
               <div class="col-md-4 col-sm-12">
                <div class="form-group">
                 <label class="bmd-label-floating" >ZIP</label>
                 <input type="text" class="form-control" name="zip" id="zip" placeholder=" ">
                </div>
               </div>
               </div>
               <div class="row">
                <div class="col-md-4 col-sm-12">
                  <div class="form-group">
                   <label class="bmd-label-floating" >Mobile Number</label>
                    <input type="text" class="form-control" name="mnumber" id="mnumber" placeholder=" ">
                  </div>
                </div>
               </div>
                <div class="type">
               
                 <label class="bmd-label-floating" >Type</label><br>
                 
                 <input type="radio"   class="type1" name="type" id ="btn" value = "alumni">Alumni
						     <input type="radio" class="type1" name="type" id = "btn" value = "faculty">Faculty
							   
                  
               </div>
              <div class="desc" id = "alumni">
                <br>
                <div class="form-group">
                <label class="bmd-label-floating">Academic Degree</label><br>
                <input type="text" class="form-control" name="degree"  placeholder="" >
                </div>
    						<br>

    						<label class="bmd-label-floating">Major Department</label>
    						<select  class="form-control" name="majdept">
    						<option value='0'></option>
    						<?php foreach($dept as $d){?>
                <option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
    						<?php } ?>
                </select>
    						<br>

                <div class="form-group">
    						<label class="bmd-label-floating" >Minor Department</label>
    						<select  class="form-control" name="mindept">
    						<option value='0'></option>
    						<?php foreach($dept as $d){?>
                <option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
    						<?php } ?>
                </select>
                </div>
    						<br>
                <div class="form-group">
								<label class="bmd-label-floating" >Major Advisor</label>
								<input type="text" class="form-control" name="advisor"  placeholder="" >
                </div>
								<br>
                <div class="form-group">
								<label class="bmd-label-floating" >Graduation Year</label>
                <br>
								<input type="text" class="form-control" name="gradyear"  placeholder="" >
                </div>
								<br>
                <div class="form-group">
								<label class="bmd-label-floating">Committee</label>
								<select  class="form-control" name="comtid">
								<?php foreach($com as $c){?>
                <option value="<?php echo $c['Committee_ID']?>"><?php echo $c['Role_Description']?></option>
								<?php } ?>
                </select>
                </div>
							  <br>
                <div class="form-group">
								<label class="bmd-label-floating">Sport</label>
                <br>
								<select  class="form-control" name="sprtid"  placeholder="" >
								<?php foreach($sprt as $s){?>
                <option value="<?php echo $s['Sport_Club_ID']?>"><?php echo $s['Sport_Name']?></option>
								 <?php } ?>
                </select>
                </div>
							  <br>
                <div class="form-group">
								<label class="bmd-label-floating">Linkedin</label>
								<input type="text" class="form-control" name="linkedin"  placeholder="" >
                </div>
								<br>
                <div class="form-group">
								<label class="bmd-label-floating">Facebook</label><br>
								<input type="text" class="form-control" name="facebook"  placeholder="" >
                </div>
								<br>
                <div class="form-group">
								<label class="bmd-label-floating">Twitter</label><br>
								<input type="text" class="form-control" name="twitter"  placeholder="" >
                </div>
								<br>
							</div>
							
              <div class="desc" id = "faculty">
              <br>
								<label>Department</label><br>
								<select  class="form-control" name="facdept"  placeholder="" >
								<option value='0'></option>
								<?php foreach($dept as $d){?>
                  <option value="<?php echo $d['Department_Name']?>"> </option>
								 <?php } ?>
                </select>
                <br>
                <div class="form-group">
								 <label class="bmd-label-floating">Designation</label><br>
                 <input type="text" class="form-control" name="facultydesig" >
                </div>
								<br>
                <div class="form-group">
                <label class="bmd-label-floating">Office Address</label><br>
                <input type="text" class="form-control" name="facultyaddr" >
                </div>
								<br>
                <div class="form-group">
								<label class="bmd-label-floating">Personal Website</label><br>
								<input type="text" class="form-control" name="facultysite">
                 </div>
								<br>
								
							</div>
 
              <div class="desc" id = "admin">
              <br>
              <div class="form-group">
              <label class="bmd-label-floating">Designation</label><br>
              <input type="text" class="form-control" name="admindesig" >
              </div>
							<br>
              <div class="form-group">
							<label class="bmd-label-floating">Office Address</label><br>
							<input type="text" class="form-control" name="adminaddr">
              </div>
							<br>
							</div> 
             </div>
					   <div class="form-actions">
					    <input type="submit" name="submit" id="submit" value="Register" class="btn blue">
              <input type="button" class="btn default" value="Login" onclick="location='index.php'">  
              </div>                
        
              </form>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-3 col-sm-12">
    
  </div>
</div>
</div>
        <!-- END CONTAINER -->
</div>
    <!-- END PAGE CONTAINER -->
<?php
include('includes/footer.php');
 ?> 
<script type= "text/javascript">
$( "#registerform" ).validate({
  rules: {
    email: {
      required: true,
      email: true
    },
password:{
required:true
},
uname:{
required:true
},
firstname:{
 required:true 
},
lastname:{
 required:true
},
majdept:{
required:true
}
},
  messages:{
  email:"Enter valid id",
  password:"Enter Password",
  firstname:"Enter your First Name",
  lastname:"Enter your Last Name",
  majdept:"Enter your Major Department"
  }
});


</script>
<script>
$(document).ready(function(){
$(".desc").hide();
$(".type1").click(function(){
  var test = $(this).val();
  $(".desc").hide();
  $("#" + test).show();
});
});
function checkdata()
{	
var tag=$('#uname').val();
	if(tag.length>1)
	{
	$.ajax({
	type: "POST",
	url: "checkdata.php",
	data: {'data':tag}
	}).done(function( result ) {
		if(result==0)
		{
			$("#checkimg3").remove();
				$("#checkimg2").remove();
			$('#hashdiv').append("<div id='checkimg2' class='chkdata'><img src='Ricon.png' height='20' width='20'/>Username already Exists</div>");	
		}else
		{
			$("#checkimg3").remove();
				$("#checkimg2").remove();
			$('#hashdiv').append("<div id='checkimg3' class='chkdata'><img src='Aicon.png' height='20' width='20'/>UserName Available </div>");	
		}
	});
	}else
	{
		
		$("#checkimg3").remove();
		$("#checkimg2").remove();	
	}
	}
	function checkuname()
	{
	if($('#checkimg2').length!=0)
	{
	$('#uname').focus();
		submited=false;
		return false;	
	}
	return true;
	}
</script>
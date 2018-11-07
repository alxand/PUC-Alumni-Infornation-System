<?php
include$_SERVER['DOCUMENT_ROOT'].'/dev/includes/functions.php';
$dept=getdepartments($conn);
$sprt=getsport($conn);
$com=getcom($conn);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon.ico">

	<title>Register</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/material-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
</head>

<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/wizard-profile.jpg')">
	    <!--   Creative Tim Branding   -->
	    <a href="">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="assets/img/new_logo.png">
	            </div>
	            <div class="brand">
	                
	            </div>
	        </div>
	    </a>

		<!--  Made With Material Kit  -->
		<a href="" class="made-with-mk">
			<div class="brand">PUC</div>
			<div class="made-with"> Empower to<strong> Serve!</strong></div>
		</a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
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
		            <!--      Wizard container        -->
		            <div class="wizard-container">
		                <div class="card wizard-card" data-color="green" id="wizardProfile">
		                    <form name="registerform" id="registerform" method="post" action="" onsubmit="return checkuname();">
		                <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        	   Build Your Alumni Profile
		                        	</h3>
									<h5>This information will  allow other Alumni connect to you.</h5>
		                    	</div>
								<div class="wizard-navigation">
									<ul>
			                            <li><a href="#about" data-toggle="tab">Login Credentials</a></li>
			                            <li><a href="#account" data-toggle="tab">Personal Details</a></li>
			                            <li><a href="#address" data-toggle="tab">Educational Background</a></li>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                            <div class="tab-pane" id="about">
		                              <div class="row">
		                                	<h4 class="info-text"> </h4>
		                                	<div class="col-sm-4 col-sm-offset-1">
		                                    	<div class="picture-container">
		                                        	<div class="picture">
                                        				<img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
		                                            	<input type="file" id="wizard-picture">
		                                        	</div>
		                                        	<h6>Choose Picture</h6>
		                                    	</div>
		                                	</div>
		                                	<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">face</i>
													</span>
													<div class="form-group label-floating label-floating">
			                                          <label class="control-label">User Name <small>(required)</small></label>
                   									  <input type="text" class="form-control" id="uname" name="uname" placeholder="" onkeyup="checkdata();" autocomplete='off'>          
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">email</i>
													</span>
													<div class="form-group label-floating label-floating">
													  <label class="control-label">Email <small>(required)</small></label>
													  <input type="text" class="form-control" name="email" id="email" placeholder="">
													</div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group label-floating label-floating">
			                                          	<label class="control-label">Password</label>
			                                          	<input type="password" class="form-control" id="password" name="password" placeholder="" >
			                                        </div>
												</div>

												<div class="input-group">
													<span class="input-group-addon">
														<i class="material-icons">lock_outline</i>
													</span>
													<div class="form-group label-floating label-floating">
			                                          	<label class="control-label">Re-enter Password</label>
			                                          	<input type="password" class="form-control" id="repassword" name="repassword" equalto="#password" placeholder="" >
			                                        </div>
												</div>
		                                	</div>
		                            	</div>
		                            </div>

		                            <div class="tab-pane" id="account">
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                    	<div class="row">
								                <div class="col-md-4 col-sm-12">
									               <div class="form-group label-floating">
								                  <label class="control-label">First Name</label>
								                  <input type="text" class="form-control" name="firstname" id="firstname" placeholder="">  
								                 </div>
								               </div>
								               <div class="col-md-4 col-sm-12">
								                 <div class="form-group label-floating">
								                   <label  class="control-label" >Middle Name</label>
								                   <input type="text" class="form-control" name="middlename" id="middlename" placeholder="">
								                 </div>
								                </div>
								               <div class="col-md-4 col-sm-12">
								                 <div class="form-group label-floating">
								                  <label class="control-label" >Last Name</label>
								                   <input type="text" class="form-control" name="lastname" id="lastname" placeholder="">       
								                </div>
								               </div>
								              </div>

								              <div class="form-group label-floating">
								                  <label class="control-label">Address Line 1</label>
								                  <input type="text" class="form-control" name="addrline1" id="addrline1" placeholder="">
								                </div>
								                <div class="form-group label-floating">
								               
								                <label class="control-label" >Address Line 2</label>
								                <input type="text" class="form-control" name="addrline2" id="addrline2" placeholder="">
								                </div>
											   <div class="row">
								                <div class="col-md-4 col-sm-12">
								                  <div class="form-group label-floating">
								                    <label class="control-label" >City</label>
								                    <input type="text" class="form-control" name="city" id="city" placeholder=" ">
								                  </div>
								                </div>
								                <div class="col-md-4 col-sm-12">
								                 <div class="form-group label-floating">
								                   <label class="control-label" >State</label>
								                   <input type="text" class="form-control" name="state" id="state" placeholder=" ">
								                 </div>
								                </div>
								               <div class="col-md-4 col-sm-12">
								                <div class="form-group label-floating">
								                 <label class="control-label" >ZIP</label>
								                 <input type="Number" class="form-control" name="zip" id="zip" placeholder=" ">
								                </div>
								               </div>
								               </div>
								               <div class="row">
								                <div class="col-md-4 col-sm-12">
								                  <div class="form-group label-floating">
								                   <label class="control-label" >Mobile Number</label>
								                    <input type="Number" class="form-control" name="mnumber" id="mnumber" placeholder=" ">
								                  </div>
								                </div>  
								               </div>
		                                    </div>
		                                </div>
		                            </div>

		                            <div class="tab-pane" id="address">
		                                <div class="row">
		                                    <!--<div class="col-sm-12">
		                                        <h4 class="info-text"> Are you living in a nice area? </h4>
		                                    </div>
		                                -->
		                                    <div class="row">
		                                    	<div class="col-sm-8 col-sm-offset-5">
		                                    		<div class="form-group type">
                 										<label class="control-label" >Type</label><br>
                 										<input type="radio"   class="type1" name="type" id ="btn" value = "alumni">Alumni
						     							<input type="radio" class="type1" name="type" id = "btn" value = "faculty">Faculty    
               										</div>
		                                    	</div>
		                                    </div>
		                                    <div class="row">
		                                     <div class="col-sm-10 col-sm-offset-2">
		                                     <div class="desc" id = "alumni">
							             	<div class="">
							             		
							             	</div>
							                <div class="form-group label-floating">
							               		 <label class="control-label">Academic Degree</label><br>
							                	 <input type="text" class="form-control" name="degree"  placeholder="" >
							                </div>
											<div class="form-group label-floating">
												<label class="control-label">Major Department</label>
							    			    <select  class="form-control" name="majdept">
							    				<option value='0'></option>
							    				<?php foreach($dept as $d){?>
							                	<option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
							    				<?php } ?>
							                	</select>
											</div>
							    			   
							                <div class="form-group label-floating ">
							    				<label class="control-label" >Minor Department</label>
							    					<select  class="form-control" name="mindept">
							    						<option value='0'></option>
							    						<?php foreach($dept as $d){?>
							                			<option value="<?php echo $d['Department_ID']?>"><?php echo $d['Department_Name']?></option>
							    						<?php } ?>
							                		</select>
							                </div>
							                <div class="form-group label-floating ">
												<label class="control-label" >Major Advisor</label>
											    <input type="text" class="form-control" name="advisor"  placeholder="" >
							                </div>
									
							                <div class="form-group label-floating">
												<label class="" >Graduation Year</label>
												<input type="text" class="form-control" name="gradyear"  placeholder="" >
							                </div>
										
							                <div class="form-group label-floating">
												<label class="control-label">Committee</label>
												<select  class="form-control" name="comtid">
													<?php foreach($com as $c){?>
							                		<option value="<?php echo $c['Committee_ID']?>"><?php echo $c['Role_Description']?></option>
												<?php } ?>
							                	</select>
							                </div>
											
							                <div class="form-group label-floating">
												<label class="control-label">Sport</label>
													<select  class="form-control" name="sprtid"  placeholder="" >
														 <?php foreach($sprt as $s){?>
							                			<option value="<?php echo $s['Sport_Club_ID']?>"><?php echo $s['Sport_Name']?></option>
														<?php } ?>
							                		</select>
							                 </div>
										
							                <div class="form-group label-floating">
												<label class="control-label">Linkedin</label>
												 <input type="text" class="form-control" name="linkedin"  placeholder="" >
							                </div>
									
							                <div class="form-group label-floating">
												<label class="control-label">Facebook</label><br>
												<input type="text" class="form-control" name="facebook"  placeholder="" >
							                </div>
							                <div class="form-group label-floating">
												<label class="control-label">Twitter</label><br>
												<input type="text" class="form-control" name="twitter"  placeholder="" >
							                </div>
											</div>
											<div class="desc" id = "faculty">
								              
												  <label class="form-label">Department</label><br>
													<select  class="form-control" name="facdept"  placeholder="" >
													   <option value='0'></option>
														<?php foreach($dept as $d){?>
								                        <option value="<?php echo $d['Department_Name']?>"> </option>
														<?php } ?>
								                   </select>
								                
								                <div class="form-group label-floating">
													<label class="control-label">Designation</label><br>
								                 	<input type="text" class="form-control" name="facultydesig" >
								                </div>
										
								                <div class="form-group label-floating">
								                <label class="control-label">Office Address</label><br>
								                <input type="text" class="form-control" name="facultyaddr" >
								                </div>
								                <div class="form-group">
													<label class="bmd-label-floating">Personal Website</label><br>
													<input type="text" class="form-control" name="facultysite">
								                </div>				
												</div>
		                                    </div>
		                                    	
		                                    </div>
		                                    <!--end of alumni  or faculty info-->

											  

		                                    <div class="col-sm-5 col-sm-offset-5">
		                                        <div class="form-actions">
					    							<input type="submit" name="submit" id="submit" value="Register" class="btn blue">
              										<input type="button" class="btn default" value="Login" onclick="location='index.php'">  
             									 </div>   
		                                    </div>
		                                    </form>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wizard-footer">
		                            <div class="pull-right ">
		                                <input type='button' class='btn btn-next btn-fill btn-success btn-wd' name='next' value='Next' />
		                                <!--<input type='button' class='btn btn-finish btn-fill btn-success btn-wd' name='finish' value='' />-->
		                            </div>

		                            <div class="pull-left">
		                                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
		                            </div>
		                            <div class="clearfix"></div>
		                        </div>
		                  </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div><!-- end row -->
	    </div> <!--  big container -->

	    <div class="footer">
	        <div class="container text-center">
	             Alumni Creation <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Pentecost </a>. University <a href="#"></a>
	        </div>
	    </div>
	</div>

</body>
	<!--   Core JS Files   -->
    <script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/material-bootstrap-wizard.js"></script>

    <!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js"></script>

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

</html>

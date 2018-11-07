<?php
include('includes/header.php');
checkAuthorisation();
$details=getdetails($conn);
/* echo "<pre>";
print_r($details);
exit; */
 ?>     <!-- BEGIN PAGE CONTAINER -->  
      <style>
   .myimg {
background: #eee;
border: 1px solid #777;
}
   </style>
 <div class="page-container">
  
  
      <!-- BEGIN BREADCRUMBS -->   
  
      <div class="row breadcrumbs">
      
      <div class="container">
           
     <div class="col-md-4 col-sm-4">
     
               <h1>Find Alumni Profile</h1>
          
      </div>
                <?php if(isset($_SESSION['message']))
{
 ?>
 <div style="color: green;width: 60%; margin: 0px auto;" ><?php  echo $_SESSION['message'];
unset($_SESSION['message']);
 ?></div>
 <?php }?>   
 <div class="col-md-8 col-sm-8">
              
  </div>
           
 </div>

        </div>

        <!-- END BREADCRUMBS -->

 
       <!-- BEGIN CONTAINER -->   

    <div class="container min-hight gallery-page margin-bottom-40">
      <br/>
      <div class="row">
      <div class="col-md-2 col-sm-12">
        
      </div>
      <div class="col-md-8 col-sm-12">
        <form class="">
          <div class="row">     
              <div class="col-md-8 col-sm-12">  
              
              </div> 
              <div class="col-md-4 col-sm-12">     
              
              </div> 
          </div> 
        </form>
      </div>
      <div class="col-md-2 col-sm-12">     
      </div>  
   </div>
   
  <div class="row">
  
  

  <div class="table-responsive col-md-12 col-sm-12">
    <table class="display" id="alumni_table"  style="width:100%">
     <thead>
        <tr>
          <th class="th-sno">No.</th>
          <th>Profile</th>
          <th>Username</th>
          <th>Name</th>
          <th width="17%">Graduated year</th>
          <!--<th width="19%">Campaigns Blocked</th>-->
          <!--<th>Actions</th>-->
         </tr>
        </thead>
        <tbody id='tab'>
						   <?php $count=1;
						   if($details!=0)
						   {
						   foreach($details as $d)
						   {
						   ?>
                <tr>
                    <td><?php echo $count;?></td>
                    <td><div class="user-image">
                     <a href="view_profile.php?id=<?php echo $d['Person_ID'];?>"><img src="<?php if($d['Photo']!='') echo 'photos/profile/'.$d['Photo']; else echo 'noimage.jpg'; ?>" alt="profile pic" class="myimg" width="80" height="85" />
                     </a> </div>
                    </td>
                    <td><?php echo $d['Username'];?></td>
                    <td><?php echo $d['First_Name'].' '.$d['Last_Name']?></td>
                    <td><?php echo $d['Graduation_year']?></td>
									</tr>
									<?php 
									$count++;
									}
									}
									else
									{
									?>
									 <tr><td colspan="5" align="center"><h4>No records found.</h4></td></tr>
									
									<?php }?>
            </tbody>
          </table>
        </div>
      </div>
		 
    </div>
			 
        <!-- END CONTAINER -->

  </div>
    <!-- END PAGE CONTAINER -->  

<?php
include('includes/footer.php');
 ?>
<script type="text/javascript">
$('#submit').click(function(){
  $('').DataTable();
	var searchfor=$('#searchfor').val();
	var searchwith=$('#searchwith').val();
	//alert(searchfor);
	$.ajax({
	type: "post",
	url: "checkdata.php",
	data: {'searchfor':searchfor,'searchwith':searchwith}
	}).done(function( result ) {
		$('#tab').html(result);
		});

});
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#alumni_table').DataTable();
} );
</script>
  
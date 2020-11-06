<?php include ('header.php');?>
<?php include ('head.php');?>
<body>
<?php
	function passFunc($len, $set = "")
	    {
			$gen = "";
			for($i = 0; $i < $len; $i++)
				{
					$set = str_shuffle($set);
					$gen.= $set[0]; 
				}
			return $gen;
	    } 
		
 ?>
         <div class="col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
			    <div class="panel-heading">
                    <center><h3 class="panel-title"> Registration </h3></center>
                    </div>
                    
                    <form role="form" method = "post" enctype = "multipart/form-data">
                    </div>
                    <fieldset>
				   
					<div class="panel panel-green">
                        <div class="panel-heading">
                            Please Enter the Detail Needed Below
                        </div>
                        <div class="panel-body">
                         <form method = "post" enctype = "multipart/form-data">	
											<div class="form-group">
												<label>ID Number</label>
												<input class ="form-control" type = "text" name = "id_number" placeholder = "ID number" required="true">
													
											</div>
											
											<div class="form-group">
										
										
										
										
										
												<label>Password</label>
													<input class="form-control"  type = "text" name = "password" id = "pass" required="true"  />
													
											</div>
											
											<div class="form-group">
												<label>Firstname</label>
													<input class="form-control" type ="text" name = "firstname" placeholder="Firstname" required="true">
											</div>
											<div class="form-group">
												<label>Lastname</label>
													<input class="form-control"  type = "text" name = "lastname" placeholder="Please enter lastname" required="true">
											</div>
																	
											 	 <button name = "save" type="submit" class="btn btn-primary">Save Data</button>
												</fieldset> 
						  				 </div>
                                       
										
										</form>
								
							<?php 
								require 'dbcon.php';
								
								if (isset($_POST['save'])){
									$firstname=$_POST['firstname'];
									$lastname=$_POST['lastname'];
									$id_number=$_POST['id_number'];
									
									$password = $_POST['password'];


									$query = $conn->query("SELECT * FROM voters WHERE id_number='$id_number'") or die (mysql_error());
									$count = $query->fetch_array();
                                    if ($count  > 0){ 
									?>
										<script>
											alert("ID Number Already Exist");
										</script>
									<?php
										}
										else{
										$conn->query("insert into voters(id_number, password, firstname,lastname,status) VALUES('$id_number', '$password','$firstname','$lastname','Unvoted')");
									?>
									<script>
										alert('Voters Successfully Save');
									</script>
				
							<?php
									}
								} 
							?>
						  
						
						</div>
						</form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include ('script.php');?>
</body>

</html>


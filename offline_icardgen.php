<?php
include('common-code/login.php');
  if(!LoggedIn())
    header("location:login.php");
$id=$_POST['id'];
$conn = dbConnect();
?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Zealicon 2015</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Tables -->
    <link href="css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">
  
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="events.php">Zealicon-2015</a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-top-links navbar-right">
          
            
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                     <?php include_once "common-code/topbar.php"; ?>
                
             </li>  
    </ul>

            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <?php include_once "common-code/left-sidebar.php"; ?>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                   <input class="btn btn-primary" type=button onclick="window.print()" value=" Print ">	
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
              <?php
                $query="UPDATE `paid_registrations` SET `icard` = '1' WHERE `zealId` IN ('$id)";
		$exe = $conn->query($query) or die("Can not execute first querry".mysql_error());
		$query = "SELECT `zealId`, `name`, `email`  FROM `paid_registrations` WHERE `zealId` IN ('$id) ORDER BY `zealId`";
		$result = $conn->query($query);
?>
		<table border='0' cellspacing='30' cellpadding='2' width='92%' align='center'>
              <?php
		$flag=0;
		$count=0;
		while (($row = $result->fetch_row())&&($count<8))
		{
			$count++;
			if ($flag==0)
				print "<tr><td>";
			else
      { print "<td>";}
		?>						
         <table border="3" cellspacing="0" cellpadding="8" bordercolor="#000000" style="border-collapse: collapse; table-layout:fixed;">
							<tr><td width="319">

							<table border="0" cellpadding="0" cellspacing="0" bordercolor="#111111" style="max-width:355; width:355; max-height:155; height:155" id="AutoNumber1" >
							   <tr>
							    <td colspan="4" ><img width="350" height="50" src="assets/image/logo.png">
							  </tr>
							  <tr></tr>
							 <tr>
							    <td width="100" height="32" valign="top"><font face="Sans-Serif" size="2"><b>Zealicon ID:</b></font></td>
							    <td width="17" height="32" valign="top"><font face="Courier New" size="2">:</font></td>
							    <td width="200" height="32" valign="top"><font face="Courier New" style=" word-break: break-all;" size="2"><b>
							<?php
								print "$row[0]";
							?>
							</b></font></td>
							  </tr>
							  <tr>
							    <td width="62" height="32" valign="top"><font face="Sans-Serif" size="2"><b>Name</b></font></td>
							    <td width="17" height="32" valign="top"><font face="Courier New" size="2">:</font></td>
							    <td width="200" height="32" valign="top"><font face="Courier New" style=" word-break: break-all;" size="2"><b>
								<?php print substr("$row[1]",0,30)?></b></font></td>
							    
							  </tr>
							  <tr>
							    <td width="62" height="32" valign="top"><font face="Sans-Serif" size="2"><b>Email</b></font></td>
							    <td width="17" height="32" valign="top"><font face="Courier New" size="2">:</font></td>
							    <td width="200" height="32" valign="top"><font face="Courier New" style=" word-break: break-all;" size="2"><b>
							<?php
								print "$row[2]";
							?>
							</b></font></td>
							  </tr>
                
							
							</b></td>
							  </tr>
							  
							  
							  <tr>
							    <td width="243" colspan="3" height="16">
							    <p align="center">
							    <font face="Courier New" size="1">
								</font></td>
							    <td width="84" height="16">
							      <p align="center"><b><font face="BankGothic Md BT" size="2">Registered Student</font></b></td>
							  </tr>
							</table>

							</td>
							</table>
							<?php
								if ($flag==0)
									{
									print "</td>";
									$flag = 1;
									}
								else
									{
									print "</td></tr>";
									$flag = 0;
									}}
							?>
					
		
		        </table>
			
            </div>
            <!-- /.row -->
            
            
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
       
           
                <!-- /.col-lg-12 -->
            
        <!-- /#page-wrapper -->


    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Tables -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>

</body>

</html>

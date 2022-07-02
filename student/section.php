<?php
    $q="select * from annoucement order by id desc;";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);
?>
    <!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
			<div class="container">

				<div class="d-flex justify-content-between align-items-center">
					<h2>DASHBOARD</h2>
					<ol>
						<li><a href="../index.html">Home</a></li>
						<li>Dashboard</li>
					</ol>

				</div>

			</div>
			<div id="noti">
				<div class="not-icon" id="bell"><i class="fa-solid fa-bell"></i> </div>
				<div class="notifications" id="box">
					<h2>Announcements - <span><?php echo $num?></span></h2>
                    
                    <?php
                        for($i=0;$i<$num;$i++)
                        {
                            $row=mysqli_fetch_array($result);
                    ?>
					<div class="notifications-item" onclick="fun();">
						<div class="text">
							<h4><?php echo $row['done_by'];?></h4>
							<p><?php echo $row['subject'];?></p>
						</div>
					</div>
                    <?php
                        }
                    ?>
					<!--<div class="notifications-item"> 
						<div class="text">
							<h4>John Silvester</h4>
							<p>+20 vista badge earned</p>
						</div>
					</div>-->
				</div>
			</div>
		</section><!-- End Breadcrumbs -->

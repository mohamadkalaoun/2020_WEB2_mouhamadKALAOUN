<link rel="stylesheet" type="text/css" href="css/stema.css">
<div class="top_menu">
<table  border="0" id="table">
  <tbody>
    <tr style="background-image:url(images/bder.png); background-repeat: no-repeat; background-size: 100%;" >
      <ul >
		 <th><li class="dropdown">
		   <a href="javascript:void(0)" class="dropbtn"><img src="images/menu.png" width="110" height="110" alt=""/></a> <!-- was 75-->
			<div class="dropdown-content">
			 <table style="background-color:#46ad0a">
			  <tr>
				  <td colspan="2"><img src="images/immage.png" width="200" height="200" alt=""/></td>
			  </tr>
			  <tr>
        <?php 
          if (isset($_SESSION["phone_nbr"])) {
             echo "<td><a href='myprofile.php'>My profile</a></td>
                   <td><a href='logout.php'>Log out</a></td> ";
           } 
          else{
             echo "<td><a href='logout.php'><img src='images/log-in.png' width='75' height='75' alt=''/></a></td>
                   <td><a href='logout.php'>Log In</a></td> ";
          }
        ?>
			  </tr>
	   <?php
     if (isset($_SESSION["phone_nbr"])) {		  
       echo
        "<tr>
				  <td><a href='my_favorites.php' ><img src='images/my-favorites.png' width='75' height='75' alt=''/></a></td>
				  <td><a href='my_favorites.php'>My Favorites</a></td>
			  </tr>
			  <tr>
				  <td><a href='history.php'><img src='images/hirtory.png' width='75' height='75' alt=''/></a></td>
				  <td><a href='history.php'>History</a></td>
			  </tr> ";}
        else{echo "";}
        ?>
			  <tr>
				  <td><a href="nutritional_facts.php"><img src="images/nutritional-fact.png" width="75" height="75" alt=""/></a></td>
				  <td><a href="nutritional_facts.php">Nutritional Facts</a></td>
			  </tr>
			  <tr>
			    <td><a href="allergic_facts.php"><img src="images/allergies.png" width="75" height="75" alt=""/></td>
          <td><a href="allergic_facts.php">Allergies</a></td>
			  </tr>
			  <tr>
			    <td><a href="additive_facts.php"><img src="images/Additives.png" width="75" height="75" alt=""/></td>
          <td><a href="additive_facts.php">Additives</a></td>
			  </tr>
			  <tr>
			    <td><a href="info.php"><img src="images/info.png" width="75" height="75" alt=""/></a></td><td><a href="info.php">Info</a></td>
			  </tr>
		  	 </table>
			</div>
		  </li></th>
		  <th><li class="n2ta"><a href="index.php"><img src="images/stema-header-with-backgroung.png" width="600" height="110" alt=""/></a></li></th>
		  <th><li class="n2ta"><a href="#news"><img src="images/PicsArt_07-26-10.04.46.png" width="200" height="110" alt=""/></a></li></th>

      </ul>
    </tr>
	<tr>
		<form id="form-control" method="get" action="results.php">
      		<th>
        		<input type="image" src="images/search-icon.png" name="search" alt="search" width="110" height="110">
        	</th>
        	<th>
		  		<input style="border:none; text-align: center" type="text" id="qsearch" name="qsearch" placeholder=" start typing ...">
			</th>
		</form>
      		<th >
      		  <form action="scan.html">
      			<input type="image" src="images/scan-image.png" alt="Scan" width="160" height="110px">
      		  </form>
      		</th>
      
    </tr>
</table>
</div>
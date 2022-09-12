 <?php 
				 include('../links/db_connect.php');
         $sql = "SELECT c.ID, c.Guest_ID, c.Name, c.Email, c.Comment, guest.Name AS name, guest.Surname, guest.Address, guest.Email AS mail, guest.Telefone, guest.City, guest.Country 
                 FROM comments c
                 INNER JOIN guest ON guest.Guest_ID = c.Guest_ID";
         $result = mysqli_query($conn, $sql);
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
				?>
        
         <div class="prev-comments">
			<div class="single-item">
				<h4><?php echo $row['Name'];?></h4>
				<a href="mailto:<?php echo $row['Email'];?>"><?php echo $row['Email'];?></a>
				<p><?php echo $row['Comment'];?></p>
				<button type="button" name="view" class="btn view" data-toggle='modal' data-target='#view_modal'>Peržiūrėti</button>
				<button type="button" name="save" class="btn delete" data-toggle='modal' data-target='#delete_form'>Naikinti</button>
				<li id="li_hid"><?php echo $row['ID'];?></li>
				<li id="li_hid"><?php echo $row['Guest_ID'];?></li>
				<li id="li_hid"><?php echo $row['name'];?></li>
				<li id="li_hid"><?php echo $row['Surname'];?></li>
				<li id="li_hid"><?php echo $row['Address'];?></li>
				<li id="li_hid"><?php echo $row['mail'];?></li>
				<li id="li_hid"><?php echo $row['Telefone'];?></li>
				<li id="li_hid"><?php echo $row['City'];?></li>
				<li id="li_hid"><?php echo $row['Country'];?></li>
			</div>
			
		</div>
<br><?php 
}
}?>
		

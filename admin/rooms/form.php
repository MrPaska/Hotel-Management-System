<?php
                                      include('../links/db_connect.php');
                                      $sql = "SELECT * FROM room_type";
                                      $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                         while ($row = mysqli_fetch_assoc($result)) {
                         if ($row['TV'] == 1) {
                       		$tv = "✔";
                       	}
                       	elseif ($row['TV'] == 0) {
                       		$tv = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['WC'] == 1) {
                       		$wc = "✔";
                       	}
                       	elseif ($row['WC'] == 0) {
                       		$wc = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['Shower'] == 1) {
                       		$shower = "✔";
                       	}
                       	elseif ($row['Shower'] == 0) {
                       		$shower = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['Bath'] == 1) {
                       		$bath = "✔";
                       	}
                       	elseif ($row['Bath'] == 0) {
                       		$bath = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['Balcony'] == 1) {
                       		$balcony = "✔";
                       	}
                       	elseif ($row['Balcony'] == 0) {
                       		$balcony = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['WiFi'] == 1) {
                       		$wifi = "✔";
                       	}
                       	elseif ($row['WiFi'] == 0) {
                       		$wifi = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['Microwave_oven'] == 1) {
                       		$oven = "✔";
                       	}
                       	elseif ($row['Microwave_oven'] == 0) {
                       		$oven = "❌";
                       	}else{
                       		echo "error";
                       	}
                       	if ($row['Refrigerator'] == 1) {
                       		$ref = "✔";
                       	}
                       	elseif ($row['Refrigerator'] == 0) {
                       		$ref = "❌";
                       	}else{
                       		echo "error";
                       	}
                                              ?>
                                        <option value="<?php echo $row['Room_Type_ID'];?>"><?php echo $row['Room_Type_ID'];?>. | <?php echo $row['Room_space']; echo " m²";?> | <?php echo $row['Beds'];?> Lovos  <?php echo $row['Bed_single'];?>x1 <?php echo $row['Bed_duos'];?>x2 | TV: <?php echo $tv;?> | WC: <?php echo $wc;?> | Dušas: <?php echo $shower;?> | Vonia: <?php echo $bath;?> | Balkonas: <?php echo $balcony;?> | WiFi: <?php echo $wifi;?> | Dujinė: <?php echo $oven;?> | Šaldytuvas: <?php echo $ref;?>

                                    </option>

                                      <?php
                                        }
                                      
                                       }
                                       ?>
								</select>
							</div>
							<div class="form-group">
								<label class="control-label">Būsena</label>
								<select class="form-control" name="status">
									 <?php
                                     
                                      $sql = "SELECT * FROM room_status WHERE Status='Laisvas'";
                                      $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                         while ($row = mysqli_fetch_assoc($result)) {
                                         	 ?>
                                         	 <option value="<?php echo $row['Room_Status_ID']?>"><?php echo $row['Status']?></option>
                                         	
                  <?php  
                                  }
                                         }
                                         ?>
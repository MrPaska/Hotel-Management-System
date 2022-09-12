<?php

                     include('../links/db_connect.php');
        if (!isset($_GET['search'])){
           $sql = "SELECT * FROM room_type";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                       	if ($row['TV'] == 1) {
                       		$tv = "Yra";
                       	}
                       	elseif ($row['TV'] == 0) {
                       		$tv = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['WC'] == 1) {
                       		$wc = "Yra";
                       	}
                       	elseif ($row['WC'] == 0) {
                       		$wc = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['Shower'] == 1) {
                       		$shower = "Yra";
                       	}
                       	elseif ($row['Shower'] == 0) {
                       		$shower = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['Bath'] == 1) {
                       		$bath = "Yra";
                       	}
                       	elseif ($row['Bath'] == 0) {
                       		$bath = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['Balcony'] == 1) {
                       		$balcony = "Yra";
                       	}
                       	elseif ($row['Balcony'] == 0) {
                       		$balcony = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['WiFi'] == 1) {
                       		$wifi = "Yra";
                       	}
                       	elseif ($row['WiFi'] == 0) {
                       		$wifi = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['Microwave_oven'] == 1) {
                       		$oven = "Yra";
                       	}
                       	elseif ($row['Microwave_oven'] == 0) {
                       		$oven = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                       	if ($row['Refrigerator'] == 1) {
                       		$ref = "Yra";
                       	}
                       	elseif ($row['Refrigerator'] == 0) {
                       		$ref = "Nėra";
                       	}else{
                       		echo "Tuščias";
                       	}
                    
                    echo "<tr>
                          <td scope='row'>".$row['Room_Type_ID']."</td>
                          <td class='text-center'>".$row['Room_space']." m2</td>
                          <td class='text-center'>".$row['Beds']."</td>
                          <td class='text-center'>".$row['Bed_single']."</td>
                          <td class='text-center'>".$row['Bed_duos']."</td>
                          <td class='text-center'>".$tv."</td>
                          <td class='text-center'>".$wc."</td>
                          <td class='text-center'>".$shower."</td>
                          <td class='text-center'>".$bath."</td>
                          <td class='text-center'>".$balcony."</td>
                          <td class='text-center'>".$wifi."</td>
                          <td class='text-center'>".$oven."</td>
                          <td class='text-center'>".$ref."</td>
                          <td class='text-center'>
                          <button type='button' data-toggle='modal' data-target='#change' class='btn btn-dark editbtn'>Keisti</button>
                          <button type='button' data-toggle='modal' data-target='#delete_form' class='btn btn-danger deletebtn'>Trinti</button>
                          </td>
                        </tr>";
                      }
                    }
                  }
                    else{
                      $searchvalues = $_GET['search'];
                      $sql = "SELECT * FROM room_type
                     WHERE CONCAT(Room_Type_ID, Room_Space, Beds) LIKE '%$searchvalues%'
                     ORDER BY Room_Type_ID ASC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                          if ($row['TV'] == 1) {
                          $tv = "Yra";
                        }
                        elseif ($row['TV'] == 0) {
                          $tv = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['WC'] == 1) {
                          $wc = "Yra";
                        }
                        elseif ($row['WC'] == 0) {
                          $wc = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['Shower'] == 1) {
                          $shower = "Yra";
                        }
                        elseif ($row['Shower'] == 0) {
                          $shower = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['Bath'] == 1) {
                          $bath = "Yra";
                        }
                        elseif ($row['Bath'] == 0) {
                          $bath = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['Balcony'] == 1) {
                          $balcony = "Yra";
                        }
                        elseif ($row['Balcony'] == 0) {
                          $balcony = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['WiFi'] == 1) {
                          $wifi = "Yra";
                        }
                        elseif ($row['WiFi'] == 0) {
                          $wifi = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['Microwave_oven'] == 1) {
                          $oven = "Yra";
                        }
                        elseif ($row['Microwave_oven'] == 0) {
                          $oven = "Nėra";
                        }else{
                          echo "Tuščias";
                        }
                        if ($row['Refrigerator'] == 1) {
                          $ref = "Yra";
                        }
                        elseif ($row['Refrigerator'] == 0) {
                          $ref = "Nėra";
                        }else{
                          echo "Tuščias";
                        }

                       echo "<tr>
                          <td scope='row'>".$row['Room_Type_ID']."</td>
                          <td class='text-center'>".$row['Room_space']." m2</td>
                          <td class='text-center'>".$row['Beds']."</td>
                          <td class='text-center'>".$row['Bed_single']."</td>
                          <td class='text-center'>".$row['Bed_duos']."</td>
                          <td class='text-center'>".$tv."</td>
                          <td class='text-center'>".$wc."</td>
                          <td class='text-center'>".$shower."</td>
                          <td class='text-center'>".$bath."</td>
                          <td class='text-center'>".$balcony."</td>
                          <td class='text-center'>".$wifi."</td>
                          <td class='text-center'>".$oven."</td>
                          <td class='text-center'>".$ref."</td>
                          <td class='text-center'>
                          <button type='button' data-toggle='modal' data-target='#change' class='btn btn-dark editbtn'>Keisti</button>
                          <button type='button' data-toggle='modal' data-target='#delete_form' class='btn btn-danger deletebtn'>Trinti</button>
                          </td>
                        </tr>";
                    }
                  }
                  else{
                    echo "<tr>
                       <td colspan='4'>Įrašų nerasta</td>
                       </tr>";
                  }
                }   
                ?>
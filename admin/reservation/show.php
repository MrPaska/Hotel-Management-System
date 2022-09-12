<?php
      	if (!isset($_GET['search'])){
           $sql = "SELECT r.Reservation_ID, r.Room_Number, r.Check_In, r.Check_Out, r.Adults, r.Children, r.Price, reservation_status.Status, guest.Name, guest.Surname, guest.Telefone
                     FROM reservation r
                    INNER JOIN guest ON r.Guest_ID = guest.Guest_ID
                    INNER JOIN reservation_status ON r.Reservation_Status_ID = reservation_status.Reservation_Status_ID
                    ORDER BY r.Reservation_ID DESC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                    
                    echo "<tr>
                          <td scope='row'>".$row['Reservation_ID']."</td>
                          <td class='text-center'>".$row['Name']."</td>
                          <td class='text-center'>".$row['Surname']."</td>
                          <!--<td style='display: none;'>".$row['Telefone']."</td>-->
                          <td class='text-center'>".$row['Room_Number']."</td>
                          <td class='text-center'>".$row['Check_In']."</td>
                          <td class='text-center'>".$row['Check_Out']."</td>
                          <td class='text-center'>".$row['Adults']."</td>
                          <td class='text-center'>".$row['Children']."</td>
                          <td class='text-center'>".$row['Price']." &euro;</td>
                          <td class='text-center'>".$row['Status']."</td>
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
                     $sql = "SELECT r.Reservation_ID, r.Room_Number, r.Check_In, r.Check_Out, r.Adults, r.Children, r.Price, reservation_status.Status, guest.Name, guest.Surname
                     FROM reservation r
                    INNER JOIN guest ON r.Guest_ID = guest.Guest_ID
                    INNER JOIN reservation_status ON r.Reservation_Status_ID = reservation_status.Reservation_Status_ID
                    WHERE CONCAT(r.Reservation_ID, r.Room_Number, r.Check_In, r.Check_Out, r.Adults, r.Children, r.Price, reservation_status.Status, guest.Name, guest.Surname ) LIKE '%$searchvalues%'
                      ORDER BY r.Reservation_ID DESC";
                     
                     $result = mysqli_query($conn, $sql);

                     if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {

                        echo "<tr>
                          <td scope='row'>".$row['Reservation_ID']."</td>
                          <td class='text-center'>".$row['Name']."</td>
                          <td class='text-center'>".$row['Surname']."</td>
                          <td class='text-center'>".$row['Room_Number']."</td>
                          <td class='text-center'>".$row['Check_In']."</td>
                          <td class='text-center'>".$row['Check_Out']."</td>
                          <td class='text-center'>".$row['Adults']."</td>
                          <td class='text-center'>".$row['Children']."</td>
                          <td class='text-center'>".$row['Price']." &euro;</td>
                          <td class='text-center'>".$row['Status']."</td>
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

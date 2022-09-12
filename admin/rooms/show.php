<?php

                                    if (!isset($_GET['search'])){
                                    $sql = "SELECT * FROM room";
                     
                                    $result = mysqli_query($conn, $sql);

                                   if (mysqli_num_rows($result) > 0) {
                                     while ($row = mysqli_fetch_assoc($result)) {
                                     	
                                      echo "<tr>

                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img'</td>
                                            <td class='text-center'>".$row['Room_Number']."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']." &euro;</td>
                                            <td class='text-center'>
                                            <div class='btn-group'>
                                              <button class='btn btn-primary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded=false'>Koreguoti</button>
                                                   <div class='dropdown-menu'>
                                                      <button type='button' data-toggle='modal' data-target='#change' class='dropdown-item editbtn'>Keisti</button>
                                                       <button type='button' data-toggle='modal' data-target='#delete_form' class='dropdown-item deletebtn'>Trinti</button>
                                                      </div>
                                                      </div>
                                            
                                             </td>
                                             </tr>";
                      }
                    }
                  }
                    else{
                      $searchvalues = $_GET['search'];
                       $sql = "SELECT * FROM room
                               WHERE CONCAT( Room_Number, Room_Type_ID, Status_ID, Price) LIKE '%$searchvalues%'
                               ORDER BY Room_ID ASC";
                     
                                    $result = mysqli_query($conn, $sql);

                                   if (mysqli_num_rows($result) > 0) {
                                     while ($row = mysqli_fetch_assoc($result)) {
                                      
                                      echo "<tr>

                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img''</td>
                                            <td class='text-center'>".$row['Room_Number']."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']."</td>
                                            <td class='text-center'>
                                            <div class='btn-group'>
                                              <button class='btn btn-primary btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded=false'>Koreguoti</button>
                                                   <div class='dropdown-menu'>
                                                      <button type='button' data-toggle='modal' data-target='#change' class='dropdown-item editbtn'>Keisti</button>
                                                       <button type='button' data-toggle='modal' data-target='#delete_form' class='dropdown-item deletebtn'>Trinti</button>
                                                      </div>
                                                      </div>
                                            
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
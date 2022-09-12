<?php
                                    include('../links/db_connect.php');
                                    $now = date("Y-m-d");
                                    $tmr = date('Y-m-d', strtotime($now . ' +1 day'));
                                    
                                    if (!isset($_GET['search'])){

                                      //Laisvi

                                      $sql = "SELECT DISTINCT(Room_Number), Room_Number FROM room WHERE Room_Number NOT IN (SELECT Room_Number
                                              FROM reservation
                                              WHERE '$now' BETWEEN date(Check_In) AND date(Check_Out) OR '$tmr' BETWEEN date(Check_In) AND date(Check_Out))";
                                    
                                     $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        $room = $row['Room_Number'];
                                        //echo $room;
                                  
                                         $sql1 = "SELECT r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, r.img, room_status.Status FROM room r
                                    LEFT JOIN room_status ON r.Status_ID = room_status.Room_Status_ID
                                    WHERE Room_Number = '$room'";
                                   
                                    $result1 = mysqli_query($conn, $sql1);

                                   if (mysqli_num_rows($result1) > 0) {
                                     while ($row = mysqli_fetch_assoc($result1)) {
                                      $room = $row['Room_Number'];
                                     
                                      
                                      echo "<tr>
                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img'</td>
                                            <td class='text-center'>".$room."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']." &euro;</td>";
                                            
                                            echo "<td class='text-center'><span class='badge badge-success'>Laisvas</span></td>
                                            
                                             </tr>";
                                          
                                               }
                                }           
                      }
                    }
                              /// Užimti
                    $sql = "SELECT DISTINCT(Room_Number), Room_Number FROM room WHERE Room_Number IN (SELECT Room_Number
                                              FROM reservation
                                              WHERE '$now' BETWEEN date(Check_In) and date(Check_Out) OR '$tmr' BETWEEN date(Check_In) and date(Check_Out))";
                                    
                                     $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        $room = $row['Room_Number'];
                                        //echo $room;

                                         $sql1 = "SELECT r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, r.img, room_status.Status FROM room r
                                    LEFT JOIN room_status ON r.Status_ID = room_status.Room_Status_ID
                                    WHERE Room_Number = '$room'";
                                   
                                    $result1 = mysqli_query($conn, $sql1);

                                   if (mysqli_num_rows($result1) > 0) {
                                     while ($row = mysqli_fetch_assoc($result1)) {
                                      $room = $row['Room_Number'];
                                    
                                      echo "<tr>

                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img'</td>
                                            <td class='text-center'>".$room."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']." &euro;</td>";
                                            
                                            echo "<td class='text-center'><span class='badge badge-danger'>Užimtas</span></td>
                                            
                                             </tr>";
                                          
                                               }
                                }           
                      }
                    }
                  }

                   else
                  {
                      
                      //Laisvi paieška

                                    $searchvalues = $_GET['search'];


                                      $sql = "SELECT DISTINCT(Room_Number), Room_Number FROM room WHERE Room_Number NOT IN (SELECT Room_Number
                                              FROM reservation
                                              WHERE '$now' BETWEEN date(Check_In) AND date(Check_Out) OR '$tmr' BETWEEN date(Check_In) AND date(Check_Out))";
                                    
                                     $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        $room = $row['Room_Number'];
                                        //echo $room;
                                  
                                         $sql1 = "SELECT r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, r.img, room_status.Status FROM room r
                               LEFT JOIN room_status ON r.Status_ID = room_status.Room_Status_ID
                               WHERE Room_Number = '$room' AND CONCAT( r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, room_status.Status)
                               LIKE '%$searchvalues%' 
                               ORDER BY r.Room_ID ASC";
                                   
                                    $result1 = mysqli_query($conn, $sql1);

                                   if (mysqli_num_rows($result1) > 0) {
                                     while ($row = mysqli_fetch_assoc($result1)) {
                                      $room = $row['Room_Number'];
                                     
                                      
                                      echo "<tr>
                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img'</td>
                                            <td class='text-center'>".$room."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']." &euro;</td>";
                                            
                                            echo "<td class='text-center'><span class='badge badge-success'>Laisvas</span></td>
                                            
                                             </tr>";
                                          
                                               }
                                }       
                      }
                    }

                              /// Užimti paieška

                    $searchvalues = $_GET['search'];

                    $sql = "SELECT DISTINCT(Room_Number), Room_Number FROM room WHERE Room_Number IN (SELECT Room_Number
                                              FROM reservation
                                              WHERE '$now' BETWEEN date(Check_In) and date(Check_Out) OR '$tmr' BETWEEN date(Check_In) and date(Check_Out))";
                                    
                                     $result = mysqli_query($conn, $sql);
                                      if (mysqli_num_rows($result) > 0) {
                                       while ($row = mysqli_fetch_assoc($result)) {
                                        $room = $row['Room_Number'];
                                        //echo $room;

                                        $sql1 = "SELECT r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, r.img, room_status.Status FROM room r
                               LEFT JOIN room_status ON r.Status_ID = room_status.Room_Status_ID
                               WHERE Room_Number = '$room' AND CONCAT( r.Room_ID, r.Room_Number, r.Room_Type_ID, r.Price, room_status.Status)
                               LIKE '%$searchvalues%' 
                               ORDER BY r.Room_ID ASC";
                                   
                                    $result1 = mysqli_query($conn, $sql1);

                                   if (mysqli_num_rows($result1) > 0) {
                                     while ($row = mysqli_fetch_assoc($result1)) {
                                      $room = $row['Room_Number'];
                                    
                                      echo "<tr>
                                            <td class='text-center'>".$row['Room_ID']."</td>
                                            <td class='text-center'><img src='../images/".$row['img']."' class='img'</td>
                                            <td class='text-center'>".$room."</td>
                                            <td class='text-center'>".$row['Room_Type_ID']."</td>
                                            <td class='text-center'>".$row['Price']." &euro;</td>";
                                            
                                            echo "<td class='text-center'><span class='badge badge-danger'>Užimtas</span></td>
                                            
                                             </tr>";
                                          
                                               }
                                } 
                            
                      }
                    }
                }
                
                ?>
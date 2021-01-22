<?php ?>

<header>
  <div class="header1">
  <nav>
                        <?php if(isset($_SESSION["personId"])){ 
                          $personId=$_SESSION["personId"];
                          include('../includes/db-config.php');
                          $stmt = $pdo->prepare("SELECT *
                          FROM (`person`
                          INNER JOIN `status` ON `person`.`statusId` = `status`.`statusId`)
                          WHERE `personId`= $personId;");
                          $stmt->execute();
                          $row = $stmt->fetch(PDO::FETCH_ASSOC); 
                          $statusId=$row["statusId"];
                          ?>
                          <a href="../logout.php">Logout</a></li>
                          <?php
                          }else{
                          ?>
                          <li id="link"><a href="../register.php">Register</a></li>
                          <li id="link"><a href="../login.php">Login</a>
                          <?php
                          }
                          ?>
                          </ul>

                          <img class="img" src="../profiles/img/<?php echo($row["profilePicFile"]); ?>" width=100px />

                    <!-- Status Drop Down -->
                      <span class="status">


          <label>Status:</label>
                      <select name="statusId" id="statusId" class="drop">
                              <?php
                              //prepare and execute mysql statement
                              $stmt = $pdo->prepare("SELECT * FROM `status`");
                              $stmt->execute();
                              //display results from SELECT statement
                              while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              if ($statusId==$row["statusId"]) {
                                  ?>
                                  <option value="<?php echo($row["statusId"]) ?>" selected><?php echo($row["statusName"]) ?></option>
                                  <?php } else { ?>
                                  <option value="<?php echo($row["statusId"]) ?>"><?php echo($row["statusName"]) ?></option>
                                  <?php } ?>
                                  <?php } ?>
                      </select>
                      
                            <?php $stmt = $pdo->prepare("SELECT * FROM `person` WHERE `personId`= $personId;");
                            $stmt->execute();
                            $row = $stmt->fetch(PDO::FETCH_ASSOC); ?>
                     <div class="note">

                      <textarea name="statusNote" id="statusNote"><?php echo($row["statusNote"]) ?></textarea>
                                  </div>
                                  </span>            
  </nav>
  <script src="../2ndlevelstatus.js"></script>
</header>
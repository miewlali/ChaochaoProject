<?php
session_start();
echo ($_REQUEST['userid']);
//(isset($_REQUEST['email']);
        if(isset($_REQUEST['userid'])){
				//connection
                  //include("http://localhost/homePage/connect.php");

                   header("Access-Control-Allow-Origin: *");
                   header("Content-Type: application/json; charset=UTF-8");

                  //$con = new mysqli("127.0.0.1", "root", "", "music course");
                  $con = new mysqli("127.0.0.1","root","","chaochao");
                  if (mysqli_connect_errno()) {
                    echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
				//รับค่า user & password
                  $userid = $_REQUEST['userid'];
                  $password = ($_REQUEST['password']);

				//query
                  $sqlM="SELECT * FROM member WHERE userid='$userid' AND password='$password'AND type='merchant' ";
                  $sqlC="SELECT * FROM member WHERE userid='$userid' AND password='$password'AND type='customer' ";


                  $resultM = mysqli_query($con,$sql);
                  $resultC = mysqli_query($con,$sqlT);

                  if(mysqli_num_rows($resulM)==1){

                      $row = mysqli_fetch_array($result);

                      $_SESSION["userid"] = $row["userid"];
                      $_SESSION["username"] = $row["username"];
                      $_SESSION["name"] = $row["name"];
                      $_SESSION["address"] = $row["address"];
                      $_SESSION["email"] = $row["email"];
                      $_SESSION["password"] = $row["password"];
                      $_SESSION["type"] = $row["type"];



                      Header("Location: http://localhost/chaochaome/mainPage-member.html");
                      //Header("Location: http://localhost/homePage/studentProfile.php");


                  }
                  else if(mysqli_num_rows($resultC)==1){

                    $rowc = mysqli_fetch_array($resultC);

                    echo "<script>";
                        echo "alert(\" user or  password is mistake\");";
                        echo ($rowc["userid"]);
                    echo "</script>";

                    $_SESSION["userid"] = $rowc["userid"];

                    Header("Location: http://localhost/chaochaome/mainPage-member.html");

                  }
                  else{
                    echo "<script>";
                        echo "alert(\" user or  password is mistake\");";
                        echo "window.history.back()";
                    echo "</script>";

                  }

        }else{
             Header("Location: http://localhost/chaochaome/mainPage-member.html"); //user & password incorrect back to login again
        }
?>

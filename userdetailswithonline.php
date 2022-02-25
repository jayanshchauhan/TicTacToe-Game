<?php
session_start()
?>
<!doctype html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <title>User Details</title>

      <style>
          body{
    margin: 0;
    font-size: .9rem;
    font-weight: 400;
    line-height: 1.6;
    text-align: left;
    width: 100%;
    height:100vh;
    overflow: hidden;
    background: linear-gradient(to right,#9c27b0,#8ecdff);
}
    div {
  margin-top: 50px;
  margin-left: 580px;
}
     button{
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;
}

   </style>
   
    </head>
    <body>
      <?php

        $servername="localhost";
        $username="root";
        $password="";
        $database="userdetails";
   
        $connector=mysqli_connect($servername,$username,$password,$database);
      
    if(!$_SESSION['namee'])
    header("location: index.php");
     
        $var= $_SESSION['userid'];
        $status="Online";
        $sql1="update game_table set Status='$status' WHERE User_Id='$var'";
        $result1 = mysqli_query($connector,$sql1);

      $sql="select User_Id,Name,Email_Id,Phone_No,Total_Wins,Total_Loss,Total_Played,Status from user natural join game_table";
      $result = mysqli_query($connector,$sql);
      ?>
      <div>
      <h1>User Details </h1>
</div>
      <table border="2" style= "background-color:white ; color: black; margin-top: 100px;margin-left: 380px;" >
      <thead>
        <tr>
          <th>User_Id</th>
          <th>User_Name</th>
          <th>Email_Id</th>
          <th>Phone_No</th>
          <th>Total_Wins</th>
          <th>Total_Loss</th>
          <th>Total_Played</th>
          <th>Status</th>
         
        </tr>
      </thead>
      <tbody>
        <?php
        
     /*   if (!$result) {
            printf("Error: %s\n", mysqli_error($connector));
            exit();
        }*/
          while($row = mysqli_fetch_array($result )){
            echo
            "<tr>
              <td>{$row['User_Id']}</td>
              <td>{$row['Name']}</td>
              <td>{$row['Email_Id']}</td>
              <td>{$row['Phone_No']}</td>
              <td>{$row['Total_Wins']}</td>
              <td>{$row['Total_Loss']}</td>
              <td>{$row['Total_Played']}</td>
              <td>{$row['Status']}</td>
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>

    <form action="Welcome.php" method="post">
           <button type="home">Home</button>
        </form>
        

    <?php mysqli_close($connector); ?>
    </body>
    </html>
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
    background-color: #b3b8b4;
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

      $sql="select User_Id,Name,Email_Id,Phone_No,Total_Wins,Total_Loss,Total_Played from user natural join game_table";
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
              
            </tr>\n";
          }
        ?>
      </tbody>
    </table>

    <form action="index.php" method="post">
           <button type="home">Home</button>
        </form>
        

    <?php mysqli_close($connector); ?>
    </body>
    </html>
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
        background: linear-gradient(to right,#9c27b0,#8ecdff);}
        div {
        margin-top: 50px;
        margin-left: 580px;}
        button{
        font-size: .9rem;
        margin-top: 60px;
        margin-left: 650px;
        color:white;
        background-color: black;}
     </style>
   
    </head>

    <body>
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
            require_once '../controllers/Users.php';

            if(!$_SESSION['username'])
            header("location:../index.php");
      
            $var= $_SESSION['userid'];
            $rowcolumn=new Users;
            $rowcolumn->updateonline($var);

            $rowcolumn=$rowcolumn->userdetails();

              foreach($rowcolumn as $row){
                echo
                "<tr>
                  <td>{$row->User_Id}</td>
                  <td>{$row->Name}</td>
                  <td>{$row->Email_Id}</td>
                  <td>{$row->Phone_No}</td>
                  <td>{$row->Total_Wins}</td>
                  <td>{$row->Total_Loss}</td>
                  <td>{$row->Total_Played}</td>
                  <td>{$row->Status}</td>
                  
                </tr>\n";
              }
            ?>
          </tbody>
        </table>

        <form action="welcome.php" method="post">
              <button type="home">Home</button>
            </form>
         
    </body>
    
</html>
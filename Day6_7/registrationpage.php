<?php
  // Declarations
  @$fullname = trim(strip_tags($_POST['fullname']));
  @$rollno = trim(strip_tags($_POST['rollno']));
  @$password = strip_tags($_POST['password']);
  @$repeatpassword =strip_tags($_POST['repeatpassword']);
  @$submit = $_POST['submit'];

  if($submit)
  {
    if($password == $repeatpassword)
    {
      if(strlen($rollno) >8 || strlen ($fullname)>50)
        echo "Notification : Recheck your Roll No.(max. 8 characters) and full name(max. 50 characters).";
      else
      {
        if(strlen($password) > 25 || strlen ($password)<6)
          echo "Notification : Password must be between 6 and 25 characters";
        else
        {
          $password = md5($password);
          $repeatpassword = md5($repeatpassword);

          $conn = mysqli_connect ("localhost","root","","result");
          $sql = "SELECT rollno,password FROM students WHERE rollno='$rollno'";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0)
          {
            if($row = mysqli_fetch_assoc($result))
            {
              if($row["password"])
                die("Notification : User already registered<br><a href='resultportal.html'>Return to portal</a>");
              else
              {
                $sql = "UPDATE students SET fullname='$fullname',password='$password' WHERE rollno='$rollno'";
                mysqli_query($conn, $sql);
                die("Notification : You have been registered!<br> <a href = 'loginpage.html'>Go to login page</a>");
              }
            }
          }
          else
          {
            $sql = "INSERT INTO students (id,fullname,rollno,password,php,mysql,html) VALUES ('','$fullname','$rollno','$password','','','')";
            mysqli_query($conn,$sql);
            die("Notification : You have been registered!<br><a href = 'loginpage.html'><b>Go to login page</b></a>");
          }
        }
      }
    }
    else
      die("Notification : Your passwords do not match.");
  }
?>

<html>
  <head>
    <title>REGISTRATION</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body style="background-color: #c5283d;  font-family: Open, sans-serif;color: black;">
    <div class="reg_div">
      <form action='registrationpage.php' method='POST'>
        <h2>REGISTRATION DETAILS</h2>
        <table>
          <tr>
            <td>Your full name : </td>
            <td><input type='text' name='fullname' value='<?php echo $fullname;  ?> ' required></td>
          </tr>
          <tr>
            <td>Your Roll No. :  </td>
            <td><input type='text' name='rollno' value='<?php echo $rollno;  ?> ' required></td>
          </tr>
          <tr>
            <td>Choose a password :  </td>
            <td><input type='password' name='password' required></td>
          </tr>
          <tr>
            <td>Repeat your password :  </td>
            <td><input type='password' name='repeatpassword' required></td>
          </tr>
          <tr>
            <td class="mid"><input type='submit' name='submit' value='Register'></td>
          </tr>
        </table>
      </form>
    </div>
  </body>
</html>
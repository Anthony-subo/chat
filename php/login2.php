 <?php
   session_start();
   include_once "configure.php";
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);
   if(!empty($email) && !empty($password)){
    //check if the email is registered and if the password match
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
    if(mysqli_num_rows($sql) > 0){//if credential matched
        $row = mysqli_fetch_assoc($sql);
        $_SESSION['unique_id'] = $row['unique_id'];//using session we can be able to user the unique-id in other php file
        echo "sucess";
    } else {
        echo "Email or Password is incorrect";
    }
   }else {
    echo "All input fields are required!";

   }

?>
<?php 
   session_start();
   include_once "configure.php";
   $fname = mysqli_real_escape_string($conn, $_POST['fname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lname']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, $_POST['password']);

   if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password) ){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
         $sql = mysqli_query($conn, "SELECT email FROM users WHERE email ='{$email}'");
         if (mysqli_num_rows($sql) > 0) {
            echo "$email -This email already exits!!";
         }else {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $tmp_name = $_FILES['image']['tmp_name'];

                //lets explode image and get the last extension like jpg png
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ['png', 'jpeg', 'jpg'];//these are some valid img ext and  we've store them in array
                if (in_array($img_ext, $extensions) === true)// if user upload image not of this type it gives an error
                 {
                    $time = time();// this returns user current time
                    //move the user uploaded img to a specific file/folder
                    $new_img_name = $time.$img_name;
                    if(move_uploaded_file($tmp_name, "images/".$new_img_name)){
                         $status = "Active now"; //once user signed up his status will be active now
                         $random_id = rand(time(), 10000000);//create random id for users


                         //insert into database table
                         $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                              VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");
                        
                        if ($sql2) { //if the data inserted
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                            if(mysqli_num_rows($sql3) > 0){
                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['unique_id'] = $row['unique_id'];//using session we can be able to user the unique-id in other php file
                                echo "success";
                            }
                        }else {
                            echo "something went wrong!";
                        }
                    }
                } else {
                    echo "Please select an image file - jpeg, jpg, png";
                }

            }else {
                echo "Please insert an image file !";
            }
         }
    }else {
        echo " $email - this is not valid email!";
       }
   }else {
    echo " all input field are required";
   }
?>
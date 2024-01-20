<?php
include_once "header.php";
?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                    <div class="field-email">
                        <label >Email Address</label>
                        <input type="email" name="email" placeholder="Enter you email"> 
                    </div>
                    <div class="field-password">
                        <label >Password</label><br>
                        <input type="password" name="password" placeholder="Enter you Password "> 
                    </div>
                    <i class="fa-fa-eye"></i>
                    <div class="field button">
                        <input type="submit" value="continue to chat"> 
                    </div>
                
            </form>
            <div class="link">Not yet signed up? <a href="index.php">Signup now</a></div>
        </section>
    </div>
    <script src="javascript/pass-show-hide.js"></script>
    <script src="javascript/login.js"></script>
</body>
</html>

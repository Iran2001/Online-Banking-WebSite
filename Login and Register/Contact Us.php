<?php include('./config.php')?>


<?php


if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['mssg'];

   date_default_timezone_set('Asia/Colombo');
   $date = date("Y-m-d H:i:s"); // Format: YYYY-MM-DD HH:MM:SS

    // Insert the new contact message into the database
    $Query = "INSERT INTO `user_contacts` (name, email, massages) VALUES ('$name', '$email', '$text')";
    $Result = mysqli_query($conn, $Query);

    if ($Result) {
        echo '<script>alert("Message sent successfully!");</script>';
        // Refresh the page to show the updated contact history
        echo '<meta http-equiv="refresh" content="0">';
    } else {
        echo '<script>alert("Failed to send message.");</script>';
        echo mysqli_error($conn); // Print any error messages for debugging
    }
}
?>


<!DOCTYPE html>
  <head>
    <title>  Contact Us  </title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins" , sans-serif;
}
body{
  min-height: 100vh;
  width: 100%;
  background: #4e5454;
  display: flex;
  align-items: center;
  justify-content: center;
}
.container{
  width: 85%;
  background: #fff;
  border-radius: 6px;
  padding: 20px 60px 30px 40px;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
}
.container .content{
  display: flex;
  align-items: center;
  justify-content: space-between;
}
.container .content .left-side{
  width: 25%;
  height: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 15px;
  position: relative;
}
.content .left-side::before{
  content: '';
  position: absolute;
  height: 70%;
  width: 2px;
  right: -15px;
  top: 50%;
  transform: translateY(-50%);
  background: #afafb6;
}
.content .left-side .details{
  margin: 14px;
  text-align: center;
}
.content .left-side .details i{
  font-size: 30px;
  color: #3e2093;
  margin-bottom: 10px;
}
.content .left-side .details .topic{
  font-size: 18px;
  font-weight: 500;
}
.content .left-side .details .text-one,
.content .left-side .details .text-two{
  font-size: 14px;
  color: #afafb6;
}
.container .content .right-side{
  width: 75%;
  margin-left: 75px;
}
.content .right-side .topic-text{
  font-size: 40px;
  font-weight: 600;
  color: #ffb700;
}
.content .right-side .text-size{
  font-size: 10px;
}
.right-side .input-box{
  height: 50px;
  width: 100%;
  margin: 12px 0;
}
.right-side .input-box input,
.right-side .input-box textarea{
  height: 100%;
  width: 100%;
  border: none;
  outline: none;
  font-size: 16px;
  background: #F0F1F8;
  border-radius: 6px;
  padding: 0 15px;
  resize: none;
}
.right-side .message-box{
  min-height: 110px;
}
.right-side .input-box textarea{
  padding-top: 6px;
}
.right-side .button{
  display: inline-block;
  margin-top: 12px;
}
.right-side .button input[type="button"]{
  color: #fff;
  font-size: 18px;
  outline: none;
  border: none;
  padding: 8px 16px;
  border-radius: 6px;
  background: #ffb700;
  cursor: pointer;
  transition: all 0.3s ease;
}
.button input[type="button"]:hover{
  background: #5029bc;
}

@media (max-width: 950px) {
  .container{
    width: 90%;
    padding: 30px 40px 40px 35px ;
  }
  .container .content .right-side{
   width: 75%;
   margin-left: 55px;
}
}
@media (max-width: 820px) {
  .container{
    margin: 40px 0;
    height: 100%;
  }
  .container .content{
    flex-direction: column-reverse;
  }
 .container .content .left-side{
   width: 100%;
   flex-direction: row;
   margin-top: 40px;
   justify-content: center;
   flex-wrap: wrap;
 }
 .container .content .left-side::before{
   display: none;
 }
 .container .content .right-side{
   width: 100%;
   margin-left: 0;
 }
}

    </style>

   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Nugegoda</div>
          <div class="text-two">Colombo 07</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+94769247967</div>
          <div class="text-two">+94761080423</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">nexusbank1@gmail.com</div>
          <div class="text-two">nexusbank2@gmail.com</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
	<br>
        <p class="text-size">If you have anything to know from us or any types of quries related to our Nexus bank, you can send us a message from here. It's our pleasure to help you.</p>
	<br>
      <form action="#" method="post">
        
      <div class="input-box">
          <input type="text" name="name" placeholder="Enter your name...">
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter your email...">
        </div>
        <div class="input-box message-box">
          <input type="text" name="mssg" placeholder="Type your message here...">
        </div>
        <div class="button">
         <input type="submit" name="submit" value="submit">
        </div>

      </form>


    </div>
    </div>
  </div>
</body>
</html>
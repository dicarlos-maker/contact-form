<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Form</title>
</head>
<style>
  @import url("https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&diisplay=swap");

body {
  background: url(https://img.freepik.com/photos-gratuite/bordure-fleurie-rose-feuilles-palmier-fond-blanc_24972-1170.jpg?size=626&ext=jpg&ga=GA1.2.1083499138.1610150400);
    background-size: cover;
    opacity: 1;
}


.myForm {
  display: block;
  text-align: center;
  position: relative;
  margin: 0 auto;
  margin-top: 44px;
 
}

.myForm label {
  color: #B4886B;
  font-weight: bold;
  display: block;
  width: 150px;
  float: left;
}

.myForm input {
  border: 5px solid white; 
  -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
  -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
  box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
  padding: 15px;
  background: rgba(255,255,255,0.5);
  margin: 0 0 10px 0;
}

.myForm p {
  color: #B4886B;
  font-family: courier;
  font-size: 160%;
}

.myForm textarea {
  width: 600px;
	height: 120px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
}

.myForm button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}


#myForm {
  display: inline-block;
  margin-left: auto;
  margin-right: auto;
  text-align: left;
}


h2 {
  text-align: center;
 }



</style>
<body>
  <h4 class="sent-notification"></h4>
  <center>
<div class="myForm">
    <form id="myForm">
      <h2>Reach Us</h2>
      <label>Name</label>
      <input id="name" type="text" placeholder="Enter your Name">
      <br><br>
      <label>Email</label>
      <input id="email" type="text" placeholder="Enter your Email">
      <br><br>
      <label>Subject</label>
      <input id="subject" type="text" placeholder="Enter Subject">
      <br><br>
      <p>Message</p>
      <textarea id="body" placeholder="Type Message"></textarea>
      <br><br>
      <button type="button" onclick="sendEmail()" value="Send An Email">Submit</button>
    </form>
</div>


  </center>

  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

  <script type="text/javascript">
  function sendEmail(){
    var name = $("#name");
    var email = $("#email");
    var subject = $("#subject");
    var body = $("#body");

    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body)){
      $.ajax({
        url: 'sendEmail.php',
        method: 'POST',
        dataType: 'json',
        data:{
          name: name.val(),
          email: email.val(),
          subject: subject.val(),
          body: body.val(),
        }, success: function(response){
          $('#myForm')[0].reset();
          $('.sent-notification').text("Message sent successfully.");
        }
      });
    }
  }
  function isNotEmpty(caller){
    if(caller.val()==""){
      caller.css('border','1px solid red');
      return false;
    }
    else
    {
      caller.css('border', '');
      return true;
    }
  }
  </script>
</body>
</html>
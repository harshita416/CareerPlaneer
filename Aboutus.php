<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Project Worlds || ABOUT US </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
	<!--alert message-->
<?php if(@$_GET['w'])
{echo'<script>alert("'.@$_GET['w'].'");</script>';}
?>
<!--alert message end-->

</head>

<body>

<!--header start-->
<div class="row header">
<div class="row">
<div class="col-lg-6">
<span class="logo">CAREER PLANNER</span></div>
<div class="col-md-2">
</div>
<div class="col-md-5">
<?php
 include_once 'dbConnection.php';
session_start();
  if((!isset($_SESSION['email']))){
echo '<a href="#" class="pull-right sub1 btn title3" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>&nbsp;Log In</a>&nbsp;';}
else
{
echo '<a href="logout.php?q=feedback.php" class="pull-right sub1 btn title3"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Signout</a>&nbsp;';}
?>

<a href="index.php" class="pull-right btn sub1 title3"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home</a>&nbsp;
</div></div>

<!--sign in modal start-->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content title1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title title1"><span style="color:orange">LOGIN</span></h4>
        <style>
        h4{
            text-align: center;
         }
        </style>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="login.php?q=index.php" method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="email"></label>  
  <div class="col-md-6">
  <input id="email" name="email" placeholder="Enter your email-id" class="form-control input-md" type="email">
    
  </div>
</div>

<!-- Password input-->
<div class="form-group">
  <label class="col-md-3 control-label" for="password"></label>
  <div class="col-md-6">
    <input id="password" name="password" placeholder="Enter your Password" class="form-control input-md" type="password">
    
  </div>
</div>

      </div>
      <div class="modal-footer">
      <div class="col-md-7">  
        <button type="submit" class="btn btn-primary">Log In</button>
        </div>
		</fieldset>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!--sign in modal closed-->

<!--header end-->
<!-- About Us start-->
<!DOCTYPE html>
<html lang="en">
<head>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 20px;
            background: url("image/Y.jpg");
        }

        header {
            text-align: center;
            
        }

       
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
</head>
<body>

<header>
    <h1><b>About Us</b></h1>
</header>

 
<h2>How much does it cost?</h2>
<img src="image\s.jpg" width=350 height=250  >

<h4>We want to help everyone learn more about themselves and make informed career decisions, so we’ve made our entire experience free. You’ll get your career and degree matches, insights, and even reports for free.</h4>

<h2>How long will the test take?</h2>
<img src="image\T.jpg" width=350 height=250 >

<h4>The full assessment takes about 10 minutes to complete. The thoroughness of our career test allows us to deliver personalized, nuanced results. We believe you shouldn’t base major life decisions — like your education and career — on a quick five-minute quiz. The assessment is made up of five sections and each unlocks an additional dimension of fit.</h4>

<h2>Why should I trust my career results?</h2>
<img src="image\2.jpg" width=350 height=250 >

<h4>We are very good at predicting the right career matches. During the test, we ask you for your general interest in a handful of randomly selected careers, as well as how satisfied you were in any previous careers. Our models use this information to get a baseline understanding of who you are and what you're interested in, but it's also anonymously combined with all the data we have from other users on their interests, as well as their satisfaction with their previous careers and degrees. We train ever better models from this growing dataset to better identify how your interests, work and education history, and personality inform what careers you'd be a good fit in. The predictions are unique to you but validated against millions of other users.</h4>

<h2>Can I retake the career test?</h2>
<img src="image\1.jpg" width=350 height=250 >

<h4>Yes, you can reset your account to take the career test more than once. Many people take the test on a semi-regular basis to see how their interests and results evolve over time.

<h2>Why do my results change?</h2>
<img src="image\4.jpg" width=350 height=250 >

<h4>Our career matching system updates in real-time, meaning that whenever you give us a new piece of relevant information, we will automatically update all of our recommendations for you. As we gather more data and create better models, it's also possible that your results might change as we better understand what makes a career the right fit for someone.</h4>




<h2>Why is this career test designed for?</h2>
<img src="image\3.jpg" width=350 height=250 >
<h4>People start new careers at many different stages of life, and nothing about our assessment is age-specific. We’ve designed a career test that works for adults as well as high school and college students.</h4>





</body>
</html>


<!-- About Us end -->
</body>
</html>

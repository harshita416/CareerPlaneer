<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project || CAREER PLANNER BASED ON ABILITY </title>
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
<?php
include_once 'dbConnection.php';
?>
<body>
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">CAREER PLANNER</span></div>
<div class="col-md-4 col-md-offset-2">
 <?php
 include_once 'dbConnection.php';
session_start();
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];
$email=$_SESSION['email'];

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php?q=1" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}?>
</div>
</div></div>
<div class="bg">

<!--navigation menu-->
<nav class="navbar navbar-default title1">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?> ><a href="account.php?q=1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>&nbsp;Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="account.php?q=2"><span class=" fa-lightbulb-o" aria-hidden="true"></span>&nbsp;IQ Test</a></li>
        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="account.php?q=3"><span class="glyphicon glyphicon-education" aria-hidden="true"></span>&nbsp;career Guidelines</a></li>  
        <li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="account.php?q=4"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;History</a></li>
		<li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="account.php?q=5"><span class="glyphicon glyphicon-stats" aria-hidden="true"></span>&nbsp;Ranking</a></li> 
		</ul> 
            <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter tag ">
        </div>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;Search</button>
      </form>
      </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">

<!--home start-->
<?php if(@$_GET['q']==1) {

$result = mysqli_query($con,"SELECT * FROM quiz ORDER BY date DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Topic</b></td><td><b>Total question</b></td><td><b>Marks</b></td><td><b>Time limit</b></td><td></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$title = $row['title'];
	$total = $row['total'];
	$sahi = $row['sahi'];
    $time = $row['time'];
	$eid = $row['eid'];
$q12=mysqli_query($con,"SELECT score FROM history WHERE eid='$eid' AND email='$email'" )or die('Error98');
$rowcount=mysqli_num_rows($q12);	
if($rowcount == 0){
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="account.php?q=quiz&step=2&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:#99cc32"><span class="glyphicon glyphicon-new-window" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Start</b></span></a></b></td></tr>';
}
else
{
echo '<tr style="color:#99cc32"><td>'.$c++.'</td><td>'.$title.'&nbsp;<span title="This quiz is already solve by you" class="glyphicon glyphicon-ok" aria-hidden="true"></span></td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=quizre&step=25&eid='.$eid.'&n=1&t='.$total.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Restart</b></span></a></b></td></tr>';
}
}
$c=0;
echo '</table></div></div>';

}?>
<!--<span id="countdown" class="timer"></span>
<script>
var seconds = 40;
    function secondPassed() {
    var minutes = Math.round((seconds - 30)/60);
    var remainingSeconds = seconds % 60;
    if (remainingSeconds < 10) {
        remainingSeconds = "0" + remainingSeconds; 
    }
    document.getElementById('countdown').innerHTML = minutes + ":" +    remainingSeconds;
    if (seconds == 0) {
        clearInterval(countdownTimer);
        document.getElementById('countdown').innerHTML = "Buzz Buzz";
    } else {    
        seconds--;
    }
    }
var countdownTimer = setInterval('secondPassed()', 1000);
</script>-->

<!--home closed-->



<!--quiz start-->
<?php
if(@$_GET['q']== 'quiz' && @$_GET['step']== 2) {
$eid=@$_GET['eid'];
$sn=@$_GET['n'];
$total=@$_GET['t'];
$q=mysqli_query($con,"SELECT * FROM questions WHERE eid='$eid' AND sn='$sn' " );
echo '<div class="panel" style="margin:5%">';
while($row=mysqli_fetch_array($q) )
{
$qns=$row['qns'];
$qid=$row['qid'];
echo '<b>Question &nbsp;'.$sn.'&nbsp;:<br />'.$qns.'</b><br /><br />';
}
$q=mysqli_query($con,"SELECT * FROM options WHERE qid='$qid' " );
echo '<form action="update.php?q=quiz&step=2&eid='.$eid.'&n='.$sn.'&t='.$total.'&qid='.$qid.'" method="POST"  class="form-horizontal">
<br />';

while($row=mysqli_fetch_array($q) )
{
$option=$row['option'];
$optionid=$row['optionid'];
echo'<input type="radio" name="ans" value="'.$optionid.'">'.$option.'<br /><br />';
}
echo'<br /><button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>&nbsp;Submit</button></form></div>';
//header("location:dash.php?q=4&step=2&eid=$id&n=$total");
}
//result display
if(@$_GET['q']== 'result' && @$_GET['eid']) 
{
$eid=@$_GET['eid'];
$q=mysqli_query($con,"SELECT * FROM history WHERE eid='$eid' AND email='$email' " )or die('Error157');
echo  '<div class="panel">
<center><h1 class="title" style="color:#660033">Result</h1><center><br /><table class="table table-striped title1" style="font-size:20px;font-weight:1000;">';

while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
echo '<tr style="color:#66CCFF"><td>Total Questions</td><td>'.$qa.'</td></tr>
      <tr style="color:#99cc32"><td>right Answer&nbsp;<span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span></td><td>'.$r.'</td></tr> 
	  <tr style="color:red"><td>Wrong Answer&nbsp;<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></td><td>'.$w.'</td></tr>
	  <tr style="color:#66CCFF"><td>Score&nbsp;<span class="glyphicon glyphicon-star" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
$q=mysqli_query($con,"SELECT * FROM rank WHERE  email='$email' " )or die('Error157');
while($row=mysqli_fetch_array($q) )
{
$s=$row['score'];
echo '<tr style="color:#990000"><td>Overall Score&nbsp;<span class="glyphicon glyphicon-stats" aria-hidden="true"></span></td><td>'.$s.'</td></tr>';
}
echo '</table></div>';

}
?>
<!--quiz end-->

<!--IQ test start-->
<div class="container">

<?php if(@$_GET['q']==2) {
echo '<div class="panel" style="margin:2%">';

// Retrieve one question with options from the database
$sql = "SELECT * FROM testq ORDER BY qid LIMIT 1";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $question = $result->fetch_assoc();
    $questionId = $question['qid'];
    $question = $question['question'];

    // Display the question
    echo "<form action='process_answer.php' method='post'>";
    echo "<br><input type='hidden' name='question_id' value='$questionId'>";
    echo "<p> Question&nbsp;: <br>$question</p>";
   

    // Retrieve options for the question
    $optionsSql = "SELECT * FROM testoption WHERE qid = $questionId";
    $optionsResult = $con->query($optionsSql);

    if ($optionsResult->num_rows > 0) {
        while ($option = $optionsResult->fetch_assoc()) {
            $optionId = $option['oid'];
            $option = $option['option'];
            echo "<input type='radio' name='user_answer' value='$optionId'>$option<br><br>";
        }
    }

    echo "<br><input type='submit' class='btn btn-primary' value='Submit'><br>";
    echo "</form>";
} else {
    echo "No questions found in the database.";
}


}

?>

    
<!--IQ test end-->


<!--Guidelines start-->
<?php
if(@$_GET['q']== 3) 
{
echo '<div class="panel"><h4>
<b>1. Set Goals</b><br><br>
If you don’t know where you’re going, how will you know how to get there? Set career goals, and be willing to dream big if that’s what you want to do. Your career makes up a large part of your adult life. Think of it as an investment and set your goals accordingly.<br><br>

<b>2. Do a Self-assessment</b><br><br>
Next, perform a self-assessment. What are your skills and abilities? Be honest with yourself. Where do you lack the skills or knowledge necessary for your career goals? Do you need additional training? Look at your goals and start determining what steps you need to take to accomplish them.<br><br>

<b>3. Network, Network, Network</b><br><br>
Regardless of where you are in your career today and your goals for tomorrow, networking is necessary. Networking is about building relationships with people, but it’s also about building a reputation. Be genuine and sincere, and focus on meeting people and making connections—not on advancing your agenda. When you’re at an event, think about how you can help others, not yourself. Finally, treat everyone you meet as someone important. Everyone has a role to play, even if they are a janitor or clerk.<br><br>

And the time to start networking is now before you have a specific need. If you hate networking (or suspect you will), check out some of these networking tips. Also, keep in mind that you can network online as well via groups on LinkedIn or user or association groups.<br><br>

<b>4. Seek Out a Mentor</b><br><br>
Successful people can aid you enormously with career advancement by acting as your mentor. As such, they can take you under their wing and share with you their experience and lessons. However, remember that they are doing this on out of their goodwill, so respect their time and express your gratitude for the lessons they share.<br><br>

To find a mentor, see tip #3 about networking. Also, ask friends and family, or inquire through professional organizations.<br><br>

<b>5. Consider an Internship</b><br><br>
Internships let you explore a potential career before you commit to it. But they can also give you skills and training that can help you land a real job. An internship lets you get a foot in the door in your industry, and some offer college credit. To find an internship, turn to your network, ask your mentor, and look for postings for internships through your college or sites like LinkedIn.<br><br>

<b>6. Shadow a Professional</b><br><br>
If you’re at the stage where you’re not even sure which career path to follow, shadowing someone in the field can give you an inside look at a choice you’re considering. You’ll need to tap into your network to find someone to shadow, or you can seek out a professional you admire and contact them directly to make the request. If you do shadow someone, respect their time, and express your gratitude.<br><br>

<b>7. Volunteer</b><br><br>
Volunteering helps you gain valuable experience in a low-pressure setting, plus it gives your résumé a boost. Besides, you might get a credible referral or even a connection that leads to a paid position. You can volunteer with an association in your field, or find a volunteer position that uses your skills and prepares you for a specific job role. For example, a local animal shelter might need IT help, or a local nonprofit could need someone to help with their marketing.<br><br>

<b>8. Do Online Training</b><br><br>
Online training can give you a boost as far as career advancement goes because you can be very specific in the practice you get. If you’ve followed tip #1 and set goals, then did tip #2 to determine the skills you lack to achieve your goals, you’ll probably know which training to pursue. Another option is to review job postings on sites like Glassdoor to see the skills required for a job you’re interested in. Then turn to a training provider like Simplilearn to find the courses that will teach you those skills. Training through a provider like Simplilearn is very hands-on so that you will get practical skills, and the certification you can earn will add credibility to your résumé.<br><br>

<b>9. Never Stop Learning</b><br><br>
Finally, keep on learning, even after you land that first job, and achieve that primary goal. There is always room to improve and always something to learn. Once you’re in the career field you want, keep challenging yourself to learn that next skill, earn that next certification. You’ll demonstrate to your employer that you’re proactive, ambitious, and capable. Or, if that job isn’t working out, you’ll position yourself for the next one. As we like to say at Simplilearn, get certified, get ahead! Millennials now make up the most significant part of the workforce in the U.S., which might be why those academics and employers are so confused: There are just so many of you! But you don’t have to be confused. It is within your power to choose your career path, set your goals, and take steps to help you realize your dream job. <br><br>

<b>10. Polish Your Résumé</b><br><br>
Once you’ve determined your goals and how to get there, you’ve built a network, and you’ve gained some experience, you’ll want to turn your focus to your résumé. Managers are often overwhelmed with résumés when looking to hire. Often, they merely glance at them before making a quick decision about whom to interview. Your résumé needs to make an immediate impact, so include the details relevant to the job you’re applying for but leave out the rest if it’s irrelevant.<br><br>

Use a modern format that is clean and easy to read. Keep it to one page. For professional and prevalent resume templates, you can use Venngage, which can help you make an instant impression on your to-be employer. Lastly, make sure it is error-free. You can also ask someone else to proofread it, just to be doubly sure.<br><br>

<b>11. Make Your Resume Stand Out</b><br><br>
In some professions, it’s now acceptable to have a visual résumé. Once your résumé is well-written, focused, and error-free, consider taking a visual approach to the layout.<br> <br> ​​​​

<b>12. Put Your Resume Online</b><br><br>
You don’t have to be a rock star to have your webpage. You can create an online version of your résumé plus a lot more with a personal webpage. That lets you showcase more than you can in a one-page resume, plus gives potential employers or connections an easy way to learn more about you. See ideas for personal webpages here.<br><br>

<b>13. Create a Professional LinkedIn Profile</b><br><br>
A LinkedIn profile can be like an online résumé, and it’s a necessity in this day and age. Make sure your profile is focused on the career you’re pursuing, well-written and error-free. Follow the advice for creating a professional profile, and then become an active LinkedIn user. Start building your network by connecting with people (personalizing your message each time!) and by joining relevant LinkedIn groups.<br><br>

<b>14. Hire a Career Coach</b><br><br>
If you’re struggling either to determine your path or to gain traction on that path, it might be time to invest in a career coach. A career coach can advise you, give you direction, and help with planning.<br><br>

<b>15. Be Grateful </b><br><br>
As you work your way through these tips and come into contact with people, be grateful. An attitude of gratitude can go a long way in building a good reputation and making people want to help you. <br><br>

<b>16. Learn How to Take Criticism</b><br><br>
Everyone makes mistakes. At some point on this journey, you will too, and you will when you land that job you’re after as well. Knowing how to accept and learn from criticism is a valuable skill. If someone points out a mistake you made, analyze why and how the error happened. Put steps into place to keep it from happening again. Say something along the lines of, “Thanks for catching that!” to the person who caught your mistake. And don’t get defensive.<br><br> 



</h4>
</div>
';
}
?>
<!--Guidelines end-->

<?php
//history start
if(@$_GET['q']== 4) 
{
$q=mysqli_query($con,"SELECT * FROM history WHERE email='$email' ORDER BY date DESC " )or die('Error197');
echo  '<div class="panel title">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>S.N.</b></td><td><b>Quiz</b></td><td><b>Question Solved</b></td><td><b>Right</b></td><td><b>Wrong<b></td><td><b>Score</b></td>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$eid=$row['eid'];
$s=$row['score'];
$w=$row['wrong'];
$r=$row['sahi'];
$qa=$row['level'];
$q23=mysqli_query($con,"SELECT title FROM quiz WHERE  eid='$eid' " )or die('Error208');
while($row=mysqli_fetch_array($q23) )
{
$title=$row['title'];
}
$c++;
echo '<tr><td>'.$c.'</td><td>'.$title.'</td><td>'.$qa.'</td><td>'.$r.'</td><td>'.$w.'</td><td>'.$s.'</td></tr>';
}
echo'</table></div>';
}

//ranking start
if(@$_GET['q']== 5) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:red"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Score</b></td><td></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e'" )or die('Error231');
while($row=mysqli_fetch_array($q12) )
{
$name=$row['name'];
$gender=$row['gender'];

}
$c++;
echo '<tr><td style="color:#99cc32"><b>'.$c.'</b></td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$s.'</td><td>';
}
echo '</table></div></div>';}
?>



</div></div></div></div>





<!--Footer start-->
<div class="row footer">
<div class="col-md-3 box">
<a href="Aboutus.php" target="_blank">About us</a>
</div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#login">Admin Login</a></div>
<div class="col-md-3 box">
<a href="#" data-toggle="modal" data-target="#developers">Developers</a>
</div>
<div class="col-md-3 box">
<a href="feedback.php" target="_blank">Feedback</a></div></div>
<!-- Modal For Developers-->
<div class="modal fade title1" id="developers">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title text-center" style="font-family:'typo' "><span style="color:orange">Developers</span></h4>
      </div>
	  
      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-3">
    
		 </div>
		 <div class="col-md-5">
		<a href="#" style="color:#202020; font-family:'typo' ; font-size:18px" >Harshita Sharma</a>
		
		<h4 style="font-family:'typo' ">210510124029@paruluniversity.ac.in</h4>
		<h4 style="font-family:'typo' ">Parul Institude of Information technology</h4>
    </div></div>
		</p>
      </div>

      <div class="modal-body">
        <p>
		<div class="row">
		<div class="col-md-3">
		
		 </div>
		 <div class="col-md-5">
		<a href="#" style="color:#202020; font-family:'typo' ; font-size:18px">Subhangini Thakur</a>
		
		<h4 style="font-family:'typo' ">210510111089@paruluniversity.ac.in</h4>
		<h4 style="font-family:'typo' ">Parul Institude of Information technology</h4>
		</p>
      </div>
    
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!--Modal for admin login-->

	 <div class="modal fade" id="login">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <style>
          .footer{
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
           
          }

        </style>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title"><span style="color:orange;font-family:'typo' ">LOGIN</span></h4>
      </div>
      <div class="modal-body title1">
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
<form role="form" method="post" action="admin.php?q=index.php">
<div class="form-group">
<input type="text" name="uname" maxlength="20"  placeholder="Admin user id" class="form-control"/> 
</div>
<div class="form-group">
<input type="password" name="password" maxlength="15" placeholder="Password" class="form-control"/>
</div>
<div class="form-group" align="center">
<input type="submit" name="login" value="Login" class="btn btn-primary" />
</div>
</form>
</div><div class="col-md-3"></div></div>
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>-->
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div></div>
<!--footer end-->


</body>
</html>

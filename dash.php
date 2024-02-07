<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Project || DASHBOARD </title>
<link  rel="stylesheet" href="css/bootstrap.min.css"/>
 <link  rel="stylesheet" href="css/bootstrap-theme.min.css"/>    
 <link rel="stylesheet" href="css/main.css">
 <link  rel="stylesheet" href="css/font.css">
 <script src="js/jquery.js" type="text/javascript"></script>

  <script src="js/bootstrap.min.js"  type="text/javascript"></script>
 	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

<script>
$(function () {
    $(document).on( 'scroll', function(){
        console.log('scroll top : ' + $(window).scrollTop());
        if($(window).scrollTop()>=$(".logo").height())
        {
             $(".navbar").addClass("navbar-fixed-top");
        }

        if($(window).scrollTop()<$(".logo").height())
        {
             $(".navbar").removeClass("navbar-fixed-top");
        }
    });
});</script>
</head>

<body  style="background:#eee;">
<div class="header">
<div class="row">
<div class="col-lg-6">
<span class="logo">CAREER PLANNER</span></div>
<?php
 include_once 'dbConnection.php';
session_start();
$email=$_SESSION['email'];
  if(!(isset($_SESSION['email']))){
header("location:index.php");

}
else
{
$name = $_SESSION['name'];;

include_once 'dbConnection.php';
echo '<span class="pull-right top title1" ><span class="log1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;&nbsp;&nbsp;Hello,</span> <a href="account.php" class="log log1">'.$name.'</a>&nbsp;|&nbsp;<a href="logout.php?q=account.php" class="log"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;Logout</button></a></span>';
}?>

</div></div>
<!-- admin start-->

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
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="dash.php?q=0"><b>Dashboard</b></a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li <?php if(@$_GET['q']==0) echo'class="active"'; ?>><a href="dash.php?q=0">Home<span class="sr-only">(current)</span></a></li>
        <li <?php if(@$_GET['q']==1) echo'class="active"'; ?>><a href="dash.php?q=1">IQ Test</a></li>
        <li <?php if(@$_GET['q']==2) echo'class="active"'; ?>><a href="dash.php?q=2">Career Guidelines</a></li>
        <li <?php if(@$_GET['q']==3) echo'class="active"'; ?>><a href="dash.php?q=3">User</a></li>
		<li <?php if(@$_GET['q']==4) echo'class="active"'; ?>><a href="dash.php?q=4">Ranking</a></li>
		<li <?php if(@$_GET['q']==5) echo'class="active"'; ?>><a href="dash.php?q=5">Feedback</a></li>
        <li class="dropdown <?php if(@$_GET['q']==6 || @$_GET['q']==7) echo'active"'; ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Quiz<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dash.php?q=5">Add Quiz</a></li>
            <li><a href="dash.php?q=6">Remove Quiz</a></li>
			
          </ul>
        
      </ul>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!--navigation menu closed-->
<div class="container"><!--container start-->
<div class="row">
<div class="col-md-12">
<!--home start-->

<?php if(@$_GET['q']==0) {

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

}

//ranking start
if(@$_GET['q']== 4) 
{
$q=mysqli_query($con,"SELECT * FROM rank  ORDER BY score DESC " )or die('Error223');
echo  '<div class="panel title"><div class="table-responsive">
<table class="table table-striped title1" >
<tr style="color:black"><td><b>Rank</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Score</b></td><td></td></tr>';
$c=0;
while($row=mysqli_fetch_array($q) )
{
$e=$row['email'];
$s=$row['score'];
$q12=mysqli_query($con,"SELECT * FROM user WHERE email='$e' " )or die('Error231');
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
<!--home closed-->

<!--IQ test start-->
<div class="container">

<?php if(@$_GET['q']==1) {

$qid=@$_GET['qid'];
$question=@$_GET['question'];
$ans_id=@$_GET['ans_id'];
$q=mysqli_query($con,"SELECT * FROM testq WHERE qid='1'  " );
echo '<div class="panel" style="margin:5%">';

  while($row=mysqli_fetch_array($q) )
  {
  $qid=$row['qid'];
  $question=$row['question'];

  echo '<b>Question &nbsp;'.$qid.'&nbsp;:<br />'.$question.'</b><br /><br />';
  }
  $q=mysqli_query($con,"SELECT * FROM testoption WHERE qid='1' " );
 
  while($row=mysqli_fetch_array($q) )
  {
  $oid=$row['oid'];
  $option=$row['option'];
  echo'<input type="radio" name="ans" value="'.$oid.'">'.$option.'<br /><br />';
  }
  echo'<button type="button"  class="btn btn-primary" onclick="submitAnswer()"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span>Submit</button>';
}

?>


<!--IQ test end-->

<!--career guidelines start-->
<?php if(@$_GET['q']==2) {
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
<!--career guidelines end-->

<!--users start-->
<?php if(@$_GET['q']==3) {

$result = mysqli_query($con,"SELECT * FROM user") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Name</b></td><td><b>Gender</b></td><td><b>Email</b></td><td><b>Mobile</b></td><td><b>Delete</b></td>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$mob = $row['mob'];
	$gender = $row['gender'];
    $email = $row['email'];
	

	echo '<tr><td>'.$c++.'</td><td>'.$name.'</td><td>'.$gender.'</td><td>'.$email.'</td><td>'.$mob.'</td>
	<td><a title="Delete User" href="update.php?demail='.$email.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td></tr>';
}
$c=0;
echo '</table></div></div>';

}?>
<!--user end-->

<!--feedback start-->
<?php if(@$_GET['q']==5) {
$result = mysqli_query($con,"SELECT * FROM `feedback` ORDER BY `feedback`.`date` DESC") or die('Error');
echo  '<div class="panel"><div class="table-responsive"><table class="table table-striped title1">
<tr><td><b>S.N.</b></td><td><b>Subject</b></td><td><b>Email</b></td><td><b>Date</b></td><td><b>Time</b></td><td><b>By</b></td><td></td><td><b>Delete</b></td></tr>';
$c=1;
while($row = mysqli_fetch_array($result)) {
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$subject = $row['subject'];
	$name = $row['name'];
	$email = $row['email'];
	$id = $row['id'];
	 echo '<tr><td>'.$c++.'</td>';
	echo '<td><a title="Click to open feedback" href="dash.php?q=3&fid='.$id.'">'.$subject.'</a></td><td>'.$email.'</td><td>'.$date.'</td><td>'.$time.'</td><td>'.$name.'</td>
	<td><a title="Open Feedback" href="dash.php?q=3&fid='.$id.'"><b><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span></b></a></td>';
	echo '<td><a title="Delete Feedback" href="update.php?fdid='.$id.'"><b><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></b></a></td>

	</tr>';
}
echo '</table></div></div>';
}
?>
<!--feedback closed-->

<!--feedback reading portion start-->
<?php if(@$_GET['fid']) {
echo '<br />';
$id=@$_GET['fid'];
$result = mysqli_query($con,"SELECT * FROM feedback WHERE id='$id' ") or die('Error');
while($row = mysqli_fetch_array($result)) {
	$name = $row['name'];
	$subject = $row['subject'];
	$date = $row['date'];
	$date= date("d-m-Y",strtotime($date));
	$time = $row['time'];
	$feedback = $row['feedback'];
	
echo '<div class="panel"<a title="Back to Archive" href="update.php?q1=2"><b><span class="glyphicon glyphicon-level-up" aria-hidden="true"></span></b></a><h2 style="text-align:center; margin-top:-15px;font-family: "Ubuntu", sans-serif;"><b>'.$subject.'</b></h1>';
 echo '<div class="mCustomScrollbar" data-mcs-theme="dark" style="margin-left:10px;margin-right:10px; max-height:450px; line-height:35px;padding:5px;"><span style="line-height:35px;padding:5px;">-&nbsp;<b>DATE:</b>&nbsp;'.$date.'</span>
<span style="line-height:35px;padding:5px;">&nbsp;<b>Time:</b>&nbsp;'.$time.'</span><span style="line-height:35px;padding:5px;">&nbsp;<b>By:</b>&nbsp;'.$name.'</span><br />'.$feedback.'</div></div>';}
}?>
<!--Feedback reading portion closed-->

<!--add quiz start-->
<?php
if(@$_GET['q']==6 && !(@$_GET['step'])==1 ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Quiz Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6">   <form class="form-horizontal title1" name="form" action="update.php?q=addquiz"  method="POST">
<fieldset>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="name"></label>  
  <div class="col-md-12">
  <input id="name" name="name" placeholder="Enter Quiz title" class="form-control input-md" type="text">
    
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="total"></label>  
  <div class="col-md-12">
  <input id="total" name="total" placeholder="Enter total number of questions" class="form-control input-md" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="right"></label>  
  <div class="col-md-12">
  <input id="right" name="right" placeholder="Enter marks on right answer" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="wrong"></label>  
  <div class="col-md-12">
  <input id="wrong" name="wrong" placeholder="Enter minus marks on wrong answer without sign" class="form-control input-md" min="0" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="time"></label>  
  <div class="col-md-12">
  <input id="time" name="time" placeholder="Enter time limit for test in minute" class="form-control input-md" min="1" type="number">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="tag"></label>  
  <div class="col-md-12">
  <input id="tag" name="tag" placeholder="Enter #tag which is used for searching" class="form-control input-md" type="text">
    
  </div>
</div>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="desc"></label>  
  <div class="col-md-12">
  <textarea rows="8" cols="8" name="desc" class="form-control" placeholder="Write description here..."></textarea>  
  </div>
</div>


<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?>
<!--add quiz end-->

<!--add quiz step2 start-->
<?php
if(@$_GET['q']==6 && (@$_GET['step'])==2  ) {
echo ' 
<div class="row">
<span class="title1" style="margin-left:40%;font-size:30px;"><b>Enter Question Details</b></span><br /><br />
 <div class="col-md-3"></div><div class="col-md-6"><form class="form-horizontal title1" name="form" action="update.php?q=addqns&n='.@$_GET['n'].'&eid='.@$_GET['eid'].'&ch=4 "  method="POST">
<fieldset>
';
 
 for($i=1;$i<=@$_GET['n'];$i++)
 {
echo '<b>Question number&nbsp;'.$i.'&nbsp;:</><br /><!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="qns'.$i.' "></label>  
  <div class="col-md-12">
  <textarea rows="3" cols="5" name="qns'.$i.'" class="form-control" placeholder="Write question number '.$i.' here..."></textarea>  
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'1"></label>  
  <div class="col-md-12">
  <input id="'.$i.'1" name="'.$i.'1" placeholder="Enter option a" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'2"></label>  
  <div class="col-md-12">
  <input id="'.$i.'2" name="'.$i.'2" placeholder="Enter option b" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'3"></label>  
  <div class="col-md-12">
  <input id="'.$i.'3" name="'.$i.'3" placeholder="Enter option c" class="form-control input-md" type="text">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-12 control-label" for="'.$i.'4"></label>  
  <div class="col-md-12">
  <input id="'.$i.'4" name="'.$i.'4" placeholder="Enter option d" class="form-control input-md" type="text">
    
  </div>
</div>
<br />
<b>Correct answer</b>:<br />
<select id="ans'.$i.'" name="ans'.$i.'" placeholder="Choose correct answer " class="form-control input-md" >
   <option value="a">Select answer for question '.$i.'</option>
  <option value="a">option a</option>
  <option value="b">option b</option>
  <option value="c">option c</option>
  <option value="d">option d</option> </select><br /><br />'; 
 }
    
echo '<div class="form-group">
  <label class="col-md-12 control-label" for=""></label>
  <div class="col-md-12"> 
    <input  type="submit" style="margin-left:45%" class="btn btn-primary" value="Submit" class="btn btn-primary"/>
  </div>
</div>

</fieldset>
</form></div>';



}
?><!--add quiz step 2 end-->

<!--remove quiz-->
<?php if(@$_GET['q']==7) {

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
	echo '<tr><td>'.$c++.'</td><td>'.$title.'</td><td>'.$total.'</td><td>'.$sahi*$total.'</td><td>'.$time.'&nbsp;min</td>
	<td><b><a href="update.php?q=rmquiz&eid='.$eid.'" class="pull-right btn sub1" style="margin:0px;background:red"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span>&nbsp;<span class="title1"><b>Remove</b></span></a></b></td></tr>';
}
$c=0;
echo '</table></div></div>';

}
?>


</div><!--container closed-->
</div></div>
</body>
</html>

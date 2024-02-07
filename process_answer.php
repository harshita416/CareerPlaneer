<?php
 include 'dbConnection.php';

// Retrieve answer and question ID from the form submission
$useranswer =  isset($_POST['user_answers']) ? $_POST['user_answers'] : []; 
$questionId = $_POST['question_id'];

// Insert user's answer into the database
foreach ($useranswer as $answer){

    $insertSql = "INSERT INTO user_answers (qid, oid) VALUES ('$questionId', '$answer')";
    $con->query($insertSql);
}

//Determine the next question
$nextquestionSql = "SELECT qid FROM testq WHERE qid > $questionId ORDER BY qid ASC LIMIT 1";
$nextquestionresult  = $con->query($nextquestionSql);

if($nextquestionresult->num_rows > 0){
        $nextquestion=  $nextquestionresult->fetch_assoc()['qid'];
        header("Location: account.php?question_id=$nextquestion");
       
}else {

    exit();
}

?>
<?php
// process_career_assessment.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Collect and process user answers
    $answers = [];
    foreach ($_POST as $key => $value) {
        $answers[$key] = $value;
    }

    // Process the answers (you can add logic to determine career paths)

    // Fetch the next question and options
    $nextQuestion = next($questions);
    $questionId = key($questions);

    if ($nextQuestion !== false) {
        // Output the HTML for the next question
        echo '<p>' . $nextQuestion['question'] . '</p>';
        foreach ($nextQuestion['option'] as $key => $option) {
            echo '<label><input type="radio" name="q' . $questionId . '" value="' . ($key + 1) . '"> ' . $option . '</label>';
        }
    } else {
        // No more questions, display a message or redirect to results page
        echo 'Assessment completed!';
    }
} else {
    // Redirect to the assessment page if accessed directly without submitting
    header("Location: dash.php");
    exit;
}
?>
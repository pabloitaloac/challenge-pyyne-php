<?php

include('base.html');

require 'Form.php';
require 'Input.php';
require 'TextInput.php'; 

$form = new Form();
$form->addInput(new TextInput("firstname", "First Name:", "Bruce"));
$form->addInput(new TextInput("lastname", "Last Name:", "Wayne"));

$content = '';

if ($_SERVER['REQUEST_METHOD']=="POST") {
    // Form sent
    if ($form->validate()) {
        $firstName = $form->getValue("firstname");
        $lastName = $form->getValue("lastname");


        // Successful validation, respond with an HTML message
        $content = '<div class="form-body" >
            <div class="success-show"><h1>Form successfully submitted. 🎉</h1><div class="result"><h3>You sent:</h3><p>' . $firstName . ' ' . $lastName . '</p></div></div>
        </div>';
    } else {
        // Validation fail
        $content = $form->display();
    }
} else {
    // Form not sent yet
    $content = $form->display();
}


echo '<script>';
echo 'document.getElementById("content").innerHTML = ' . json_encode($content) . ';';
echo '</script>';




?>
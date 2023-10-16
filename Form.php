<?php
class Form {

    private $_inputs = [];

    public function __construct() {
        $this->_inputs = array();
    }

    public function addInput(Input $input) {
        $this->_inputs[] = $input;
    }

    public function validate(array $postData) {
        foreach ($this->_inputs as $input) {
            if (empty($postData[$input->name()])) {
                return false;
            }
        }
        return true;
    }
                
    public function getValue($name) {
        if (isset($_POST[$name])) {
            return $_POST[$name];
        }
        return null;
    }
    
    public function display() {

        echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post" class="form-body" >';
        foreach ($this->_inputs as $input) {
            $input->render();
        }
        echo '<div class="single-line" >';
        echo '<div class="line-left" ></div>';
        echo '<div class="line-right" >';
        echo '<input type="submit" value="SUBMIT" class="submit-button" >';
        echo '</div>';
        echo '</div>';
        echo '</form>';
    }


}





?>
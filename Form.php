<?php
class Form {

    protected $_inputs;

    public function __construct() {
        $this->_inputs = array();
    }

    public function addInput(Input $input) {
        $this->_inputs[] = $input;
    }

    public function validate() {
        foreach ($this->_inputs as $input) {
            if (empty($_POST[$input->name()])) {
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

        echo '<style >
        .submit-button {
            background-image: linear-gradient(rgba(187, 255, 187) 0%, rgba(0, 196, 0, 1) 40%);
            text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.5);
            border: 0.5px solid #ccc;
            border-radius: 56px;
            color: #fff;
            cursor: pointer;
            display: inline-block;
            font-size: 10pt;
            font-weight: 800;
            text-align: center;
            text-decoration: none;
            transition: all .3s;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
          }


        .form-body{
            display:flex;
            max-width: 600px;
            margin: auto;
            flex-direction:column;
            border:1px solid green;
            border-radius:10px;
            padding:5px;
            gap:3px;  
        }

        .single-line{
            display:flex;
            height:35px; 
        }

        .line-left{
            display:flex;
            width:20%;
            background-color:rgba(0, 255, 0, 0.14); 
            padding: 5px;
            font-weight:bold; 
        }

        .line-right{
            display:flex;
            width:80%;
            padding: 5px; 
        }

        .single-input{
            display:flex;
            width:100%;
            height:20px;
        }
          
          
        </style>';






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
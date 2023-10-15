<?php
class TextInput extends Input {

    public function __construct($name, $label, $initVal) {
        parent::__construct($name, $label, $initVal);
    }

    public function validate() {
        return !empty($this->_initVal);
    }

    protected function _renderSetting() {
        echo '<input type="text" name="'.$this->_name.'" value="'.$this->_initVal.'"  class="single-input" >';
    }
}

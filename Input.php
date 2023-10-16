<?php
abstract class Input {
    protected $_name;
    protected $_label;
    protected $_initVal;

    abstract public function validate();
    abstract protected function _renderSetting();

    public function __construct($name, $label, $initVal) {
        $this->_name = $name;
        $this->_label = $label;
        $this->_initVal = $initVal;
    }

    public function name() {
        return $this->_name;
    }

    public function render() {
        echo '<div class="single-line">';
        echo '<label for="'.$this->_name.'" class="line-left"  >'.$this->_label.'</label>';
        echo '<div  class="line-right" >';
        $this->_renderSetting();
        echo '</div>';
        echo '</div>';
    }

    public function getValue() {
        return $this->_initVal;
    }
}



?>
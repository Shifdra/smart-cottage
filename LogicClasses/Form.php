<?php

class Form {
    
    private $name;
    private $action;
    private $method;
    private $pathCSS;
    private $form;
    
    public function __construct($aName, $anAction, $aMethod, $aPathCSS) {
        
        $emptyString = '';
        
        if (is_string($aName) && $aName != $emptyString) {
            $this->name = $aName;
        }
        else {
            throw new Exception('Error: Empty or Invalid Name');
        }
        if (is_string($anAction) && $anAction != $emptyString) {
            $this->action = $anAction;
        }
        else {
            throw new Exception('Error: Empty or Invalid Action');
        }
        if (is_string($aMethod) && $aMethod != $emptyString) {
            $this->method = $aMethod;
        }
        else {
            throw new Exception();
        }
        if (is_scalar($aPathCSS) && $aPathCSS != $emptyString) {
            $this->pathCSS = $aPathCSS;
        }
        else {
            throw new Exception('Error: Empty or Invalid CSS Path');
        }
        
        $this->form = "<form "
                    . "name='{$this->name}' "
                    . "action'{$this->action}' "
                    . "method='{$this->method}' "
                    . ">";
        
        $this->form .= "<link "
                    .  "rel='stylesheet' "
                    .  "type='text/css' "
                    .  "href='{$this->pathCSS}' "
                    .  "/>";
                    
    }
    
    public function addCheckBoxes($newCheckBoxes) {
        
        $checkBoxes;
        
        if (is_array($newCheckBoxes)) {
            $checkBoxes = $newCheckBoxes;
        }
        else {
            throw new Exception('Error: Invalid CheckBoxes');
        }
        
        foreach ($checkBoxes as $key => $value) {
            $this->form .= "<div>"
                        .  "<input "
                        .  "type='checkbox' "
                        .  "name='{$key} "
                        .  "value='{$value}' "
                        .  "/>"
                        .  "</div>";
        }
        
    }
    
    public function getForm() {
        
        return $this->form .= "</form>";
        
    }
    
    
}

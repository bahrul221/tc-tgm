<?php

namespace App\View;

/**
 * Description of FormField
 *
 */
class FormField {

    protected $label;
    protected $type;
    protected $name;
    protected $value;
    protected $id;
    protected $class;
    protected $placeholder;
    protected $isRequired = FALSE;
    protected $attr;

    public function __construct( $label = "", $type = "text", $name = "", $value = "", $placeholder = "", $class = "form-control", $id = "", $attr = "" ) {
        $this->label = $label;
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->attr = $attr;
    }
    
    public function setPlaceholder($placeholder){
        $this->placeholder = $placeholder;
    }
    public function getLabel(){
        return $this->label;
    }
    public function isRequired($required){
        $this->isRequired = $required;
    }

    public function render() {
        switch ( $this->type) {
            case 'text':
            case 'email':
                $this->renderText();
                break;
            case 'textarea':
                $this->renderTextarea();
                break;

            default:
                break;
        }
    }

    protected function renderText() {
        $att = "";
        $att .= ($this->type) ? 'type="' . $this->type . '" ' : '';
        $att .= ($this->name) ? 'name="' . $this->name . '" ' : '';
        $att .= ($this->id) ? 'id="' . $this->id . '" ' : '';
        $att .= ($this->class) ? 'class="' . $this->class . '" ' : '';
        $att .= ($this->value) ? 'value="' . $this->value . '" ' : '';
        $att .= ($this->placeholder) ? 'placeholder="' . $this->placeholder . '" ' : '';
        $att .= ($this->isRequired) ? 'required ' : '';
        $att .= ($this->attr) ? $this->attr . ' ' : '';
        $field = '<input ' . $att . ' />';
        echo $field;
    }
    protected function renderTextarea() {
        $att = "";
        $att .= ($this->name) ? 'name="' . $this->name . '" ' : '';
        $att .= ($this->id) ? 'id="' . $this->id . '" ' : '';
        $att .= ($this->class) ? 'class="' . $this->class . '" ' : '';
        $att .= ($this->placeholder) ? 'placeholder="' . $this->placeholder . '" ' : '';
        $att .= ($this->isRequired) ? 'required ' : '';
        $att .= ($this->attr) ? $this->attr . ' ' : '';
        $att .= 'rows="5" ';
        $value = $this->value;
        $field = '<textarea ' . $att . ' >'.$value.'</textarea>';
        echo $field;
    }

}

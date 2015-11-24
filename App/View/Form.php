<?php

namespace App\View;

use App\Miscellaneous\Sessions;

/**
 * Description of Form
 *
 */
class Form {

    protected static $formToken = "";
    protected $name;
    protected $id;
    protected $class;
    protected $method;
    protected $action;
    protected $attr;
    protected $fields = array ();
    protected $isSetToken = TRUE;

    public function __construct( $name = "", $method = "GET", $action = "", $class = "", $id = "", $attr = "" ) {
        $this->name = $name;
        $this->id = $id;
        $this->class = $class;
        $this->method = $method;
        $this->action = $action;
        $this->attr = $attr;
    }

    public function render() {
        $att = "";
        $att .= ($this->name) ? 'name="' . $this->name . '" ' : '';
        $att .= ($this->id) ? 'id="' . $this->id . '" ' : ' ';
        $att .= ($this->class) ? 'class="' . $this->class . '" ' : '';
        $att .= ($this->method) ? 'method="' . $this->method . '" ' : '';
        $att .= ($this->action) ? 'action="' . $this->action . '" ' : '';
        $att .= ($this->attr) ? $this->attr . '"' : '';

        echo '<form ' . $att . '>';
        $this->renderFields();

        if ( $this->isSetToken ) {
            echo self::formToken();
        }

        echo '</form>';
    }

    public function setClass( $class ) {
        $this->class = $class;
    }

    public function addField( $field ) {
        array_push( $this->fields, $field );
    }

    public function renderFields() {
        // choose field mode (normal, horizontal, inline, etc)
        if ( $this->class = "form-horizontal" ) {
            $this->renderFieldsHorz();
            return;
        }
        foreach ( $this->fields as $field ) {
            echo '<div class="form-group">';
            echo '<label>' . $field->getLabel() . '</label>';
            $field->render();
            echo '</div>';
        }
    }

    protected function renderFieldsHorz() {
        foreach ( $this->fields as $field ) {
            echo '<div class="form-group">';
            echo '<label class="col-sm-3 control-label">' . $field->getLabel() . '</label>';
            echo '<div class="col-sm-9">';
            $field->render();
            echo '</div>';
            echo '</div>';
        }
        echo '<div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>';
    }

    // set form token and session
    public static function setFormToken() {
        self::$formToken = md5( uniqid( 'auth', true ) );
        $_SESSION[ 'form_token' ] = self::$formToken;
    }

    public static function getFormToken() {
        return self::$formToken;
    }

    public static function isFormTokenValid( $token ) {
        if ( Sessions::check( 'form_token' ) ) {
            return false;
        }
        if ( Sessions::get( 'form_token' ) == $token ) {
            return true;
        }
        return false;
    }

    public static function formToken() {
        $field = '<input type="hidden" name="form_token" value="' . self::$formToken . '" />';
        return $field;
    }

}

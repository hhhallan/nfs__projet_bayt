<?php
namespace Core;


/**
 * Class Form
 * Permet de générer un formualire rapidement et simplement
 */

class Form {

    /**
     * @var array Données utlisiées par le formulaire
     */
    private $data;

    /**
     * @var string Tag utilisé pour entourer les champs
     */
    public $surround = 'div';

    /**
     * Form constructor.
     * @param array $data Données utlisiées par le formulaire
     */
    public function __construct($data = array()){
        $this->data = $data;
    }

    /**
     * @param $html string Code HTML à entourer
     * @return string
     */
    private function surround($html) {
        return '<'.$this->surround.' class="form-control">'.$html.'</'.$this->surround.'>';
    }

    /**
     * @param $index string Index de la valeur à récupérer
     * @return mixed|null
     */
    private function getValue($index) {
        return isset($this->data[$index]) ? $this->data[$index] : null;
    }

    /**
     * @param $name string
     * @param $label string
     * @return string
     */
    public function inputText($name, $label = 'Label') {
        return $this->surround('<label for="'.$label.'"></label><input type="text" id="'. $name .'" name="'. $name .'" value="' .  $this->getValue($name) .'"/>');
    }

    /**
     * @param $formName string
     * @return string
     */
    public function submit($formName) {
        return $this->surround('<input type="submit" name="submitted-'.$formName.'" id="submitted-'.$formName.'">Valider</input>');
    }
}
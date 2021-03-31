<?php

namespace Core\Controller;

class Controller
{

    public function encodeChars($data)
    {
        $encoded = [];
        foreach ($data as $key => $element) {
            $encoded[$key] = htmlspecialchars($element);
        }
        return $encoded;
    }

    public function render($view, $params = [])
    {
        $pathView = str_replace(".", "/", $view);
        ob_start();
        extract($params);
        require ROOT . "App/Views/$pathView.php";
        $content = ob_get_clean();
        require ROOT . "App/Views/default.php";
    }

    public function cleanXss($value)
    {
        return trim(strip_tags($value));
    }

    public function debug($tableau)
    {
        echo '<pre>';
        print_r($tableau);
        echo '</pre>';
    }

    public function validationText($errors, $data, $key, $min, $max)
    {
        if (!empty($data)) {
            if (mb_strlen($data) < $min) {
                $errors[$key] = 'Minimum ' . $min . ' caractères.';
            } elseif (mb_strlen($data) > $max) {
                $errors[$key] = 'Maximum ' . $max . ' caractères.';
            } else {
                // no error sur ce champ
            }
        } else {
            $errors[$key] = 'Veuillez renseigner ce champ.';
        }

        return $errors;
    }
}
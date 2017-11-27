<?php

    namespace string_HtmlFunctions;

    class stringFunctions
    {
        static function printThisInH1($string)
        {
            echo '<h1>'.$string.'</h1>';
        }
        static function printThisInH3($string)
        {
            echo '<h3>'.$string.'</h3>';
        }
        static function horizontalRule() {
            echo '<hr>';
        }
    }
?>
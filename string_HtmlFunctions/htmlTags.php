<?php

    namespace string_HtmlFunctions;

    class htmlTags {
        static public function tableFormat() {
            echo "<table cellpadding='5px' border='1px' style='border-collapse: collapse'>";
        }
        static public function tableHeader($text) {
            echo '<th>'.$text.'</th>';
        }
        static public function tableContent($text) {
            echo '<td>'.$text.'</td>';
        }
        static public function breakTableRow() {
            echo '</tr>';
        }
        static public function closeTable() {
            echo '</table>';
        }
    }
?>
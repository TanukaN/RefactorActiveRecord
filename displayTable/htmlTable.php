<?php

    namespace displayTable;
    use string_HtmlFunctions\htmlTags as htmlTags;

    class htmlTable {
        static function makeTable($record) {
            htmlTags::tableFormat();
            foreach($record[0] as $key=>$value) {
                htmlTags::tableHeader($key);
            }
            htmlTags::breakTableRow();
            foreach($record as $key=>$value) {
                foreach($value as $key2=>$value2) {
                    htmlTags::tableContent($value2);
                }
                htmlTags::breakTableRow();
            }
            htmlTags::closeTable();
        }
    }
?>
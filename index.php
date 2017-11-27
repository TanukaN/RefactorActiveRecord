<?php

    use displayTable\htmlTable as htmlTable;
    use collectionClass\accounts as accounts;
    use collectionClass\todos as todos;
    use modelClass\account as account;
    use modelClass\todo as todo;
    use string_HtmlFunctions\stringFunctions as stringFunctions;

    //turn on debugging messages
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);

    //Defining autoload function to attempt to load undefined class
        function autoloader_class($class) {
            $class = str_replace ('\\', '/', $class) . '.php';
            include ($class);
        }

    spl_autoload_register('autoloader_class');

    $obj=new main();

    class main {
        public function __construct() {
            /**********************************ACCOUNTS TABLE***********************************/
            stringFunctions::printThisInH1('Select One Record From Accounts Table');            //Select One Record
            stringFunctions::printThisInH3('Record with id = 1 is selected');
            $record = accounts::findOne(1);
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Select All Records From Accounts Table');           //Select All Records
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Insert New Record in Accounts Table');              //Insert One Record
            $obj = new account();
            $obj->email = "tn76@njit.edu";
            $obj->fname = "Tanuka";
            $obj->lname = "N";
            $obj->phone = "9876543210";
            $obj->birthday = "1990-10-15";
            $obj->gender = "female";
            $obj->password = "12345";
            $newID = $obj->save();
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Update New Record in Accounts Table');              //Update One Record
            stringFunctions::printThisInH3('Updated lname = Nayak where id = ' .$newID);
            $obj = new account();
            $obj->id = $newID;
            $obj->lname = "Nayak";
            $obj->save();
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Delete Record From Accounts Table');                //Delete One record
            $obj = new account();
            $obj->id = $newID;
            $obj->delete();
            StringFunctions::printThisInH3('Record with id = '. $newID .'  is deleted');
            $record = accounts::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            /**************************************TODOS TABLE***********************************/
            stringFunctions::printThisInH1('Select One Record From Todos Table');               //Select One Record
            stringFunctions::printThisInH3('Record with id = 1 is selected');
            $record = todos::findOne(1);
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Select All Records From Todos Table');              //Select All Records
            $record = todos::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Insert New Record in Todos Table');                 //Insert One Record
            $obj = new todo();
            $obj->owneremail = "tn@njit.edu";
            $obj->ownerid = "34";
            $obj->createddate = "2017-11-14 00:00:00";
            $obj->duedate = "2017-11-19 00:00:00";
            $obj->message = "Active Record";
            $obj->isdone = "1";
            $newID = $obj->save();
            $record = todos::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Update New Record in Todos Table');                 //Update One Record
            stringFunctions::printThisInH3('Updated owneremail = tn76@njit.edu where id = ' .$newID);
            $obj = new todo();
            $obj->id = $newID;
            $obj->owneremail = "tn76@njit.edu";
            $obj->save();
            $record = todos::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();

            stringFunctions::printThisInH1('Delete Record From Todos Table');                   //Delete One record
            $obj = new todo();
            $obj->id = $newID;
            $obj->delete();
            stringFunctions::printThisInH3('Record with id = '. $newID .'  is deleted');
            $record = todos::findAll();
            htmlTable::makeTable($record);
            stringFunctions::horizontalRule();
        }
    }
?>



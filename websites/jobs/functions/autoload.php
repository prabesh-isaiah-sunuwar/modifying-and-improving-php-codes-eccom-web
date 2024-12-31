<?php
function autoloaderloaded($classNameOfthefunctions)
{
    //https://www.geeksforgeeks.org/what-is-autoloading-classes-in-php/
    //Turns the namespace to directory
    $fileKoNameHoHere = str_replace('\\', '/', $classNameOfthefunctions) . '.php';

    //This is the files directory it is in.
    $fileKoOutput = '../functions/' . $fileKoNameHoHere;

    //if the file exist ,then require the file
    if (file_exists($fileKoOutput)) {
        require_once $fileKoOutput;
    }
}
spl_autoload_register('autoloaderloaded');

//index.php for user
// Importing the functions namespace and OverallDatabaseTable class
//Categories will appear in the nav bar everytime it is added
//https://www.w3schools.com/php/php_oop_classes_objects.asp
$categoryfornav  = new functions\OverallDatabaseTable($pdo, 'category', 'id');
$categories = $categoryfornav->searchingForAll();

// Importing the functions namespace and threecolumns class

//https://www.w3schools.com/php/php_oop_classes_objects.asp
$table_name = "job";
$col_name = "title";
$col_name1 = "location";
$search3colObj = new functions\threecolumns($pdo, $table_name, $col_name, $col_name1);


// Importing the functions namespace and select class


$table_name = "job";
$col_name = "id";
$jobObjinuserindex = new functions\select($pdo, $table_name, $col_name);
//index.php for user

//it.php--------------------------------------------------------------------
$categoryfornav = new functions\OverallDatabaseTable($pdo, 'category', 'id');
//Categories will appear in the nav bar everytime it is added
$categories = $categoryfornav->searchingForAll();

//https://www.w3schools.com/php/php_oop_classes_objects.asp

//initialise object here
//This will display the job title and description via closing date and the catgoryid
$table_name = "job";
$col_name = "categoryId";
$col_name1 = "closingDate";
$job3colObj = new functions\threecolumns($pdo, $table_name, $col_name, $col_name1);
//it.php---------------------------------------------------------------------

//hr.php----------------------------------------------------------------------
//https://www.w3schools.com/php/php_oop_classes_objects.asp
$categoryfornav = new \functions\OverallDatabaseTable($pdo, 'category', 'id');
//Categories will appear in the nav bar everytime it is added
$categories = $categoryfornav->searchingForAll();

//initialise object here
//This will display the job title and description via closing date and the catgoryid
$table_name = "job";
$col_name = "categoryId";
$col_name1 = "closingDate";
$job3colObj = new \functions\threecolumns($pdo, $table_name, $col_name, $col_name1);

//hr.php----------------------------------------------------------------------


//sales.php----------------------------------------------------------------------
//https://www.w3schools.com/php/php_oop_classes_objects.asp
$categoryfornav = new \functions\OverallDatabaseTable($pdo, 'category', 'id');
//Categories will appear in the nav bar everytime it is added
$categories = $categoryfornav->searchingForAll();



//initialise object here
//This will display the job title and description via closing date and the catgoryid
$table_name = "job";
$col_name = "categoryId";
$col_name1 = "closingDate";
$job3colObj = new \functions\threecolumns($pdo, $table_name, $col_name, $col_name1);

//sales.php----------------------------------------------------------------------

//careeradvice.php
//https://www.w3schools.com/php/php_oop_classes_objects.asp
//Categories will appear in the nav bar everytime it is added
$overallcategorytable = new \functions\OverallDatabaseTable($pdo, 'category', 'id');
$categories = $overallcategorytable->searchingForAll();

//careeradvice.php
<?php
//this is the directory name for DatabaseTable.php
//https://www.w3schools.com/php/php_namespaces.asp
namespace functions;
//use this to 'include' PDO , 'Exception','DateTime'
use PDO;
use Exception;
use DateTime;
//introduce a class name
//https://www.w3schools.com/php/php_oop_classes_objects.asp
class OverallDatabaseTable
{
    private $pdo; //this is refered to database.php
    private $table; //This is tablename of the data you want to extract the data from
    private $pKisPrimaryKey; // this is the column 'id'.

    // using of constructers
    public function __construct($pdo, $table, $pKisPrimaryKey)
    {
        $this->pdo = $pdo;
        $this->table = $table;
        $this->pKisPrimaryKey = $pKisPrimaryKey;
    }
    //this is for searching the values under certain conditions
    public function searching($field, $value)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table . ' WHERE ' . $field . ' = :value');

        $criteria = [
            'value' => $value
        ];
        $stmt->execute($criteria);

        return $stmt->fetchAll();
    }
    //This searches for all the data attributes
    public function searchingForAll()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM ' . $this->table);

        $stmt->execute();

        return $stmt->fetchAll();
    }
    //This adds data to the database
    public function inserting($recordingthecopy)
    {
        $keys = array_keys($recordingthecopy);

        $values = implode(', ', $keys);
        $valuesWithColon = implode(', :', $keys);

        $eskostatement = $this->pdo->prepare('INSERT INTO ' . $this->table . ' (' . $values . ') VALUES(:' . $valuesWithColon . ')');
        $eskostatement->execute($recordingthecopy);
    }
    //This deletes the data from the database looking at the id
    public function deletingthe($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM ' . $this->table . ' WHERE ' . $this->pKisPrimaryKey . ' = :id');
        $criteria = [
            'id' => $id
        ];
        $stmt->execute($criteria);
    }

    //This is for editing the data 
    public function savingthe($recordingthecopy)
    {
        try {
            $this->inserting($recordingthecopy);
        } catch (Exception $e) {
            $this->updating($recordingthecopy);
        }
    }
    //This is for editing the data
    public function updating($recordingthecopy)
    {
        $query = 'UPDATE ' . $this->table . ' SET ';

        $parameters = [];
        foreach ($recordingthecopy as $key => $value) {
            $parameters[] = $key . ' = :' . $key;
        }

        $query .= implode(', ', $parameters);
        $query .= ' WHERE ' . $this->pKisPrimaryKey . ' = :pKisPrimaryKey';
        $recordingthecopy['pKisPrimaryKey'] = $recordingthecopy[$this->pKisPrimaryKey];

        $eskostatement = $this->pdo->prepare($query);
        $eskostatement->execute($recordingthecopy);
    }
}
//this is the directory name for DatabaseTable.php
//https://www.w3schools.com/php/php_oop_classes_objects.asp
class select
{
    private $table_name; //This is the table name of the data
    private $col_name; //This is the attribute of one column of the data table
    private $pdo; //this is refered to database.php

    // using of constructers
    public function __construct($pdo, $table_name, $col_name)
    {
        $this->pdo = $pdo;
        $this->table_name = $table_name;
        $this->col_name = $col_name;
    }
    //This uses the categoryid to filter out the unwanted data
    public function disPartCol($categoryId)
    {
        //Filtering of the category by the latest date to the oldest date
        $queryofthejobtable = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE $this->col_name   = :colData   ORDER BY closingDate  DESC");
        $statementofquery = ['colData' => $categoryId];
        $queryofthejobtable->execute($statementofquery);
        return $queryofthejobtable->fetchAll();
    }
    //This doesnt have any where condition so it give all the data by looking at the cloding date column sorted out from the latest date to the oldest data
    public function disPartCol1()
    {
        //https://www.w3schools.com/php/php_mysql_select_orderby.asp
        //Filtering of the category by the latest date to the oldest date
        $queryofthejobtable = $this->pdo->prepare("SELECT * FROM $this->table_name ORDER BY closingDate DESC");

        $queryofthejobtable->execute();
        return $queryofthejobtable->fetchAll();
    }
    //This uses the id column to filter out the unwanted data
    public function phpofapplicant($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name = :id");
        $id = $_GET['id'];

        $stmt->execute(['id' => $id]);

        return  $stmt->fetchAll();
    }
    //This fetches all the data from any of the attributes
    public function manageuser()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name");


        $stmt->execute();

        return  $stmt->fetchAll();
    }

    //This fetches all the data from any of the attributes
    public function selectcategory()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name");


        $stmt->execute();

        return  $stmt->fetchAll();
    }
    //This uses the jobid to filter out the unwanted data
    public function selectApp($jobId)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE $this->col_name = :id");
        $jobId = $_GET['id'];
        $stmt->execute(['id' => $jobId]);
        return $stmt->fetchAll();
    }

    //This uses the jobid to filter out the unwanted data
    public function selectCat($jobId)
    {

        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE $this->col_name = :id");

        $stmt->execute(['id' => $jobId]);
        return $stmt->fetch();
    }







    //This uses the categoryid to filter out the unwanted data using an array
    public function selectingJob1($jobtable)
    {

        $querystmtofcategory = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE $this->col_name = :categoryId");

        $querystmtofcategory->execute(['categoryId' => $jobtable['categoryId']]);

        return $querystmtofcategory->fetch(PDO::FETCH_ASSOC);
    }




    //This doesnt have any where condition so it give all the data by looking at the cloding date column sorted out from the latest date to the oldest data

    public function userindex()
    {
        //https://www.w3schools.com/php/php_mysql_select_orderby.asp

        //Filtering of the category by the latest date to the oldest date
        $statementofqueryofthejobwitearliestclosestdate = $this->pdo->prepare("SELECT * FROM $this->table_name ORDER BY closingDate ASC LIMIT 5");
        //https://www.w3schools.com/php/php_mysql_select_limit.asp

        $statementofqueryofthejobwitearliestclosestdate->execute();
        return $statementofqueryofthejobwitearliestclosestdate->fetchAll();
    }
    //This uses the id to filter out the unwanted data
    public function respondenquiry()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name = :id");


        $stmt->execute(['id' => $_GET['id']]);
        //https://www.php.net/manual/en/pdostatement.fetch.php
        $managingenquiry = $stmt->fetch(PDO::FETCH_ASSOC);
        return $managingenquiry;
    }

    //This updates the data by looking the which id have been chosen
    public function respondasadminorstaff()
    {
        $id = $_POST['hidden'];
        $fullname = $_POST['adminorstaffFullname'];
        $response = $_POST['adminorstaffresponse'];
        $responseUpdatedPDO = $this->pdo->prepare("UPDATE $this->table_name SET status = 'complete',adminorstaffFullname = '$fullname',adminorstaffresponse = '$response' WHERE $this->col_name = $id ");


        $responseUpdatedPDO->execute();

        $managingenquiry = $responseUpdatedPDO->fetch();
        return $managingenquiry;
    }
    //This archives the data by looking at which jobid have been chosen. After the update, the status will mark archived or unarchived
    public function archiveupdate()
    {
        //declare variables
        $jobId = $_POST['jobId'];
        $jobId = $_POST['jobId'];
        if (isset($_POST['archive'])) {

            $status = 0;
        } elseif (isset($_POST['unarchive'])) {
            $status = 1;
        }

        $stmt = $this->pdo->prepare("UPDATE job SET status = $status WHERE $this->col_name = :jobId");
        $stmt->execute(['jobId' => $jobId]);
        return $stmt;
    }
}
//new classname is introduced
//https://www.w3schools.com/php/php_oop_classes_objects.asp
class threecolumns
{
    private $table_name; //This is the table name of the data
    private $col_name; //This is the attribute of a column of the data table
    private $col_name1; //This is the attribute of another column of the data table
    private $pdo; //this is refered to database.php

    // using of constructers
    public function __construct($pdo, $table_name, $col_name, $col_name1)
    {
        $this->pdo = $pdo;
        $this->table_name = $table_name;
        $this->col_name = $col_name;
        $this->col_name1 = $col_name1;
    }
    //This uses two columns for the query the columns are date and jobid
    public function job3columns()
    {
        $stmtt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name = 2 AND $this->col_name1 > :date");

        $date = new DateTime();

        $values = [
            'date' => $date->format('Y-m-d')
        ];

        $stmtt->execute($values);
        $stmt = $stmtt->fetchAll();
        return $stmt;
    }
    //This uses two columns for the query the columns are date and jobid
    public function job3columns1()
    {
        $stmtt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name = 1 AND $this->col_name1 > :date");

        $date = new DateTime();

        $values = [
            'date' => $date->format('Y-m-d')
        ];

        $stmtt->execute($values);
        $stmt = $stmtt->fetchAll();
        return $stmt;
    }
    //This uses two columns for the query the columns are date and jobid
    public function job3columns2()
    {
        $stmtt = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name = 4 AND $this->col_name1 > :date");

        $date = new DateTime();

        $values = [
            'date' => $date->format('Y-m-d')
        ];

        $stmtt->execute($values);
        $stmt = $stmtt->fetchAll();
        return $stmt;
    }

    //CONCAT() is used to bring three strings together
    //:jobandlocationsearch is used to search the value of the title and location
    // '%',:jobandlocationsearch,'%' is used to find any value that contains the data of the job title or location within any characters.
    public function job3columnssearch()
    {
        //https://stackoverflow.com/questions/4005251/select-from-tbl-where-clm-like-concat-other-sql-query-limit-1-how
        $jobandlocationsearch = $_POST["jobandlocationsearch"];
        $queryofjobtofindtitleandlocationforsearchbutton = $this->pdo->prepare("SELECT * FROM $this->table_name WHERE  $this->col_name LIKE CONCAT('%', :jobandlocationsearch, '%') OR $this->col_name1 LIKE CONCAT('%', :jobandlocationsearch, '%')");


        $queryofjobtofindtitleandlocationforsearchbutton->execute(['jobandlocationsearch' => $jobandlocationsearch]);
        //https://www.php.net/manual/en/pdostatement.fetch.php
        $theoutputofthesearchbar = $queryofjobtofindtitleandlocationforsearchbutton->fetchAll(PDO::FETCH_ASSOC);

        return $theoutputofthesearchbar;
    }
}
//new classname is introduced
//https://www.w3schools.com/php/php_oop_classes_objects.asp
class twotablesand3columns
{
    private $table_name; //This is the table name of the data
    private $table_name1; //This is another table name of the data
    private $col_name; //This is the attribute of one column of the data table
    private $col_name1; //This is the attribute of another column of the data table
    private $col_name2; //This is the attribute of another column of the data table as well
    private $pdo; //this is refered to database.php

    // using of constructers
    public function __construct($pdo, $table_name, $col_name, $col_name1, $col_name2, $table_name1)
    {
        $this->pdo = $pdo;
        $this->table_name = $table_name;
        $this->table_name1 = $table_name1;
        $this->col_name = $col_name;
        $this->col_name1 = $col_name1;
        $this->col_name2 = $col_name2;
    }
    //I needed the three columns for this query because i need to verify which user is logging in. I used the attribute username, password and type_of_user attributes. Espcially with the attribute 'type_of_user' you could verify which user is the admin , staff or user.
    //UNION was used to include admin,staff and user together.
    public function loginquery()
    {
        $login_account_usname = $_POST['username'];
        $login_account_psword = $_POST['password'];
        $userkotype_of_this_acc = $_POST['type_of_user'];
        $statementofvisitor_and_user = $this->pdo->prepare("(SELECT username, password, type_of_user FROM $this->table_name WHERE  $this->col_name = :username AND $this->col_name1 = :password AND $this->col_name2 =:type_of_user) UNION (SELECT username, password, type_of_user FROM $this->table_name1 WHERE  $this->col_name = :username AND $this->col_name1 = :password AND $this->col_name2 =:type_of_user)");

        $statementofvisitor_and_user->execute([':username' => $login_account_usname, ':password' => $login_account_psword, ':type_of_user' => $userkotype_of_this_acc]);
        $determinewhichacc_logs_in = $statementofvisitor_and_user->fetch(PDO::FETCH_ASSOC);
        //https://www.php.net/manual/en/pdostatement.fetch.php


        return $determinewhichacc_logs_in;
    }
}

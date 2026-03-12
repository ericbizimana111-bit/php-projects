<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

    // We are using:
    // Library: phpoffice/phpspreadsheet
    // Class: Spreadsheet
    // Writer: Xlsx


    //vendor = folder created by Composer.
    //autoload.php = automatically loads installed packages.
    //Without this line: you cannot use phpspreadsheet 
    require 'vendor/autoload.php';

    //importing classes into our file to use it easily 
    //   /this \ is called Namespace separator works like forlderstructure like PhpOffice/PhpSpreadsheet
    //Without it, you would have to write:
    // $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

    //creating spreedsheet object
    //new is used to create an object it calls the constructort of the class;
    //variale store data or objects
    $spreadsheet = new Spreadsheet();


    //getting the active sheet
    //getActiveSheet() is a method inside class that returns the current working sheet 
    $sheet = $spreadsheet->getActiveSheet();

    //then write data into cells 
    //setCellValue() Method that sets the value of a cell.
    //A is the columns 1 is the number of the row 
    // -> Object operator. It means: Access a method or property of an objec
    $sheet->setCellValue('A1', 'student Name');
    $sheet->setCellValue('B2', 'score');

    $sheet->setCellValue('A2', 'Eric');
    $sheet->setCellValue('B2', '100');

    $sheet->setCellValue('A3', 'Honoree');
    $sheet->setCellValue('B3', '100');

    $sheet->setCellValue('A4', 'albert');
    $sheet->setCellValue('B4', '100');

    //creating writer object
    //Xlsx is the class used to save Excel in .Xlsx format
    //you pass the spreasheet object inisde the parenthesis
    $writer = new Xlsx($spreadsheet);


    //saving the file
    //save() is a method that is used write the file to the disk
    //students.xlsx is the filename
    //  File name.If you write: 'subfolder/students.xlsx'It saves inside that folder.
    $writer->save('students.xlsx');


    //displaying the output
    echo "Excel file has been created successfully";

    //""  allows varibles inside 
    //''it doesnot allow variables inside


    $name = 'hello';
    echo "hello $name";
    echo 'hello $name';
    //-> for the object access \namespace separator
    //new  is used to create object 





    //Conceptual Flow (Big Picture)//

    // 1)Load library
    // 2)Create spreadsheet object
    // 3)Get sheet
    // 4)Insert data
    // 5)Create writer
    // 6)Save file
    // 7)Output message
    // 8)That is the complete Excel creation lifecycle.


    // | Concept            | Class                                                                            | Object (Instance)                                                       |
    // | ------------------ | ---------------------------------------------------------------------------------| ----------------------------------------------------------------------- |
    // | Definition         | Aclass is ablueprint that defines properties (variables) and methods (functions).| An **object (instance)** is a real, usable entity created from a class. |
    // | Purpose            | Describes **what an object should have and do**.                                 | Represents **a specific example** of the class.                         |
    // | Memory Allocation  | No memory is allocated for data until objects are created.                       | Memory is allocated when the object is created.                         |
    // | Real-world Analogy | House blueprint                                                                  | Actual house built from the blueprint                                   |
    // | Programming Term   | Class                                                                            | Instance / Object                                                       |
    // | Quantity           | One class can define many objects                                                | Many objects can be created from one class                              |















    ?>

</body>

</html>
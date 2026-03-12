<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php



    // require 'vendor/autoload.php';

    // use PhpOffice\PhpWord\PhpWord;
    // use PhpOffice\PhpWord\IOFactory;


    // $phpWord = new PhpWord();

    // $section = $phpWord->addSection();


    // $section->addTitle("student report", 1);
    // $section->addText("Welcome to word page");
    // $section->addText("this is the word file created by Bizimana");
    // $section->addText("Welcome to word page");
    // $section->addText("this is the word file created by Bizimana");


    // //table
    // $table = $section->addTable();

    // $table->addRow();
    // $table->addCell(3000)->addText("student");
    // $table->addCell(3000)->addText("Marks");

    // $table->addRow();
    // $table->addCell(3000)->addText("Eric");
    // $table->addCell(3000)->addText(100);

    // //add page break
    // $section->addText("End of the report");


    // $writer = IOFactory::createWriter($phpWord, 'Word2007');
    // $writer->save('wordfile.docx');




    // | Component                        | Explanation                                                     |
    // | -------------------------------- | --------------------------------------------------------------- |
    // | `require 'vendor/autoload.php'`  | Loads Composer’s autoloader so PHP can access installed classes |
    // | `use PhpOffice\PhpWord\PhpWord;` | Imports the main class for document creation                    |
    // | `$phpWord = new PhpWord();`      | Creates a document object (like opening Microsoft Word)         |
    // | `$phpWord->addSection();`        | A Word document must contain at least one section               |
    // | `$section->addText();`           | Adds paragraph text into the document                           |
    // | `IOFactory::createWriter()`      | Creates a writer object to convert PHPWord object to file       |
    // | `'Word2007'`                     | Specifies output format (.docx)                                 |
    // | `$writer->save()`                | Physically writes file to disk                                  |






    // require 'vendor/autoload.php';

    // use PhpOffice\PhpWord\PhpWord;
    // use PhpOffice\PhpWord\IOFactory;

    // // 1. Create PHPWord object
    // $phpWord = new PhpWord();

    // // 2. Add a section
    // $section = $phpWord->addSection();

    // // 3. Add content
    // $section->addText("Hello World!");
    // $section->addText("This is a Word file created using PHP.");

    // // 4. Save the file
    // $writer = IOFactory::createWriter($phpWord, 'Word2007');
    // $writer->save('wordfile.docx');

    // echo "Word file created successfully.";



    // 1. Create Document Object
    // ↓
    // 2. Add Section
    // ↓
    // 3. Add Text Elements to Section
    // ↓
    // 4. Create Writer
    // ↓
    // 5. Save → Convert to .docx



    // | Code | Real World Meaning |
    // | -------------- | ------------------- |
    // | new PhpWord() | Open Microsoft Word |
    // | addSection() | Insert a page |
    // | addText() | Type paragraphs |
    // | createWriter() | Click “Save As” |
    // | save() | Save the file |



    require 'vendor/autoload.php';


    //this are the classes
    use PhpOffice\PhpWord\PhpWord;
    use PhpOffice\PhpWord\IOFactory;

    //creating the phpword object
    $phpword = new PhpWord();

    //accessing the method of the class using the object crated form that calss
    //section is like the page
    $section = $phpword->addSection();

    //so in that section or page we need to add text
    //adding content to the sections
    //$section->addText() → calls a method on that returned object
    //addText() is NOT inside addSection().

    $section->addText("Welcome Bizimana Eric");
    $section->addText("You are welcomed to word file you created using phhp");

    //save the file;
    //IOFactory is a focatory class
    $writer = IOFactory::createWriter($phpword, 'Word2007');
    $writer->save('wordfile.docx');

    // echo " The word file is created successfully";


    // | Step | Location |
    // | -------------- | -------------- |
    // | addSection() | Memory |
    // | addText() | Memory |
    // | createWriter() | Memory |
    // | save() | Disk |
    // | echo | Browser Output |










    // 1️⃣ Line 1 — Creating the Writer
    // $writer = IOFactory::createWriter($phpWord, 'Word2007');

    // What is IOFactory?

    // IOFactory is a factory class.

    // Factory pattern means:

    // A class responsible for creating objects.

    // You don’t directly create the writer like this:

    // new Word2007();


    // Instead, you use:

    // IOFactory::createWriter(...)


    // So this line:

    // Takes the $phpWord object (your document in memory)

    // Reads its internal structure (sections, text, tables, etc.)

    // Creates a Writer object capable of exporting to a specific format

    // What Does 'Word2007' Mean?

    // It tells the factory:

    // "Generate output in .docx format (Office Open XML)."

    // Possible formats include:

    // Format Name Output
    // 'Word2007' .docx
    // 'ODText' .odt
    // 'HTML' .html

    // So now:

    // $writer → Object responsible for converting document model into .docx file


    // ⚠️ Important:
    // Still nothing is saved yet.
    // We just prepared the exporter.

    // 2️⃣ Line 2 — Saving the File
    // $writer->save('sample.docx');


    // Now the real file generation happens.

    // Internally this method:

    // Reads $phpWord object

    // Loops through all sections

    // Loops through all elements (text, tables, images)

    // Generates XML files:

    // document.xml

    // styles.xml

    // relationships

    // Compresses them into ZIP

    // Writes them to disk as:

    // sample.docx


    // After this line:

    // ✅ The file physically exists on your server.

    // Before this line:

    // ❌ The document existed only in memory.

    // 3️⃣ Line 3 — Echo Statement
    // echo "Word file created successfully.";


    // This has NOTHING to do with file creation.

    // It simply prints a message to the browser.

    // It is just feedback for the user.




    ?>
</body>

</html>
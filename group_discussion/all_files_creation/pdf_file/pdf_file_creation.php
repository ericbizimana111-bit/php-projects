<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php



    require('fpdf.php');


    $pdf = new FPDF('P', 'mm', 'A4');
    //'A4' printable width is 180mm

    $pdf->AddPage();
    $pdf->Image('WIN_20250927_12_21_47_Pro.jpg', 10, 10, 40);

    $pdf->Ln(25); //25mm

    $pdf->SetFont('Arial', 'B', 18);
    $pdf->Cell(0, 10, 'STUDENT REPORT', 0, 1, 'C');

    $pdf->Ln(5);

    $pdf->SetFont('Arial', '', 12);
    $pdf->MultiCell(0, 8, 'this report contains student information');

    //creating the table header 
    //1 IS FOR BORDER
    $pdf->SetFont('Arial', 'B', 19);
    $pdf->Cell(60, 10, 'Name', 1);
    $pdf->Cell(40, 10, 'Score', 1);
    $pdf->Cell(40, 10, 'Grade', 1);

    $pdf->Ln();


    //table data
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60, 10, 'BIZIMANA ERIC', 1);
    $pdf->Cell(40, 10, '100', 1);
    $pdf->Cell(40, 10, 'A', 1);

    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(60, 10, 'Solange', 1);
    $pdf->Cell(40, 10, '100', 1);
    $pdf->Cell(40, 10, 'A', 1);

    $pdf->Ln();


    //footer 

    $pdf->Ln(20);
    $pdf->SetFont('Arial', 'I', 20);
    $pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d'), 0, 1, 'C');

    //save the file 
    $pdf->Output('F', 'student_report.pdf');

    echo "PDF file created successfully";








    /*

    // require() loads the FPDF class file.
    // If file not found → PHP stops execution.
    // Now PHP knows what FPDF class is.
    // If you skip this → error: Class FPDF not found
    require('fpdf.php');

    //creating fpdf object 
    //FPDF  is a class 
    // new FPDF() creates an instance (object).
    // $pdf is now an object containing all PDF methods.
    // Memory is allocated to store document data.
    $pdf = new FPDF();




    // | Parameter | Meaning             |
    // | --------- | ------------------- |
    // | L         | Landscape //how wiser    |
    // | mm        | Unit in millimeters |
    // | A4        | Page size           |


    // Position,Value,Meaning,Description
    // 1st,'L',Orientation,Sets the page to Landscape (wider than it is tall). Use 'P' for Portrait.
    // 2nd,'mm',Unit,"Sets the measure to Millimeters. This means when you tell the PDF to move 10 units, it moves 10mm."
    // 3rd,'A4',Format,"Sets the standard Page Size. A4 is the most common, but you could use Legal, Letter, or a custom array."


    // true: Enables UTF-8 mode. This allows you to use fonts that display symbols, Cyrillic, Greek, or Arabic characters.
    // false (Default): Sticks to standard Windows-1252 or Latin-1 encoding (which breaks if you try to use a symbol like € without manual conversion).
    //$pdf is object that can access all the properties and methods of the class FPDF
    $pdf = new FPDF('L', 'mm', 'A4', true);


    //adding the page 
    //when no page no place to weite the contents 
    //a blank page buffer is created 
    $pdf->addPage();



    //setting the font 
    // | Parameter | Meaning     |
    // | --------- | ----------- |
    // | Arial     | Font family |
    // | B         | Bold        |
    // | 16        | Font size   |

    //If you do not call SetFont() before writing text → error.
    $pdf->setFont('Arial', 'B', 16);



    //writing the text using cell()
    // | Parameter | Meaning        |
    // | --------- | -------------- |
    // | 40        | Width of cell  |
    // | 10        | Height of cell |
    // | Text      | Content        |


    //$pdf->Cell(width, height, text, border, ln, align);
    // | Parameter | Meaning               |
    // | --------- | --------------------- |
    // | border    | 1 = show border       |
    // | ln        | 1 = move to next line |
    // | align     | L, C, R               |
    $pdf->Cell(40, 10, 'Hello People This is the pdf file made by Eric', 1, 1, 'C');


    // Why MultiCell?
    // Automatically wraps text
    // Moves to next line automatically
    //MultiCell(width, height, text, border, align, fill)
    //$pdf->MultiCell(90, 50, 'long text here ');


    //adding the line break
    //moves cursor down by 10mm
    $pdf->Ln(10);


    //add Image
    // | Parameter | Meaning    |
    // | --------- | ---------- |
    // | logo.png  | Image file |
    // | 10        | X position |
    // | 10        | Y position |
    // | 30        | Width      |
    $pdf->Image('logo.png', 10, 10, 30);



    // | Mode | Meaning            |
    // | ---- | ------------------ |
    // | I    | Display in browser |
    // | D    | Force download     |
    // | F    | Save to server     |
    // | S    | Return as string   |
    $pdf->Output('F', 'pdffile.pdf');

    echo "PDF file created successfully";


| Feature          | Used Function      |
| ---------------- | ------------------ |
| Object creation  | new FPDF()         |
| Page creation    | AddPage()          |
| Font control     | SetFont()          |
| Single line text | Cell()             |
| Paragraph        | MultiCell()        |
| Line spacing     | Ln()               |
| Table            | Cell() with border |
| Image            | Image()            |
| Save file        | Output()           |


// require('fpdf.php');

// /* STEP 1: Create Object */
    //     $pdf = new FPDF('P', 'mm', 'A4');

    //     /* STEP 2: Add Page */
    //     $pdf->AddPage();

    //     /* STEP 3: Add Image (Logo) */
    //     $pdf->Image('logo.png', 10, 10, 30);

    //     /* STEP 4: Move Down */
    //     $pdf->Ln(25);

    //     /* STEP 5: Set Title Font */
    //     $pdf->SetFont('Arial', 'B', 18);

    //     /* STEP 6: Add Title */
    //     $pdf->Cell(0, 10, 'STUDENT REPORT', 0, 1, 'C');

    //     /* STEP 7: Add Space */
    //     $pdf->Ln(5);

    //     /* STEP 8: Normal Text */
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->MultiCell(0, 8, 'This report contains student performance details generated using PHP and FPDF library.');

    //     /* STEP 9: Add Space */
    //     $pdf->Ln(5);

    //     /* STEP 10: Create Table Header */
    //     $pdf->SetFont('Arial', 'B', 12);
    //     $pdf->Cell(60, 10, 'Name', 1);
    //     $pdf->Cell(40, 10, 'Score', 1);
    //     $pdf->Cell(40, 10, 'Grade', 1);
    //     $pdf->Ln();

    //     /* STEP 11: Table Data */
    //     $pdf->SetFont('Arial', '', 12);
    //     $pdf->Cell(60, 10, 'John Doe', 1);
    //     $pdf->Cell(40, 10, '85', 1);
    //     $pdf->Cell(40, 10, 'A', 1);
    //     $pdf->Ln();

    //     $pdf->Cell(60, 10, 'Jane Smith', 1);
    //     $pdf->Cell(40, 10, '78', 1);
    //     $pdf->Cell(40, 10, 'B+', 1);
    //     $pdf->Ln();

    //     /* STEP 12: Footer */
    //     $pdf->Ln(10);
    //     $pdf->SetFont('Arial', 'I', 10);
    //     $pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d'), 0, 1, 'R');

    //     /* STEP 13: Save File */
    //     $pdf->Output('F', 'student_report.pdf');

    //     echo "PDF Created Successfully";




    ?>
</body>

</html>
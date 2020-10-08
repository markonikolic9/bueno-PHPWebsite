<?php

require_once "../../config/connection.php";
include "dohvatiKategorije.php";

$kategorije = dohvatiKategorije();

$excel = new COM("Excel.Application");

$excel->Visible = 1;

$excel->DisplayAlerts = 1;

$workbook = $excel->Workbooks->Open("https://localhost/bueno/models/kategorije/Kategorije.xlsx") or die ("Did not open filename");

$sheet = $workbook->Worksheets('Sheet1');
$sheet->activate;

$polje = $sheet->Range("A1");
$polje->activate;
$polje->value = "ID";

$polje = $sheet->Range("B1");
$polje->activate;
$polje->value = "Naziv";

$polje = $sheet->Range("C1");
$polje->activate;
$polje->value = "putanja_slike";

$br = 2;
foreach ($kategorije as $kategorija) {
    $polje = $sheet->Range("A{$br}");
    $polje->activate;
    $polje->value = $kategorija->id_kat;

    $polje = $sheet->Range("B{$br}");
    $polje->activate;
    $polje->value = $kategorija->naziv;

    $polje = $sheet->Range("C{$br}");
    $polje->activate;
    $polje->value = $kategorija->slika_putanja;

    $br++;
}

$workbook->_SaveAs("http://localhost/praktikum_php/lab/termin9/resenje/models/movies/Filmovi.xlsx", -4143);
$workbook->Save();

$workbook->Saved=true;
$workbook->Close;

$excel->Workbooks->Close();
$excel->Quit();

unset($sheet);
unset($workbook);
unset($excel);

header("Location: ../../index.php");
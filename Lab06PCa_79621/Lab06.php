<?php
//require file
require('inc/page.inc.php');
// create new page
$p = new Page();
//show upload form
$p->showHeader("Lab06PCa_79621 - Please select a file to upload");
$p->showUploadForm();
$p->showFooter();

?>
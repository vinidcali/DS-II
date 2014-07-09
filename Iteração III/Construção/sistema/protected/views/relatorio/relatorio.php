<?php

	echo $_GET['id'];
 $mpdf = Yii::app()->ePdf->mpdf();
 
        $mpdf = Yii::app()->ePdf->mpdf('', 'A4');
 $mpdf->debug = true;
//  $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
//$mpdf->WriteHTML('<p>Hallo World</p>');
    
        $mpdf->Output('teste.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);


?>
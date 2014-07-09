	<?php
/* @var $this CalendarioController */
/* @var $model Calendario */

 /*$mpdf = Yii::app()->ePdf->mpdf();
 
        $mpdf = Yii::app()->ePdf->mpdf('', 'A4');
 $mpdf->debug = true;
//  $mPDF1->WriteHTML($this->renderPartial('index', array(), true));
//$mpdf->WriteHTML('<p>Hallo World</p>');
    
        $mpdf->Output('teste.pdf', EYiiPdf::OUTPUT_TO_DOWNLOAD);
*/




$this->breadcrumbs=array(
	'Minhas Turmas'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Avaliações', 'url'=>array('avaliacao/index&id=' . $model->disc->id)),
	array('label'=>'Ver Médias', 'url'=>array('medias/index&id=' . $_GET['id'])),
    array('label'=>'Gerar Relatório', 'url'=>array('#'))
);
?>

<h1><?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'disc.nome:text:Disciplina',
		'nome',
	),
)); ?>

<br /><br />
<h3>Minhas aulas nesta turma:</h3>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'aula-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
        'id:text:#',
		'dataHora',
		'conteudo',
		 array(
            'class' => 'CButtonColumn',
            'header' => 'Editar Conteúdo',
            'template' => '{update}',
            'buttons' => array(
                            'update' => array(
                                        'url'=> '"index.php?r=aula/update&id=$data->id"',
                                     //   'click'=>'js: function(){alert(this);}',
                                       'click'=>'teste',
                            ),
        	),
    	),
        array(
            'class' => 'CButtonColumn',
            'header' => 'Editar Frequência',
            'template' => '{freq}',
            'buttons' => array(
                            'freq' => array(
                                       'url'=> '"index.php?r=frequencia/index&id=$data->id"',
                                
                           // 'click'=>'abreFreq',
                            'options' => array('onClick' => "teste(this)"),
                            ),
            ),
        ),
	),
));

?>

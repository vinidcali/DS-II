<?php
/* @var $this CalendarioController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Minhas Turmas',
);
?>

<h1>Minhas Turmas</h1>

<?php 
if (!empty($dataProviders)) {
	foreach ($dataProviders as $dataProvider) {
		$this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
			'template'=>'{items}',
		));
	}
}else
	echo "Parece que você não possui nenhuma turma no momento!"
?>
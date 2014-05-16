<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Contact Us';
$this->breadcrumbs=array(
	'Contact',
);
?>

<!-- <h1>Contact Us</h1>-->

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p>
Если у вас есть деловое предложение или другие вопросы, пожалуйста, заполните следующую форму, чтобы связаться с нами.
</p> 

<div class="form">
 
<?php

    
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo"<br>"; echo $form->labelEx($model,'Имя *');  echo"<br>"; ?>
		<?php echo $form->textField($model,'name'); echo"<br><br>";  ?>
		<?php echo $form->error($model,'name'); ?>
	
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'email *'); echo"<br>"; ?>
		<?php echo $form->textField($model,'email'); echo"<br><br>"; ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'Тема *'); ?><br>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); echo"<br>"; ?>
		<?php echo $form->error($model,'subject'); ?><br>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Сообщение *'); ?><br>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?><br>
	</div>
    <br />
	<p class="note">Поля со знаком <span class="required">*</span> заполнить обязательно! </p>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php  echo"<br>"; echo $form->labelEx($model,'Введите код:'); ?><br>
		<div>
		<?php $this->widget('CCaptcha'); ?><br>
		<?php echo"<br>"; echo $form->textField($model,'verifyCode'); ?><br><br>
		</div>
	<!--	<div class="hint">Please enter the letters as they are shown in the image above.
		<br/>Letters are not case-sensitive.</div> --!>
		<?php  echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
<br>
	<div class="row buttons">
		<?php echo "<p align=\"center\">"; echo CHtml::submitButton('Отправить'); echo "</p>"; ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
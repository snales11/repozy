<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h2 align="center"><?php echo UserModule::t("Registration"); ?></h2>
<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>


	<?php echo $form->errorSummary(array($model,$profile));?>
	
	<div class="row">
 	
     <?php  echo "<br>"; echo $form->labelEx($model,'username'); echo "<br>"; ?>
	<?php echo $form->textField($model,'username'); ?>
	<?php echo $form->error($model,'username'); ?>
	</div>
<br> 
	<div class="row">
  
	<?php  echo $form->labelEx($model,'password'); echo "<br>";  ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password'); ?>
	<p class="hint">
	<?php // echo UserModule::t("Minimal password length 4 symbols."); ?>
	</p>
	</div>
	
	<div class="row">
	<?php echo "<br>"; echo $form->labelEx($model,'verifyPassword'); echo "<br>"; ?>
	<?php echo $form->passwordField($model,'verifyPassword'); echo "<br>"; ?>
	<?php echo $form->error($model,'verifyPassword'); ?>
	</div>
	
	<div class="row">
	<?php  echo "<br>"; echo $form->labelEx($model,'email'); echo "<br>";?>
	<?php  echo $form->textField($model,'email'); ?>
	<?php echo $form->error($model,'email'); ?>
	</div>

<?php 
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="row">
		<?php echo "<br>";echo $form->labelEx($profile,$field->varname); echo "<br>";?>
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>	
			<?php
			}
		}
?><br />
	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="row">
		<?php echo "<br>"; echo $form->labelEx($model,'verifyCode');echo "<br><br>"; ?>
		
		<?php $this->widget('CCaptcha'); echo "<br><br>";?>
		<?php echo $form->textField($model,'verifyCode');echo "<br>"; ?>
		<?php echo $form->error($model,'verifyCode');echo "<br>"; ?>
		
		<p class="hint"><?php echo UserModule::t("Пожалуйста, введите буквы, показанные на картинке выше. Регистр значение не имеет."); ?>
		<br/><?php // echo "<br>&nbsp;&nbsp;&nbsp;&nbsp;"; echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>
	
	<div class="row submit">
		<?php echo "<br>"; echo "<p align=\"center\">";echo CHtml::submitButton(UserModule::t("  Зарегистрироваться  "));echo "</p>";// echo "&nbsp;&nbsp;&nbsp;&nbsp;"; ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?> 
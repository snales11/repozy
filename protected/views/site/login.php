<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

// $this->pageTitle=Yii::app()->name . ' - Login';
//$this->breadcrumbs=array(
//	'Login',
// );
?>


<table>
<td> <p>Введите свой логин и пароль:</p> </td>

<tr><td><div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
</td>
 </tr>
<!--	<p class="note">Поля с обозначением <span class="required">*</span> заполнить обязательно!</p> -->
<tr>
 <td align="right" height="40">

	<div class="row">
		<?php echo $form->labelEx($model,'Логин:  '); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>
    </td>
</tr>
<tr>
 <td align="right" height="40">
	<div class="row">
		<?php echo $form->labelEx($model,'Пароль: '); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
	<!--		Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.-->
		</p>
	</div>
    </td>
</tr>
<tr> 
<td headers="40">
	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Запомнить меня'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
    </td>
</tr>
<tr><td align="center" height="40">
	<div class="row buttons">
		<?php echo CHtml::submitButton('Войти');  ?>
	</div>
    </td>

</tr>
<?php $this->endWidget(); ?>
</div><!-- form -->
</table>
<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<h2 align="center"><?php echo UserModule::t("Login"); ?></h2><br />

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>

<div class="form">
<?php echo CHtml::beginForm(); ?>

	
	<?php echo CHtml::errorSummary($model); ?>
	
	<div class="row">
		<?php echo "&nbsp;&nbsp;&nbsp;";echo CHtml::activeLabelEx($model,'username');echo "<br>&nbsp;&nbsp;";?>
		<?php echo CHtml::activeTextField($model,'username')  ?>
	</div>
	
	<div class="row">
		<?php echo "<br>&nbsp;&nbsp;&nbsp;";echo CHtml::activeLabelEx($model,'password');echo "<br>&nbsp;&nbsp;"; ?>
		<?php echo CHtml::activePasswordField($model,'password') ?>
	</div>
    <br />
        <p><?php // echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>
        <p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<div class="row">
		<p class="hint">
		<?php echo "<br>&nbsp;&nbsp;&nbsp;"; echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>
	
	<div class="row rememberMe">
		<?php //echo "<br>&nbsp;&nbsp;&nbsp;";echo CHtml::activeCheckBox($model,'rememberMe'); ?>
		<?php //echo CHtml::activeLabelEx($model,'rememberMe'); ?>
	</div>

	<div class="row submit">
		<?php echo "<br>"; echo "<p align=\"center\">"; echo CHtml::submitButton(UserModule::t("  Войти  ")); echo "</p>"; ?>
	</div>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->



<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>
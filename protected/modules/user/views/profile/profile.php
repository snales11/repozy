<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
 if (Yii::app()->user->name === 'admin') { 
$this->menu=array(
	((UserModule::isAdmin())
	//	?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
	//	:array()),
//    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    ?array('label'=>UserModule::t('Edit'), 'url'=>array('edit')) 
    :array()),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    // array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
  //  array('label'=>UserModule::t('Create cat'), 'url'=>array('createcat')),
);}
?><h2 align="center" ><?php echo UserModule::t('Your profile'); ?></h2><br /><br />

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<table class="dataGrid">
	<tr style="width: 200px; height: 30px;">
		<th align="left" class="label"><?php echo CHtml::encode($model->getAttributeLabel('username')); ?></th>
    <td align="left"><?php  echo CHtml::encode($model->username); ?></td>
	</tr>
	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	<tr style="width: 200px; height: 30px;">
		<th align="left" class="label"><?php echo CHtml::encode(UserModule::t($field->title)); ?></th>
    	<td align="left"><?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?></td>
	</tr>
			<?php
			}//$profile->getAttribute($field->varname)
		}
	?>
	<tr style="width: 200px; height: 30px;">
		<th align="left" style="width: 200px; height: 30px;" class="label"><?php echo CHtml::encode($model->getAttributeLabel('email')); ;?></th>
    	<td align="left"><?php echo CHtml::encode($model->email); ?></td>
	</tr>
	<tr>
		<th align="left" style="width: 200px; height: 30px;" class="label"><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?></th>
    	<td align="left"><?php echo $model->create_at; ?></td>
	</tr>
	<tr style="width: 200px; height: 30px;">
		<th align="left" class="label"><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?></th>
    	<td align="left"><?php echo $model->lastvisit_at; ?></td>
	</tr>
	<tr style="width: 200px; height: 30px;">
		<th align="left" class="label"><?php echo CHtml::encode($model->getAttributeLabel('status')); ?></th>
    	<td align="left"><?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?></td>
	</tr>
</table>
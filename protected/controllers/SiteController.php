<?php
 
class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'

		$this->render('Index');
	    
	}
    
 	public function actionCat($id)
	{
	
		$this->render('Cat');
	    
	}
    public function actionCreate($id)
	{
	
		$this->render('Create');
	    
	}
    	public function actionProduct_rez($id)
	{
	
		$this->render('product_rez');
	    
	}
    public function actionFinal()
	{
	
		$this->render('final');
	    
	}
    	public function actionCart()
	{
	
		$this->render('cart');
	    
	}
    	public function actionContact2()
	{
	
		$this->render('contact2');
	    
	}
    
    	public function actionZakaz()
	{
	
		$this->render('Zakaz');
	    
	}
    
  //    public function actionMyWorkWithDB()
 //  {
  //  $orderst = new Orders;
  //  $date = date('Y-m-d');
   //  $orders->date = $date;
   //  $orders->save();
    
    //}
    
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";
                   
                  /*
$message = 'Hello World!';
Yii::app()->mailer->Host = 'smtp.yiiframework.com';
Yii::app()->mailer->IsSMTP();
Yii::app()->mailer->From = 'wei@pradosoft.com';
Yii::app()->mailer->FromName = 'Wei';
Yii::app()->mailer->AddReplyTo('wei@pradosoft.com');
Yii::app()->mailer->AddAddress('qian@yiiframework.com');
Yii::app()->mailer->Subject = 'Yii rulez!';
Yii::app()->mailer->Body = $message;
Yii::app()->mailer->Send();*/
                  

				mail(Yii::app()->params['snales11@mail.ru'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Cпасибо за Ваше сообщение. При первой возможности мы свяжимся с Вами.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
        
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
 		
       
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
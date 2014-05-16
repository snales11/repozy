<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);

return CMap::mergeArray(
    require(dirname(__FILE__).'/main.php'),
    require_once(dirname(__FILE__).'/Category.php'),
    array(
        'components'=>array(
            'fixture'=>array(
                'class'=>'system.test.CDbFixtureManager',
            ),
           /*  раскомментируйте, если вам нужно подключение к тестовой БД*/
          
            'db'=>array(
                'connectionString'=>'shop',
            ),
            
        ),
    )
);
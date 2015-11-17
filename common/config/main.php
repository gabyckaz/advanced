
 <?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        //para el rbac
         'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],
    ],

    
];

<?php
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'MCTop.im Engine',
    'language' => 'ru',
    'defaultController' => 'Rating',

    'preload' => array('log'),

    'import' => array(
        'application.models.*',
     )
    'modules' => array(
        'social',
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
        ),

    ),

    'components' => array(

        'user' => array(
            'allowAutoLogin' => true,
        ),

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
            'rules' => array(
                'u<id:\d+>'=>'users/profile',
                'auth_admin'=>'site/auth_admin',     
                's/<action:\w+>' => 'site/<action>',
                's/restorepassword/<hash:\w+>' => 'site/restorepassword',

                'wiki' => 'mdb',
                'wiki/<action:\w+>' => 'mdb/<action>',
                'wiki/mods/list' => 'mdb/type/mods',
                'wiki/mods/<id:\d+>' => 'mdb/mod',
                'cabinet/manual/group/<id:\d+>' => 'cabinet/ManualGroup',
                'wiki/plugins/list' => 'mdb/type/plugins',
                'wiki/plugins/<id:\d+>' => 'mdb/plugin',
                'cabinet/projects' => 'projects',
                'oauth/provider/<provider:.*?>' => 'site/oauth',
                'images/addtogallery/<id:\d+>/forserver.<server:\d+>' => 'images/addtogallery',
                'images/useasbanner/<id:\d+>/forproject.<project:\d+>' => 'images/useasbanner',
                'rating/server/<id:\d+>/gallery' => 'rating/servergallery',
                'rating/server/<id:\d+>/favoriteit' => 'rating/favoriteit',
                'rating/server/<id:\d+>/unfavoriteit' => 'rating/unfavoriteit',
                'news/tag/<tag:.*?>' => 'news/withtag',
                'advert/create/<type:\w+>' => 'advert/create',
                'advert/create/<type:\w+>/<id:\w+>' => 'advert/create',
                'projects/guild/leave/<id:\w+>' => 'guilds/leave',
                'projects/guild/join/<id:\w+>' => 'guilds/join',
                'projects/guild/create/<id:\w+>' => 'projects/CreateGuild',
                'projects/guild/edit/<id:\w+>' => 'projects/EditGuild',
                'projects/guild/<id:\w+>' => 'guilds/show',
                'projects/guild/<id:\w+>/<action:\w+>' => 'guilds/<action>',
                'projects/guild/<id:\w+>/news/<action:\w+>/' => 'guilds/News<action>',
                'projects/guild/<pid:\w+>/news/<action:\w+>/<id:\w+>' => 'guilds/News<action>',
                'projects/guild/<pid:\w+>/news_with_tag/<tag:.*?>' => 'guilds/NewsWithTag',
                'guilds/<pid:\w+>/news&post=<id:\w+>' => 'guilds/post',
                'guilds/leave/<id:\w+>' => 'guilds/leave',
                'guilds/join/<id:\w+>' => 'guilds/join',
                'guilds/create/<id:\w+>' => 'projects/CreateGuild',
                'guilds/edit/<id:\w+>' => 'projects/EditGuild',
                'guilds/<id:\w+>' => 'guilds/show',
                'guilds/<id:\w+>/<action:\w+>' => 'guilds/<action>',
                'guilds/<id:\w+>/news/<action:\w+>/' => 'guilds/News<action>',
                'guilds/<pid:\w+>/news/<action:\w+>/<id:\w+>' => 'guilds/News<action>',
                'guilds/<pid:\w+>/news_with_tag/<tag:.*?>' => 'guilds/NewsWithTag',
                'guilds/<pid:\w+>/news&post=<id:\w+>' => 'guilds/post',
                'site/restorepassword/<hash:.*?>' => 'site/restorepassword',
                'lang/<language:.*?>' => 'site/lang',
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                'cabinet/projects/<action:\w+>' => 'projects/<action>',
                'cabinet/projects/<action:\w+>/<id:\w+>' => 'projects/<action>',

            ),
        ),

        'db' => array(
            'emulatePrepare' => true,
            'charset' => 'utf8',
            'connectionString' => 'mysql:host=127.0.0.1;dbname=',
            'username' => 'mctop.lubit_tebya',
            'password' => 'suka',
            'enableProfiling' => true,
        ),

        'errorHandler' => array(
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'ext.yii-debug-toolbar.YiiDebugToolbarRoute',
                ),
            ),
        ),
        'clientScript' => array(
            'scriptMap' => array(),
        ),
    ),

    'params' => array(
        'images' => array(
            'maxBannerWeight' => 1024 * 150
        )
    ),
);

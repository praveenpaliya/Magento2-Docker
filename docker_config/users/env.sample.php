<?php
return array(
    'backend' => [
        'frontName' => 'admin',
    ],
    'crypt' => [
        'key' => '5e56dc6d8f24f711bb4f289cca1beda9',
    ],
	'queue' => [
        'amqp' => [
            'host' => 'rabbitmq',
            'port' => '5672',
            'user' => 'guest',
            'password' => 'guest',
            'virtualhost' => '/'
        ]
    ],
    'session' => [
		'save' => 'redis',
		'redis' => [
			'host' => 'redis-session',
			'port' => '6379',
			'password' => '',
			'timeout' => '2.5',
			'persistent_identifier' => '',
			'database' => '2',
			'compression_threshold' => '2048',
			'compression_library' => 'gzip',
			'log_level' => '1',
			'max_concurrency' => '6',
			'break_after_frontend' => '5',
			'break_after_adminhtml' => '30',
			'first_lifetime' => '600',
			'bot_first_lifetime' => '60',
			'bot_lifetime' => '7200',
			'disable_locking' => '0',
			'min_lifetime' => '60',
			'max_lifetime' => '2592000'
		]
    ],
    'db' => [
		'table_prefix' => '',
		'connection' => [
			'default' => [
				'host' => 'db',
				'dbname' => 'magento',
				'username' => 'magento',
				'password' => 'magento',
				'active' => '1',
			],
		]
    ],
    'resource' => [
        'default_setup' => [
            'connection' => 'default'
        ]
    ],
    'x-frame-options' => 'SAMEORIGIN',
    'MAGE_MODE' => 'developer',
	'cache' => [
        'frontend' => [
            'default' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'database' => '0'
                ]
            ],
            'page_cache' => [
                'backend' => 'Cm_Cache_Backend_Redis',
                'backend_options' => [
                    'server' => 'redis',
                    'port' => '6379',
                    'database' => '1',
                    'compress_data' => '0'
                ]
            ]
        ]
    ],
    'cache_types' => [
        'config' => 1,
        'layout' => 1,
        'block_html' => 1,
        'collections' => 1,
        'reflection' => 1,
        'db_ddl' => 1,
        'compiled_config' => 1,
        'eav' => 1,
        'customer_notification' => 1,
        'config_integration' => 1,
        'config_integration_api' => 1,
        'target_rule' => 1,
        'full_page' => 0,
        'config_webservice' => 1,
        'translate' => 1,
        'vertex' => 1
    ],
    'install' => [
        'date' => 'Tue, 22 Jun 2021 22:49:50 +0000',
    ]
);

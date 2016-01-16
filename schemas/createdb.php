<?php
/**
 * Programmatically bootstrap the database
 *
 * @var \Phalcon\Db\AdapterInterface $connection
 */

use Phalcon\Exception as PException;
use Phalcon\Db\Column;
use Phalcon\Db\Index;
use Phalcon\Db\Reference;
use Phalcon\Config\Adapter\Ini as IniConfig;
use Phalcon\Config;
try {
    $configFile = __DIR__ . '/../app/config/config.php';

    if (!is_file($configFile)) {
        throw new PException(
            sprintf('Unable to read config file located at %s.', $configFile)
        );
    }

    $config = include $configFile;

//    $config = new IniConfig($configFile);
//
//    /** @var \Phalcon\Config $config */
//    $config = $config->get('database');

    if (!$config instanceof Config) {
        throw new PException('Unable to read database config.');
    }
    $dbClass = sprintf('\Phalcon\Db\Adapter\Pdo\%s', $config->get($config->database->adapter, 'MySql'));

    if (!class_exists($dbClass)) {
        throw new PException(
            sprintf('PDO adapter "%s" not found.', $dbClass)
        );
    }

    $dbConfig = $config->database->toArray();
    unset($dbConfig['adapter']);

    $connection = new $dbClass($dbConfig);

    $connection->begin();
//    $connection->execute("drop database IF EXISTS ".$config->database->dbname.";");
////    $connection->execute("create database ".$config->database->dbname.";");
//    die;$connection->begin();
    $listTables = $connection->listTables($config->database->dbname);

    foreach($listTables as $tableName){
        $connection->dropTable($tableName, $config->database->dbname);
    }

    $connection->createTable(
        'profile',
        null,
        [
            'columns' => [
                new Column('id', [
                    'type'          => Column::TYPE_INTEGER,
                    'size'          => 11,
                    'unsigned'      => true,
                    'notNull'       => true,
                    'autoIncrement' => true
                ]),
                new Column('firstname', [
                    'type'    => Column::TYPE_VARCHAR,
                    'size'    => 50,
                    'notNull' => true
                ]),
                new Column('lastname', [
                    'type'    => Column::TYPE_VARCHAR,
                    'size'    => 50,
                    'notNull' => true
                ]),
                new Column('email', [
                    'type'    => Column::TYPE_VARCHAR,
                    'size'    => 50,
                    'notNull' => true
                ])
            ],
            "indexes" => [
                new Index('PRIMARY', ["id"], 'PRIMARY')
            ]
        ]
    );
    $connection->execute("INSERT INTO `profile` VALUES (NULL,'user1_firstname','user1_lastname','user1_email@yopmail.com')");
    $connection->execute("INSERT INTO `profile` VALUES (NULL,'user2_firstname','user2_lastname','user2_email@yopmail.com')");
    $connection->execute("INSERT INTO `profile` VALUES (NULL,'user3_firstname','user3_lastname','user3_email@yopmail.com')");
    $connection->execute("INSERT INTO `profile` VALUES (NULL,'user4_firstname','user4_lastname','user4_email@yopmail.com')");
    $connection->execute("INSERT INTO `profile` VALUES (NULL,'user5_firstname','user5_lastname','user5_email@yopmail.com')");


    $connection->createTable(
        'profile_gpg',
        null,
        [
            'columns' => array(
                new Column('id', [
                    'type'          => Column::TYPE_INTEGER,
                    'size'          => 11,
                    'unsigned'      => true,
                    'notNull'       => true,
                    'autoIncrement' => true
                ]),
                new Column('profile_id', [
                    'type'    => Column::TYPE_INTEGER,
                    'size'    => 11,
                    'notNull' => true,
                    'unsigned'      => true,
                ]),
                new Column('gpg', [
                    'type'    => Column::TYPE_TEXT,
                    'notNull' => true
                ]),
            ),
            "indexes" => array(
                new Index('PRIMARY', ["id"], 'PRIMARY'),
                new Index(
                    "profile_id",
                    array("profile_id")
                )
            ),
//            "references" => array(
//                new Reference(
//                    "profile_fkid",
//                    array(
////                        "referencedSchema"  => "fredwork",
//                        "referencedTable"   => "profile",
//                        "columns"           => array("profile_id"),
//                        "referencedColumns" => array("id")
//                    )
//                )
//            ),
        ]
    );

//
//    $connection->createTable(
//        'companies',
//        null,
//        [
//            'columns' => [
//                new Column('id', [
//                    'type'          => Column::TYPE_INTEGER,
//                    'size'          => 10,
//                    'unsigned'      => true,
//                    'notNull'       => true,
//                    'autoIncrement' => true
//                ]),
//                new Column('name', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true
//                ]),
//                new Column('telephone', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 30,
//                    'notNull' => true
//                ]),
//                new Column('address', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 40,
//                    'notNull' => true
//                ]),
//                new Column('city', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 40,
//                    'notNull' => true
//                ])
//            ],
//            "indexes" => [
//                new Index('PRIMARY', ["id"], 'PRIMARY')
//            ]
//        ]
//    );
//
//    $connection->execute("INSERT INTO `companies` VALUES (1,'Acme','31566564','Address','Hello'),(2,'Acme Inc','+44 564612345','Guildhall, PO Box 270, London','London')");
//
//    $connection->createTable(
//        'contact',
//        null,
//        [
//            'columns' => [
//                new Column('id', [
//                    'type'          => Column::TYPE_INTEGER,
//                    'size'          => 10,
//                    'unsigned'      => true,
//                    'notNull'       => true,
//                    'autoIncrement' => true,
//                ]),
//                new Column('name', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true,
//                ]),
//                new Column('email', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true,
//                ]),
//                new Column('comments', [
//                    'type'    => Column::TYPE_TEXT,
//                    'notNull' => true,
//                ]),
//                new Column('created_at', [
//                    'type'    => Column::TYPE_TIMESTAMP,
//                    'notNull' => true,
//                    'default' => 'CURRENT_TIMESTAMP',
//                ]),
//            ],
//            'indexes' => [
//                new Index('PRIMARY', ['id'], 'PRIMARY'),
//            ]
//        ]
//    );
//
//    $connection->createTable(
//        'product_types',
//        null,
//        [
//            'columns' => [
//                new Column('id', [
//                    'type'          => Column::TYPE_INTEGER,
//                    'size'          => 10,
//                    'unsigned'      => true,
//                    'notNull'       => true,
//                    'autoIncrement' => true
//                ]),
//                new Column('name', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true
//                ]),
//            ],
//            'indexes' => [
//                new Index('PRIMARY', ['id'], 'PRIMARY')
//            ]
//        ]
//    );
//
//    $connection->execute("INSERT INTO `product_types` VALUES (5,'Vegetables'),(6,'Fruits')");
//
//    $connection->createTable(
//        'products',
//        null,
//        [
//            'columns' => [
//                new Column('id', [
//                    'type'          => Column::TYPE_INTEGER,
//                    'size'          => 10,
//                    'unsigned'      => true,
//                    'notNull'       => true,
//                    'autoIncrement' => true
//                ]),
//                new Column('product_types_id', [
//                    'type'     => Column::TYPE_INTEGER,
//                    'size'     => 10,
//                    'unsigned' => true,
//                    'notNull'  => true
//                ]),
//                new Column('name', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true
//                ]),
//                new Column('price', [
//                    'type'    => Column::TYPE_DECIMAL,
//                    'size'    => 16,
//                    'scale'   => 2,
//                    'notNull' => true
//                ]),
//                new Column('active', [
//                    'type' => Column::TYPE_CHAR,
//                    'size' => 1
//                ]),
//            ],
//            'indexes' => [
//                new Index('PRIMARY', ['id'], 'PRIMARY')
//            ]
//        ]
//    );
//
//    $connection->execute("INSERT INTO `products` VALUES (1,5,'Artichoke','10.50','Y'),(2,5,'Bell pepper','10.40','Y'),(3,5,'Cauliflower','20.10','Y'),(4,5,'Chinese cabbage','15.50','Y'),(5,5,'Malabar spinach','7.50','Y'),(6,5,'Onion','3.50','Y'),(7,5,'Peanut','4.50','Y')");
//
//    $connection->createTable(
//        'users',
//        null,
//        [
//            'columns' => [
//                new Column('id', [
//                    'type'          => Column::TYPE_INTEGER,
//                    'size'          => 10,
//                    'unsigned'      => true,
//                    'notNull'       => true,
//                    'autoIncrement' => true
//                ]),
//                new Column('username', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 32,
//                    'notNull' => true
//                ]),
//                new Column('password', [
//                    'type'    => Column::TYPE_CHAR,
//                    'size'    => 40,
//                    'notNull' => true
//                ]),
//                new Column('name', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 120,
//                    'notNull' => true
//                ]),
//                new Column('email', [
//                    'type'    => Column::TYPE_VARCHAR,
//                    'size'    => 70,
//                    'notNull' => true
//                ]),
//                new Column('created_at', [
//                    'type'    => Column::TYPE_TIMESTAMP,
//                    'notNull' => true,
//                    'default' => 'CURRENT_TIMESTAMP'
//                ]),
//                new Column('active', [
//                    'type'    => Column::TYPE_CHAR,
//                    'size'    => 1,
//                    'notNull' => true
//                ]),
//            ],
//            'indexes' => [
//                new Index('PRIMARY', ['id'], 'PRIMARY')
//            ]
//        ]
//    );
//
//    $connection->execute("INSERT INTO users VALUES (1,'demo', 'c0bd96dc7ea4ec56741a4e07f6ce98012814d853','Phalcon Demo','demo@phalconphp.com','2012-04-10 20:53:03','Y')");

    $connection->commit();

} catch (\Exception $e) {

//    if ($connection->isUnderTransaction()) {
//        $connection->rollback();
//    }

    echo $e->getMessage(), PHP_EOL;
    echo $e->getTraceAsString(), PHP_EOL;
}

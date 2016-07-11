<?php


namespace ImageManagerDemo;

use OLOG\ImageManager\ImageManagerConfigKeys;
use OLOG\ImageManager\ImageManagerConstants;
use OLOG\ImageManager\ImagePresets;
use OLOG\Storage\LocalStorage;
use OLOG\Storage\StorageConfigKeys;

class ImageManagerDemoCommonConfig
{
    const STORAGE1_NAME = 'STORAGE1_NAME';
    const STORAGE2_NAME = 'STORAGE2_NAME';

    public static function get()
    {
        $conf = [];

        $conf[\OLOG\Model\ModelConstants::MODULE_CONFIG_ROOT_KEY] = array(
            'db' => array(
                \OLOG\ImageManager\ImageManagerConstants::DB_NAME_PHPIMAGEMANAGER => array(
                    'host' => '127.0.0.1',
                    'db_name' => 'db_phpimagemanagerdemo',
                    'user' => 'root',
                    'pass' => '1',
                )
            ),
            'memcache_servers' => array(
                'localhost:11211'
            )
        );

        $conf[StorageConfigKeys::ROOT] = array(
            StorageConfigKeys::STORAGES_ARR => array(
                self::STORAGE1_NAME => new LocalStorage('/mnt/s1/'),
                self::STORAGE2_NAME => new LocalStorage('/mnt/s2/'),
            ),
        );

        $conf[ImageManagerConstants::MODULE_NAME] = array(
            ImageManagerConfigKeys::STORAGE_ALIASES_ARR => [
                's1' => self::STORAGE1_NAME,
                's2' => self::STORAGE2_NAME
            ],
            ImageManagerConfigKeys::DEFAULT_UPLOAD_PRESET => ImagePresets::IMAGE_PRESET_UPLOAD,
            ImageManagerConfigKeys::TEMP_DIR => '/tmp/'
        );

        $conf['php-bt'] = [
            'layout_code' => \OLOG\BT\LayoutGentellela::LAYOUT_CODE_GENTELLELA,
            'menu_classes_arr' => [
                \ImageManagerDemo\ImageManagerDemoMenu::class
            ]
        ];
        return $conf;
    }
}
<?php

namespace app\utils;

include __DIR__ . '/../includes.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\models\LogModel;

class Logger
{
    public static function log(string $logMessage, int $saveToDbUserId = null, string $saveToDbType = null)
    {
        $log_filename = "log";
        if (!file_exists($log_filename)) {
            // create directory/folder uploads.
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';

        $date = date('d-M-Y H:i:s');

        // save message to log file 
        file_put_contents($log_file_data, $date . "  " . $logMessage . "\n", FILE_APPEND);
        // save message to database 
        if ($saveToDbUserId) {
            LogModel::create($logMessage, $saveToDbType, $saveToDbUserId);
        }
    }
}
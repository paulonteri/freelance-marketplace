<?php

namespace app\utils;

include __DIR__ . '/../includes.php';
require_once __DIR__ . '/../vendor/autoload.php';

use app\models\LogModel;
use app\models\UserModel;
use app\Router;

class Logger
{
    public static function log(string $logMessage, int $saveToDbUserId = null, string $saveToDbType = 'General Log')
    {
        if ($saveToDbUserId == null) {
            $user = UserModel::getCurrentUser();
            if ($user != null) {
                $saveToDbUserId = $user->getId();
            }
        }
        $saveToDbUserIp = Router::getIp();
        $date = date('d-M-Y H:i:s');


        // -------- creating a log file if it doesn't exist -------- 
        $log_filename = "log";
        if (!file_exists($log_filename)) {
            mkdir($log_filename, 0777, true);
        }
        $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';

        // -------- save message to log file -------- 
        file_put_contents($log_file_data, $date . "  " . $logMessage . "\n", FILE_APPEND);

        // -------- save message to database -------- 
        if ($saveToDbUserId) {
            LogModel::create($logMessage, $saveToDbType, $saveToDbUserId, $saveToDbUserIp);
        }
    }
}
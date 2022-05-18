<?php

namespace app\utils;

class Logger
{
    public static function log($logMessage)
    {
        $log_filename = "log";
        if (!file_exists($log_filename)) {
            // create directory/folder uploads.
            mkdir($log_filename, 0777, true);
        }

        $log_file_data = $log_filename . '/log_' . date('d-M-Y') . '.log';

        file_put_contents($log_file_data, date('Y-m-d H:i:s') . "  " . $logMessage . "\n", FILE_APPEND);
    }
}
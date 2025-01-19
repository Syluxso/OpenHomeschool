<?php

namespace App\Http\Helpers;

class PrintLogger {

    public $logDir;
    public $file_name;
    public $logFile;
    public $messages = [];

    function __construct($data = false, $msg = '') {
        $this->messages[] = 'Log class instantiated.';
        $logDir = $_SERVER['DOCUMENT_ROOT'] . '/storage';
        $file_name = 'print_request.log';
        $logFile = $logDir . '/' . $file_name;

        $this->logDir = $logDir;
        $this->file_name = $file_name;
        $this->logFile = $logFile;

        if (!file_exists($logFile)) {
            $handle = fopen($logFile, 'w'); // Create the file
            if ($handle) {
                fwrite($handle, "Log file created on " . date('Y-m-d H:i:s') . "\n\n");
                fclose($handle);
                $this->messages[] = "Log file created successfully.";
            } else {
                $this->messages[] = "Failed to create log file. Error: " . print_r(error_get_last(), true);
            }
        } else {
            $handle = fopen($logFile, 'a'); // Open in append mode
            if ($handle) {
                $string = '[' . date('Y-m-d g:i:s a') . '] ' . $msg . ' ::' . serialize($data);
                fwrite($handle, $string . "\n");
                fclose($handle);
                $this->messages[] = "Log entry added.";
            } else {
                $this->messages[] = "Failed to write to log file. Error: " . print_r(error_get_last(), true);
            }
        }
    }
}

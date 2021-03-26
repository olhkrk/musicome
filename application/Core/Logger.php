<?php
/**
 * Class Logger
 *
 * @author Stanislav Miroshnyk <stasmirr@gmail.com>
 * @copyright 2020 SM
 */

namespace Musicome\Core;

/**
 * Class Logger
 *
 * @package Musicome\Core
 */
class Logger
{
    public function critical($text)
    {
        $resultText = "[" . date('Y-m-d H:i:s') . '] LOG:CRITICAL: ' . $text . "\n";
        $this->writeException($resultText);
    }

    public function info($text)
    {
        $resultText = "[" . date('Y-m-d H:i:s') . '] LOG:INFO: ' . $text . "\n";
        $this->writeDebug($resultText);
    }

    public function debug($text, $file = null, $line = null, $code = null)
    {
        $resultText = "[" . date('Y-m-d H:i:s') . '] LOG:DEBUG: ' . $text;

        if ($code) {
            $resultText .= ' exception code: ' . $code;
        }

        if ($file) {
            $resultText .= ' file: ' . $file;

            if ($line) {
                $resultText .= ' on line: ' . $line;
            }
        }

        $resultText .= "\n";
        $this->writeDebug($resultText);
    }

    protected function writeException($text)
    {
        $filePath = __DIR__ . '/../../var/log/exception.log';
        $file = fopen($filePath, 'a');
        fwrite($file, $text);
        fclose($file);
    }

    protected function writeDebug($text)
    {
        $filePath = __DIR__ . '/../../var/log/debug.log';
        $file = fopen($filePath, 'a');
        fwrite($file, $text);
        fclose($file);
    }
}

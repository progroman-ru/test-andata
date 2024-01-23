<?php
function is_cli_request()
{
    return (php_sapi_name() === 'cli' OR defined('STDIN'));
}

function printp($message, $title = false, $dump = false)
{
    if (is_cli_request()) {
        $br = PHP_EOL;
        $b = $b2 = $pre = $pre2 = $small = $small2 = '';
    } else {
        $br = '<br>';
        $b = '<b>';
        $b2 = '</b>';
        $pre = '<pre>';
        $pre2 = '</pre>';
        $small = '<small>';
        $small2 = '</small>';
    }

    $backtraces = debug_backtrace(0);
    while (true) {
        $backtrace = array_shift($backtraces);
        if (isset($backtrace['file'])) {
            if ($backtrace['file'] == __FILE__) {
                continue;
            }
            $trace = $backtrace['file'] . ': ' . $backtrace['line'];
            echo $br, $small, $trace, $small2, $br;
        }
        break;
    }

    if ($title) {
        echo $b, $title, $b2, $br;
    }

    echo $pre;

    if ($dump) {
        var_dump($message);
    } else {
        print_r($message);
    }

    echo $pre2;
}

function printd($message, $title = false, $dump = false)
{
    if (is_cli_request()) {
        $br = PHP_EOL;
        $small = $small2 = '';
    } else {
        $br = '<br>';
        $small = '<small>';
        $small2 = '</small>';
    }

    printp($message, $title, $dump);
    die;
}

function echonl($message = '', $numNl = 1)
{
    $nl = is_cli_request() ? PHP_EOL : '<br>';
    echo $message, str_repeat($nl, $numNl);
}

function simple_backtrace($rows = 100)
{
    echo '<br>---------------------------<br>';

    $backtraces = debug_backtrace(0);
    unset($backtraces[0]);

    $count = 0;
    foreach ($backtraces as $row) {
        if (isset($row['file'])) {
            echo '<b>File:</b> ', $row['file'], ' (', $row['line'], '): ';
        }

        if (isset($row['class'])) {
            echo '<b>Class: </b>', $row['class'] . $row['type'];
        }

        if (isset($row['function'])) {
            echo $row['function'], '()';
        }

        echo '<br>';

        if (++$count >= $rows) {
            break;
        }
    }

    echo '<br>---------------------------<br>';
}

<?php

namespace App\Helpers;

class NodeHelper
{
    public static function execute($scriptPath, $attributes = [])
    {
        $jsonAttributes = escapeshellarg(json_encode($attributes));
        $command = "node $scriptPath $jsonAttributes";
        return shell_exec($command);
    }
}

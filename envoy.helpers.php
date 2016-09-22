<?php
function runCommand($command) {
    return implode(PHP_EOL, [
        "echo $command",
        $command,
    ]) . PHP_EOL;
}

function executeHook($hooks, $eventName, $taskName, $releaseFolder = '') {
    $commandArr = [];
    $commandArr[] = "echo 'Hook $taskName.$eventName ...'";

    if (!empty($hooks[$eventName][$taskName])) {
        if (!empty($releaseFolder)) {
            $cdCommand = "cd $releaseFolder";
            $commandArr[] = "echo $cdCommand";
            $commandArr[] = $cdCommand;
        }

        foreach ($hooks[$eventName][$taskName] as $command) {
            $commandArr[] = "echo $command";
            $commandArr[] = $command;
        }
    }

    $commandArr[] = "echo 'Hook $taskName.$eventName done.'";

    return arrayToEnvoyCommands($commandArr);
}

function arrayToEnvoyCommands($commandArr) {
    return implode(PHP_EOL, $commandArr) . PHP_EOL;
}

<?php

namespace Zeao;

use pocketmine\scheduler\Task;
use Zeao\Main;

class timer extends Task
{
    /** @var int */
    private $seconds = 0;
    /** @var bool */
    private $tick = false;
    public function __construct(Main $plugin){
        $this->tick = (bool)$plugin->configs['sign.tick'];
    }
    public function onRun(int $tick) : void{
        foreach ($this->getOwner()->arenas as $SGname => $SGarena)
            $SGarena->tick();
        if ($this->tick) {
            if (($this->seconds % 5 == 0))
                $this->getOwner()->refreshSigns();
            $this->seconds++;
        }
    }
}

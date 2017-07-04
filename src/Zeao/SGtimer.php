<?php

namespace Zeao;
use pocketmine\scheduler\PluginTask;
class SGtimer extends PluginTask
{
    /** @var int */
    private $seconds = 0;
    /** @var bool */
    private $tick = false;
    public function __construct(Main $plugin)
    {
        parent::__construct($plugin);
        $this->tick = (bool)$plugin->configs['sign.tick'];
    }
    public function onRun($tick)
    {
        foreach ($this->getOwner()->arenas as $SGname => $SGarena)
            $SGarena->tick();
        if ($this->tick) {
            if (($this->seconds % 5 == 0))
                $this->getOwner()->refreshSigns();
            $this->seconds++;
        }
    }
}

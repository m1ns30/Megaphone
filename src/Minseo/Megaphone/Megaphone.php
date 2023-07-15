<?php

namespace Minseo\Megaphone;

use Minseo\Megaphone\command\MegaphoneCommand;
use pocketmine\plugin\PluginBase;

final class Megaphone extends PluginBase
{
    public const prefix = '§l§d[확성기] §r§f';

    protected function onEnable(): void
    {
        $this->getServer()->getCommandMap()->registerAll(strtolower($this->getName()), [
            new MegaphoneCommand()
        ]);
    }
}
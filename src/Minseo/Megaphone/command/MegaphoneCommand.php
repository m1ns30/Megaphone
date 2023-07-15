<?php

namespace Minseo\Megaphone\command;

use Minseo\Megaphone\form\MegaphoneMainForm;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\permission\DefaultPermissions;
use pocketmine\player\Player;

final class MegaphoneCommand extends Command
{
    public function __construct()
    {
        parent::__construct('확성기', '확성기');
        $this->setPermission(DefaultPermissions::ROOT_USER);
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args): void
    {
        if ($sender instanceof Player) {
            $sender->sendForm(new MegaphoneMainForm());
        }
    }
}
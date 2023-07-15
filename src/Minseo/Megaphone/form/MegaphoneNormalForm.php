<?php

namespace Minseo\Megaphone\form;

use Minseo\Megaphone\Megaphone;
use pocketmine\form\Form;
use pocketmine\player\Player;
use pocketmine\Server;

final class MegaphoneNormalForm implements Form
{
    public function jsonSerialize(): array
    {
        return [
            "type" => "custom_form",
            'title' => '§l§8MEGAPHONE MANAGER',
            "content"=>[
                [
                    "type" => "input",
                    "text" => "메세지를 작성해주세요."
                ]
            ]
        ];
    }
    public function handleResponse(Player $player, $data): void
    {
        if ($data === null) return;
            if (!isset($data[0])) {
                $player->sendMessage(Megaphone::prefix . "빈 칸이 존재합니다 다시 작성해주세요.");
            }
            $name = $player->getName();
            Server::getInstance()->broadcastMessage(Megaphone::prefix . "$name : $data[0]");
            $player->sendMessage(Megaphone::prefix . "확성기를 정상적으로 사용하였습니다.");
    }
}
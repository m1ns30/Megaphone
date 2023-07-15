<?php

namespace Minseo\Megaphone\form;

use pocketmine\form\Form;
use pocketmine\player\Player;

final class MegaphoneMainForm implements Form
{

    public function jsonSerialize(): array
    {
        return [
            'type' => 'form',
            'title' => '§l§8MEGAPHONE MANAGER',
            'content' => "",
            'buttons' => array_map(function (array $data): array {
                return [
                    'text' => '§l§8' . $data [0] . PHP_EOL . '§r§8' . $data [1]
                ];
            }, [
                ['일반 확성기', '- 일반 확성기를 사용합니다. -'],
                ['고급 확성기', '- 고급 확성기를 사용합니다. -'],
            ])
        ];
    }

    public function handleResponse(Player $player, $data): void
    {
        if (is_numeric($data)) {
            switch ($data) {
                case 0:
                    $player->sendForm(new MegaphoneNormalForm());
                    break;
                case 1:
                    $player->sendForm(new MegaphonePremiumForm());
                    break;
            }
        }
    }
}
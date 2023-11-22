<?php

namespace App\Livewire;

use Livewire\Component;

class MagicalStatement extends Component
{
    public $content;

    public function mount()
    {
        $christmasMessages = [
            '🎅 Ho Ho Ho! Merry Christmas and a Happy New Year! 🎄',
            '✨ Wishing you the magic and joy of the holiday season! ✨',
            '🎁 Santa sends warm wishes for a festive and joyful Christmas! 🌟',
            '❄️ May your days be merry and bright, and your Christmas be white! ❄️',
            '🔔 Jingle all the way! Have a sleigh-tastic Christmas! 🔔',
            '🦌 Sending you reindeer kisses and snowflake wishes! ❄️',
            '🎅 Santa knows if you\'ve been naughty or nice, but he wishes you a Merry Christmas anyway! 🎄',
            '❤️ May your Christmas be filled with love, laughter, and lots of presents! 🎁',
            '🎁 Santa\'s workshop is buzzing with holiday cheer just for you! 🎅',
            '🎄 Tis the season to be jolly! Merry Christmas from Santa and his elves! 🌟',
            '🎉 Wishing you a season filled with joy, peace, and festive celebrations! 🎄',
            '✨ May your Christmas sparkle with moments of love, laughter, and goodwill! ✨',
            '🦌 Santa\'s reindeer are on standby to deliver wishes of warmth and happiness to you! 🌟',
            '🛷 Sending you a magical sleigh ride of happiness and good cheer! 🎁',
            '❤️ May the spirit of Christmas wrap you in love and warmth this holiday season! 🎄',
            '🧝 Santa\'s elves are working overtime to ensure your Christmas is extra special! 🌟',
            '🔴 Wishing you a Christmas that\'s merry and bright, just like Rudolph\'s nose! 🔴',
            '🎅 Santa hopes your holiday season is wrapped in joy and tied with love! 🎁',
            '🔔 May the bells of Christmas ring with peace and happiness for you! 🔔',
            '❄️ Sending snowy hugs and mistletoe kisses your way! ❄️',
        ];

        $this->content = $christmasMessages[array_rand($christmasMessages)];
    }
    public function closeMagical()
    {
        $this->dispatch('close-box');
    }

    public function render()
    {
        return view('livewire.magical-statement', [
            'content' => $this->content,
        ]);
    }
}

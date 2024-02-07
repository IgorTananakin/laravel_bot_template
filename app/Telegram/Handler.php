<?php

namespace App\Telegram;

use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable as SupportStringable;
use Stringable;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;

class Handler extends WebhookHandler {
    public function start(){ 
        // $this->reply('dsfsdfsd');
        Telegraph::message('This bot will help you get in touch with a manager who will answer your questions and help you understand how the Linebet affiliate program works.    

*Follow us:*
- [LinkedIn](https://www.linkedin.com/company/linebet/)
- [Instagram](https://www.instagram.com/linebet.partners/)
- [YouTube](https://www.youtube.com/@linebet.partners)

*Contact us by email:*
- [b2b@linebet.com](mailto:b2b@linebet.com)

Make money with Linebet 🪙')->send();
    }

    //inline button
    public function actions(): void {
        Telegraph::message('Follow us:')->keyboard(
            Keyboard::make()->buttons([
                Button::make('LinkedIn')->url('https://www.linkedin.com/company/linebet/'),
                Button::make('Instagram')->url('https://www.instagram.com/linebet.partners/'),
                Button::make('YouTube')->url('https://www.youtube.com/@linebet.partners')
            ])
        )->send();
        
    }
    protected function handleUnknownCommand(SupportStringable $text): void
    {
        $this->reply('неизвесная команда');
    }
    protected function handleChatMessage(SupportStringable $text): void
    {
        Log::info(json_encode($this->message->toArray(), JSON_UNESCAPED_UNICODE));
    }
    // protected function handleChatMessage(Stringable $text) {
    //     Log::info(json_encode($this->message->toArray()));
    // }
}

<?php

namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class Mocky1SmsChannel
{
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toMocky1Sms($notifiable);
        $response = Http::post(config('services.sms_urls.mocky1'), [
            'phone_number' => $notifiable->phone_number,
            'message' => $message,
        ]);

        return $response->successful();
    }
}

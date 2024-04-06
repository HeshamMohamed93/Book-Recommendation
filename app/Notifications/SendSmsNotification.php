<?php

namespace App\Notifications;

use App\Notifications\Channels\Mocky1SmsChannel;
use App\Notifications\Channels\Mocky2SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Config;
class SendSmsNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function via($notifiable)
    {
        $smsProvider = Config::get('services.sms_provider');

        if ($smsProvider === 'mocky1') {
            return [Mocky1SmsChannel::class];
        } else {
            return [Mocky2SmsChannel::class];
        }
    }

    public function toMocky1Sms($notifiable)
    {
        return 'Thank you for submitting your reading interval!';
    }

    public function toMocky2Sms($notifiable)
    {
        return 'Thank you for submitting your reading interval!';
    }
}

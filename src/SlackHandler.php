<?php

namespace pschocke\SlackNotificationSettings;

use pschocke\NotificationSettings\Handler\Handler;
use pschocke\NotificationSettings\Handler\HandlerInterface;
use pschocke\NotificationSettings\Models\NotificationSetting;

class SlackHandler extends Handler implements HandlerInterface
{

    protected $request = [
        'webhook' => ['required', 'url'],
    ];

    const via = 'slack';

    protected $notificationChannel = 'slack';

    public function canSend(string $methodName): bool
    {
        return $methodName === 'slack';
    }

    public function getSend(NotificationSetting $notificationSetting)
    {
        return $notificationSetting->meta['webhook'];
    }
}

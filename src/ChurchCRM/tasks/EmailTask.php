<?php

namespace ChurchCRM\Tasks;

use ChurchCRM\dto\SystemConfig;
use ChurchCRM\dto\SystemURLs;
use ChurchCRM\Authentication\AuthenticationManager;

class EmailTask implements iTask
{
    public function isActive(): bool
    {
        return AuthenticationManager::getCurrentUser()->isAdmin() && empty(SystemConfig::hasValidMailServerSettings());
    }

    public function isAdmin(): bool
    {
        return true;
    }

    public function getLink(): string
    {
        return SystemURLs::getRootPath() . '/SystemSettings.php';
    }

    public function getTitle(): string
    {
        return gettext('Set Email Settings');
    }

    public function getDesc(): string
    {
        return gettext("SMTP Server info are blank");
    }
}

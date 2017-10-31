<?php

namespace AlexanderZabornyi\ObserverTest\Tests;

use AlexanderZabornyi\ObserverTest\User;
use AlexanderZabornyi\ObserverTest\UserObserver;
use PHPUnit\Framework\TestCase;

class ObserverTest extends TestCase
{
    public function testChangeInUserLeadsToUserObserverBeingNotified()
    {
        $observer = new UserObserver();

        $user = new User();
        $user->attach($observer);
        $user->changeEmail('test@gmail.com');

        $this->assertCount(1, $observer->getChangedUsers());
    }
}
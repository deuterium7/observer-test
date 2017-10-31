<?php

namespace AlexanderZabornyi\ObserverTest;

class UserObserver implements \SplObserver
{
    private $changedUsers = [];

    /**
     * Обновить
     *
     * @param \SplSubject $subject
     */
    public function update(\SplSubject $subject)
    {
        $this->changedUsers[] = clone $subject;
    }

    /**
     * Получить измененных пользователей
     *
     * @return array
     */
    public function getChangedUsers(): array
    {
        return $this->changedUsers;
    }
}
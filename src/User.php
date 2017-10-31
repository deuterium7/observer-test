<?php

namespace AlexanderZabornyi\ObserverTest;

use SplObserver;

class User implements \SplSubject
{
    private $email;
    private $observers;

    /**
     * User constructor.
     */
    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    /**
     * Прикрепить наблюдателя
     *
     * @param SplObserver $observer
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Снять наблюдателя
     *
     * @param SplObserver $observer
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * Сменить почтовый ящик
     *
     * @param string $email
     */
    public function changeEmail(string $email)
    {
        $this->email = $email;
        $this->notify();
    }

    /**
     * Уведомить наблюдателей
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}
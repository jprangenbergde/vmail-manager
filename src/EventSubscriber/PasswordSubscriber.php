<?php declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Account;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
class PasswordSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            EasyAdminEvents::PRE_UPDATE => ['hashPassword'],
            EasyAdminEvents::PRE_PERSIST => ['hashPassword'],
        ];
    }

    public function hashPassword(GenericEvent $event): void
    {
        $entity = $event->getSubject();

        if (!$entity instanceof Account) {
            return;
        }

        if (!$entity->getPasswordInput()) {
            return;
        }

        $salt = substr(sha1((string)rand()), 0, 16);
        $entity->setPassword(crypt($entity->getPasswordInput(), '$6$' . $salt));

        $event->offsetSet('entity', $entity);
    }
}
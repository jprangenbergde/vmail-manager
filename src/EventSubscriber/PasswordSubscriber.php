<?php declare(strict_types=1);

namespace App\EventSubscriber;

use App\Entity\Account;
use App\Service\CryptGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
final class PasswordSubscriber implements EventSubscriberInterface
{
    /**
     * @var CryptGenerator
     */
    private $generator;

    public function __construct(CryptGenerator $generator)
    {
        $this->generator = $generator;
    }

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

        $entity->setPassword($this->generator->hash($entity->getPasswordInput()));

        $event->offsetSet('entity', $entity);
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="domains")
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
final class Domain
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id = 0;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $domain = '';

    public function getId(): int
    {
        return $this->id;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }
}
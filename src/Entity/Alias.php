<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity()
 * @ORM\Table(name="aliases")
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
class Alias
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
    private $sourceUsername = '';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $sourceDomain = '';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $destinationUsername = '';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $destinationDomain = '';

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSourceUsername(): string
    {
        return $this->sourceUsername;
    }

    /**
     * @param string $sourceUsername
     */
    public function setSourceUsername(string $sourceUsername): void
    {
        $this->sourceUsername = $sourceUsername;
    }

    /**
     * @return string
     */
    public function getSourceDomain(): string
    {
        return $this->sourceDomain;
    }

    /**
     * @param string $sourceDomain
     */
    public function setSourceDomain(string $sourceDomain): void
    {
        $this->sourceDomain = $sourceDomain;
    }

    /**
     * @return string
     */
    public function getDestinationUsername(): string
    {
        return $this->destinationUsername;
    }

    /**
     * @param string $destinationUsername
     */
    public function setDestinationUsername(string $destinationUsername): void
    {
        $this->destinationUsername = $destinationUsername;
    }

    /**
     * @return string
     */
    public function getDestinationDomain(): string
    {
        return $this->destinationDomain;
    }

    /**
     * @param string $destinationDomain
     */
    public function setDestinationDomain(string $destinationDomain): void
    {
        $this->destinationDomain = $destinationDomain;
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="accounts")
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
final class Account
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
    private $username = '';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $domain = '';

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $password = '';

    /**
     * @Assert\Length(min=5)
     * @var string
     */
    private $passwordInput = '';

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $quota = 0;

    /**
     * @ORM\Column(type="boolean")
     * @var bool
     */
    private $enabled = false;

    /**
     * @ORM\Column(name="sendonly", type="boolean")
     * @var bool
     */
    private $sendOnly = false;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getPasswordInput(): ?string
    {
        return $this->passwordInput;
    }

    public function setPasswordInput(?string $passwordInput): void
    {
        $this->passwordInput = $passwordInput;
    }

    public function getQuota(): string
    {
        return $this->quota;
    }

    public function setQuota(string $quota): void
    {
        $this->quota = $quota;
    }

    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function isSendOnly(): bool
    {
        return $this->sendOnly;
    }

    public function setSendOnly(bool $sendOnly): void
    {
        $this->sendOnly = $sendOnly;
    }
}
<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 * @ORM\Table(name="accounts")
 * @author Jens Prangenberg <mail@jens-prangenberg.de>
 */
class Account
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
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @param string $domain
     */
    public function setDomain(string $domain): void
    {
        $this->domain = $domain;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getPasswordInput(): ?string
    {
        return $this->passwordInput;
    }

    /**
     * @param string|null $passwordInput
     */
    public function setPasswordInput(?string $passwordInput): void
    {
        $this->passwordInput = $passwordInput;
    }

    /**
     * @return string
     */
    public function getQuota(): string
    {
        return $this->quota;
    }

    /**
     * @param string $quota
     */
    public function setQuota(string $quota): void
    {
        $this->quota = $quota;
    }

    /**
     * @return bool
     */
    public function isEnabled(): bool
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    /**
     * @return bool
     */
    public function isSendOnly(): bool
    {
        return $this->sendOnly;
    }

    /**
     * @param bool $sendOnly
     */
    public function setSendOnly(bool $sendOnly): void
    {
        $this->sendOnly = $sendOnly;
    }
}
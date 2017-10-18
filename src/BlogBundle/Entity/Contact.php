<?php

namespace BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="BlogBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Assert\NotBlank(
     *     message="Merci de renseigner votre nom"
     * )
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255, nullable=true)
     * @Assert\NotBlank(
     *     message="merci de laisser un sujet"
     * )
     */
    private $subject;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "L'Email '{{ value }}' n'est pas valide",
     *     checkMX = true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=true)
     * @Assert\NotBlank(
     *     message="Merci renseigner votre message"
     * )
     */
    private $message;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return Contact
     */
    public function setName(string $name): Contact
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @param string $subject
     * @return Contact
     */
    public function setSubject(string $subject): Contact
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * @return string/null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @param string $email
     * @return Contact
     */
    public function setEmail(string $email): Contact
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string $message
     * @return Contact
     */
    public function setMessage(string $message): Contact
    {
        $this->message = $message;

        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }


}


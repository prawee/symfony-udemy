<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Todo", mappedBy="user", cascade={"persist", "remove"})
     * @ORM\Column(options={"default":"0"})
     */
    private $todo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getTodo(): ?Todo
    {
        return $this->todo;
    }

    public function setTodo(Todo $todo): self
    {
        $this->todo = $todo;

        // set the owning side of the relation if necessary
        if ($todo->getUser() !== $this) {
            $todo->setUser($this);
        }

        return $this;
    }
}

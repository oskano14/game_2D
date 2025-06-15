<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity]
#[ORM\Table(name: 'characters')]
#[ORM\Index(name: 'user_id', columns: ['user_id'])]
class Characters
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(type: 'string', length: 100)]
    private string $name;

    #[ORM\Column(type: 'integer', nullable: true, options: ['default' => 100])]
    private ?int $health = 100;

    #[ORM\Column(name: 'position_x', type: 'float', nullable: true)]
    private ?float $positionX = 0;

    #[ORM\Column(name: 'position_y', type: 'float', nullable: true)]
    private ?float $positionY = 0;

    #[ORM\Column(type: 'integer', nullable: true, options: ['default' => 1])]
    private ?int $level = 1;

    #[ORM\Column(name: 'defeated_boss', type: 'boolean', nullable: true)]
    private ?bool $defeatedBoss = false;

    #[ORM\Column(name: 'last_played', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeInterface $lastPlayed;

    #[ORM\ManyToOne(targetEntity: Users::class)]
    #[ORM\JoinColumn(name: 'user_id', referencedColumnName: 'id')]
    private ?Users $user = null;

    public function getId(): int { return $this->id; }
    public function getName(): string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
    public function getHealth(): ?int { return $this->health; }
    public function setHealth(?int $health): self { $this->health = $health; return $this; }
    public function getPositionX(): ?float { return $this->positionX; }
    public function setPositionX(?float $x): self { $this->positionX = $x; return $this; }
    public function getPositionY(): ?float { return $this->positionY; }
    public function setPositionY(?float $y): self { $this->positionY = $y; return $this; }
    public function getLevel(): ?int { return $this->level; }
    public function setLevel(?int $level): self { $this->level = $level; return $this; }
    public function getDefeatedBoss(): ?bool { return $this->defeatedBoss; }
    public function setDefeatedBoss(?bool $status): self { $this->defeatedBoss = $status; return $this; }
    public function getLastPlayed(): \DateTimeInterface { return $this->lastPlayed; }
    public function setLastPlayed(\DateTimeInterface $lastPlayed): self { $this->lastPlayed = $lastPlayed; return $this; }
    public function getUser(): ?Users { return $this->user; }
    public function setUser(?Users $user): self { $this->user = $user; return $this; }
}




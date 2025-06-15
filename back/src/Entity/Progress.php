<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'progress')]
#[ORM\Index(name: 'character_id', columns: ['character_id'])]
class Progress
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'IDENTITY')]
    #[ORM\Column(type: 'integer')]
    private int $id;

    #[ORM\Column(name: 'event_name', type: 'string', length: 100, nullable: true)]
    private ?string $eventName = null;

    #[ORM\Column(type: 'boolean', nullable: true)]
    private ?bool $completed = false;

    #[ORM\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    private \DateTimeInterface $timestamp;

    #[ORM\ManyToOne(targetEntity: Characters::class)]
    #[ORM\JoinColumn(name: 'character_id', referencedColumnName: 'id')]
    private ?Characters $character = null;

    public function getId(): int { return $this->id; }
    public function getEventName(): ?string { return $this->eventName; }
    public function setEventName(?string $eventName): self { $this->eventName = $eventName; return $this; }
    public function getCompleted(): ?bool { return $this->completed; }
    public function setCompleted(?bool $completed): self { $this->completed = $completed; return $this; }
    public function getTimestamp(): \DateTimeInterface { return $this->timestamp; }
    public function setTimestamp(\DateTimeInterface $timestamp): self { $this->timestamp = $timestamp; return $this; }
    public function getCharacter(): ?Characters { return $this->character; }
    public function setCharacter(?Characters $character): self { $this->character = $character; return $this; }
}

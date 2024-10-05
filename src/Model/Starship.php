<?php

namespace App\Model;

class Starship
{
    private int $id;
    private string $name;
    private string $class;
    private string $captain;
    private StarshipStatusEnum $status;

    public function __construct(int $id, string $name, string $class, string $captain, StarshipStatusEnum $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->class = $class;
        $this->captain = $captain;
        $this->status = $status;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $name): void
    {
        $this->id = $name;
    }

    public function getClass(): string
    {
        return $this->class;
    }
    public function setClass(string $class): void
    {
        $this->class = $class;
    }

    public function getCaptain(): string
    {
        return $this->captain;
    }
    public function setCaptain(string $captain): void
    {
        $this->captain = $captain;
    }

    public function getStatus(): StarshipStatusEnum
    {
        return $this->status;
    }
    public function setStatus(StarshipStatusEnum $status): void
    {
        $this->status = $status;
    }

    public function getStatusString() : string
    {
        return $this->status->value;
    }

    public function getStatusImageFilename():string
    {
        return match($this->status){
            StarshipStatusEnum::WAITING => 'images/status-waiting.png',
            StarshipStatusEnum::IN_PROGRESS => 'images/status-in-progress.png',
            StarshipStatusEnum::COMPLETED => 'images/status-complete.png',
        };
    }
}

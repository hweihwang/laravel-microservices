<?php

namespace Module\Test\DTOs;

use Support\DTOs\BaseDTO;

class TestStoreDTO implements BaseTestStoreDTO
{
    private string $name;

    private ?string $description = null;

    private int $status = 0;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return TestStoreDTO
     */
    public function setName(string $name): TestStoreDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return TestStoreDTO
     */
    public function setDescription(string $description): TestStoreDTO
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return int
     */
    public function getStatus(): int
    {
        return $this->status;
    }

    /**
     * @param int $status
     * @return TestStoreDTO
     */
    public function setStatus(int $status): TestStoreDTO
    {
        $this->status = $status;
        return $this;
    }

    public function fromArray(array $data): BaseDTO
    {
        if (isset($data['name'])) {
            $this->setName($data['name']);
        }

        if (isset($data['description'])) {
            $this->setDescription($data['description']);
        }

        if (isset($data['status'])) {
            $this->setStatus($data['status']);
        }

        return $this;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'status' => $this->getStatus(),
        ];
    }
}

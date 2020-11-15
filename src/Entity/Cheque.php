<?php

namespace App\Entity;

use App\Repository\ChequeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ChequeRepository::class)
 * @UniqueEntity(
 *     fields={"number","bank"},
 *     errorPath="number",
 *     message="This number is already used by this bank."
 * )
 */
class Cheque
{
    const BANK = [
        0 => 'BNI',
        1 => 'BFV',
        2 => 'BOA'
    ];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     */
    private $payement_date;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     */
    private $number;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @ORM\Column(type="integer")
     */
    private $bank;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayementDate(): ?\DateTimeInterface
    {
        return $this->payement_date;
    }

    public function setPayementDate(?\DateTimeInterface $payement_date): self
    {
        $this->payement_date = $payement_date;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBank(): ?int
    {
        return $this->bank;
    }

    public function setBank(int $bank): self
    {
        $this->bank = $bank;

        return $this;
    }

    public static function getBankFormChoices()
    {
        $choices = self::BANK;
        $output = [];

        foreach ($choices as $k => $v){
            $output[$v] = $k;
        }

        return $output;
    }
}

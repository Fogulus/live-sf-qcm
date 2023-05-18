<?php

namespace App\Entity;

use App\Entity\Matiere;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\QuestionnaireRepository;

#[ORM\Entity(repositoryClass: QuestionnaireRepository::class)]
class Questionnaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\ManyToOne(targetEntity: Matiere::class, inversedBy: 'questionnaires')]
    private ?Matiere $matiere = null;

    // ... Reste de votre code ...

    public function getMatiere(): ?Matiere
    {
        return $this->matiere;
    }

    public function setMatiere(?Matiere $matiere): self
    {
        $this->matiere = $matiere;

        return $this;
    }
}

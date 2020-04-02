<?php

namespace App\Service;


use App\Entity\Configuration;
use App\Repository\ConfigurationRepository;
use Doctrine\ORM\EntityManagerInterface;

class ConfigurationService
{
    private ConfigurationRepository $configurationRepository;

    private EntityManagerInterface $entityManager;

    public function __construct(
        ConfigurationRepository $configurationRepository,
        EntityManagerInterface $entityManager
    )
    {
        $this->configurationRepository = $configurationRepository;
        $this->entityManager = $entityManager;
    }

    public function getConfigValue(string $configKey) : Configuration
    {
        return $this->configurationRepository->findOneBy(
            [
                'field' => $configKey
            ]
        );
    }

    public function updateConfigurationValue(Configuration $configuration) : void
    {
        $this->entityManager->persist($configuration);
        $this->entityManager->flush();
    }
}
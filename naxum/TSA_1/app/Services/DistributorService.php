<?php

namespace App\Services;

use App\Repositories\UserRepository;

class DistributorService
{
    public function __construct(private UserRepository $userRepository) {}

    public function getTopDistributors()
    {
        $data = $this->userRepository->getTopDistributors();
    }
}

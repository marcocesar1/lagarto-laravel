<?php

namespace App\Domain;

use Carbon\Carbon;

class PetService {
    public function calculateDaysOld(string $birthdate): int
    {
        $now = Carbon::now();
        $numberOfDaysOld = Carbon::parse($now)
                                    ->diffInDays($birthdate, true);

        return $numberOfDaysOld;
    }
}
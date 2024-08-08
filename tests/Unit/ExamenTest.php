<?php

namespace Tests\Unit;

use App\Services\Examen;
use PHPUnit\Framework\TestCase;

class ExamenTest extends TestCase
{
    public function test_lagarto_with_specific_parameters(): void
    {
        $examen = new Examen();

        $response = $examen->execute(
            6, 3, 1, 10
        );

        $this->assertEquals('success on day 3', $response['hora']);
    }
}

<?php

namespace Tests\Unit;

use App\Services\Examen;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_lagarto_with_specific_parameters(): void
    {
        $examen = new Examen();

        $response = $examen->execute(
            //0,0,0,0
            6, 3, 1, 10 
            //3, 3, 0, 10 
        );

        $this->assertEquals('success on day 3', $response['hora']);
    }
}

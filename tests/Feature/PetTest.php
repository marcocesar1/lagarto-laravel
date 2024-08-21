<?php

namespace Tests\Feature;

use App\Domain\PetService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PetTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_a_pet(): void
    {
        $data = [
            'name' => 'Frodo',
            'description' => 'Central Asian Shepherd Dog',
            'type' => 'Dog',
            'birthdate' => '2024-02-01'
        ];

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertRedirect('/pets');

        $this->assertDatabaseHas('pets', [
            'name' => 'Frodo',
            'description' => 'Central Asian Shepherd Dog',
            'type' => 'Dog',
        ]);
    }
    
    public function test_user_can_create_a_pet_with_valid_old_days(): void
    {
        $birthdate  = '2024-08-01';
        $data = [
            'name' => 'Frodo',
            'description' => 'Central Asian Shepherd Dog',
            'type' => 'Dog',
            'birthdate' =>  $birthdate
        ];

        $oldDays = (new PetService())->calculateDaysOld($birthdate);

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertRedirect('/pets');

        $this->assertDatabaseHas('pets', [
            'name' => 'Frodo',
            'description' => 'Central Asian Shepherd Dog',
            'type' => 'Dog',
            'number_of_days_old' => $oldDays,
        ]);
    }

    public function test_birthdate_is_required(): void
    {
        $data = [
            'name' =>'my name',
            'description' =>' desc',
            'type' => 'Car',
            //'birthdate' => '2024-02-12'
        ];

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertSessionHasErrors(['birthdate' => 'The birthdate field is required.']);
        $response->assertRedirect('/pets/create');
    }

    public function test_type_is_required(): void
    {
        $data = [
            'name' =>'my name',
            'description' =>' desc',
            //'type' => 'Car',
            'birthdate' => '2024-02-12'
        ];

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertSessionHasErrors(['type' => 'The type field is required.']);
        $response->assertRedirect('/pets/create');
    }

    public function test_description_is_required(): void
    {
        $data = [
            'name' =>'my name',
            //'description' =>' desc',
            'type' => 'Car',
            'birthdate' => '2024-02-12'
        ];

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertSessionHasErrors(['description' => 'The description field is required.']);
        $response->assertRedirect('/pets/create');
    }
    
    public function test_name_is_required(): void
    {
        $data = [
            //'name' =>' my name'
            'description' =>' desc',
            'type' => 'Car',
            'birthdate' => '2024-02-12'
        ];

        $response = $this
                    ->from('pets/create')
                    ->post(
                        uri: route('pets.store'),
                        data: $data,
                    );

        $response->assertRedirect();
        $response->assertSessionHasErrors(['name' => 'The name field is required.']);
        $response->assertRedirect('/pets/create');
    }
}

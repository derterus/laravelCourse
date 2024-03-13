<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Doctors;
use App\Models\Patient;
use App\Models\User;

class DoctorsControllerTest extends TestCase
{
    use RefreshDatabase;

public function testIndexUnauthorized()
{
    // Попытка доступа к странице списка врачей без авторизации
    $response = $this->get('/doctors');

    // Проверка, что пользователь был перенаправлен на страницу входа
    $response->assertRedirect('/login');
}

/**
 * Test the index method for non-admin user.
 */
public function testIndexNonAdmin()
{
    $user = User::factory()->create([
        'isAdmin' => false, // Создание пользователя, который не является администратором
    ]);

    // Попытка доступа к странице списка врачей с пользователем, который не является администратором
    $response = $this->actingAs($user)->get('/doctors');

    // Проверка, что пользователь был перенаправлен на домашнюю страницу или другую страницу
    $response->assertStatus(200);
}

/**
 * Test the show method for unauthorized user.
 */
public function testShowUnauthorized()
{
    $patient = Patient::factory()->create();

    // Попытка доступа к странице пациента без авторизации
    $response = $this->get('/patient/' . $patient->id);

    // Проверка, что пользователь был перенаправлен на страницу входа
    $response->assertRedirect('/login');
}

/**
 * Test the show method for non-admin user.
 */
public function testShowNonAdmin()
{
    $patient = Patient::factory()->create();
    $user = User::factory()->create([
        'isAdmin' => false, // Создание пользователя, который не является администратором
    ]);

    // Попытка доступа к странице пациента с пользователем, который не является администратором
    $response = $this->actingAs($user)->get('/patient/' . $patient->id);

    // Проверка, что пользователь был перенаправлен на домашнюю страницу или другую страницу
    $response->assertStatus(200);
}
 /**
     * Test the edit method for unauthorized user.
     */
    public function testEditUnauthorized()
    {
        $doctor = Doctors::factory()->create();

        // Попытка доступа к странице редактирования врача без авторизации
        $response = $this->get('/doctors/' . $doctor->id . '/edit');

        // Проверка, что пользователь был перенаправлен на страницу входа
        $response->assertRedirect('/login');
    }

    /**
     * Test the edit method for non-admin user.
     */
    public function testEditNonAdmin()
    {
        $doctor = Doctors::factory()->create();
        $user = User::factory()->create([
            'isAdmin' => false, // Создание пользователя, который не является администратором
        ]);

        // Попытка доступа к странице редактирования врача с пользователем, который не является администратором
        $response = $this->actingAs($user)->get('/doctors/' . $doctor->id . '/edit');

        // Проверка, что пользователь был перенаправлен на домашнюю страницу или другую страницу
        $response->assertRedirect('/');
    }
    public function testIndexAdmin()
    {
        $user = User::factory()->create([
            'isAdmin' => true, // Создание пользователя, который является администратором
        ]);

        // Попытка доступа к странице списка врачей с пользователем, который является администратором
        $response = $this->actingAs($user)->get('/doctors');

        // Проверка, что пользователь получает статус 200
        $response->assertStatus(200);
    }

    /**
     * Test the show method for admin user.
     */
    public function testShowAdmin()
    {
        $patient = Patient::factory()->create();
        $user = User::factory()->create([
            'isAdmin' => true, // Создание пользователя, который является администратором
        ]);

        // Попытка доступа к странице пациента с пользователем, который является администратором
        $response = $this->actingAs($user)->get('/patient/' . $patient->id);

        // Проверка, что пользователь получает статус 200
        $response->assertStatus(200);
    }

    /**
     * Test the edit method for admin user.
     */
    public function testEditAdmin()
    {
        $doctor = Doctors::factory()->create();
        $user = User::factory()->create([
            'isAdmin' => true, // Создание пользователя, который является администратором
        ]);

        // Попытка доступа к странице редактирования врача с пользователем, который является администратором
        $response = $this->actingAs($user)->get('/doctors/' . $doctor->id . '/edit');

        // Проверка, что пользователь получает статус 200
        $response->assertStatus(200);
    }
}

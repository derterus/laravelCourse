<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test home page.
     */
    public function testHomePageIsWorkingCorrectly()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Test about page.
     */
    public function testAboutPageIsWorkingCorrectly()
    {
        $response = $this->get('/about');
        $response->assertStatus(200);
    }

    /**
     * Test contacts page.
     */
    public function testContactsPageIsWorkingCorrectly()
    {
        $response = $this->get('/contacts');
        $response->assertStatus(200);
    }

    /**
     * Test doctors resource.
     */
    public function testDoctorsResourceIsWorkingCorrectly()
    {
        $response = $this->get('/doctors');
        $response->assertStatus(302);
    }

    /**
     * Test patient resource.
     */
    public function testPatientResourceIsWorkingCorrectly()
    {
        $response = $this->get('/patient');
        $response->assertStatus(302);
    }
}

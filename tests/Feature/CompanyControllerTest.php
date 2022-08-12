<?php

namespace Tests\Feature;

use Tests\TestCase;

class CompanyControllerTest extends TestCase
{
    public function test_the_application_home_page_response_is_successful()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_send_form_page_response_is_successful()
    {
        $data = [
            'symbol' => 'GOOG',
            'start_date' => date('Y-m-d', strtotime('-7 days')),
            'end_date' => date('Y-m-d'),
            'email' => 'example@example.com'
        ];
        $response = $this->post('/send-form', $data);

        $response->assertStatus(200);
        $response->assertSee($data['symbol']);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;

class PageTest extends TestCase
{
    public function test_home_page_is_displayed(): void
    {
        $response = $this->get(route('home'));

        $response->assertOk();
        $response->assertSee('Hibat Apparels');
        $response->assertSee('Functional Outerwear');
        $response->assertSee('Product portfolio');
    }

    public function test_about_page_is_displayed(): void
    {
        $response = $this->get(route('about'));

        $response->assertOk();
        $response->assertSee('About Hibat');
        $response->assertSee('Our services include');
        $response->assertSee('Certifications');
    }

    public function test_products_page_lists_every_product_category(): void
    {
        $response = $this->get(route('products'));

        $response->assertOk();

        foreach (config('site.products') as $product) {
            $response->assertSee($product['name']);
        }
    }

    public function test_locations_page_lists_every_office(): void
    {
        $response = $this->get(route('locations'));

        $response->assertOk();

        foreach (config('site.locations') as $location) {
            $response->assertSee($location['address']);
        }
    }

    public function test_contact_page_is_displayed(): void
    {
        $response = $this->get(route('contact'));

        $response->assertOk();
        $response->assertSee('Tell us about your project');
        $response->assertSee('action="'.route('contact.store').'"', false);
    }
}

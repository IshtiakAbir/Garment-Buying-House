<?php

declare(strict_types=1);

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

final class PublicRoutesTest extends TestCase
{
    /**
     * Test the homepage returns 200 and contains primary brand markers.
     */
    public function test_home_page_returns_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Trivant');
        $response->assertSee('From Concept to Container');
        $response->assertSee('Request a Quote');
    }

    /**
     * Test all stub navigation routes return 200 and render successfully.
     */
    #[DataProvider('publicRoutesProvider')]
    public function test_public_stub_routes_return_successful_response(string $uri, string $expectedHeading): void
    {
        $response = $this->get($uri);

        $response->assertStatus(200);
        $response->assertSee($expectedHeading, false);
    }

    public static function publicRoutesProvider(): array
    {
        return [
            ['/about', 'About Trivant Apparel Sourcing'],
            ['/services', 'Sourcing &amp; Manufacturing Services'],
            ['/products', 'Product Categories &amp; Apparel Range'],
            ['/process', 'Our 8-Step Sourcing Process'],
            ['/compliance', 'Factory Compliance &amp; Standards'],
            ['/sustainability', 'Sustainability &amp; Eco Practices'],
            ['/contact', 'Contact &amp; Request a Quote'],
        ];
    }

    /**
     * Test custom 404 error page returns 404 status.
     */
    public function test_non_existent_route_returns_custom_404_page(): void
    {
        $response = $this->get('/page-that-does-not-exist');

        $response->assertStatus(404);
        $response->assertSee('404');
        $response->assertSee('Page Not Found');
    }
}

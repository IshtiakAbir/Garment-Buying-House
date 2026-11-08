<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class PageController extends Controller
{
    /**
     * Show a stub page for upcoming sections.
     */
    public function show(string $page): View
    {
        $pages = [
            'about' => [
                'title' => 'About Trivant Apparel Sourcing',
                'eyebrow' => 'Our Company',
                'description' => 'Learn more about our heritage, mission, executive leadership, and Bangladesh garment sourcing capabilities.',
            ],
            'services' => [
                'title' => 'Sourcing & Manufacturing Services',
                'eyebrow' => 'Our Solutions',
                'description' => 'Comprehensive product development, merchandising, quality control, lab testing, and export logistics.',
            ],
            'products' => [
                'title' => 'Product Categories & Apparel Range',
                'eyebrow' => 'Catalog Overview',
                'description' => 'Explore our high-volume knitwear, tailored wovens, denim, outerwear, sportswear, and kids apparel manufacturing.',
            ],
            'process' => [
                'title' => 'Our 8-Step Sourcing Process',
                'eyebrow' => 'Methodology',
                'description' => 'From initial inquiry and tech pack review to fabric testing, bulk cutting, and final pre-shipment inspection.',
            ],
            'compliance' => [
                'title' => 'Factory Compliance & Standards',
                'eyebrow' => 'Social & Ethical Responsibility',
                'description' => 'Our audit standards, ethical partner factory network, and social compliance verification procedures.',
            ],
            'sustainability' => [
                'title' => 'Sustainability & Eco Practices',
                'eyebrow' => 'Conscious Apparel',
                'description' => 'Sustainable materials, organic cotton, water-saving wash treatments, and ethical environmental initiatives.',
            ],
            'contact' => [
                'title' => 'Contact & Request a Quote',
                'eyebrow' => 'Get In Touch',
                'description' => 'Connect directly with our Dhaka sourcing desk for cost quotations, tech pack reviews, and sample development.',
            ],
        ];

        $pageData = $pages[$page] ?? [
            'title' => ucwords(str_replace('-', ' ', $page)),
            'eyebrow' => 'Trivant Sourcing',
            'description' => 'This section is currently being prepared with authenticated details from our Dhaka team.',
        ];

        return view('pages.stub', [
            'pageKey' => $page,
            'title' => $pageData['title'],
            'eyebrow' => $pageData['eyebrow'],
            'description' => $pageData['description'],
        ]);
    }
}

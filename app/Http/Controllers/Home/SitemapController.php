<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class SitemapController extends Controller
{
    public function index()
    {
        $xml = Cache::remember('sitemap_xml', 60, function () {
            $xml = '<?xml version="1.0" encoding="UTF-8"?>';
            $xml .= '<?xml-stylesheet type="text/xsl" href="/sitemap.xsl"?>';
            $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
            $xml .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">';

            // صفحات ثابت
            $staticPages = [
                ['url' => url('/'), 'priority' => '1.0'],
                ['url' => url('/about-us'), 'priority' => '0.6'],
                ['url' => url('/contact-us'), 'priority' => '0.6'],
            ];

            foreach ($staticPages as $page) {
                $xml .= '<url>';
                $xml .= '<loc>' . htmlspecialchars($page['url'], ENT_XML1, 'UTF-8') . '</loc>';
                $xml .= '<changefreq>weekly</changefreq>';
                $xml .= '<priority>' . $page['priority'] . '</priority>';
                $xml .= '</url>';
            }

            // محصولات همراه با تصاویر
            $products = Product::with('images')->get();

            foreach ($products as $product) {
                $xml .= '<url>';
                $xml .= '<loc>' . htmlspecialchars(
                    route('home.products.show', $product->slug),
                    ENT_XML1,
                    'UTF-8'
                ) . '</loc>';

                if ($product->updated_at) {
                    $xml .= '<lastmod>' . $product->updated_at->toAtomString() . '</lastmod>';
                }

                $xml .= '<changefreq>weekly</changefreq>';
                $xml .= '<priority>0.8</priority>';

                // تصویر اصلی محصول
                if ($product->primary_image) {
                    $imageUrl = asset(
                        trim(env('PRODUCT_IMAGES_UPLOAD_PATH'), '/') . '/' . $product->primary_image
                    );

                    $xml .= '<image:image>';
                    $xml .= '<image:loc>' . htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8') . '</image:loc>';
                    $xml .= '</image:image>';
                }

                // تصاویر اضافی محصول
                foreach ($product->images as $image) {
                    if ($image->image && $image->image !== $product->primary_image) {
                        $imageUrl = asset(
                            trim(env('PRODUCT_IMAGES_UPLOAD_PATH'), '/') . '/' . $image->image
                        );

                        $xml .= '<image:image>';
                        $xml .= '<image:loc>' . htmlspecialchars($imageUrl, ENT_XML1, 'UTF-8') . '</image:loc>';
                        $xml .= '</image:image>';
                    }
                }

                $xml .= '</url>';
            }

            // دسته‌بندی‌ها
            $categories = Category::all();

            foreach ($categories as $category) {
                $xml .= '<url>';
                $xml .= '<loc>' . htmlspecialchars(
                    route('home.categories.show', $category->slug),
                    ENT_XML1,
                    'UTF-8'
                ) . '</loc>';

                if ($category->updated_at) {
                    $xml .= '<lastmod>' . $category->updated_at->toAtomString() . '</lastmod>';
                }

                $xml .= '<changefreq>weekly</changefreq>';
                $xml .= '<priority>0.7</priority>';
                $xml .= '</url>';
            }

            $xml .= '</urlset>';

            return $xml;
        });

        return response($xml, 200)
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }
}
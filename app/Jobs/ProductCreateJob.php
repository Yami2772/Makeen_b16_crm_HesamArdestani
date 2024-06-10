<?php

namespace App\Jobs;

use App\Models\Product;
use GuzzleHttp\Promise\Create;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProductCreateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Product::create([
            'ProductsName' => fake()->lexify(),
            'Seller' => fake()->firstName(),
            'Price' => fake()->randomNumber(8, false),
            'Inventory' => fake()->randomNumber(5, true),
            'image_path' => fake()->mimeType(),
        ]);
    }
}

<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\Seller;
use Illuminate\Console\Command;

class Productcheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:seller';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $product=Product::find(1);
        dd($product->Seller->name);

    }
}

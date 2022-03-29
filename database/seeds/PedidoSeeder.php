<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pedido')->insert([
            'ArticleCode' => 1,
            'ArticleName' => Str::random(10),
            'UnitPrice'   => 600,
            'Quantity'     => 6
        ]);
    }
}

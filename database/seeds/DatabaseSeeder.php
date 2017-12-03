<?php
use App\Usuarioperfil;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Usuarioperfil::class)->times(30)->create();

    }
}

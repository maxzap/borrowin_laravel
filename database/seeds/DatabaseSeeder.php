<?php
use Faker\Generator as Faker;
use App\Usuarioperfil;
use App\Usuarioperfil_Usuarioperfil;
use App\Estadoproducto;
use App\imagenes_tipo;
use App\Imagenes;
use App\Producto;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $filePath = storage_path('images');

        $tipos_img = ['Avatar','Producto','Post'];

        for ($i=0; $i < 3; $i++) {
            factory(imagenes_tipo::class, 1)->create([
          'nombre' => $tipos_img[$i],
        ]);
        }

        $estados_prod = ['Disponible','Prestado'];

        for ($i=0; $i < 2; $i++) {
            factory(Estadoproducto::class, 1)->create([
          'estado' => $estados_prod[$i],
        ]);
        }

        $usuarios = factory(Usuarioperfil::class)->times(20)->create();

        foreach ($usuarios as $usuario) {
            for ($i=0; $i < 8; $i++) {

                          //Creo 8 Amigos por cada Usuarioperfil
                factory(Usuarioperfil_Usuarioperfil::class)->create([
                                    'user_id' => $usuario->id,
                                    'amigo' => $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt'),
]);
            }
            //creo el avatar del Usuarioperfil en la tabla imagenes
            factory(Imagenes::class)->create([
                                                      'nombre' => $usuario->userpic,
                                                      'tipo' => 1,
                                                      'producto' => null,
                                                      'user_id' => $usuario->id,
]);

            //creo 5 productos para cada usuario
            $productos = factory(Producto::class)->times(5)
                                                        ->create([
                                                            //asigno los productos al usuario creado
                                                            'user_id' => $usuario->id,
                                                        ]);

            foreach ($productos as $producto) {
                //Creo 5 iamgenes para cada producto
                factory(Imagenes::class)->times(5)->create([

                                                            'tipo' => 2,
                                                            'producto' => $producto->id,
                                                            'user_id' => $usuario->id,
                                                          ]);
            }
        }
    }
}

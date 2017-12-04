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

      $usuarios = factory(Usuarioperfil::class)->times(5)->create();

        foreach ($usuarios as $usuario) {

                        for ($i=0; $i < 8; $i++) {

                          //Creo 8 Amigos por cada Usuarioperfil
                              factory(Usuarioperfil_Usuarioperfil::class)->create([
                                    'user_id' => $usuario->id,
                                    'amigo' => $faker->biasedNumberBetween($min = 1, $max = 5, $function = 'sqrt'),
]);
}
                                                    //creo el avatar del Usuarioperfil en la tabla imagenes
                                                    factory(Imagenes::class)->create([
                                                      'nombre' => $usuario->userpic,
                                                      'tipo' => 1,
                                                      'producto' => null,
                                                      'user_id' => $usuario->id,
]);

                                                                    //creo 10 productos
                                                                    $productos = factory(Producto::class, 10)
                                                                    ->create([
                                                                      //asigno los productos al usuario creado
                                                                      'user_id' => $usuario->id,
                                                                    ])
                                                                    ->each(function ($p){
                                                                      dd($p->pluck('user_id'));
                                                                      //creo 5 imagenes por cada producto y se las asocio al producto creado.
                                                                      $p->imagenes()->save(factory(Imagenes::class)->create([
                                                                        'tipo' => 2,
                                                                        'producto' => $p->id,
                                                                        'user_id' => $p->attributes->user_id,
                                                                      ]));
                                                                    });

//                                                                         foreach ($productos as $producto) {
//                                                                           //Asocio 7 productos por cada Usuarioperfil
//                                                                           $usuario->productos()->sync($productos->random(7));
//
//                                                                                 //Creo y asocio 5 imagenes a cada producto
//
//                                                                                   factory(Imagenes::class, 5)->create([
//                                                                                     'nombre' => $faker->image($filePath, 400, 300),
//                                                                                     'tipo' => 2,
//                                                                                     'producto' => $producto->id,
//                                                                                     'user_id' => $usuario->id,
//                                                                                   ]);
//
// }

}

}
}

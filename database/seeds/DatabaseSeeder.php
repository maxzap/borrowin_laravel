<?php
use Faker\Generator as Faker;
use App\Usuarioperfil;
use App\Usuarioperfil_Usuarioperfil;
use App\Estadoproducto;
use App\imagenes_tipo;
use App\Imagenes;
use App\Producto;
use App\Post;
use App\Postcomentarios;
use App\Transaccion;
use App\Producto_Transaccion;
use App\Estadotransaccion;

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
//Creo los tipos de IMAGENES
        $tipos_img = ['Avatar','Producto','Post'];
        for ($i=0; $i < 3; $i++) {
            factory(imagenes_tipo::class, 1)->create([
          'nombre' => $tipos_img[$i],
        ]);
        }
//Creo los ESTADOS de los PRODUCTOS
        $estados_prod = ['Disponible','Prestado'];
        for ($i=0; $i < 2; $i++) {
            factory(Estadoproducto::class, 1)->create([
          'estado' => $estados_prod[$i],
        ]);
        }
//Creo los ESTADOS de las TRANSACCIONES
        $estados_trans = ['Abierta','Cerrada','Pendiente'];
        for ($i=0; $i < 3; $i++) {
            factory(Estadotransaccion::class, 1)->create([
          'estado' => $estados_trans[$i],
        ]);
        }

//Creo 20 USUARIOS
        $usuarios = factory(Usuarioperfil::class)->times(20)->create();
        foreach ($usuarios as $usuario) {

            for ($i=0; $i < 8; $i++) {
                $amigos = $faker->biasedNumberBetween($min = 1, $max = 20, $function = 'sqrt');

//Creo 8 AMIGOS por cada USUARIO
              factory(Usuarioperfil_Usuarioperfil::class)->create([
                                    'user_id' => $usuario->id,
                                    'amigo' => $amigos,
]);

//Creo 8 CONVERSACIONES de AMIGOS por cada USUARIO
              $conversacion = factory(App\Conversacion::class)->create([
                                    'user_id' => $usuario->id,
                                    'receptor_id' => $amigos,
]);

//Creo 5 MENSAJES por cada CONVERSACION
              factory(App\Mensajes::class)->times(5)->create([
                                    'conversacion_id' => $conversacion->id,
]);

//Creo 5 POST por cada USUARIO

              $posts = factory(Post::class)->times(5)->create([
                                    'user_id' => $usuario->id,

]);

              foreach ($posts as $post) {
                //Creo 5 IMAGENES para cada POST
              factory(Imagenes::class)->times(5)->create([
                                    'nombre' => 'test_post',
                                    'tipo' => 3,
                                    'producto' => $post->id,
                                    'user_id' => $usuario->id,
]);
                //Creo 5 COMENTARIOS por cada POST
              factory(Postcomentarios::class)->times(5)->create([
                                    'user_id' => $amigos,
                                    'post' => $post->id,

]);
              }

            }

            //creo el AVATAR del USURIO en la tabla IMAGENES
              factory(Imagenes::class)->create([
                                    'nombre' => $usuario->userpic,
                                    'tipo' => 1,
                                    'producto' => null,
                                    'user_id' => $usuario->id,
]);

            //creo 5 PRODUCTOS para cada USUARIO
              $productos = factory(Producto::class)->times(5)
                                                        ->create([
                                                            //asigno los productos al usuario creado
                                                            'user_id' => $usuario->id,
                                                        ]);

            foreach ($productos as $producto) {
                //Creo 5 IMAGENES para cada PRODUCTO
              factory(Imagenes::class)->times(5)->create([

                                                            'tipo' => 2,
                                                            'producto' => $producto->id,
                                                            'user_id' => $usuario->id,
                                                          ]);
              //Creo 5 TRANSACCIONES por cada PRODUCTO
              $transacciones = factory(Transaccion::class)->times(5)->create([
                                                            'producto_id' => $producto->id,
                                                            'user_id' => $usuario->id,
                                                            'receptor_id' => $amigos,
                                                          ]);
              $transacciones_ids = $transacciones->pluck('id');

              foreach ($transacciones_ids as $key => $transaccion_id) {
                //Almaceno la TRANSACCIONES en la tabla TRANSACCIONES_PRODUCTO
                factory(Producto_Transaccion::class)->create([
                  'transaccion' => $transaccion_id,
                  'producto' => $producto->id,
                ]);
              }

            }
        }
    }
}

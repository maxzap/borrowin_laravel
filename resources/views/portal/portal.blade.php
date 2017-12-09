@extends('layouts.app')
@section('content')
  <section class="nuevo-post">
    <header>
      <h3>Algo nuevo para contar?</h3>
    </header>
    <form action="{{ route('crear_post') }}" method='POST' >
        {{ csrf_field() }}
          <div class="form-post">
              <textarea name="cuerpo" id="nuevo-post" rows="5" placeholder="Nuevo Post"></textarea>
          </div>
        <button type="submit" name="enviar">Crear Post</button>
        {{ session('status') }}
    </form>
  </section>
  <section class="posts">
    <div class="div-posts">
      <header>
        <h3>Lo que opina el resto de la gente..</h3>
      </header>
      <article class="post">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
        <div class="info">
          Posteado por
        </div>
        <div class="interaccion">
          <a href="#">Likes</a> |
          <a href="#">No me gusta</a> |
          <a href="#">Editar</a> |
          <a href="#">Borrar</a>
        </div>
      </article>

    </div>

  </section>

@endsection

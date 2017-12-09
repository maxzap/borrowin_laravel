@extends('layouts.app')
@section('content')
  @guest
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

    @else
      <section class="nuevo-post">
        <header>
          <h3>Algo nuevo para contar?</h3>
        </header>
        <form method="POST" action="{{ route('crear_post') }}">
          {{ csrf_field() }}
          @include('portal._form-nuevo_post')
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
  @endguest

@endsection

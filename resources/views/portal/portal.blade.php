@extends('layouts.app')
@section('content')
  @guest
    <section class="posts">
      <div class="div-posts">
        <header>
          <h3>Lo que opina el resto de la gente..</h3>
        </header>
        <article class="post-guest">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt</p>
          <div class="info">
            Posteado por
          </div>
          <div class="interaccion">
            <a href="#">Likes</a> |
            <a href="#">No me gusta</a> |
            <a href="#">Editar</a> |
            <a href="">Borrar</a>
          </div>
        </article>

      </div>

    </section>

    @else
      <section class="nuevo-post">
        <header>
          <h3>Algo nuevo para contar?</h3>
        </header>
        @if(count($errors)>0)
        <p>
          <ul>
            @foreach($errors->all() as $error)
              <li style="color:red">{{ $error }}</li>
            @endforeach
          </ul>
        </p>
        @endif
        @if(Session::has('mensaje'))
        <p>
          <ul>
              <li style="color:green">{{ Session::get('mensaje') }}</li>
          </ul>
        </p>
        @endif
        <form method="POST" action="{{ route('post_crear') }}">
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
            @foreach ($posts as $post)
              {{ $post->texto }}
              <br>
              <div class="info">
                Posteado por {{ $post->usuario->nombre . " el " . $post->created_at}}
              </div>
              <div class="interaccion">
                <a href="#">Me gusta!</a> |
                <a href="#">No me gusta</a>
                @if (Auth::user()->id == $post->usuario->id)
                  |
                  <a href="#">Editar</a> |
                  <a href="{{ route('borrar_post', $post) }}">Borrar</a>
                  {{ method_field('DELETE') }}
                @endif
              </div>
            @endforeach
          </article>

        </div>

      </section>
  @endguest
  <div class="modal fade" tabindex="-1" role="dialog" id="modal-editar">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edición de Post</h4>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
              <label for="post-cuerpo">Editar el Post</label>
              <textarea class="form-control" name="post-cuerpo" id="post-cuerpo" rows="8"></textarea>
            </div>

          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
@endsection

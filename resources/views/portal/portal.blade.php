@extends('layouts.fixed_menu')
@section('title')
  Index
@stop
@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="nav_top_align">
                        <i class="fa fa-share-alt"></i>
                        Muro
                    </h4>
                </div>
            </div>
        </div>
    </header>
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
          @foreach ($posts as $post)
            <article class="post" data-postid="{{ $post->id }}">
              <p>{{ $post->texto }}</p>
              <br>
                <div class="info">
                  Posteado por {{ $post->usuario->nombre . " el " . $post->created_at}}
                </div>
                <div class="interaccion">
                      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 1 ? 'Te gusta este post!' : 'Me gusta' : 'Me gusta ' }}</a> |
                      <a href="#" class="like">{{ Auth::user()->likes()->where('post_id', $post->id)->first() ? Auth::user()->likes()->where('post_id', $post->id)->first()->like == 0 ? 'No te gusto!' : 'No me gusta' : 'No me gusta ' }} </a>
                      @if (Auth::user()->id == $post->usuario->id)
                        |
                        <a href="#" class="editar">Editar</a> |
                        <a href="{{ route('borrar_post', $post) }}">Borrar</a>
                        {{ method_field('DELETE') }}
                      @endif
                </div>
            </article>
            <br>
            @endforeach
      </div>
    </section>
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
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary" id="modal-guardar">Guardar Cambios</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
    var token = '{{ Session::token() }}';
    var urlEditar = '{{ route('post_editar') }}';
    var urlLike = '{{ route('post_like') }}';
    </script>
@stop

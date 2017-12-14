@extends('layouts/fixed_menu')

@section('title')
    Perfil
@stop
@section('header_styles')

    <link type="text/css" rel="stylesheet" href="{{asset('assets/css/pages/profile.css')}}"/>

@stop

@section('content')
    <header class="head">
        <div class="main-bar">
            <div class="row">
                <div class="col-lg-6 col-sm-5 col-12">
                    <h4 class="nav_top_align skin_txt">
                        <i class="fa fa-user"></i>
                        Mi Perfil
                    </h4>
                </div>
            </div>
        </div>
    </header>
    <div class="outer">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 m-t-35">
                            <div class="text-center">
                                    <div class="">
                                        <img class="admin_img4" src="{{ \Auth::user()->perfil->userpic }}" alt="Aun no subiste una imagen"></div>
                                      </div>
                                  </div>
                        <div class="col-lg-6 m-t-25">
                                <ul class="nav nav-inline">
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link active" href="#user" id="home-tab"
                                           data-toggle="tab">Datos de usuario</a>
                                    </li>
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link" href="#tab2" id="hats-tab" data-toggle="tab">Sobre mí</a>
                                    </li>
                                    <li class="nav-item card_nav_hover">
                                        <a class="nav-link" href="#tab3"  id="followers" data-toggle="tab">Contactos</a>
                                    </li>
                                </ul>
                                <div id="clothing-nav-content" class="tab-content m-t-10">
                                    <div role="tabpanel" class="tab-pane fade show active" id="user">
                                        <table class="table" id="users">
                                            <tr>
                                                <td>Usuario</td>
                                                <td class="">
                                                    <span>{{ \Auth::user()->perfil->nombre }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>E-mail</td>
                                                <td>
                                                    <span>{{ \Auth::user()->email }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Teléfono</td>
                                                <td>
                                                    <span></span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Registrado desde:</td>
                                                <td>{{ \Auth::user()->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <td>País</td>
                                                <td>
                                                    <span>{{ \Auth::user()->perfil->pais }}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Provincia</td>
                                                <td>
                                                    <span></span>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab2">
                                        <div class="card_nav_body_padding">
                                            <p>
                                                Información adicional del usuario
                                            </p>
                                            <p class="text-justify">
                                              Soy una persona responsable, cuido las cosas ajenas, y espero que otros cuiden las mias
                                            </p>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab3">
                                        <div class="">
                                            <div class="row">
                                                <div class="">
                                                  <a href="#">
                                                      <img class="admin_img3"src="{{asset('assets/img/profile/20171013230324_profile.jpg')}}" class="rounded-circle" alt="friend">
                                                  </a>
                                                    <div class="details">
                                                        <div class="name">
                                                            <a href="#">Carlos Calvo</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-l-20">
                                                  <a href="#">
                                                      <img class="admin_img3"src="{{asset('assets/img/profile/20171013230324_profile.jpg')}}" class="rounded-circle" alt="friend">
                                                  </a>
                                                    <div class="details">
                                                        <div class="name">
                                                            <a href="#">Carlos Calvo 2</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-l-20">
                                                  <a href="#">
                                                      <img class="admin_img3"src="{{asset('assets/img/profile/20171013230324_profile.jpg')}}" class="rounded-circle" alt="friend">
                                                  </a>
                                                    <div class="details">
                                                        <div class="name">
                                                            <a href="#">Carlos Calvo 3</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@stop
@section('footer_scripts')
@stop

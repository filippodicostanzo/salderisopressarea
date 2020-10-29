@extends('front.template.master')

@section('adminlte_css')
    @stack('css')
    @yield('css')
@stop

@section('classes_body')

@section('body_data',
(config('adminlte.sidebar_scrollbar_theme', 'os-theme-light') != 'os-theme-light' ? 'data-scrollbar-theme=' . config('adminlte.sidebar_scrollbar_theme')  : '') . ' ' . (config('adminlte.sidebar_scrollbar_auto_hide', 'l') != 'l' ? 'data-scrollbar-auto-hide=' . config('adminlte.sidebar_scrollbar_auto_hide')   : ''))



@section('body')
    <div class="wrapper" id="app">

    @yield('wrapper')

    @yield('footer')

    <!-- Back to top -->

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
@stop

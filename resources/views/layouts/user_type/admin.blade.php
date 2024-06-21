@extends('layouts.app')

@section('admin')

    @if(\Request::is('admin/dashboard')) 
        @include('layouts.navbars.admin.sidebar')
            <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg overflow-hidden">
            @include('layouts.navbars.admin.nav')
                <div class="container-fluid py-4">
                    @yield('content')
                    @include('layouts.footers.admin.footer')
                </div>
            </main>
            
    @elseif(\Request::is('admin-profile'))  
        @include('layouts.navbars.admin.sidebar')
        <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
            @include('layouts.navbars.admin.nav')
            @yield('content')
        </div>

    @else
        @include('layouts.navbars.admin.sidebar')
        <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg {{ (Request::is('rtl') ? 'overflow-hidden' : '') }}">
            @include('layouts.navbars.admin.nav')
            <div class="container-fluid py-4">
                @yield('content')
                @include('layouts.footers.admin.footer')
            </div>
        </main>
    @endif

    @include('components.fixed-plugin')

@endsection

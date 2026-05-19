@extends('layouts.app')

@section('content')
<div style="min-height:60vh; display:flex; align-items:center; justify-content:center; padding:40px 24px;">
    <div style="text-align:center; max-width:500px;">
        
        <div style="font-size:64px; margin-bottom:16px;">🔒</div>
        
        <h1 style="color:#ffffff; font-size:28px; font-weight:700; margin-bottom:12px;">
            Acceso restringido
        </h1>
        
        <p style="color:#a8b8c8; font-size:16px; line-height:1.7; margin-bottom:32px;">
            {{ $exception->getMessage() }}
        </p>

        <a href="{{ route('usuarios.planes') }}"
           style="display:inline-block; background-color:#1DB954; color:#ffffff;
                  padding:13px 32px; border-radius:8px; text-decoration:none;
                  font-size:15px; font-weight:700;">
            Ver mis planes disponibles
        </a>
        
    </div>
</div>
@endsection
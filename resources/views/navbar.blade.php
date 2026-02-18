<div class="fixed-top border-0" style="box-shadow: none !important;">
    
    <div class="py-2 text-white border-0" 
         style="background-color: #0e2f53; font-size: 0.85rem; width: 100%; border: none !important;">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <div class="d-flex gap-4">
                <span><i class="bi bi-envelope me-2"></i>info@gentrading.com</span>
                <span><i class="bi bi-telephone me-2"></i>+34 228 45 54 21</span>
                <span class="d-none d-lg-inline"><i class="bi bi-geo-alt me-2"></i>Arrecife, Lanzarote, España</span>
            </div>
            <div class="d-none d-md-block text-white-50">
                Descuentos del 15-30% para jubilados y estudiantes
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-3 border-0" 
         style="background-color: #1a428b; border: none !important; margin-top: -1px; box-shadow: none !important;">
        <div class="container d-flex justify-content-between">
            
        <a class="navbar-brand d-flex align-items-center fw-bold fs-3" href="/">
            <img src="/imagenes/logo.webp" alt="Logo" 
                class="rounded-circle me-2" 
                style="width: 45px; height: 45px; object-fit: cover; border: 1px solid rgba(255,255,255,0.2);">
            Gen Trading
        </a>
            <div class="d-flex align-items-center">
                <ul class="nav me-auto mb-2 mb-lg-0 gap-3">
                    <li class="nav-item"><a class="nav-link text-white" href="#caracteristicas">Características</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#elegirnos">¿Por qué elegirnos?</a></li>
                    <li class="nav-item"><a class="nav-link text-white fw-bold" href="#planes">Planes</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#donaciones">Donaciones</a></li>
                    </ul>
            </div>

            <div class="d-flex align-items-center gap-3">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-light rounded-pill px-4">Dashboard</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('login') }}" 
                               class="btn fw-bold rounded-pill px-4 py-2" 
                               style="background-color: #ffffff; color: black; border: none;">
                               Log in
                            </a>
                            <a href="{{ route('register') }}" 
                               class="btn fw-bold rounded-pill px-4 py-2" 
                               style="background-color: #00a878; color: white; border: none;">
                               Registro
                            </a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
</div>
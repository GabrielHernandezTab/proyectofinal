<section class="space-y-4">
    <header>
        <h2 class="text-lg font-bold text-gray-900">Progreso en cursos</h2>
        <p class="mt-1 text-sm text-gray-600">Tu avance se actualiza automáticamente según el tiempo que dedicas a cada curso.</p>
    </header>

    @php
        $cursos = [
            'basico'   => ['nombre' => 'Pack Básico',    'color' => '#0ea5e9', 'max' => 1800],
            'avanzado' => ['nombre' => 'Pack Avanzado',  'color' => '#8b5cf6', 'max' => 3600],
            'supremo'  => ['nombre' => 'Pack Supremo',   'color' => '#f59e0b', 'max' => 5400],
        ];
    @endphp

    <div class="space-y-4 mt-2">
        @foreach ($cursos as $clave => $info)
            @php
                $progreso = $progresos[$clave] ?? null;
                $segundos = $progreso ? $progreso->segundos_totales : 0;
                $porcentaje = min(100, (int) round(($segundos / $info['max']) * 100));
                $minutos = (int) floor($segundos / 60);
            @endphp

            <div>
                <div class="flex justify-between items-center mb-1">
                    <span class="text-sm font-semibold text-gray-800">{{ $info['nombre'] }}</span>
                    <span class="text-sm font-bold" style="color: {{ $info['color'] }}">{{ $porcentaje }}%</span>
                </div>
                <div class="w-full bg-gray-200 rounded-full h-3">
                    <div class="h-3 rounded-full transition-all duration-500"
                         style="width: {{ $porcentaje }}%; background-color: {{ $info['color'] }};"></div>
                </div>
                <p class="text-xs text-gray-500 mt-1">
                    {{ $minutos }} min dedicados
                    @if ($porcentaje >= 100)
                        · <span class="text-green-600 font-semibold">✓ Completado</span>
                    @endif
                </p>
            </div>
        @endforeach
    </div>
</section>
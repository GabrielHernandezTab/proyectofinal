<x-guest-layout>

    <div style="text-align:center; margin-bottom:24px;">
        <h2 style="color:#111827; font-size:20px; font-weight:700; margin:0 0 6px;">
            Nueva contraseña
        </h2>
        <p style="color:#374151; font-size:14px; margin:0;">
            Introduce y confirma tu nueva contraseña para acceder a GeN Trading.
        </p>
    </div>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Token oculto -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email -->
        <div style="margin-bottom:16px;">
        <label style="display:block; color:#111827; font-size:13px; font-weight:700; margin-bottom:6px;">
                Email
            </label>
            <input type="email" name="email"
                   value="{{ old('email', $request->email) }}"
                   required autocomplete="username"
                   style="width:100%; padding:11px 14px; background:#0d1b2a;
                          border:1px solid #1e3a52; border-radius:8px;
                          color:#ffffff; font-size:14px; box-sizing:border-box;">
            @error('email')
                <p style="color:#f87171; font-size:12px; margin:4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Nueva contraseña -->
        <div style="margin-bottom:16px;">
            <label style="display:block; color:#111827; font-size:13px;
                           font-weight:700; margin-bottom:6px;">
                Nueva contraseña
            </label>
            <input type="password" name="password"
                   required autocomplete="new-password"
                   style="width:100%; padding:11px 14px; background:#0d1b2a;
                          border:1px solid #1e3a52; border-radius:8px;
                          color:#ffffff; font-size:14px; box-sizing:border-box;">
            @error('password')
                <p style="color:#f87171; font-size:12px; margin:4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirmar contraseña -->
        <div style="margin-bottom:24px;">
            <label style="display:block; color:#111827; font-size:13px;
                           font-weight:700; margin-bottom:6px;">
                Confirmar nueva contraseña
            </label>
            <input type="password" name="password_confirmation"
                   required autocomplete="new-password"
                   style="width:100%; padding:11px 14px; background:#0d1b2a;
                          border:1px solid #1e3a52; border-radius:8px;
                          color:#ffffff; font-size:14px; box-sizing:border-box;">
            @error('password_confirmation')
                <p style="color:#f87171; font-size:12px; margin:4px 0 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Botón -->
        <button type="submit"
            style="width:100%; background-color:#1DB954; color:#ffffff;
                   padding:13px 0; border:none; border-radius:8px;
                   font-size:15px; font-weight:700; cursor:pointer;
                   letter-spacing:0.4px;">
            Guardar nueva contraseña
        </button>

    </form>

</x-guest-layout>
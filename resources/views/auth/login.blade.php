<head>
    <link rel="stylesheet" href="{{ asset('assets/estilo_inicio.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
</head>


    <div class="box_contenedor_formulario">
        <form action="{{route('login')}}" method="post" class="formulario">
            @csrf
            <div class="box_imagen">
               <h2>LOGIN</h2>
            </div>
            <div class="box_contenedor">
                <div class="box_contenedor_input">
                    <label for="">Email</label>
                </div>
                <div class="box_contenedor_input">
                    <input type="text" name="email" id="usuario" value="{{ old('email') }}">
                </div>
                @error('email')
                <div class="mensaje_incorrecto"><p>{{$message}}</p></div>
                @enderror
                <div class="box_contenedor_input">
                    <label for="">Contraseña</label>
                </div>
                <div class="box_contenedor_input">
                    <input type="password" name="password" id="">
                </div>
                @error('password')
                    <div class="mensaje_incorrecto"><p>{{$message}}</p></div>
                @enderror
                <div class="box_contenedor_input">
                    <button type="subtmit">LOGIN</button>
                </div>
            </div>
        </form>
        
        <label>¿Ya tiene cuentas? <a href="{{route('register')}}">Registrate</a></label> 
    </div>


    <head>
        <link rel="stylesheet" href="{{ asset('assets/estilo_inicio.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/estilo.css') }}">
    </head>

    <div class="box_contenedor_formulario">
        <form action="{{route('register')}}" method="post">
            @csrf
            <div class="box_imagen">
               <h2>REGISTRATE</h2>
            </div>

            <div class="box_contenedor">
                <div class="box_contenedor_input">
                    <label for="">Nombre Completo</label>
                </div>
                <div class="box_contenedor_input">
                    <input type="text" name="name" value="{{ old('name') }}"/>
                </div>
                @error('name')
                    <div class="mensaje_incorrecto"><p>{{$message}}</p></div>
                @enderror
                <div class="box_contenedor_input">
                    <label for="">Email</label>
                </div>
                <div class="box_contenedor_input">
                    <input type="email" name="email"  value="{{ old('email') }}"/>
                </div>
                @error('email')
                <div class="mensaje_incorrecto"><p>{{$message}}</p></div>
                @enderror
                <div class="box_contenedor_input">
                    <label for="">Contraseña </label>
                </div>
                <div class="box_contenedor_input">
                    <input type="password" name="password" value=""/>
                </div>
               
                @error('password')
                    <div class="mensaje_incorrecto"><p>{{$message}}</p></div>
                @enderror
                <div class="box_contenedor_input">
                    <label for="">Confirmar Contraseña</label>
                </div>
                <div class="box_contenedor_input">
                    <input type="password" name="password_confirmation" />
                </div>
                <div class="box_contenedor_input">
                    
                    <button type="subtmit">Registrar</button>
                </div>
            </div>


        </form>
        <label>¿Ya tiene cuentas? <a href="{{route('login')}}">Ingresa</a></label> 
        
        
    </div>

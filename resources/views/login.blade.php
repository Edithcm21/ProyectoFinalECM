
 <section class=" gradient-form login" style="background-color: #eee;">
    <div class="container py-1 ">
        <div class="row d-flex justify-content-center align-items-center ">
            <div class="col-xl-5" >
                <div class="card rounded-3 text-black color-login">
                    <div class="row g-0 " >
                        <div class="col-lg-12  " >
                            <div class="card-body p-md-4 mx-md-4 ">
                                <div class="text-center">
                                    <img src="{{ asset('images/Logo.png') }}"
                                         style="width: 200px;" alt="logo">
                                    <h3 class="mt-1 mb-3 pb-1">Iniciar Sesion</h3>
                                </div>
                                
                                <form action="{{ route('login') }}" method="POST">
                                @csrf
                                @if ($errors->any())
                                    <div class="alert alert-danger  fade show myAlert" role="alert" id="myAlert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                            @endforeach
                                      </div>
                                @endif 
                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="email">Correo</label>
                                        
                                        <input type="text" name="email" id="email" class="form-control" minlength="5"/>
                                    </div>

                                    <div class="form-outline mb-2">
                                        <label class="form-label" for="password">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                    </div>

                                    <div class="text-center pt-1 mb-3 pb-1">
                                        <input type="submit" class=" btn btn-outline-danger btn-largo  mb-3" name="accion" value="ingresar">
                                        
                                    </div>
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> 
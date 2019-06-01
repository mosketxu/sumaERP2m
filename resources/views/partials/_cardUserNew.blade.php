<div class="card mb-3">
    <div class="card-header text-primary">
        <div class="row">
            <div class="col-auto ">
                <i class="fas fa-user-plus"></i>
                @yield('title')
            </div>
            <div class="col-auto mr-auto"></div>
            <div class="col-auto"></div>
        </div>            
    </div>
    <div class="card-body">
        @include('partials._errores')
        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
            @csrf
            <div class="row">
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" ><i class="fas fa-user text-primary"></i></span>
                    </div>
                    <input type="text" class="form-control" name="newusername" value="{{ old('newusername') }}" autocomplete="newusername" placeholder="Nombre"/>
                </div>
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user-tag text-primary"></i></span>
                    </div>
                    <input type="text" class="form-control" name="newuserlastname" value="{{ old('newuserlastname') }}" placeholder="Apellido"/>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-at text-primary"></i></span>
                    </div>
                    <input type="email" class="form-control" name="newuseremail"  value="{{ old('newuseremail') }}" placeholder="email"/>
                </div>
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-pencil-ruler text-primary"></i></span>
                    </div>
                    <select class="custom-select custom-select-sm" name="newuserrole">
                        <option selected>Selecciona un rol...</option>
                        @foreach ($roles as $role )
                        <option value="{{$role->role}}">{{$role->role}}</option>                                
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-unlock-alt text-primary"></i></span>
                    </div>
                    {{-- <input type="text" class="form-control" name="newuserpassword" placeholder="Password mínimo 6 caracteres"/> --}}
                    <input type="text"  class="form-control" id="newuserpassword" name="newuserpassword" autocomplete="off" placeholder="Password mínimo 6 caracteres"/>
                </div>
                <div class="input-group input-group-sm mb-3 col-sm-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-lock text-primary"></i></span>
                    </div>
                    <input type="text"  class="form-control" id="newuserpassword_confirmation" name="newuserpassword_confirmation" autocomplete="off" placeholder="confirma el password"/>
                </div>
            </div>
            <div class="row">
                <div class="input-group input-group-sm mb-3 col">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-fw fa-address-card text-primary"></i></span>
                    </div>
                    <select id="listaempresas" data-placeholder="Empresas..." class="form-control select2"  multiple  name="newuserempresaId[]">
                        @foreach ($empresas as $empresa )
                        <option value="{{$empresa->id}}">{{$empresa->name}}</option>                                
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

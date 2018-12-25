                <div class="table-responsive">
                    <table class="table table-hover table-sm small">
                        <thead>
                            <tr>
                                <th>Empresa</th>
                                <th>Tipo</th>
                                <th>Cif</th>
                                <th>Conta.</th>
                                <th>Banco</th>
                                <th>Iban</th>
                                <th>P.Pago</th>
                                <th>F.Pago</th>
                                <th>Vto</th>
                                <th>Estado</th>
                                <th>Op.</th>
                            </tr>
                        </thead>
                        <tbody class="text-muted">
                        @foreach ($empresas as $empresa)
                            <tr>
                                <td>{{$empresa->name}}</td>
                                <td>{{$empresa->tipempr3}}</td>
                                <td>{{$empresa->cifnif}}</td>
                                <td>{{$empresa->cuentacontable}}</td> 
                                <td>{{substr($empresa->bank,0,5)}}</td>
                                <td>{{$empresa->iban}}</td>
                                <td>{{substr($empresa->periodopago,0,5)}}</td>
                                <td>{{substr($empresa->formapago,0,5)}}</td>
                                <td>{{$empresa->diavencimiento}}</td>
                                <td>
                                    @if($empresa->estado==1)
                                        <i class="fa fa-check "></i>
                                    @else
                                        <i class="far fa-times-circle text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('empresas.show',$empresa->slug) }}"><i class="far fa-eye text-success"></i></a>
                                    <a href="{{route('empresas.edit',$empresa->id) }}"><i class="far fa-edit text-primary"></i></a>
                                    <a href="{{route('empresas.destroy',$empresa->id) }}"><i class="far fa-trash-alt text-danger"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="pagination-sm">
                        {{ $empresas->links() }}
                    </div>
                </div>
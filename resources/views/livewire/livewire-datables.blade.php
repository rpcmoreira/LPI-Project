<div>

    <div class="row mb-4">
        <div class="col form-inline">
            Por Página: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>16</option>
                <option>24</option>
                <option>30</option>
            </select>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th wire:click="sortBy('nome')" style="cursor:pointer">Nome do Projeto</th>
                    <th wire:click="sortBy('estudo_id')" style="cursor:pointer">Estudo</th>
                    <th wire:click="sortBy('area_id')" style="cursor:pointer">Area</th>
                    <th wire:click="sortBy('estado_id')" style="cursor:pointer">Estado</th>
                </tr>
            </thead>
            @foreach($projetos as $projeto)
            <tbody>
                <tr>
                    <td><form method="POST" action="{{ route('projeto_info') }}">
                    @csrf
                    <button type="submit" class="btn btn-link" name="id" value="{{$projeto->id}}">{{ $projeto->nome }}</button>
                    </form></td>
                    <td>{{ DB::table('estudos')->where('id', $projeto->estudo_id)->value('nome') }}</td>
                    <td>{{ DB::table('area')->where('id', $projeto->area_id)->value('nome') }}</td>
                    @if(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Em Curso')
                    <td style="color:green"> <span style="font-weight: bold;"> {{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
                    @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Falta Informação')
                    <td style="color:red"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
                    @elseif(DB::table('estado')->where('id', $projeto->estado_id)->value('estado') == 'Finalizado' )
                    <td style="color:grey"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }} </span></td>
                    @else
                    <td style="color:orange"><span style="font-weight: bold;">{{ DB::table('estado')->where('id', $projeto->estado_id)->value('estado') }}</span></td>
                    @endif
                </tr>
                </form>
            </tbody>
            @endforeach
        </table>
        <div>
            <p>{!! $projetos->links('pagination::bootstrap-4')!!}</p>
        </div>
    </div>

</div>

</div>
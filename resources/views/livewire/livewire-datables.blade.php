<div>
    <div class="row mb-4">
        <div class="col form-inline">
            Por Página: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>16</option>
                <option>24</option>
                <option>30</option>
            </select>
            
            <input type="search" wire:model="search" class="form-control float-end mx-2" placeholder="Pesquisar pelo nome" />
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th wire:click="sortBy('nome')" style="cursor:pointer">Nome do Projeto</th>
                    <th wire:click="sortBy('proponente_id')" style="cursor:pointer">Nome</th>
                    <th wire:click="sortBy('estudo_id')" style="cursor:pointer">Estudo</th>
                    <th wire:click="sortBy('estado_id')" style="cursor:pointer;">Estado</th>
                </tr>
            </thead>
            @foreach($projetos as $projeto)
            <tbody>
                <tr wire:click="projeto({{$projeto->id}})" style="cursor:pointer; font-weight: bold;">
                    <td>{{ $projeto->nome }}</td>
                    <td>{{ DB::table('users')->where('id', $projeto->proponente_id)->value('nome') }}</td>
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
           {{ $projetos->links() }}
    </div>
</div>
</div>
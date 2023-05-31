<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projeto;
use Illuminate\Support\Facades\DB;


class LivewireDatables extends Component
{
    use WithPagination;
    public $sort = 'nome';

    public $direction = 'asc';

    public $perPage = 16;
    public $search = '';
    protected $paginationTheme = 'bootstrap';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $projects = projeto::query()->orderBy($this->sort, $this->direction);

        if ($this->search) {
            $projects = projeto::where(function ($query) {
                $query->where('projetos.nome', 'like', '%' . $this->search . '%')
                    ->orWhere('users.nome', 'like', '%' . $this->search . '%')
                    ->orWhere('area.nome', 'like', '%' . $this->search . '%')
                    ->orWhere('estado.estado', 'like', '%' . $this->search . '%');
            })
                ->leftJoin('users', 'projetos.proponente_id', '=', 'users.id')
                ->leftJoin('area', 'projetos.area_id', '=', 'area.id')
                ->leftJoin('estado', 'projetos.estado_id', '=', 'estado.id')
                ->orderBy('projetos.nome', 'asc');
        }
        $projects = $projects->paginate($this->perPage);
        return view('livewire.livewire-datables', [
            'projetos' => $projects
        ]);
    }

    public function sortBy($field)
    {
        $this->direction = ($this->direction == 'asc') ? 'desc' : 'asc';
        $this->sort = $field;
    }

    public function projeto($field)
    {
        $projeto = projeto::where('id', $field)->first();
        session(['projeto' => $projeto]);
        session()->save();
        return redirect('/projetoInfo');
    }
    public function configure(): void
    {
        // Shorthand for $this->setSearchStatus(true)
        $this->setSearchEnabled();
    }
}

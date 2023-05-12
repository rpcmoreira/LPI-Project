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

    public function render()
    {
        $projects = projeto::query()->orderBy($this->sort, $this->direction)->paginate($this->perPage);

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
}

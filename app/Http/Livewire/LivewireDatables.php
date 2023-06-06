<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\projeto;
use Illuminate\Support\Facades\DB;


/* The `class LivewireDatables extends Component` is defining a Livewire component called
`LivewireDatables` that extends the `Component` class. This component is used to render a paginated
table of projects with sorting and searching functionality. It uses the `WithPagination` trait to
handle pagination and the `projeto` model to retrieve data from the database. The `render` method is
responsible for rendering the component's view with the paginated data. The `updatingSearch` method
is called when the search input is updated and resets the pagination to the first page. The `sortBy`
method is used to handle sorting of the table columns. The `projeto` method is used to redirect to a
page with more information about a specific project. */
class LivewireDatables extends Component
{
    use WithPagination;
    /* `public  = 'nome';` is defining a public property `` with a default value of `'nome'`.
    This property is used to determine the column to sort the table by. `'nome'` is the default
    column to sort by, but it can be overridden by the user if they choose to sort by a different
    column. */
    public $sort = 'nome';

    /* `public  = 'asc';` is defining a public property `` with a default value of
    `'asc'`. This property is used to determine the direction of the sorting of the table columns.
    `'asc'` stands for ascending order, meaning that the table will be sorted in ascending order
    based on the selected column. This property can be overridden by the user if they choose to
    change the sorting direction. */
    public $direction = 'asc';

    /* `public  = 16;` is defining a public property `` with a default value of 16.
    This property is used to determine the number of items to display per page in the paginated
    table. It can be overridden by the user if they choose to change the number of items per page. */
    public $perPage = 16;

    /* `public  = '';` is defining a public property `` with a default value of an empty
    string. This property is used to store the search query entered by the user in the search input
    field. It is used to filter the results of the paginated table based on the search query. When
    the user updates the search query, the `updatingSearch` method is called to reset the pagination
    to the first page. */
    public $search = '';

    /* `protected  = 'bootstrap';` is setting the pagination theme to 'bootstrap'. This
    means that the pagination links and controls in the Livewire component's view will be styled
    using Bootstrap CSS classes and styles. This property is defined in the `LivewireDatables`
    class, which extends the `Component` class and uses the `WithPagination` trait to handle
    pagination. By setting the pagination theme to 'bootstrap', the Livewire component's pagination
    will be consistent with the rest of the Bootstrap-styled elements on the page. */
    protected $paginationTheme = 'bootstrap';

    /**
     * The function resets the page for updating search.
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * This function renders a paginated list of projects based on sorting, searching, and filtering
     * criteria.
     * 
     * @return The `render()` function is returning a view called `livewire-datables` with a paginated
     * list of projects sorted by the specified `` and `` parameters. If a search term
     * is provided, the function filters the projects by name, user, area, or state and left joins the
     * `users`, `area`, and `estado` tables.
     */
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

    /**
     * This function toggles the sorting direction and sets the sorting field.
     * 
     * @param field The field parameter is a string that represents the name of the field that the data
     * should be sorted by. For example, if the data is a list of products, the field parameter could
     * be "price" to sort the products by their price.
     */
    public function sortBy($field)
    {
        $this->direction = ($this->direction == 'asc') ? 'desc' : 'asc';
        $this->sort = $field;
    }

    /**
     * This PHP function retrieves a project by its ID, saves it in the session, and redirects to a
     * project information page.
     * 
     * @param field  is a variable that represents the ID of a project. The function retrieves
     * the project with the given ID from the database, stores it in the session, and redirects the
     * user to the project information page.
     * 
     * @return a redirect to the "/projetoInfo" route.
     */
    public function projeto($field)
    {
        $projeto = projeto::where('id', $field)->first();
        session(['projeto' => $projeto]);
        session()->save();
        return redirect('/projetoInfo');
    }
    
    /**
     * This function sets the search status to enabled.
     */
    public function configure(): void
    {
        // Shorthand for $this->setSearchStatus(true)
        $this->setSearchEnabled();
    }
}

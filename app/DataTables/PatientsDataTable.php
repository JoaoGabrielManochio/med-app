<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PatientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function(Patient $patient) {
                return $patient->created_at->format('d/m/Y H:i:s');
            })
            ->addColumn('action', 'pages.patients.actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Patient $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Patient $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('patients-table')
                    ->columns($this->getColumns())
                    ->parameters(['autoWidth' => false])
                    ->addAction(['title' => 'Ações', 'class' => 'text-center'])
                    ->minifiedAjax()
                    ->dom('frtip')
                    ->orderBy(1)
                    ->language('//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'fullname' => ['title' => 'Nome', 'class' => 'text-center'],
            'cpf' => ['title' => 'CPF', 'class' => 'text-center'],
            'cellphone' => ['title' => 'Celular', 'class' => 'text-center'],
            'sex' => ['title' => 'Sexo', 'class' => 'text-center'],
            'created_at' => ['title' => 'Cadastrado em', 'class' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'patients_' . date('YmdHis');
    }
}

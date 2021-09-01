<?php

namespace App\DataTables;

use App\Models\Schedule;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SchedulesDataTable extends DataTable
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
            ->editColumn('doctor_id', function(Schedule $schedule) {
                return $schedule->doctor->fullname ?? '<span class="text-danger font-weight-bold">Necessário selecionar Médico</span>';
            })
            ->editColumn('patient_id', function(Schedule $schedule) {
                return $schedule->patient->fullname ?? ' - ';
            })
            ->editColumn('schedule', function(Schedule $schedule) {
                return $schedule->schedule->format('d/m/Y H:i:s');
            })
            ->editColumn('created_at', function(Schedule $schedule) {
                return $schedule->created_at->format('d/m/Y H:i:s');
            })
            ->addColumn('action', 'pages.schedules.actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Schedule $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Schedule $model)
    {
        return $model->newQuery()
                ->with([
                    'doctor',
                    'patient'
                ]);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('schedules-table')
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
            'doctor_id'     => ['title' => 'Médico', 'class' => 'text-center'],
            'patient_id'    => ['title' => 'Paciente', 'class' => 'text-center'],
            'schedule'      => ['title' => 'Data da Consulta', 'class' => 'text-center'],
            'created_at'    => ['title' => 'Agendado em', 'class' => 'text-center']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Schedules_' . date('YmdHis');
    }
}

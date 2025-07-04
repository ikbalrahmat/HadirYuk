<?php

// namespace App\DataTables;

// use App\Models\Presence;
// use App\Models\PresenceDetail;
// use Illuminate\Database\Eloquent\Builder as QueryBuilder;
// use Yajra\DataTables\EloquentDataTable;
// use Yajra\DataTables\Html\Builder as HtmlBuilder;
// use Yajra\DataTables\Html\Button;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Html\Editor\Editor;
// use Yajra\DataTables\Html\Editor\Fields;
// use Yajra\DataTables\Services\DataTable;

// class AbsenDataTable extends DataTable
// {
//     /**
//      * Build the DataTable class.
//      *
//      * @param QueryBuilder $query Results from query() method.
//      */
//     public function dataTable(QueryBuilder $query): EloquentDataTable
//     {
//         return (new EloquentDataTable($query))
//             ->addColumn('waktu_absen', function ($query) {
//                 return date('d-m-Y H:i:s', strtotime($query->created_at));
//             })
//             ->addColumn('tanda_tangan', function ($query) {
//                 return "<img width='100' src='" . asset('uploads/' . $query->tanda_tangan) . "'>";
//             })
//             ->rawColumns(['tanda_tangan'])
//             ->setRowId('id');
//     }

//     /**
//      * Get the query source of dataTable.
//      */
//     public function query(PresenceDetail $model): QueryBuilder
//     {
//         $slug = request()->segment(2);
//         $presence = Presence::where('slug', $slug)->first();
//         return $model->where('presence_id', $presence->id)->newQuery();
//     }

//     /**
//      * Optional method if you want to use the html builder.
//      */
//     public function html(): HtmlBuilder
//     {
//         return $this->builder()
//             ->setTableId('absen-table')
//             ->columns($this->getColumns())
//             ->minifiedAjax()
//             //->dom('Bfrtip')
//             ->orderBy(1)
//             ->selectStyleSingle()
//             ->buttons([
//                 Button::make('excel'),
//                 Button::make('csv'),
//                 Button::make('pdf'),
//                 Button::make('print'),
//                 Button::make('reset'),
//                 Button::make('reload')
//             ]);
//     }

//     /**
//      * Get the dataTable columns definition.
//      */
//     public function getColumns(): array
//     {
//         return [
//             Column::make('id')
//                 ->title('#')
//                 ->render('meta.row + meta.settings._iDisplayStart + 1;')
//                 ->width(100),
//             Column::make('waktu_absen'),
//             Column::make('nama'),
//             Column::make('jabatan'),
//             Column::make('asal_instansi'),
//             Column::make('tanda_tangan'),
//         ];
//     }

//     /**
//      * Get the filename for export.
//      */
//     protected function filename(): string
//     {
//         return 'Absen_' . date('YmdHis');
//     }
// }



// namespace App\DataTables;

// use App\Models\PresenceDetail;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Services\DataTable;

// class AbsenDataTable extends DataTable
// {
//     public function dataTable($query)
//     {
//         return datatables()
//             ->eloquent($query)
//             ->addIndexColumn();
//     }

//     public function query(PresenceDetail $model)
//     {
//         return $model->newQuery();
//     }

//     public function html()
//     {
//         return $this->builder()
//             ->setTableId('absen-table')
//             ->columns($this->getColumns())
//             ->minifiedAjax()
//             ->dom('Bfrtip')
//             ->orderBy(0)
//             ->buttons([
//                 'excel',
//                 'csv',
//                 'pdf',
//                 'print',
//                 'reset',
//                 'reload',
//             ]);
//     }

//     public function getColumns(): array
//     {
//         return [
//             Column::make('id')
//                 ->title('#')
//                 ->render('meta.row + meta.settings._iDisplayStart + 1;')
//                 ->width(100),
//             Column::make('nama')->title('Nama'),
//             Column::make('np')->title('NP'),
//             Column::make('jabatan')->title('Jabatan'),
//             Column::make('asal_instansi')->title('Asal Instansi'),
//             Column::make('tanda_tangan')->title('Tanda Tangan'),
//         ];
//     }

//     protected function filename(): string
//     {
//         return 'Absen_' . date('YmdHis');
//     }
// }


// namespace App\DataTables;

// use App\Models\PresenceDetail;
// use Yajra\DataTables\Html\Column;
// use Yajra\DataTables\Services\DataTable;

// class AbsenDataTable extends DataTable
// {
//     public function dataTable($query)
//     {
//         return datatables()
//             ->eloquent($query)
//             ->addIndexColumn()
//             ->editColumn('tanda_tangan', function ($row) {
//                 // Tampilkan sebagai gambar
//                 return $row->tanda_tangan
//                     ? '<img src="' . asset('uploads/' . $row->tanda_tangan) . '" alt="Tanda Tangan" height="60">'
//                     : '-';
//             })
//             ->rawColumns(['tanda_tangan']); // Penting biar <img> nggak di-escape
//     }

//     public function query(PresenceDetail $model)
//     {
//         return $model->newQuery();
//     }

//     public function html()
//     {
//         return $this->builder()
//             ->setTableId('absen-table')
//             ->columns($this->getColumns())
//             ->minifiedAjax()
//             ->dom('Bfrtip')
//             ->orderBy(0)
//             ->buttons([
//                 'excel',
//                 'csv',
//                 'pdf',
//                 'print',
//                 'reset',
//                 'reload',
//             ]);
//     }

//     public function getColumns(): array
//     {
//         return [
//             Column::make('id')
//                 ->title('#')
//                 ->render('meta.row + meta.settings._iDisplayStart + 1;')
//                 ->width(100),
//             Column::make('nama')->title('Nama'),
//             Column::make('np')->title('NP'),
//             Column::make('jabatan')->title('Jabatan'),
//             Column::make('asal_instansi')->title('Asal Instansi'),
//             Column::make('tanda_tangan')->title('Tanda Tangan')->orderable(false)->searchable(false),
//         ];
//     }

//     protected function filename(): string
//     {
//         return 'Absen_' . date('YmdHis');
//     }
// }



namespace App\DataTables;

use App\Models\Presence;
use App\Models\PresenceDetail;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class AbsenDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('tanda_tangan', function ($query) {
                return "<img width='100' src='" . asset('uploads/' . $query->tanda_tangan) . "'>";
            })
            ->rawColumns(['tanda_tangan'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PresenceDetail $model): QueryBuilder
    {
        $slug = request()->segment(2);
        $presence = Presence::where('slug', $slug)->first();
        return $model->where('presence_id', $presence->id)->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('absen-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload'),
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->title('No')
                ->render('meta.row + meta.settings._iDisplayStart + 1;')
                ->width(100),
            Column::make('nama')->title('Nama'),
            Column::make('np')->title('NP'),
            Column::make('jabatan')->title('Jabatan'),
            Column::make('asal_instansi')->title('Unit Kerja/Instansi'),
            Column::make('tanda_tangan')->title('Tanda Tangan')->orderable(false)->searchable(false),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Absen_' . date('YmdHis');
    }
}

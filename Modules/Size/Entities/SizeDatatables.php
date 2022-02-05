<?php

  namespace Modules\Size\Entities;

  use Modules\Size\Entities\Size;
  use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

  class SizeDatatables  extends DataTable {

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
            ->addIndexColumn()
            ->rawColumns(['action', 'size-chart'])
            ->addColumn('size-chart', function ($item) {
                if ($item->charts()->count() > 0) {
                    $result = "";
                    foreach($item->charts()->get() as $chart) {
                        $result .= view('components.chips', [
                            'a' => $chart->size_name,
                            'b' => $chart->size_value
                        ]);
                    }
                    return $result;
                } else {
                    return '-';
                }

            })
            ->addColumn('action', function ($item) {
                return view('components.action-burger', [
                    'show' => null,
                    'edit' => [
                      'gate' => 'administrator.master-data.size.update',
                      'url' => route('administrator.master-data.size.edit', [$item->id, 'back' => request()->fullUrl()])
                    ],
                    'destroy' => [
                      'gate' => 'administrator.master-data.size.destroy',
                      'url' => route('administrator.master-data.size.destroy', [$item->id, 'back' => request()->fullUrl()]),
                    ]
                  ]);
            });
    }

   /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('DT_RowIndex')->title(__('No')),
            Column::make('size_code'),
            Column::make('size_title'),
            Column::make('size-chart')->title(__('Size Chart'))->width(200),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->addClass('text-center'),
        ];
    }
/**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Size $model)
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
                    ->setTableId('product-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->autoWidth(false)
                    ->parameters(['scrollX' => true])
                    ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

     /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Product_' . date('YmdHis');
    }
  }

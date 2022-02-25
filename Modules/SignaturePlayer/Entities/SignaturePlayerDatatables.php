<?php

  namespace Modules\SignaturePlayer\Entities;

  use Modules\SignaturePlayer\Entities\SignaturePlayer;
  use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

  class SignaturePlayerDatatables  extends DataTable {

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
            ->rawColumns(['action', 'signature_image'])
            ->editColumn('signature_image', function($item){
                $image_url = $item->signature_image;
                return '<div class="d-flex align-items-center">'.
                            '<a href="'.route('administrator.product.edit', [$item->id, 'back' => request()->fullUrl()]).'" class="symbol symbol-50px">'.
                                '<span class="symbol-label" style="background-image:url('.getImage($image_url ?? '' , 'signature').');"></span>'.
                            '</a>'.
                        '</div>';
            })
            ->addColumn('action', function ($item) {
                return view('components.action-burger', [
                    'show' => null,
                    'edit' => [
                      'gate' => 'administrator.master-data.signature-player.update',
                      'url' => route('administrator.master-data.signature-player.edit', [$item->id, 'back' => request()->fullUrl()])
                    ],
                    'destroy' => [
                      'gate' => 'administrator.master-data.signature-player.destroy',
                      'url' => route('administrator.master-data.signature-player.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
            Column::make('DT_RowIndex')->title(__('No'))
                ->searchable(false)
                ->sortable(false),
            Column::make('signature_code'),
            Column::make('signature_image')
                ->searchable(false)
                ->sortable(false),
            Column::make('signature_title'),
            Column::make('signature_player_name'),
            Column::computed('action')
                ->searchable(false)
                ->sortable(false)
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
    public function query(SignaturePlayer $model)
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
                    ->responsive(true)
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

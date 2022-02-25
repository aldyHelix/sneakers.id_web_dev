<?php

  namespace Modules\Brand\Entities;

  use Modules\Brand\Entities\Brand;
  use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

  class BrandDatatables  extends DataTable {
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
            ->rawColumns(['action', 'brand_image'])
            ->editColumn('brand_image', function($item){
                $image_url = $item->brand_image;
                return '<div class="d-flex align-items-center">'.
                            '<a href="'.route('administrator.product.edit', [$item->id, 'back' => request()->fullUrl()]).'" class="symbol symbol-50px">'.
                                '<span class="symbol-label" style="background-image:url('.getImage($image_url ?? '' , 'brand').');"></span>'.
                            '</a>'.
                        '</div>';
            })
            ->addColumn('action', function ($item) {
                return view('components.action-burger', [
                    'show' => null,
                    'edit' => [
                      'gate' => 'administrator.master-data.brand.update',
                      'url' => route('administrator.master-data.brand.edit', [$item->id, 'back' => request()->fullUrl()])
                    ],
                    'destroy' => [
                      'gate' => 'administrator.master-data.brand.destroy',
                      'url' => route('administrator.master-data.brand.destroy', [$item->id, 'back' => request()->fullUrl()]),
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
                    ->sortable(false)
                    ->searchable(false),
            Column::make('brand_code'),
            Column::make('brand_image')
                ->sortable(false)
                ->searchable(false),
            Column::make('brand_title'),
            Column::computed('action')
                ->sortable(false)
                ->searchable(false)
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
    public function query(Brand $model)
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
                    ->setTableId('brand-table')
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

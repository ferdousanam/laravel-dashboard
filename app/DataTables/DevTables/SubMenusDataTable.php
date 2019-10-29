<?php

namespace App\DataTables\DevTables;

use App\AdminModel\Menu as SubMenu;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubMenusDataTable extends DataTable {
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query) {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'Admin.devSubMenu.action')
            ->addColumn('icon', function ($menu) {
                if ($menu->icon) return '<i class="' . $menu->icon . '"></i>';
                else return '';
            })
            ->addColumn('status', function ($user) {
                if ($user->status == 1) {
                    $status = '<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Active</span>';
                } else {
                    $status = '<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Inactive</span>';
                }
                return $status;
            })
            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\DevTables\SubMenu $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubMenu $model) {
        return $model->select(DB::raw('menus.*, parent.menu_name AS parent_name'))
            ->where('menus.parent_id', '<>', 0)->join('menus as parent', 'menus.parent_id', 'parent.id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html() {
        $search = "Search: "; // We can also use variables; This is for instruction purpose only
        $page_length = 10; // We can make it dynamic dependent on User
        $row_text = " Rows";
        $need_input_columns = "[1,2]"; // We have to make the array as string to pass it because of array is is needed as string
        $builder = $this->builder();

        return $builder
            ->setTableId('submenus-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("fltr<'row'<'col-sm-12'tr>> <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>")
            ->orderBy(1, 'ASC')
            ->orderBy(2, 'ASC')
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            )
            ->parameters(array(
                'processing' => 'Please wait...',
                'searchDelay' => 500,
                'language' => array(
                    'lengthMenu' => '_MENU_ records',
                    'search' => $search,
                    'info' => 'Showing _START_ to _END_ of _TOTAL_ records',
                ),
                'lengthMenu' => array(
                    array(5, 10, 25, 50, 100, -1),
                    array('5' . $row_text, '10' . $row_text, '25' . $row_text, '50' . $row_text, '100' . $row_text, 'Show all')
                ),
                'pagingType' => "full_numbers",
                'pageLength' => $page_length,
                'createdRow' => "function (row, data, dataIndex ) {
                    $(row).attr('id', 'tr-' + data.id);
                }",
                'searchPlaceholder' => "Search...",
                'initComplete' => "function () {
                    this.api().columns($need_input_columns).every(function (colIdx) {
                        var column = this;
                        var title = $('tfoot').find('th').eq(colIdx).text();
                        console.log($(column.footer()).empty());
                        var input = document.createElement('input');
                        // input.setAttribute('type', 'text');
                        input.placeholder = title;
                        $(input).appendTo($(column.footer()).empty())
                        .on('change keyup clear', function () {
                             column.search($(this).val(), false, false,true).draw();
                        });
                    });
                }",
                'preDrawCallback' => "function(){
                    $('#submenus-table_processing').remove();
                }",
            ));
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns() {
        return [
            Column::make('serial_no')->footer('Serial No'),
            Column::make('parent_name')->title('Main Menu Title')->footer('Main Menu Title'),
            Column::make('menu_name')->title('Sub Menu Title')->footer('Sub Menu Title'),
            Column::make('route_name')->title('Route URL')->footer('Route URL'),
            Column::make('icon', 'icon')->title('Icon')->footer('Icon')->searchable(false)->orderable(false)->addClass('text-center'),
            Column::make('status')->footer('Status')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center')
                ->footer('Action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename() {
        return 'SubMenus_' . date('YmdHis');
    }
}

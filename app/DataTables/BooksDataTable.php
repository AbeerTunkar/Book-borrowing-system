<?php

namespace App\DataTables;

use App\Models\Book;
use Yajra\DataTables\Services\DataTable;

class BooksDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('actions', function ($book) {
                $actions = '';
                if (auth()->user()->hasRole('admin')) {
                    $actions .= '<a href="' . route('books.edit', $book->id) . '" class="btn btn-sm btn-primary">Edit</a> ';
                }
                $actions .= '<a href="' . route('books.export-pdf', $book->id) . '" class="btn btn-sm btn-success">Export PDF</a>';
                return $actions;
            })
            ->rawColumns(['actions']);
    }

    public function query(Book $model)
    {
        return $model->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('books-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->buttons(
                'excel',
                'csv',
                'pdf',
                'print',
                'reset',
                'reload'
            );
    }

    protected function getColumns()
    {
        return [
            ['data' => 'DT_RowIndex', 'title' => '#', 'orderable' => false, 'searchable' => false],
            ['data' => 'title', 'title' => 'Title'],
            ['data' => 'author', 'title' => 'Author'],
            ['data' => 'status', 'title' => 'Availability'],
            ['data' => 'actions', 'title' => 'Actions', 'orderable' => false, 'searchable' => false]
        ];
    }

  
}

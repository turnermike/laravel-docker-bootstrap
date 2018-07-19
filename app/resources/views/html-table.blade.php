@extends('layouts.app', ['title' => Lang::get('html-table.page_title'), 'bodyclass' => 'html-table'])
@section('content')

        <div class="grid-container">
            <div class="grid-x">
                <div class="small-12 cell">
                    <h1>HTML Table Page</h1>

                    {{-- points table --}}
                    {!! Table::generate($table_headers, $table_data, $table_attributes) !!}
                    {{-- pagination --}}
                    {{ $all_table_data->appends(request()->query())->links() }}


                </div>
            </div>
        </div>

@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif
                    <div class="panel-heading">Albums
                        <a href="{{ route('albums.create') }}" class="btn btn-default">Add New Album +</a>

                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Cover</th>
                                <th>Name</th>
                                    <th>Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($albums as $album)
                                <tr>
                                        <td>
                                            <a href="{{ route( 'albums.show', $album->id  ) }}"><img src="{{ asset('images/' . $album->cover_image) }}" width="60px" height="60px"></a>
                                        </td>
                                        <td>
                                            <a href="{{ route( 'albums.show', $album->id  ) }}">{{ $album->name }}</a>
                                        </td>

                                    @if (Route::has('login'))
                                        @auth
                                            <td>
                                                <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-default">Edit</a>
                                                <form action="{{ route('albums.destroy', $album->id) }}" method="POST"
                                                      style="display: inline"
                                                      onsubmit="return confirm('Are you sure?');">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    {{ csrf_field() }}
                                                    <button class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        @else
                                        @endauth
                                    @endif

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3">No entries found.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        function getIDs()
        {
            var ids = [];
            $('.checkbox_delete').each(function () {
                if($(this).is(":checked")) {
                    ids.push($(this).val());
                }
            });
            $('#ids').val(ids.join());
        }

        $(".checkbox_all").click(function(){
            $('input.checkbox_delete').prop('checked', this.checked);
            getIDs();
        });

        $('.checkbox_delete').change(function() {
            getIDs();
        });
    </script>
@endsection
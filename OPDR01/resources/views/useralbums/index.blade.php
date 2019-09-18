@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">

                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                                <th>Cover</th>
                                <th>Name</th>
                            </thead>
                            <tbody>
                            @forelse($albums as $album)
                                <tr>
                                    <td>
                                        <a href='/useralbums/{{$album->id}}'><img src="{{ asset('images/' . $album->cover_image) }}" width="60px" height="60px"></a>
                                    </td>
                                    <td>
                                        <a href='/useralbums/{{$album->id}}'>{{ $album->name }}</a>
                                    </td>
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
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{$albums->name}}
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th>Cover</th>

                            </tr>
                            </thead>
                            <tbody>
                            @forelse($albums->photo as $photo)
                                <tr>
                                    <td>
                                        <img src="{{ asset('images/' . $photo->photo) }}" width="60px" height="60px">
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
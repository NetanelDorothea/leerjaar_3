@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    @if (Route::has('login'))
                        @auth
                            <div class="panel-heading">Add New Photo</div>

                            <div class="panel-body">
                                @if ($errors->count() > 0)
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif


                                <form action="{{ route('photos.store') }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="album_id" value="{{$album_id}}" />
                                    <br /><br />
                                    Photo:
                                    <br />
                                    <input type="text" name="photo" value="{{ old('photo') }}" />
                                    <input type="file" name="photo" class="form-control" value="{{ old('photo') }}"/>
                                    <br /><br />
                                    <input type="submit" value="Submit" class="btn btn-default" />
                                </form>
                                @else
                                    geen toegang
                                @endauth
                                @endif



                            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
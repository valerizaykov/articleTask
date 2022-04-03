@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create category</div>
                    <br/>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="{{ url('category/Store') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('cat-name') ? ' has-error' : '' }}">
                                <label for="cat-name" class="col-md-4 control-label">category name</label>

                                <div class="col-md-6">
                                    <input id="cat-name" type="text" class="form-control" name="cat-name" value="{{ old('cat-name') }}">
                                    @if ($errors->has('cat-name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('cat-name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

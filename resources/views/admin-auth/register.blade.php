@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">contacts</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Register</h4>
                    <form class="form-horizontal" method="post" action="update">
                        {{ csrf_field() }}
                        <div class="row">
                            <label class="col-md-3 label-on-left">Nama</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" value="{{ old('name') ?: $user->name }}" name="name" id="name" class="form-control" placeholder="Name"/>
                                    {!! $errors->first('name', '<span class="help-block">:message</span>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Email</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input type="text" value="{{ old('email') ?: $user->email }}" name="email" id="email" class="form-control" placeholder="Email"/>
                                    {!! $errors->first('email', '<span class="help-block">:message</span>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Password</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Confirm Password</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Telepon</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <input name="telepon" value="{{ old('telepon') ?: $user->telepon }}" id="telepon" type="number" class="form-control" placeholder="Telepon"/>     
                                    {!! $errors->first('telepon', '<span class="help-block">:message</span>')!!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Nama Faskes</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control select2" name="faskes_id" data-live-search="true" required>
                                        <option value="">Pilih Fakses</option>
                                        @foreach ($nama_faskes as $nama_faske)
                                        <option value="{{ $nama_faske->id }}" @if($user->faskes_id==$nama_faske->id) selected='selected' @endif>{{ $nama_faske->nama }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3 label-on-left">Level</label>
                            <div class="col-md-9">
                                <div class="form-group label-floating is-empty">
                                    <label class="control-label"></label>
                                    <select class="form-control select2" name="level" data-live-search="true" required>
                                        <option value="">Level</option>
                                        <option value="1" @if ($user->level == '1')selected="selected"@endif>Administrator</option>
                                        <option value="2" @if ($user->level == '2 Faskes')selected="selected"@endif>Administrator Faskes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-md-3"></label>
                            <div class="col-md-9">
                                <div class="form-group form-button">
                                    <button type="submit" class="btn btn-fill btn-rose">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>  
@endsection

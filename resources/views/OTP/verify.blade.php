@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify OTP</div>
                @if ($errors->count()>0)
                <div class="alert alert-warning" role="alert">
                    @foreach($errors->all() as $err)
                    {{ $err }}
                    @endforeach
                </div>
            @endif
                <div class="card-body">
                    <form method="post" action="/verifyOTP">
                        @csrf
                        <div class="form-row">
                          <div class="col">
                            <input type="text" class="form-control" name="OTP" placeholder="Your OTP Code" >
                          </div>
                          <div class="col">
                            <button type="submit" class="btn-primary btn">Verify</button>
                          </div>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
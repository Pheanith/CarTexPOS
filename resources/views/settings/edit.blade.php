@extends('layouts.admin')

@section('title', __('settings.Update_Settings'))
@section('content-header', __('settings.Update_Settings'))

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('settings.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="app_name">{{ __('settings.App_name') }}</label>
                <input type="text" name="app_name" class="form-control @error('app_name') is-invalid @enderror" id="app_name" placeholder="{{ __('settings.App_name') }}" value="{{ old('app_name', config('settings.app_name')) }}">
                @error('app_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>



            <div class="form-group">
                <label for="currency_symbol">{{ __('settings.Currency_symbol') }}</label>
                <input type="text" name="currency_symbol" class="form-control @error('currency_symbol') is-invalid @enderror" id="currency_symbol" placeholder="{{ __('settings.Currency_symbol') }}" value="{{ old('currency_symbol', config('settings.currency_symbol')) }}">
                @error('currency_symbol')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">{{ __('settings.Change_Setting') }}</button>
        </form>
    </div>
</div>
@endsection

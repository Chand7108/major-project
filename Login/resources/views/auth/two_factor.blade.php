@extends('layouts.auth')

@section('page-title', trans('app.two_factor_authentication'))

@section('content')

<div class="col-md-8 col-lg-6 col-xl-5 mx-auto my-10p" id="login">
    <div class="text-center">
        <img src="{{ url('assets/img/vanguard-logo.png') }}" alt="{{ settings('app_name') }}" height="50">
    </div>
</div>

<div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title text-center mt-4 text-uppercase">
                @lang('app.two_factor_authentication')
            </h5>
        </div>

        @if (settings('2fa.enabled'))
            <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable'; ?>
                {!! Form::open(['route' => array("two_factor.{$route}",$user), 'method' => 'POST', 'id' => 'two-factor-form']) !!}
                         @include('user.partials.two-factor')
                {!! Form::close() !!}
        @endif
</div>   

@stop

@section('scripts')
    {!! HTML::script('assets/js/as/btn.js') !!}
    @if (settings('2fa.enabled'))
        {!! JsValidator::formRequest('Vanguard\Http\Requests\User\EnableTwoFactorRequest', '#two-factor-form') !!}
    @endif
@stop
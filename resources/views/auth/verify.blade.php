@extends('layout.main')

@section('content')
    <div class="row justify-content-center my-5">
        <div class="col-lg-8">
            <div class="card-group d-block d-md-flex row">
                <div class="card col-md-7 p-4 mb-0">
                    <div class="card-body">
                        <h1>{{ __('Verify Your Email Address') }}</h1>
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                    </div>
                </div>
                <div class="card col-md-5 text-white bg-primary py-5">
                    <div class="card-body text-center">
                        <div>
                            <h2>Нямаш профил?</h2>
                            <a class="btn btn-lg btn-outline-light mt-3" href="{{ route('register') }}">Регистрация</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

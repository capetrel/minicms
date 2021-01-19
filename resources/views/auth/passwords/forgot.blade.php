@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                        <div>
                            <label for="email" >Label forgot</label>

                            <input id="email" class="block mt-1 w-full" type="email" name="email"  required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button>
                                {{ __('Email Password Reset Link') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

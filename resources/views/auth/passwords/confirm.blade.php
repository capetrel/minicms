@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="mb-4 text-sm text-gray-600">
            This is a secure area of the application. Please confirm your password before continuing.
        </div>
        <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
            <div>
                <label for="password">Mot de passe</label>

                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <button>
                    Confirmer
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

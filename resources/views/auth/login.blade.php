<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Connexion — AppInstagram</title>
  <link href="{{ asset('css/login.css') }}" rel="stylesheet">
  <meta name="theme-color" content="#ffffff">
  <meta name="robots" content="noindex">
</head>
<body>
  <main class="page">
    <section class="card-wrap">
      <div class="card">
        <div class="logo">Instagram</div>
        <form method="POST" action="{{ route('login') }}" class="login-form">
          @csrf
          <input name="email" type="text" placeholder="Téléphone, nom d'utilisateur ou email" aria-label="email" required>
          <input name="password" type="password" placeholder="Mot de passe" aria-label="password" required>
          <button type="submit" class="btn">Se connecter</button>
        </form>

        <div class="or">
          <span></span>
          <span>OU</span>
          <span></span>
        </div>

        <div class="alt-login">
          <a href="#" class="facebook">Se connecter avec Facebook</a>
        </div>

        <p class="forgot">Mot de passe oublié ?</p>
      </div>

      <div class="card signup">
        <p>Vous n'avez pas de compte ? <a href="{{ route('register') }}">Inscrivez-vous</a></p>
      </div>

      <footer class="download">
        <p>Téléchargez l'application.</p>
        <div class="stores">
          <a href="#" class="store">App Store</a>
          <a href="#" class="store">Google Play</a>
        </div>
      </footer>
    </section>
  </main>
</body>
</html>
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

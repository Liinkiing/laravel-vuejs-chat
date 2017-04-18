@extends('layouts.app', ['centered' => true])

@section('body')
    @if($errors->count() > 0)
        <alert type="danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </alert>
    @endif
    <auth-form>
        <div slot="login">
            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Adresse mail</label>
                    <input type="text" class="form-control" value="{{ old('email') }}" id="email" placeholder="Entrez votre adresse mail" name="email">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" name="password">
                </div>
                <button class="button login" type="submit">Se connecter</button>
            </form>
        </div>
        <div slot="register">
            <form action="{{ route('register') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="email_register">Adresse mail</label>
                    <input type="text" class="form-control" id="email_register" placeholder="Entrez votre adresse mail" name="email_register" value="{{ old('email_register') }}">
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" placeholder="Choisissez un mot de passe" name="password">
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Répeter le mot de passe</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <button class="button register" type="submit">S'inscrire</button>
            </form>
        </div>
    </auth-form>
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $patient->FirstName }} {{ $patient->LastName }}</h1>
    <p>Специализация: {{ $patient->DateOfBirth }}</p>
    <p>Пол {{ $patient->Gender }}</p>
    <p>Номер: {{ $patient->PhoneNumber }}</p>
    <p>Email: {{ $patient->Email }}</p>
    <p>Диагноз {{ $patient->Diagnosis }}</p>
    <p>Адрес: {{ $patient->Adress }}</p>
    <p>Фото: <img class="image" src="{{ asset($patient->Photo) }}"></p>
    @auth
                    @if (auth()->user()->isAdmin)
                        <!-- Элементы для администраторов -->
                        <a href="{{ route('patient.edit', $patient) }}" class="btn btn-warning">Редактировать</a>
                        <form action="{{ route('patient.destroy', $patient) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    @endif
                @endauth
</div>
@endsection

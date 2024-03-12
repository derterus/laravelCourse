@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $doctor->FirstName }} {{ $doctor->LastName }}</h1>
    <p>Специализация: {{ $doctor->Specialization }}</p>
    <p>Стаж работы: {{ $doctor->ExperienceYears }}</p>
    <p>Номер: {{ $doctor->PhoneNumber }}</p>
    <p>Email: {{ $doctor->Email }}</p>
    <p>Время работы: {{ $doctor->WorkSchedule }}</p>
    <p>Адрес: {{ $doctor->Adress }}</p>
    <p>Фото: <img class="image" src="{{ asset($doctor->Photo)}}"></p>
    
    @auth
    @if (auth()->user()->isAdmin)
        <!-- Элементы для администраторов -->
        <a href="{{ route('doctors.edit', $doctor) }}" class="btn btn-warning">Редактировать</a>
        <form action="{{ route('doctors.destroy', $doctor) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Удалить</button>
        </form>
    @endif
@endauth

</div>
@endsection

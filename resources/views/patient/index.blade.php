@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Пациенты</h1>
    <a href="{{ route('patient.create') }}" class="btn btn-primary">Добавить пациента</a>
    <table class="table">
        <thead>
            <tr>
                
                <th>Имя</th>
                <th>Фамилия</th>
                <th>День рождения</th>
                <th>Пол</th>
                <th>Номер</th>
                <th>Email</th>
                <th>Диагноз</th>
                <th>Адрес</th>
                <th>Фото</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $patient)
            <tr>
                
                <td>{{ $patient->FirstName }} </td> 
                <td> {{ $patient->LastName }}</td>
                <td>{{ $patient->DateOfBirth }}</td>
                <td> {{ $patient->Gender}}</td>
                <td> {{ $patient->PhoneNumber}}</td>
                <td> {{ $patient->Email }}</td>
                <td>{{ $patient->Diagnosis }}</td>
                <td>{{ $patient->Adress }}</td>
                <td><img class="image" src="{{ $patient->Photo}}"></td>
                <td>
                    <a href="{{ route('patient.show', $patient) }}" class="btn btn-info">Посмотреть</a>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

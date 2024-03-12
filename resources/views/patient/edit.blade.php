@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактирование пациента</h1>
    <form action="{{ route('patient.update', $patient) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="FirstName">Имя</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{ $patient->FirstName }}" required>
        </div>
        <div class="form-group">
            <label for="LastName">Фамилия</label>
            <input type="text" class="form-control" id="LastName" name="LastName" value="{{ $patient->LastName }}" required>
        </div>
        <div class="form-group">
            <label for="DateOfBirth">День рождения</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" value="{{ $patient->DateOfBirth }}" required>
        </div>
        <div class="form-group">
            <label for="Gender">Пол</label>
            <input type="text" class="form-control" id="Gender" name="Gender" value="{{ $patient->Gender }}" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Номер</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{$patient->PhoneNumber}}" required>
        </div>
        <div class="form-group">
            <label for="Email">Еmail</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ $patient->Email }}" required>
        </div>
        <div class="form-group">
            <label for="Diagnosis">Диагноз</label>
            <input type="text" class="form-control" id="Diagnosis" name="Diagnosis" value="{{ $patient->Diagnosis }}" required>
        </div>
        <div class="form-group">
            <label for="Adress">Адрес</label>
            <input type="text" class="form-control" id="Adress" name="Adress" value="{{ $patient->Adress }}" required>
        </div>
        <div class="form-group">
            <label for="Photo">Фото</label>
            <input type="file" class="form-control" id="Photo" name="Photo" value="{{ $patient->Photo }}">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавление пациента</h1>
    <form action="{{ route('patient.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="FirstName">Имя</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName"  required>
        </div>
        <div class="form-group">
            <label for="LastName">Фамилия</label>
            <input type="text" class="form-control" id="LastName" name="LastName" required>
        </div>
        <div class="form-group">
            <label for="DateOfBirth">День рождения</label>
            <input type="date" class="form-control" id="DateOfBirth" name="DateOfBirth" required>
        </div>
        <div class="form-group">
            <label for="Gender">Пол</label>
            <input type="text" class="form-control" id="Gender" name="Gender"  required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Номер</label>
            <input type="number" class="form-control" id="PhoneNumber" name="PhoneNumber"  required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email"  required>
        </div>
        <div class="form-group">
            <label for="Diagnosis">Диагноз</label>
            <input type="text" class="form-control" id="Diagnosis" name="Diagnosis"  required>
        </div>
        <div class="form-group">
            <label for="Adress">Адрес</label>
            <input type="text" class="form-control" id="Adress" name="Adress"  required>
        </div>
        <div class="form-group">
            <label for="Photo">Фото</label>
            <input type="file" class="form-control" id="Photo" name="Photo" >
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавление доктора</h1>
    <form action="{{ route('doctors.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="FirstName">Имя</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName" required>
        </div>
        <div class="form-group">
            <label for="LastName">Фамилия</label>
            <input type="text" class="form-control" id="LastName" name="LastName" required>
        </div>
        <div class="form-group">
            <label for="Specialization">Специализация</label>
            <input type="text" class="form-control" id="Specialization" name="Specialization" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Номер</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" required>
        </div>
        <div class="form-group">
            <label for="ExperienceYears">Стаж работы</label>
            <input type="number" class="form-control" id="ExperienceYears" name="ExperienceYears" required>
        </div>
        <div class="form-group">
            <label for="WorkSchedule">Время работы</label>
            <input type="text" class="form-control" id="WorkSchedule" name="WorkSchedule" required>
        </div>
        <div class="form-group">
            <label for="Adress">Адрес</label>
            <input type="text" class="form-control" id="Adress" name="Adress" required>
        </div>
        <div class="form-group">
            <label for="Photo">Фото</label>
            <input type="file" class="form-control" id="Photo" name="Photo">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактирование доктора</h1>
    <form action="{{ route('doctors.update', $doctor) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="FirstName">Имя</label>
            <input type="text" class="form-control" id="FirstName" name="FirstName" value="{{ $doctor->FirstName }}" required>
        </div>
        <div class="form-group">
            <label for="LastName">Фамилия</label>
            <input type="text" class="form-control" id="LastName" name="LastName" value="{{ $doctor->LastName }}" required>
        </div>
        <div class="form-group">
            <label for="Specialization">Специализация</label>
            <input type="text" class="form-control" id="Specialization" name="Specialization" value="{{ $doctor->Specialization }}" required>
        </div>
        <div class="form-group">
            <label for="PhoneNumber">Номер</label>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber" value="{{ $doctor->PhoneNumber }}" required>
        </div>
        <div class="form-group">
            <label for="Email">Email</label>
            <input type="email" class="form-control" id="Email" name="Email" value="{{ $doctor->Email }}" required>
        </div>
        <div class="form-group">
            <label for="ExperienceYears">Стаж работы</label>
            <input type="number" class="form-control" id="ExperienceYears" name="ExperienceYears" value="{{ $doctor->ExperienceYears }}" required>
        </div>
        <div class="form-group">
            <label for="WorkSchedule">Время работы</label>
            <input type="text" class="form-control" id="WorkSchedule" name="WorkSchedule" value="{{ $doctor->WorkSchedule }}" required>
        </div>
        <div class="form-group">
            <label for="Adress">Адрес</label>
            <input type="text" class="form-control" id="Adress" name="Adress" value="{{ $doctor->Adress }}" required>
        </div>
        <div class="form-group">
            <label for="Photo">Фото</label>
            <input type="file" class="form-control" id="Photo" name="Photo" value="{{ $doctor->Photo }}">
        </div>
        <br/>
        <button type="submit" class="btn btn-primary">Подтвердить</button>
    </form>
</div>
@endsection

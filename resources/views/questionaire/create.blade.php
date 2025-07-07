@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-xl font-bold mb-4">Contractor Questionnaire</h1>
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{ route('questionaire.store') }}">
        @csrf
        <h2 class="font-semibold mb-2">Contractor Info</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
            <input type="text" name="name" placeholder="Name" class="border p-2" required>
            <input type="text" name="registration_number" placeholder="Registration Number" class="border p-2">
            <input type="text" name="province" placeholder="Province" class="border p-2">
            <input type="text" name="city" placeholder="City" class="border p-2">
            <input type="text" name="address" placeholder="Address" class="border p-2">
            <input type="text" name="contact_person" placeholder="Contact Person" class="border p-2">
            <input type="text" name="phone" placeholder="Phone" class="border p-2">
            <input type="email" name="email" placeholder="Email" class="border p-2">
            <input type="text" name="business_field" placeholder="Business Field" class="border p-2">
        </div>
        <h2 class="font-semibold mb-2">Legal Requirements</h2>
        <div class="space-y-4">
            @for ($i = 1; $i <= 13; $i++)
                <div class="border p-3 rounded">
                    <label class="block mb-2">Question {{ $i }} Answer</label>
                    <input type="text" name="question{{ $i }}_answer" class="border p-2 w-full">
                    <label class="block mt-2 mb-2">Attachment</label>
                    <input type="file" name="question{{ $i }}_attachment" class="border p-2 w-full">
                </div>
            @endfor
        </div>
        <button type="submit" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded">Submit</button>
    </form>
</div>
@endsection

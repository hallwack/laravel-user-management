@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 w-full">
        <a href="{{ route('users.index') }}"
            class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 hover:bg-slate-800 transition-colors duration-300 cursor-pointer w-fit">
            Back to User</a>

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-slate-100">Create User</h1>
        </div>

        <div>
            <form action="#" method="POST" class="flex flex-col gap-4">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="name" class="text-slate-100 font-medium">Name</label>
                        <input type="text" name="name" id="name"
                            class="bg-slate-950 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 focus:outline-none focus:ring-1 focus:ring-sky-900"
                            required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="email" class="text-slate-100 font-medium">Email</label>
                        <input type="email" name="email" id="email"
                            class="bg-slate-950 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 focus:outline-none focus:ring-1 focus:ring-sky-900"
                            required>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="password" class="text-slate-100 font-medium">Password</label>
                        <input type="password" name="password" id="password"
                            class="bg-slate-950 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 focus:outline-none focus:ring-1 focus:ring-sky-900"
                            required>
                    </div>

                    <div class="flex flex-col gap-2">
                        <label for="password_confirmation" class="text-slate-100 font-medium">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="bg-slate-950 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 focus:outline-none focus:ring-1 focus:ring-sky-900"
                            required>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label for="hobbies" class="text-slate-100 font-medium">Hobbies</label>
                    <input type="text" name="hobbies" id="hobbies"
                        class="bg-slate-950 px-4 py-2 rounded-lg border border-slate-700 text-slate-100 focus:outline-none focus:ring-1 focus:ring-sky-900"
                        required>
                </div>

                <button type="submit"
                    class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-sky-400 hover:bg-slate-800 hover:border-sky-500 transition-colors duration-300 cursor-pointer">
                    Edit</button>
            </form>
        </div>
    </div>
@endsection

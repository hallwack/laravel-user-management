@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 w-full">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Users</h1>
            <a href="{{ route('users.create') }}"
                class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-sky-400 hover:bg-slate-800 hover:border-sky-500 transition-colors duration-300 cursor-pointer">
                Create</a>
        </div>

        @if (session('success'))
            <div class="bg-sky-900/50 border border-sky-700 text-sky-200 px-4 py-3 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="w-full overflow-x-auto border border-slate-700 rounded-lg contain-inline-size">
            <table class="w-full border-collapse text-sm text-left caption-bottom">
                <thead>
                    <tr class="border-b border-slate-700">
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Name</th>
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Email</th>
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Hobbies</th>
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b border-slate-700 hover:bg-slate-900/50 transition-colors">
                            <td class="px-3 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-100 font-medium">{{ $user->name }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-slate-100">{{ $user->email }}</span>
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                <div class="flex items-center gap-2 flex-wrap">
                                    @if ($user->hobbies && $user->hobbies->count())
                                        @foreach ($user->hobbies as $hobby)
                                            <span
                                                class="bg-slate-800 border border-slate-700 text-slate-200 text-sm px-2 py-1 rounded-full">
                                                {{ $hobby->name }}
                                            </span>
                                        @endforeach
                                    @else
                                        <span class="text-slate-500 text-sm italic">No hobbies</span>
                                    @endif
                                </div>
                            </td>
                            <td class="px-3 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('users.edit', $user) }}"
                                        class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-sky-400 hover:bg-slate-800 hover:border-sky-500 transition-colors duration-300 cursor-pointer">
                                        Edit</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-rose-400 hover:bg-slate-800 hover:border-rose-500 transition-colors duration-300 cursor-pointer">
                                            Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-4 py-8 text-center text-slate-500 italic">
                                No users found. Please create a new user to get started.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

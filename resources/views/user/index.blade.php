@extends('layouts.app')

@section('content')
    <div class="flex flex-col gap-4 w-full">

        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold text-white">Users</h1>
            <a href="{{ route('users.create') }}"
                class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-sky-400 hover:bg-slate-800 hover:border-sky-500 transition-colors duration-300 cursor-pointer">
                Create</a>
        </div>

        <div class="w-full overflow-x-auto border border-slate-700 rounded-lg contain-inline-size">
            <table class="w-full border-collapse text-sm text-left caption-bottom">
                <thead>
                    <tr class="border-b border-slate-700">
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Name</th>
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Hobbies</th>
                        <th
                            class="bg-slate-900 px-4 py-3 font-medium whitespace-nowrap text-slate-100 border-b border-slate-700">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b border-slate-700 hover:bg-slate-900/50 transition-colors">
                        <td class="px-3 py-4">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-100">Cody Lindley</span>
                            </div>
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex items-center gap-2">
                                <span class="text-slate-100">Cody Lindley</span>
                            </div>
                        </td>
                        <td class="px-3 py-4">
                            <div class="flex items-center gap-2">
                                <button
                                    class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-sky-400 hover:bg-slate-800 hover:border-sky-500 transition-colors duration-300 cursor-pointer">
                                    Edit</button>
                                <button
                                    class="bg-slate-900 px-4 py-2 rounded-lg border border-slate-700 text-rose-400 hover:bg-slate-800 hover:border-rose-500 transition-colors duration-300 cursor-pointer">
                                    Delete</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

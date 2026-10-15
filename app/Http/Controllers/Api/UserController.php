<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreUserRequest;
use App\Http\Requests\Api\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('hobbies')->latest()->get();

        return response()->json([
            'message' => 'List of users retrieved successfully',
            'data' => $users,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $user = DB::transaction(function () use ($validated) {
            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => Hash::make($validated['password']),
            ]);

            $hobbies = collect($validated['hobbies'])
                ->map(fn ($hobby) => trim($hobby))
                ->filter(fn ($hobby) => ! empty($hobby))
                ->map(fn ($hobby) => ucwords(strtolower($hobby)))
                ->unique()
                ->values();

            $user->hobbies()->createMany(
                $hobbies->map(fn ($hobby) => ['name' => $hobby])->all()
            );

            return $user;
        });

        return response()->json([
            'message' => 'User created successfully',
            'data' => $user->load('hobbies'),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json([
            'message' => 'User retrieved successfully',
            'data' => $user->load('hobbies'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        $user = DB::transaction(function () use ($validated, $user) {
            $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'password' => ! empty($validated['password']) ? Hash::make($validated['password']) : $user->password,
            ]);

            $user->hobbies()->delete();

            if (! empty($validated['hobbies'])) {
                $hobbies = collect($validated['hobbies'])
                    ->map(fn ($hobby) => trim($hobby))
                    ->filter(fn ($hobby) => ! empty($hobby))
                    ->map(fn ($hobby) => ucwords(strtolower($hobby)))
                    ->unique()
                    ->values();

                $user->hobbies()->createMany(
                    $hobbies->map(fn ($hobby) => ['name' => $hobby])->all()
                );
            }

            return $user;
        });

        return response()->json([
            'message' => 'User updated successfully',
            'data' => $user->load('hobbies'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ]);
    }
}

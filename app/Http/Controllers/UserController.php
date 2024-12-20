<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\UserCreatedMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'name' => 'required|min:3|max:50',
        ]);

        // Create user
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'name' => $validated['name'],
        ]);

        // Send emails
        Mail::to($user->email)->send(new UserCreatedMail($user));
        $adminEmail = 'admin@example.com';
        Mail::to($adminEmail)->send(new UserCreatedMail($user));

        // Return response
        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'created_at' => $user->created_at,
        ]);
    }

    public function getUsers(Request $request)
    {
        $query = User::query();

        // search
        if ($search = $request->query('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
            });
        }

        // Sort
        $sortBy = $request->query('sortBy', 'created_at');
        $query->orderBy($sortBy);

        // Paginate
        $users = $query->withCount('orders')->paginate(10);

        $users->getCollection()->transform(function ($user) {
            return [
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
                'created_at' => $user->created_at,
                'orders_count' => $user->orders_count,
            ];
        });

        return response()->json([
            'page' => $users->currentPage(),
            'users' => $users->items(),
        ]);
    }
}

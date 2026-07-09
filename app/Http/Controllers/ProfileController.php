<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display the authenticated user's profile.
     */
    public function show()
    {
        $user = Auth::user();

        return view('profile.show', compact('user'));
    }

    /**
     * Show the edit profile form.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the authenticated user's profile.
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        // Upload new profile image
        if ($request->hasFile('profile_image')) {

            // Delete old image if exists
            if ($user->profile_image &&
                Storage::disk('public')->exists($user->profile_image)) {

                Storage::disk('public')->delete($user->profile_image);
            }

            // Store new image
            $imagePath = $request->file('profile_image')
                ->store('profile-images', 'public');

            $user->profile_image = $imagePath;
        }

        // Update user information
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'profile_image' => $user->profile_image,
        ]);

        return redirect()
            ->route('profile.show')
            ->with('success', 'Profile updated successfully.');
    }

    /**
     * Show change password form.
     */
    public function editPassword()
    {
        return view('profile.change-password');
    }

    /**
     * Update password.
     */
    public function updatePassword(ChangePasswordRequest $request)
    {
        $user = Auth::user();

        // Verify current password
        if (!Hash::check($request->current_password, $user->password)) {

            return back()->withErrors([
                'current_password' => 'Current password is incorrect.'
            ]);
        }

        // Save new password
        $user->update([
            'password' => Hash::make($request->new_password),
        ]);

        return redirect()
            ->route('profile.show')
            ->with('success', 'Password changed successfully.');
    }
}

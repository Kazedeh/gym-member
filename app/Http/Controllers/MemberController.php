<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        return view('members.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gmail' => 'required|email|max:255|unique:members,gmail',
            'phone_number' => 'required|string|max:15',
            'date_join' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('members', 'public');
        }

        Member::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gmail' => $request->gmail,
            'phone_number' => $request->phone_number,
            'date_join' => $request->date_join,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    public function show($id)
    {
        $member = Member::findOrFail($id);
        return view('members.show', compact('member'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'gmail' => 'required|email|max:255|unique:members,gmail,' . $id,
            'phone_number' => 'required|string|max:15',
            'date_join' => 'required|date',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($member->image) {
                Storage::delete('public/' . $member->image);
            }
            $imagePath = $request->file('image')->store('members', 'public');
        } else {
            $imagePath = $member->image;
        }

        $member->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gmail' => $request->gmail,
            'phone_number' => $request->phone_number,
            'date_join' => $request->date_join,
            'image' => $imagePath,
            'is_active' => $request->has('is_active'),
        ]);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        
        if ($member->image) {
            Storage::delete('public/' . $member->image);
        }

        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}

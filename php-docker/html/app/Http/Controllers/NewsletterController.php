<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;



class NewsletterController extends Controller
{
    public function index() {
        $newsletters = Newsletter::latest()->simplePaginate(6);
        return view('newsletters.index', compact('newsletters'));
    }

    public function manage()
    {
        $newsletters = auth()->user()->newsletters()->with('subscribers')->get();
        return view('newsletters.manage', compact('newsletters'));
    }

    public function create() {
        if (!auth()->user()->isCustomer()) {
            return redirect('/')->with('error', 'Access denied. You do not have customer permissions.');
        }
        return view('newsletters.create');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:1024'
        ]);
    
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('newsletter_images', 'public');
        }
    
        $formFields['user_id'] = auth()->id();
    
        $newsletter = Newsletter::create($formFields);
    
        return redirect('/')->with('message', 'Newsletter created successfully!');
    }

    public function show(Newsletter $newsletter) {
        return view('newsletters.show', compact('newsletter'));
    }

    public function edit(Newsletter $newsletter) {
        return view('newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter) {
        if ($newsletter->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|max:1024'
        ]);
    
        $formFields = $request->only(['name', 'description']);

    if ($request->hasFile('image')) {
        if ($newsletter->image) {
            Storage::delete('public/' . $newsletter->image);
        }
        $formFields['image'] = $request->file('image')->store('newsletter_images', 'public');
    }

    $newsletter->update($formFields);
        return redirect('/newsletters/manage')->with('message', 'Newsletter updated successfully!');
    }

    public function destroy(Newsletter $newsletter) {
        if ($newsletter->user_id != auth()->id()) {
            abort(403, 'Unauthorized Action');
        }
    
        $newsletter->delete();
        return back()->with('message', 'Newsletter deleted successfully');
    }
}

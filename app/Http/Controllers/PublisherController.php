<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PublisherController extends Controller
{
    public function index(Request $request)
    {
        return view('publishers.index', ["publishers" => Publisher::paginate(10)->withQueryString()]);
    }

    public function create()
    {
        // Exibe o formulário para criar um novo publisher
        return view('publishers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'numOfGames' => 'nullable|integer|min:0',
            'email' => 'required|email|max:100|unique:publishers,email',
            'dateOfEstablishment' => 'nullable|date'
        ]);

        $publisher = new Publisher();
        $publisher->name = $validated['name'];
        $publisher->numOfGames = $validated['numOfGames'] ?? 0;
        $publisher->email = $validated['email'];
        $publisher->dateOfEstablishment = $validated['dateOfEstablishment'];
        $publisher->save();

        return redirect()->route('publishers.index', $publisher);
    }

    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact('publisher'));
    }

    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
             $rules = [
                'name' => 'required|string|max:100',
                'numOfGames' => 'nullable|integer|min:0',
                'email' => ['required', 'email','max:100',
                Rule::unique('publishers', 'email')->ignore($publisher),
            ],
            'dateOfEstablishment' => 'nullable|date',
        ];

        $messages = [
            'name.required' => 'The publisher name is required.',
            'name.string' => 'The publisher name must be a string.',
            'name.max' => 'The publisher name cannot exceed 100 characters.',
            'numOfGames.integer' => 'The number of games must be an integer.',
            'numOfGames.min' => 'The number of games cannot be negative.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be valid.',
            'email.max' => 'The email address cannot exceed 100 characters.',
            'email.unique' => 'The email address has already been taken.',
            'dateOfEstablishment.date' => 'The date of establishment must be a valid date.',
        ];

        $validated = $request->validate($rules, $messages);

        try {
            $publisher->update($validated);
            $publisher->save();

            return redirect(route('publishers.show', $publisher))->with('success', 'Publisher Altered Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => "Error altering data! MSG: {$e->getMessage()}"])->withInput();
        }
    }

    public function destroy(Publisher $publisher)
    {
        $publisher->delete();

        return redirect()->route('publishers.index')->with('success', 'Publisher deleted successfully.');
    }

    public function deleted()
    {
        $publishers = Publisher::onlyTrashed()->paginate(10);
        return view('softdeletes.publishers.deleted', compact('publishers'));
    }

    public function restore($id)
    {
        $publisher = Publisher::withTrashed()->findOrFail($id);
        $publisher->restore();
        return redirect()->route('publishers.deleted')->with('success', 'Publisher restored successfully.');
    }

    public function forceDelete($id)
    {
        $publisher = Publisher::withTrashed()->findOrFail($id);
        $publisher->forceDelete();
        return redirect()->route('publishers.deleted')->with('success', 'Publisher permanently deleted.');
    }

}

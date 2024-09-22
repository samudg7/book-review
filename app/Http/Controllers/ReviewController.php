<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;


class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:reviews')->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Book $book)
    {
        return view('books.reviews.create', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Book $book)
    {
        try {
            // Validate the request data
            $data = $request->validate([
                'review' => 'required|min:2',
                'rating' => 'required|integer|min:1|max:5',
            ]);

            // Create a new review for the book
            $book->reviews()->create($data);

            // Redirect to the book's show page with a success message
            return redirect()->route('books.show', $book)->with('success', 'Review added successfully.');
        } catch (ValidationException $e) {
            // Handle validation exception and redirect back with errors and input
            return Redirect::back()->withErrors($e->validator)->withInput();
        } catch (\Exception $e) {
            // Handle other potential exceptions (e.g., database errors)
            return Redirect::back()->with('error', 'Something went wrong. Please try again.');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

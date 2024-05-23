<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class QuoteController extends Controller
{
    public function index()
    {
        $id = Auth::id();
        return view('dashboard', ['quotes' => Quote::where('user_id', $id)->get()]);
    }

    public function getAdd()
    {
        return view('add');
    }

    public function saveQuote(Request $request)
    {
        $bookLink = 'https://openlibrary.org/works/' . $request->book . '.json';
        $bookResponse = Http::get($bookLink);
        $book = $bookResponse->json();

        $authorKey = $book['authors'][0]['author']['key'];
        $authorLink = 'https://openlibrary.org/' . $authorKey . '.json';
        $authorResponse = Http::get($authorLink);
        $author = $authorResponse->json();

        $newQuote = new Quote();
        $newQuote->title = $book['title'];
        $newQuote->author = $author['name'];
        $newQuote->image = $book['covers'][0];
        $newQuote->quote = $request->quote;
        $newQuote->page = $request->page;
        $newQuote->character = $request->character;
        $newQuote->user_id = Auth::id();
        $newQuote->save();
        return redirect('/add');
    }
}
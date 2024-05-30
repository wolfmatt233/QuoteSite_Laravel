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
        $newQuote->type = "api";
        $newQuote->save();
        return redirect('/add');
    }

    public function saveQuoteManual(Request $request)
    {
        $newQuote = new Quote();
        $newQuote->title = $request->book;
        $newQuote->author = $request->author;
        $newQuote->image = $request->image;
        $newQuote->quote = $request->quote;
        $newQuote->page = $request->page;
        $newQuote->character = $request->character;
        $newQuote->user_id = Auth::id();
        $newQuote->type = "manual";
        $newQuote->save();
        return redirect('/add');
    }

    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return redirect('/dashboard');
    }
}

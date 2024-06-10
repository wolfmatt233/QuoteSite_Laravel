<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $id = Auth::id();
        $search = $request->input('search');
        $quotes = Quote::where('user_id', $id)->get();
        
        if($search) {
            $quotes = Quote::where('user_id', $id)->where('quote', 'like', "%$search%")->get();
        }

        return view('dashboard', ['quotes' => $quotes]);
    }

    public function manualAdd() {
        return view('manualAdd');
    }

    public function add() {
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

    public function editQuote($id) {
        $userId = Auth::id();
        $quote = Quote::find($id);
        if($quote->user_id != $userId) {
            return redirect('/dashboard');
        } else {
            return view('edit', ['quote' => $quote]);
        }
    }

    public function updateQuote(Request $request, $id) {
        $quote = Quote::find($id);
        $quote->title = $request->book;
        $quote->author = $request->author;
        if($request->image) {
            $quote->image = $request->image;
        }
        $quote->quote = $request->quote;
        $quote->page = $request->page;
        $quote->character = $request->character;
        $quote->save();
        return redirect('/dashboard');
    }

    public function deleteQuote($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        return redirect('/dashboard');
    }
}

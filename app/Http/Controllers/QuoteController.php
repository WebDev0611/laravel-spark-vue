<?php

namespace App\Http\Controllers;

use App\Quote;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
// use Faker\Generator;

class QuoteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // $this->middleware('subscribed');
    }

    public function index()
    {
      return response(Quote::all()->jsonSerialize(), Response::HTTP_OK);
        // return view('quotes');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function list()
    {
        // return response(Quote::all()->jsonSerialize(), Response::HTTP_OK);
        return view('Quotes');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function item($id)
    {
        // return response(Quote::findOrFail($id)->jsonSerialize(), Response::HTTP_OK);
        return view('Quote', ['quote' => Quote::findOrFail($id)->jsonSerialize()]);
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function show()
    {
         // $quote = Quote::findOrFail($id);
         return view('newQuote');
    }

    /**
     * Store a new user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)  {
 
        // $quote->id = $request->input('quote_id');
        $quote->json =  $request->quotes; 
    }

    public function destroy($id)
    {
      Quote::destroy($id);

      return response(null, Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends Controller
{

    use ApiResponser;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * return the list of book
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

        $book = Books::all();

        return $this->succcessResponse($book);
    }

    /**
     * Create one new book
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Books::create($request->all());

        return $this->succcessResponse($book, Response::HTTP_CREATED);
    }

    /**
     * Obatins and show one book
     *
     * @return Illuminate\Http\Response
     */
    public function show($book)
    {
        $book = Books::findOrFail($book);

        return $this->succcessResponse($book);
    }

    /**
     * Update an existing book
     *
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {

        $rules = [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'price' => 'required|min:1',
            'author_id' => 'required|min:1',
        ];

        $this->validate($request, $rules);

        $book = Books::findOrFail($book);

        $book->fill($request->all());

        if ($book->isClean()) {
            return $this->errorResponse(
                'At least one value must change',
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $book->save();

        return $this->succcessResponse($book);
    }

    /**
     * Remove an existing book
     *
     * @return Illuminate\Http\Response
     */
    public function destroy($book)
    {

        $book = Books::findOrFail($book);

        $book->delete();

        return $this->succcessResponse($book);
    }

    //
}

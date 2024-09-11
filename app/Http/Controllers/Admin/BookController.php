<?php

namespace App\Http\Controllers\Admin;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookRequest $request)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Book::generateSlug($form_data['title']);	

        if($request->hasFile('image')){
            $imagePath = $this->handleFileUpload($request->file('image'), 'books_images');
            $form_data['image'] = $imagePath;
        }

        $newBook = Book::create($form_data);
        // dd($newBook);
        return redirect()->route('admin.books.show', $newBook->slug)->with('message', 'il libro ' . $newBook->title . ' è stato aggiunto correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('admin.books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookRequest $request, Book $book)
    {
        $form_data = $request->validated();
        $form_data['slug'] = Book::generateSlug($form_data['title']);

        // if ($request->has('price')) {
        //     // dd($request->price);
        //     $form_data['price'] = floatval(str_replace(',', '.', $request->price));
        // }
        if($request->hasFile('image')){
            if($book->image){
                Storage::delete($book->image);
            }
            $imagePath = $this->handleFileUpload($request->file('image'), 'books_images');
            $form_data['image'] = $imagePath;
        }
        $book->update($form_data);
        // dd($form_data);
        return redirect()->route('admin.books.show', $book->slug)->with('message', 'il libro ' . $book->title . ' è stato aggiornato correttamente');                                     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        if ($book->image) {
            Storage::delete($book->image);
        }
        $book->delete();
        return redirect()->route('admin.books.index')->with('message', 'il libro ' . $book->title . ' è stato eliminato correttamente');
    }

    private function handleFileUpload($file, $directory)
    {
        // Genera un nome di file unico= 
        //  time(): Restituisce il timestamp corrente ,
        // uniqid(): Genera un ID univoco basato sul microtempo corrente
        // .getClientOriginalExtension(): Restituisce l'estensione originale del file
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        
        // Carica il file nella directory specificata
        try {
            // passo il percorso della cartella il file e il nome del file generato
            $path = Storage::putFileAs($directory, $file, $filename);
        } catch (\Exception $e) {
            // Gestisce eventuali errori durante il caricamento
            throw new \Exception('Errore durante il caricamento del file: ' . $e->getMessage());
        }

        return $path;
    }
}

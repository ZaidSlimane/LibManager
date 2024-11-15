<?php

namespace App\Http\Controllers;

use App\Facades\LibraryFacade;
use App\Models\Library;
use App\Models\User;
use App\Facades\UserFacade;
use App\Models\Book;
use App\Observers\UserObserver; 
use Illuminate\Http\Request;


class LibraryController extends Controller
{
    public $userObserver;

    /**
     * LibraryController constructor.
     * Inject UserObserver dependency.
     *
     * @param UserObserver $userObserver
     */
    public function __construct(UserObserver $userObserver)
    {
        $this->userObserver = $userObserver;
    }


    /**
     * Add a new book and notify subscribers if it's in the "Computer Science" category.
     */
    public function addBook(Request $request)
    {
        $validated = $request->validate([
            'name'              => 'required|string|max:255',
            'category'          => 'required|string|max:255',
            'author'            => 'required|string|max:255',
            'publication_date'  => 'required|date',
            'nb_pages'          => 'required|integer',
            'type'              => 'required|string|max:50',
        ]);

      // Create the book
      $book = Book::create($validated);

      // Notify subscribers through UserObserver if the book's category is "Computer Science"
      $notifiedUsers = [];
      if ($book->category === 'Computer Science') {
          $notifiedUsers = $this->userObserver->notifySubscribers($book);
      }

      return response()->json([
          'success' => 'Book added successfully!',
          'book' => $book,
          'notified_users' => $notifiedUsers,
      ]);

    }


    public function addUser(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'required|string|max:255',
            'interests' => 'array', // Validate interests as an array
            'interests.*' => 'string|max:255', // Each interest should be a string with a max length
        ]);
    
       
    
        // Pass the validated data to the UserFacade to create a new user
        $user = UserFacade::createUser($validated);
    
        return response()->json($user);
    }
    


}

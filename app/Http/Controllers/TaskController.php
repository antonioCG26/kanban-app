<?php

namespace App\Http\Controllers;
use Inertia\Inertia;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
    
        
        $tasks = auth()->user()->statuses()->with('tasks')->get();
        return Inertia::render('KanbanBoard', compact('tasks'));
    }
}

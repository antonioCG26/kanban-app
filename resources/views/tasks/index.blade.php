@extends('layouts.app')

@section('content')
<div class="md:mx-4 relative overflow-hidden">
    <main class="h-full flex flex-col overflow-auto">
        <Kanban-board :initial-data="{{ $tasks }}" id="Kanban-board"></kanban-board>
    </main>
</div>
@endsection
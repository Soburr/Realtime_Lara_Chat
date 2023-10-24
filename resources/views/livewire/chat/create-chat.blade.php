<div>
    {{-- The Master doesn't talk, he acts. --}}
    
     @foreach ($users as $user)
        <ul class="list-group w-75 mx-auto mt-3 container-fluid">
            <li class="list-group-item list-group-item-action">{{ $user->name }}</li>
        </ul>
    @endforeach




</div>

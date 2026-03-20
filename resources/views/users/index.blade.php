<h1>Usuários</h1>

@foreach($users as $user)
<p>{{ $user->name }} - {{ $user->email }}</p>
@endforeach
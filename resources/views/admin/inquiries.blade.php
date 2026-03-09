@extends('admin.layout')

@section('content')

<h2>Customer Inquiries</h2>

<div class="card">

<table>

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Qty</th>
<th>Message</th>
<th>Date</th>
</tr>
</thead>

<tbody>

@foreach($inquiries as $i)

<tr>
<td>{{ $i->id }}</td>
<td>{{ $i->full_name }}</td>
<td>{{ $i->email }}</td>
<td>{{ $i->phone }}</td>
<td>{{ $i->quantity }}</td>
<td>{{ $i->message }}</td>
<td>{{ $i->created_at }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
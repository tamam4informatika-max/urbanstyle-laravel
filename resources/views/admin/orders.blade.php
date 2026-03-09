@extends('admin.layout')

@section('content')

<h2>Orders</h2>

<div class="card">

<table>

<thead>
<tr>
<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Total</th>
<th>Date</th>
</tr>
</thead>

<tbody>

@foreach($orders as $order)

<tr>
<td>{{ $order->id }}</td>
<td>{{ $order->name }}</td>
<td>{{ $order->email }}</td>
<td>Rp {{ number_format($order->total) }}</td>
<td>{{ $order->created_at }}</td>
</tr>

@endforeach

</tbody>

</table>

</div>

@endsection
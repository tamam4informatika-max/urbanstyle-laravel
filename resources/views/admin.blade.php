<!DOCTYPE html>
<html>
<head>
<title>UrbanStyle Admin</title>

<style>

body{
font-family:Arial;
margin:0;
background:#f4f4f4;
}

header{
background:#111;
color:white;
padding:18px 30px;
}

.container{
max-width:1000px;
margin:auto;
padding:40px;
}

.card{
background:white;
padding:25px;
border-radius:10px;
margin-bottom:20px;
box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

.card h3{
margin-bottom:10px;
}

.btn{
display:inline-block;
padding:10px 18px;
background:#facc15;
color:#111;
text-decoration:none;
border-radius:6px;
font-weight:bold;
}

</style>

</head>

<body>

<header>
<h2>UrbanStyle Admin Dashboard</h2>
</header>

<div class="container">

<div class="card">
<h3>📩 Manage Inquiries</h3>
<p>View all customer inquiries sent from catalog.</p>

<a href="/admin/inquiries" class="btn">
View Inquiries
</a>
</div>

<div class="card">
<h3>🛒 Manage Orders</h3>
<p>View orders submitted from cart checkout.</p>

<a href="/admin/orders" class="btn">
View Orders
</a>
</div>

</div>

</body>
</html>
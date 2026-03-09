<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>UrbanStyle Admin</title>

<style>

body{
margin:0;
font-family:Arial;
background:#f3f4f6;
}

/* HEADER */

header{
background:#111;
color:white;
padding:18px 30px;
font-size:20px;
font-weight:bold;
}

/* CONTAINER */

.container{
max-width:1100px;
margin:auto;
padding:40px;
}

/* CARD */

.card{
background:white;
padding:25px;
border-radius:10px;
box-shadow:0 5px 20px rgba(0,0,0,0.08);
}

/* TABLE */

table{
width:100%;
border-collapse:collapse;
margin-top:10px;
}

thead{
background:#111;
color:white;
}

th{
padding:14px;
text-align:left;
}

td{
padding:14px;
border-bottom:1px solid #eee;
}

tr:hover{
background:#f9fafb;
}

/* BUTTON */

.btn{
display:inline-block;
padding:8px 14px;
background:#facc15;
border-radius:6px;
text-decoration:none;
color:#111;
font-weight:bold;
}

.btn:hover{
background:#eab308;
}

</style>

</head>

<body>

<header>
UrbanStyle Admin
</header>

<div class="container">

@yield('content')

</div>

</body>
</html>
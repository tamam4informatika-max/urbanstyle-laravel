<!DOCTYPE html>
<html lang="en">
<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="UTF-8">
<title>UrbanStyle - Checkout</title>

<style>
body{margin:0;font-family:Arial;background:#f3f4f6;}
header{background:#facc15;padding:20px 30px;font-size:20px;font-weight:bold;}
main{max-width:1200px;margin:40px auto;padding:0 20px;}
.cart-wrapper{display:grid;grid-template-columns:2fr 1fr;gap:30px;}
.box{background:#fff;border-radius:14px;padding:25px;box-shadow:0 10px 25px rgba(0,0,0,.08);}
.cart-item{display:flex;gap:15px;padding:15px 0;border-bottom:1px solid #eee;}
.cart-item img{width:90px;height:90px;object-fit:cover;border-radius:10px;}
.cart-info{flex:1;}
.qty{display:flex;gap:10px;align-items:center;margin-top:6px;}
.qty button{width:26px;height:26px;border:none;background:#111;color:#fff;border-radius:5px;cursor:pointer;}
.remove{background:#dc2626;color:#fff;border:none;padding:6px 10px;border-radius:6px;cursor:pointer;}
.summary-row{display:flex;justify-content:space-between;margin:8px 0;}
.total{font-weight:bold;font-size:18px;margin-top:12px;}
.checkout-btn{margin-top:20px;width:100%;padding:12px;border:none;background:#facc15;font-weight:bold;border-radius:30px;cursor:pointer;}
input,textarea{width:100%;padding:10px;margin:8px 0;border-radius:8px;border:1px solid #ddd;font-size:14px;}
.empty{text-align:center;padding:40px;color:#777;}
</style>
</head>

<body>

<header>🛒 UrbanStyle Checkout</header>

<main>
<div class="cart-wrapper">

<div class="box">
<h2>Your Items</h2>
<div id="cartList"></div>
</div>

<div class="box">
<h3>Order Summary</h3>

<div class="summary-row">
<span>Total Items</span>
<span id="totalItems">0</span>
</div>

<div class="summary-row">
<span>Subtotal</span>
<span id="subtotal">Rp 0</span>
</div>

<div class="summary-row">
<span>Shipping</span>
<span>Rp 20.000</span>
</div>

<div class="summary-row total">
<span>Total</span>
<span id="grandTotal">Rp 0</span>
</div>

<hr style="margin:20px 0;">

<h3>Customer Information</h3>

<input type="text" id="custName" placeholder="Full Name">
<input type="text" id="custPhone" placeholder="Phone Number">
<textarea id="custAddress" rows="3" placeholder="Full Address"></textarea>

<button class="checkout-btn" onclick="checkout()">
Confirm Order
</button>

</div>
</div>
</main>

<script>

function getCart(){
    try{
        return JSON.parse(localStorage.getItem("cart")) || [];
    }catch(e){
        return [];
    }
}

let cart = getCart();

function renderCart(){
    const cartList = document.getElementById("cartList");
    cartList.innerHTML = "";

    if(cart.length === 0){
        cartList.innerHTML = "<div class='empty'>Your cart is empty.</div>";
        updateSummary();
        return;
    }

    cart.forEach((item,index)=>{

        const price = Number(item.price);
        const qty = Number(item.qty);
        const subtotal = price * qty;

        cartList.innerHTML += `
            <div class="cart-item">
                <img src="${item.image}">
                <div class="cart-info">
                    <strong>${item.name}</strong>
                    <div>Price: Rp ${price.toLocaleString()}</div>
                    <div>Subtotal: Rp ${subtotal.toLocaleString()}</div>
                    <div class="qty">
                        <button onclick="decrease(${index})">-</button>
                        <span>${qty}</span>
                        <button onclick="increase(${index})">+</button>
                    </div>
                </div>
                <button class="remove" onclick="removeItem(${index})">Remove</button>
            </div>
        `;
    });

    updateSummary();
}

function updateSummary(){
    let subtotal = 0;
    let totalItems = 0;

    cart.forEach(item=>{
        subtotal += Number(item.price) * Number(item.qty);
        totalItems += Number(item.qty);
    });

    const shipping = cart.length > 0 ? 20000 : 0;
    const grandTotal = subtotal + shipping;

    document.getElementById("subtotal").innerText =
        "Rp " + subtotal.toLocaleString();

    document.getElementById("grandTotal").innerText =
        "Rp " + grandTotal.toLocaleString();

    document.getElementById("totalItems").innerText = totalItems;
}

function increase(index){
    cart[index].qty++;
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function decrease(index){
    if(cart[index].qty > 1){
        cart[index].qty--;
    } else {
        cart.splice(index,1);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function removeItem(index){
    cart.splice(index,1);
    localStorage.setItem("cart", JSON.stringify(cart));
    renderCart();
}

function checkout(){

    if(cart.length === 0){
        alert("Cart is empty!");
        return;
    }

    const name = document.getElementById("custName").value;
    const phone = document.getElementById("custPhone").value;
    const address = document.getElementById("custAddress").value;

    if(!name || !phone || !address){
        alert("Please complete your information.");
        return;
    }

    fetch("/checkout", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            name: name,
            phone: phone,
            address: address,
            items: cart
        })
    })
    .then(res => res.json())
    .then(data => {
        if(data.success){
            localStorage.removeItem("cart");
            cart = [];
            renderCart();
            alert("Order berhasil disimpan!");
        }else{
            alert("Failed to save order.");
        }
    })
    .catch(err=>{
        console.log(err);
        alert("Server error.");
    });
}

document.addEventListener("DOMContentLoaded", renderCart);

</script>

</body>
</html>
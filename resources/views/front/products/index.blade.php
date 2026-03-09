<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>UrbanStyle Catalog</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f5f5;
            color: #111;
        }

        header {
            background: #facc15;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            font-size: 22px;
            font-weight: bold;
        }

        .brand span {
            color: #fff;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #111;
            font-weight: 500;
        }

        .search {
            padding: 8px 14px;
            border-radius: 20px;
            border: none;
            width: 240px;
            outline: none;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 24px;
        }

        h2 {
            margin-bottom: 24px;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 24px;
        }

        .card {
            background: #fff;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0,0,0,.08);
            transition: transform .2s ease;
        }

        .card:hover {
            transform: translateY(-4px);
        }

        .image-box {
            width: 100%;
            height: 260px;
            overflow: hidden;
            background: #ddd;
        }

        .image-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .card-body {
            padding: 16px;
        }

        .card-body h4 {
            margin: 0 0 6px;
        }

        .card-body p {
            font-size: 14px;
            color: #555;
            margin: 0 0 8px;
        }

        .price {
            font-weight: bold;
            margin-bottom: 12px;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background: #facc15;
            color: #111;
            text-decoration: none;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 600;
        }

        footer {
            margin-top: 80px;
            padding: 24px;
            background: #111;
            color: #fff;
            text-align: center;
            font-size: 14px;
        }

        .categories {
            margin: 30px 0 40px;
            display: flex;
            gap: 14px;
            flex-wrap: wrap;
        }

        .category-btn {
            padding: 10px 22px;
            border-radius: 999px;
            border: 1px solid #e5e5e5;
            background: #fff;
            font-size: 14px;
            cursor: pointer;
            transition: all .25s ease;
        }

        .category-btn:hover {
            background: #facc15;
            border-color: #facc15;
        }

        .category-btn.active {
            background: #111;
            color: #fff;
            border-color: #111;
        }

        /* CATEGORY GRID */
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
        }

        .category-card {
            background: #fff;
            border-radius: 18px;
            padding: 26px 22px;
            box-shadow: 0 10px 24px rgba(0,0,0,.08);
            cursor: pointer;
            transition: all .25s ease;
        }

        .category-card h3 {
            margin: 0 0 6px;
            font-size: 20px;
        }

        .category-card p {
            margin: 0;
            font-size: 14px;
            color: #555;
        }

        .category-card:hover {
            background: #111;
            color: #fff;
            transform: translateY(-4px);
        }

        .category-card:hover p {
            color: #ddd;
        }

        .cart-popup {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        .cart-box {
            background: #fff;
            width: 360px;
            border-radius: 14px;
            padding: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,.2);
        }

        .cart-box h3 {
            margin-bottom: 12px;
        }

        .cart-items {
            max-height: 220px;
            overflow-y: auto;
            margin-bottom: 12px;
            font-size: 14px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 8px;
        }

        .cart-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-footer button {
            background: #facc15;
            border: none;
            padding: 6px 14px;
            border-radius: 6px;
            cursor: pointer;
        }

        .empty {
            color: #999;
            font-size: 13px;
        }

        .category-card.active {
            background:#111;
            color:#fff;
        }

        .category-card.active p {
            color:#ddd;
        }

        .btn {
            display:inline-block;
            padding:9px 18px;
            background:#facc15;
            color:#111;
            text-decoration:none;
            border-radius:24px;
            font-size:14px;
            font-weight:700;
            transition:.2s;
        }

        .btn:hover{
            background:#eab308;
        }

        /* ===== MODERN INQUIRY POPUP ===== */

        .inquiry-popup{
        position:fixed;
        top:0;
        left:0;
        width:100%;
        height:100%;
        background:rgba(0,0,0,0.6);
        display:none;
        justify-content:center;
        align-items:center;
        z-index:9999;
        animation:fadeIn .25s ease;
        }

        @keyframes fadeIn{
        from{opacity:0}
        to{opacity:1}
        }

        .inquiry-box{
        background:#fff;
        width:460px;
        padding:30px;
        border-radius:18px;
        box-shadow:0 25px 70px rgba(0,0,0,0.35);
        position:relative;
        animation:popup .25s ease;
        }

        @keyframes popup{
        from{transform:scale(.9);opacity:0}
        to{transform:scale(1);opacity:1}
        }

        .inquiry-close{
        position:absolute;
        top:12px;
        right:16px;
        font-size:22px;
        cursor:pointer;
        color:#999;
        }

        .inquiry-close:hover{
        color:#111;
        }

        .inquiry-title{
        font-size:22px;
        font-weight:bold;
        margin-bottom:20px;
        }

        .inquiry-form{
        display:flex;
        flex-direction:column;
        gap:14px;
        }

        .form-group{
        display:flex;
        flex-direction:column;
        gap:5px;
        }

        .form-group label{
        font-size:13px;
        font-weight:600;
        color:#444;
        }

        .inquiry-form input,
        .inquiry-form textarea{
        width:100%;
        padding:11px;
        border-radius:8px;
        border:1px solid #ddd;
        font-size:14px;
        transition:.2s;
        }

        .inquiry-form input:focus,
        .inquiry-form textarea:focus{
        outline:none;
        border-color:#facc15;
        box-shadow:0 0 0 2px rgba(250,204,21,.2);
        }

        .inquiry-form textarea{
        height:90px;
        resize:none;
        }

        .inquiry-actions{
        display:flex;
        justify-content:flex-end;
        gap:10px;
        margin-top:10px;
        }

        .btn-cancel{
        background:#eee;
        border:none;
        padding:9px 15px;
        border-radius:8px;
        cursor:pointer;
        }

        .btn-send{
        background:#facc15;
        border:none;
        padding:10px 20px;
        border-radius:8px;
        font-weight:bold;
        cursor:pointer;
        transition:.2s;
        }

        .btn-send:hover{
        background:#eab308;
        }
    </style>
</head>

<body>

<header>
    <div class="brand">Urban<span>Style</span></div>

    <input
        id="searchInput"
        class="search"
        type="text"
        placeholder="Search products..."
        onkeyup="filterProducts()"
    >

    <nav>
        <a href="/cart" style="position:relative; text-decoration:none;">
            🛒
            <span id="cartCount"
                style="
                    position:absolute;
                    top:-6px;
                    right:-10px;
                    background:red;
                    color:white;
                    font-size:11px;
                    padding:2px 6px;
                    border-radius:50%;
                ">0</span>
        </a>
    </nav>
</header>

<main>
    @if(session('success'))
        <div style="
            background:#dcfce7;
            color:#166534;
            padding:12px;
            border-radius:8px;
            margin-bottom:20px;
            font-weight:600;
            ">
            {{ session('success') }}
        </div>
    @endif
    <h2>Product Catalog</h2>

    <section style="margin-top:40px;">
        <h2 style="margin-bottom:18px;">Browse by Category</h2>

        <div class="category-grid">

            <div class="category-card" onclick="setCategory('jacket')">
                <h3>🧥 Jacket</h3>
                <p>Street & daily outerwear</p>
            </div>

            <div class="category-card" onclick="setCategory('baju')">
                <h3>👕 Baju</h3>
                <p>Graphic & casual tees</p>
            </div>

            <div class="category-card" onclick="setCategory('celana')">
                <h3>👖 Celana</h3>
                <p>Relaxed street pants</p>
            </div>

            <div class="category-card" onclick="setCategory('knitwear')">
                <h3>🧶 Knitwear</h3>
                <p>Warm & textured pieces</p>
            </div>

        </div>
    </section>

    <div class="categories">
    <button class="category-btn active" onclick="setCategory(null, this)">All</button>
    <button class="category-btn" onclick="setCategory('jacket', this)">Jacket</button>
    <button class="category-btn" onclick="setCategory('baju', this)">Baju</button>
    <button class="category-btn" onclick="setCategory('celana', this)">Celana</button>
    <button class="category-btn" onclick="setCategory('knitwear', this)">Knitwear</button>
</div>

<div class="grid" id="productGrid">

        <div class="card product-item"
            data-id="1"
            data-name="Street Bomber"
            data-price="750000"
            data-image="/images/products/jacket-1.jpg"
            data-category='jacket'
            data-slug="street-bomber">

            <div class="image-box">
                <img src="/images/products/jacket-1.jpg">
            </div>

            <div class="card-body">
                <h4>Street Bomber</h4>
                <p>Urban Jacket Style</p>
                <div class="price">Rp 750.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="2"
            data-name="Urban Parka"
            data-price="920000"
            data-image="/images/products/jacket-2.jpg"
            data-category="jacket"
            data-slug="urban-parka">

            <div class="image-box">
                <img src="/images/products/jacket-2.jpg">
            </div>

            <div class="card-body">
                <h4>Urban Parka</h4>
                <p>Clean Daily Wear</p>
                <div class="price">Rp 920.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="3"
            data-name="Graphic Tee"
            data-price="280000"
            data-image="/images/products/tee-1.jpg"
            data-category="baju"
            data-slug="graphic-tee">

            <div class="image-box">
                <img src="/images/products/tee-1.jpg">
            </div>

            <div class="card-body">
                <h4>Graphic Tee</h4>
                <p>Street Cotton Tee</p>
                <div class="price">Rp 280.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="4"
            data-name="Minimal Jacket"
            data-price="690000"
            data-image="/images/products/jacket-3.jpg"
            data-category="jacket"
            data-slug="minimal-jacket">

            <div class="image-box">
                <img src="/images/products/jacket-3.jpg">
            </div>

            <div class="card-body">
                <h4>Minimal Jacket</h4>
                <p>Clean Urban Outerwear</p>
                <div class="price">Rp 690.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="5"
            data-name="Techwear Tee"
            data-price="310000"
            data-image="/images/products/tee-2.jpg"
            data-category="baju"
            data-slug="techwear-tee">

            <div class="image-box">
                <img src="/images/products/tee-2.jpg">
            </div>

            <div class="card-body">
                <h4>Techwear Tee</h4>
                <p>Street Graphic Tee</p>
                <div class="price">Rp 310.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="6"
            data-name="Daily Tee"
            data-price="250000"
            data-image="/images/products/tee-3.jpg"
            data-category="baju"
            data-slug="daily-tee">

            <div class="image-box">
                <img src="/images/products/tee-3.jpg">
            </div>

            <div class="card-body">
                <h4>Daily Tee</h4>
                <p>Daily Cotton Tee</p>
                <div class="price">Rp 250.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="7"
            data-name="Cargo Pants"
            data-price="520000"
            data-image="/images/products/pants-2.jpg"
            data-category="celana"
            data-slug="cargo-pants">

            <div class="image-box">
                <img src="/images/products/pants-2.jpg">
            </div>

            <div class="card-body">
                <h4>Cargo Pants</h4>
                <p>Utility Street Pants</p>
                <div class="price">Rp 520.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="8"
            data-name="Knit Hoodie"
            data-price="580000"
            data-image="/images/products/sweater-2.jpg"
            data-category="knitwear"
            data-slug="knit-hoodie">

            <div class="image-box">
                <img src="/images/products/sweater-2.jpg">
            </div>

            <div class="card-body">
                <h4>Knit Hoodie</h4>
                <p>Warm Textured Knit</p>
                <div class="price">Rp 580.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="9"
            data-name="Corduroy Pants"
            data-price="470000"
            data-image="/images/products/pants-3.jpg"
            data-category="celana"
            data-slug="corduroy-pants">

            <div class="image-box">
                <img src="/images/products/pants-3.jpg">
            </div>

            <div class="card-body">
                <h4>Corduroy Pants</h4>
                <p>Loose Daily Pants</p>
                <div class="price">Rp 470.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="10"
            data-name="Sweet Loose Pants"
            data-price="400000"
            data-image="/images/products/pants-4.jpg"
            data-category="celana"
            data-slug="sweet-loose-pants">

            <div class="image-box">
                <img src="/images/products/pants-4.jpg">
            </div>

            <div class="card-body">
                <h4>Sweet Loose Pants</h4>
                <p>Loose Daily Pants</p>
                <div class="price">Rp 400.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="11"
            data-name="Sweater/Knitwear"
            data-price="500000"
            data-image="/images/products/sweater-1.jpg"
            data-category="knitwear"
            data-slug="sweater/knitwear">

            <div class="image-box">
                <img src="/images/products/sweater-1.jpg">
            </div>

            <div class="card-body">
                <h4>Sweater/Knitwear</h4>
                <p>Knit Daily Outfit</p>
                <div class="price">Rp 500.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>

        <div class="card product-item"
            data-id="12"
            data-name="Bomber Jacket"
            data-price="860000"
            data-image="/images/products/jacket-4.jpg"
            data-category="jacket"
            data-slug="bomber-jacket">

            <div class="image-box">
                <img src="/images/products/jacket-4.jpg">
            </div>

            <div class="card-body">
                <h4>Bomber Jacket</h4>
                <p>Marvel Jacket Outfit</p>
                <div class="price">Rp 860.000</div>

                <a href="#" class="btn inquiry-btn">Inquiry</a>

                <button onclick="addToCart(this)"
                    style="
                        border:none;
                        background:#111;
                        color:white;
                        padding:8px 12px;
                        border-radius:50%;
                        cursor:pointer;">
                    🛒
                </button>

            </div>

        </div>
    </div>
</main>

<footer>
    © 2026 UrbanStyle — Streetwear Culture
</footer>

<script>
let activeCategory = null;

</script>

<!-- CART POPUP -->
<div id="cartPopup" class="cart-popup">
    <div class="cart-box">
        <h3>🛒 Your Cart</h3>

        <div id="cartItems" class="cart-items">
            <p class="empty">Your cart is empty</p>
        </div>

        <div class="cart-footer">
            <strong>Total: Rp <span id="cartTotal">0</span></strong>
            <button onclick="closeCart()">Close</button>
        </div>
    </div>
</div>

<script>

document.addEventListener("DOMContentLoaded", function(){

/* ======================
   CART
====================== */

function updateCartCount(){
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let total = cart.reduce((sum,item)=>sum+item.qty,0);
document.getElementById("cartCount").innerText = total;
}

function updateCartCount(){
let cart = JSON.parse(localStorage.getItem("cart")) || [];
let total = cart.reduce((sum,item)=>sum+item.qty,0);
document.getElementById("cartCount").innerText = total;
}

window.addToCart = function(btn){

const card = btn.closest(".product-item");

/* ambil data produk */
const id = card.dataset.id;
const name = card.dataset.name;
const price = Number(card.dataset.price);

/* ambil gambar langsung dari img */
const image = card.querySelector("img").src;

const product = {
id:id,
name:name,
price:price,
image:image,
qty:1
};

let cart = JSON.parse(localStorage.getItem("cart")) || [];

const exist = cart.find(p => p.id === product.id);

if(exist){
exist.qty++;
}else{
cart.push(product);
}

localStorage.setItem("cart", JSON.stringify(cart));

updateCartCount();

alert(product.name + " added to cart");

};

updateCartCount();


/* ======================
   SEARCH + CATEGORY
====================== */

let activeCategory = null;

const searchInput = document.getElementById("searchInput");

searchInput.addEventListener("keyup", filterProducts);

function filterProducts(){

const keyword = searchInput.value.toLowerCase();

document.querySelectorAll(".product-item").forEach(item => {

const name = item.dataset.name.toLowerCase();
const category = item.dataset.category;

const matchSearch = name.includes(keyword);
const matchCategory = activeCategory ? category === activeCategory : true;

item.style.display = (matchSearch && matchCategory) ? "block" : "none";

});

}

window.setCategory = function(category, el){

activeCategory = category;

document.querySelectorAll(".category-btn")
.forEach(btn => btn.classList.remove("active"));

if(el) el.classList.add("active");

filterProducts();

};


/* ======================
   INQUIRY POPUP
====================== */

const popup = document.getElementById("inquiryPopup");

document.querySelectorAll(".inquiry-btn").forEach(btn => {

btn.addEventListener("click", function(e){

e.preventDefault();

popup.style.display = "flex";

});

});

window.closeInquiry = function(){
popup.style.display = "none";
};


/* ======================
   INQUIRY FORM
====================== */
});
</script>

<div id="inquiryPopup" class="inquiry-popup">

<div class="inquiry-box">

<div class="inquiry-close" onclick="closeInquiry()">✕</div>

<div class="inquiry-title">
Product Inquiry
</div>

<form id="inquiryForm" class="inquiry-form" method="POST" action="/send-inquiry">

@csrf

<div class="form-group">
<label>Full Name</label>
<input type="text" name="full_name" placeholder="Enter your name" required>
</div>

<div class="form-group">
<label>Email Address</label>
<input type="email" name="email" placeholder="your@email.com" required>
</div>

<div class="form-group">
<label>Phone / WhatsApp</label>
<input type="text" name="phone" placeholder="+62 xxx xxxx">
</div>

<div class="form-group">
<label>Quantity Required</label>
<input type="number" name="quantity" placeholder="Example: 50 pcs">
</div>

<div class="form-group">
<label>Message</label>
<textarea name="message" placeholder="Tell us your needs..."></textarea>
</div>

<div class="inquiry-actions">

<button type="button" onclick="closeInquiry()" class="btn-cancel">
Cancel
</button>

<button type="submit" class="btn-send">
Send Inquiry
</button>

</div>

</form>

</div>

</div>

</body>
</html>
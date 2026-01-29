<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>AutoDz Tours | Book Your Car Tour</title>
  <link href="{{ asset('css/output.css') }}" rel="stylesheet">
  <link href="{{ asset('css/tour.css') }}" rel="stylesheet">
  <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
  <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
  <link href="{{ asset('css/toursForm.css') }}" rel="stylesheet">
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
<div class="header" style="font-family: roboto;" id="headID">

      <div class="left-side">
        <button class="show-btn" onclick="toggleNav()" id="openID">
          <p>&#8801;</p>
        </button>
        <button class="close-btn" onclick="closeAll()" id="closeID">
          <p>X</p>
        </button>  
      </div>

      <div class="middle-side">
        <button class="about-btn">
          <a href="/">HOME</a>
        </button>
        <button class="home-btn">
         <a href="/cars">CARS</a> 
        </button>
        <button class="rev-btn">
          <a href = "/reviews" >REVIEWS</a>
        </button>
        <button class="about-btn">
         <a href="/about">ABOUT</a>
        </button>

      </div>

      <div class="right-side">
        <button class="login-btn" id="login-btn-head-id">
          <a href="/login">LOGIN</a>
        </button>
        <button id="signup-btn-head-id" class="sign-btn">
          <a href="/signup">SIGN UP</a>
        </button>
        <button class="cart-btn-kk" id= "cart-btn-id">
          <img id="cartIcon-id" alt="Profile" class="cart--pic-kk">
        </button>
      </div>
        <div class="user-info-kk" id="usr-img-id">
            <img src="{{ asset('/images/mercedes-black-raobpqc23szwxs7d.jpg') }}" alt="Profile" class="profile-pic-kk">
        </div>

    </div>
    <div id="cartDrawer">
  <div class="cart-header">
    <h3>Orders</h3>
  </div>

  <div class="cart-content" id="cart-content">
  </div>
</div>

  
  <header class="hero">
    <h1>AutoDz Tours</h1>
    <p>Book your next car tour in Algeria — easy, fast, and reliable.</p>
  </header>

<div class="book-tour-box">
  <button class="book-tour-btn" id="book-tour-btn">Book Tour</button>
</div>


 






<div id="createTourModal">
  <div>
    <h2>Add a Tour Order</h2>
    <form id="createTourForm">
<label>Car Name:
  <select name="car_id" id="carNameT" required>
    <option value="">Select a car</option>
  </select>
</label>
      <label>Start Date: <input type="date" name="year" id="DateT"></label>
      <label>Duration <input type="number" name="image_url" id ="DurationT" required></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelCreateTour">Cancel</button>
      </div>
    </form>
  </div>
</div>

<div id="updateTourModal">
  <div>
    <h2>Update a Tour Order</h2>
    <form id="updateTourForm">
      <label>Start Date: <input type="date" name="year" id="DateTU"></label>
      <label>Duration <input type="number" name="image_url" id ="DurationTU" required></label>
      <div>
        <button type="submit">Submit</button>
        <button type="button" id="cancelUpdateTour" onclick="closeUpdateTourOrderModal()">Cancel</button>
      </div>
    </form>
  </div>
</div>















  <section class="available-tours">
    <h2>Available Cars For Tour</h2>
    <div class="tour-grid" id="tourGrid">
  
    </div>
  </section>

  <footer class="footer">
    <p>© 2025 AutoDz | All Rights Reserved.</p>
  </footer>
  <div class="dropdown" id="dropdownMenu">
  <button id="logoutBtn"class="dropdownbtn">Logout</button>
</div>
<div id="links-drawer">
  <div class="cart-header">
    <h3>Sections</h3>
  </div>

  <div class="cart-content" style="display:flex;flex-direction:column;font-size:1.5rem; gap:20px;"id="cart-content">
    <div><a href="/">Home</a></div>
    <div><a href="/cars">Cars List</a></div>
    <div><a href="/reviews">Reviews</a></div>
    <div><a href="/about">About</a></div>
  </div>
</div>
  <script src="{{ asset('js/globalTour.js') }}"></script>
  <script src="{{ asset('js/auth.js') }}"></script>
  <script src="{{ asset('js/headerScript.js') }}"></script>
  <script src="{{ asset('js/load-all.js') }}"></script>
  <script src="{{ asset('js/usrly.js') }}"></script>
  <script src="{{ asset('js/fetchTour.js') }}"></script>
  <script src="{{ asset('js/tour.js') }}"></script>

  <style>.book-tour-box {
  display: flex;
  justify-content: center;
  margin-top: 1rem;
}

.book-tour-btn {
  padding: 10px 20px;
  background-color: #3d31e1;
  color: #fff;
  border: none;
  border-radius: 6px;
  font-size: 1.2rem;
  cursor: pointer;
  transition: 0.3s;
  width:90vw !important;
  height: 50px;

}

.book-tour-btn:hover {
  background-color: #3271b5;
}
</style>


</html>



<!DOCTYPE html>
<html lang="eng">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>AutoDZ</title>
      <link rel="icon" href="images/simple-car-silhouette-sticker-u33a0-x450 5.png">
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
      <link href="{{ asset('css/output.css') }}" rel="stylesheet">
      <link href="{{ asset('css/usrlay.css') }}" rel="stylesheet">
      <link href="{{ asset('css/headerStyle.css') }}" rel="stylesheet">
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
        <button class="home-btn">
         <a href="/cars">CARS</a> 
        </button>
        <button class="about-btn">
          <a href="/tour">TOUR</a>
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
  <div id="links-drawer">
  <div class="cart-header">
    <h3>Sections</h3>
  </div>

  <div class="cart-content" style="display:flex;flex-direction:column;font-size:1.5rem; gap:20px;"id="cart-content">
    <div><a href="/cars">Cars List</a></div>
    <div><a href="/tour">Tour</a></div>
    <div><a href="/reviews">Reviews</a></div>
    <div><a href="/about">About</a></div>
  </div>
</div>
            
      <div class="image-container">  
        <img src="images/upcoming-trends-in-the-world-of-car-dealerships.jpeg" alt="AutoDz" class="object-cover h-100 w-full md:h-[40vh] lg:h-[60vh]  opacity=80">
           <div class="absolute text-white font-bold text-[2rem] sm:text-[2.5rem] md:text-[4rem] lg:text-[3rem] font-['Poppins'] top-[12vh] left-[6vw]">Find your perfect car</div>
            <div class="flex justify-center">
                <div class="absolute top-[27vh] xl:top-[34vh] w-full flex justify-center px-4">
                    <form action="index.html" method="GET" class="relative w-full max-w-2xl">
                        <div class="relative flex items-center">
                            <svg class="absolute left-4 w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            <input type="text" name="q" class="w-[95vw] sm:w-[80vw] md:w-[90vw] lg:w-full h-[7vh] md:h-[4vh] lg:h-[8vh]  pl-12 pr-28 py-3 md:py-4 text-gray-700 bg-white/95 backdrop-blur-sm rounded-full border-2 border-transparent focus:border-gray-500 focus:outline-none focus:ring-2 focus:ring-gray-500 shadow-xl transition-all duration-300 placeholder:text-gray-400 text-sm md:text-base" placeholder="Search for cars, brands, models..." required>
                            <button 
                                type="submit" class="absolute right-2 px-4 md:px-6 py-2 md:py-2.5 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-full transition-all duration-300 shadow-md hover:shadow-lg active:scale-95 text-sm md:text-base">Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

      </div> 
       
    
        <div class="flex justify-center sm:mt-[5vh] sm:mb-[5vh] md:mb-0 lg:mt-[9vh] lg:mb-[9vh]">
            <h1 class="mt-[4vh] mb-[3vh] sm:mb-[6vh] md:mb-0 lg:mb-[5vh] text-[2rem] sm:text-[3rem] md:text-[4rem] lg:text-[3.25rem] text-center font-bold font-['Poppins'] text-3xl text-black opacity-80">Featured Cars
            <p class="text-black  mt-[2vh] ml-[4vw] mr-[4vw] text-[1.25rem] sm:text-[1.5rem] md:text-[2rem] xl-text-[2rem] font-bold text-center font-['Roboto'] align-left">Discover Our handpicked selection of premium vehicles available for purshase or rental </p>
            </h1>
        </div>
      

        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-[4vw] py-3 px-4 mr-2 ml-2">
                <div class="bg-rgb(68, 68, 69) py-[3vh] px-[1.75vw] transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 hover:scale-[1.02] rounded-lg shadow-lg">
                    <img style="margin-top: 3vh; margin-bottom:1vh ;margin-left: 9px;border-radius:10%" src="/images/GlaSuv.jpg" alt="bmw x5" title="bmw x5" width="95%" height="40%">
                    <h3 class="text-center text-xl sm:text-2xl md:text-4xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">MERCEDES GLA SUV</h3>
                    <h2 class="text-2xl lg:text-lg" style="margin-top: 0; color: rgb(68, 68, 69);">$70000</h2>
                    <p style="margin-top: 0;">or $89/day</p>
                    <br />
                    <div class="flex justify-center gap-[7vw] xl:gap-[4vw]">
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem]  font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
                    </div>
                </div>
                <div class="bg-rgb(68, 68, 69) py-[3vh] px-[1.75vw] transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 hover:scale-[1.02] rounded-lg shadow-lg">
                    <img class="mx-auto" style=" margin-top: 1vh; margin-bottom:1vh ;border-radius:10%" src="/images/rs6-pic.avif" alt="tesla" title="tesla" width="87%" height="30%">
                    <h3 class="text-center text-xl sm:text-2xl md:text-4xl lg:text-xl font-bold font-['Poppins']"  style="margin-top: 0;">AUDI RS6</h3>
                    <h2 class="text-2xl lg:text-lg" style="margin-top: 0; color: rgb(68, 68, 69);">$120000</h2>
                    <p style="margin-top: 0;">or $89/day</p>
                    <br />
                    <div class="flex justify-center gap-[7vw] xl:gap-[4vw]">
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Buy</a>
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">Rent</a>
                    </div>
                </div>
                <div class="bg-rgb(68, 68, 69) py-[3vh] px-[1.75vw] transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 hover:scale-[1.02] rounded-lg shadow-lg ">
                    <img style="margin-top: 1vh; margin-bottom:1vh ;margin-left: 9px;border-radius:10%" src="/images/G-Class.jpg" alt="bmw x5" title="bmw x5" width="95%" height="40%">
                    <h3 class="text-center text-xl sm:text-2xl md:text-4xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">MERCEDES G-CLASS</h3>
                    <h2 class="text-2xl lg:text-lg" style="margin-top: 0; color: rgb(68, 68, 69);">$150000</h2>
                    <p style="margin-top: 0;">or $69/day</p>
                    <br />
                    <div class="flex justify-center gap-[7vw] xl:gap-[4vw]">
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] hover:bg-gray-950 transition duration-300">Buy</a>
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] hover:bg-gray-950 transition duration-300">Rent</a>
                    </div>
                </div>
                <div class="bg-rgb(68, 68, 69) py-[3vh] px-[1.75vw] transition-all duration-300 ease-in-out hover:shadow-2xl hover:-translate-y-2 hover:scale-[1.02] rounded-lg shadow-lg">
                    <img class="mx-auto" style=" margin-bottom:1vh" src="/images/M3.webp" alt="mercedes" title="mercedes" width="87%">
                    <h3 class="text-center text-xl sm:text-2xl md:text-4xl lg:text-xl font-bold font-['Poppins']" style="margin-top: 0;">BMW M3</h3>
                    <h2 class="text-2xl lg:text-lg" style="margin-top: 0; color: rgb(68, 68, 69);">$120000</h2>
                    <p style="margin-top: 0;">or $79/day</p>
                    <br />
                    <div class="flex justify-center gap-[7vw] xl:gap-[4vw]">
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] hover:bg-gray-950 transition duration-300">Buy</a>
                        <a class="bg-gray-900 px-[11vw] lg:px-[5vw] py-[0.6vh] text-white text-[1rem] sm:text-[1.5rem] md:text-[1.66rem] lg:text-[1rem] font-bold font['Poppins'] hover:bg-gray-950 transition duration-300">Rent</a>
                    </div>
                </div> 
        </div>

        <div class="flex justify-center">
        <a href="CarsList.html" class="inline-flex mt-14 md:mt-30 justify-center items-center px-[8vw] lg:px-[6vw] py-2 md:py-4 lg:py-2 bg-gray-900 text-white text-[1rem] md:text-[1.75rem] lg:text-[1.25rem] font-bold font-['Poppins'] rounded-md hover:bg-gray-950 transition duration-300">
            View All Cars
        </a>
        </div>

        <br><br><br><br>
        <h1 class=" mb-[9vh] lg:mb-[14vh] text-[2.25rem] sm:text-[3rem] md:text-[5rem] lg:text-[3.25rem] text-center font-bold font-['Poppins'] text-black opacity-80 " >Our Services</h1>
        <div class="grid justify-center grid-cols-1 lg:grid-cols-2 xl:grid-cols-3  gap-[4vw] mr-2 ml-2">

            <div class=" item-center justify-center rounded-md ml-20 mr-20 mb-10 lg:mb-[10vh]  ">
                <h3 class=" mt-[1.7vh] mb-4 text-[1.75rem] sm:[3rem] md:text-[4rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">Buy Cars</h3>
                <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] md:text-[3rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left" >  
                Browse thousands of new and usedcars from certified dealers and private sellers. Get the best deals with our price comparison tools.</p>
            </div>
            <div class=" rounded-md mb-10 ml-20 mr-20 lg:mb-[10vh]  ">
                <h3 class=" mb-4 text-[1.75rem] sm:[3rem] md:text-[4rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">Rent Cars</h3>
                    <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] md:text-[3rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left">  
                    Browse thousands of new and used
                    Rent cars for any occasion from daily commutes to weekend getaways.
                    We offer competitive rates and a seamless rental experience:</p>
            </div>
            <div class=" rounded-md mb-10 ml-20 mr-20 lg:mb-[10vh]  ">
                <h3 class=" mb-4 text-[1.75rem] sm:[3rem] md:text-[4rem] lg:text-[1.75rem] text-center font-black text-black font-['Poppins']">Driver Experience simulation </h3>
                    <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] md:text-[3rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left" >  
                        Book an appointment for a comprehensive driving simulation  .
                        Test vehicle performance in
                        various road and weather conditions safely</p>
            </div>
            <div class=" rounded-md mb-25 ml-20 mr-20  lg:hidden ">
                <h3 class=" mb-4 text-[1.75rem] sm:[3rem] md:text-[4rem] lg:text-[2rem] text-center font-black text-black font-['Poppins']">Test Drive </h3>
                    <p class="text-black opacity-90 text-[1.25rem] sm:text-[2rem] md:text-[3rem] lg:text-[1.75rem] text-center font-['Poppins'] align-left">  
                    Take any car for a few hours to experience its
                    performance and comfort. Test drive multiple vehicles to make 
                    an informed decision before buying:</p>
            </div>

        </div>
                


    <div class="py-2 bg-gray-900 flex h-[14vh] sm:h-[15vh] md:h-[10vh] lg:h-[15vh] w-full justify-center ">
        <div class="relative bottom-1 left-[4vw] text-center text-gray-950 mt-1 text-4xl font-bold font-['Roboto']">
          <p>_____________</p>
        </div>
        <p class="absolute mt-1 sm:mt-5 lg:mt-1 text-white font-bold  text-center text-2xl md:text-4xl lg-xl xl:text-xl font-['Poppins']">Contact And Support</p>
        <div class="flex relative top-4 right-[46vw] items-center justify-center gap-4">
          <img class="w-8 h-8 md:w-10 md:h-10 lg:w-8 lg:h-8" src="images/2023_Facebook_icon.svg.png" alt="Facebook Icon">
          <img class="w-8 h-8 md:w-11 md:h-11 lg:w-9 lg:h-9" src="images/vecteezy_instagram-logo-on-square-style-with-transparent-background_42127166.png" alt="Instagram Icon">
          <img class="w-8 h-8 md:w-10 md:h-10 lg:w-8 lg:h-8" src="images/x.jpg" alt="Twitter Icon">
        </div>
        <a href="" class="absolute mt-[7vh] sm:mt-[15vh] md:mt-[7vh] right-[10vw] text-white text-[1rem] font-['Roboto']">. Help Center</a>
    </div>
      <div class="relative flex justify-center items-center h-13 bg-[#181818] px-2 bottom-0 left-0 right-0 z-50">
        <p class="text-left text-xs text-white">© 2024 AutoDz. All rights reserved.</p>
        <p class="text-right text-xs text-white ml-auto hover:underline">
          <a href="#" class="terms-link">Terms of Service</a> | 
          <a href="#" class="privacy-link">Privacy Policy</a>
        </p>
      </div>

  <div class="dropdown" id="dropdownMenu">
    <button id="logoutBtn"class="dropdownbtn">Logout</button>
  </div>

  
  <script src="{{ asset('js/auth.js') }}"></script>
    <script src="{{ asset('js/headerScript.js') }}"></script>
    <script src="{{ asset('js/load-all.js') }}"></script>
    <script src="{{ asset('js/usrly.js') }}"></script>
  </body>
</html>

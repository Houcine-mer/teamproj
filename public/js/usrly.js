function getUserId() {
    const user = localStorage.getItem('user_data');
    if (!user) return null;
    try {
        const parsed = JSON.parse(user);
        return parsed.id || null; 
    } catch (e) {
        return null; 
    }
}
let userId = null;
document.addEventListener('DOMContentLoaded', () => {
    userId = getUserId();
    console.log(userId);
});


function updateHeaderButtons() {
    const cartbtn = document.getElementById('cart-btn-id');
    const userimg = document.getElementById('usr-img-id');
    const loginbtn = document.getElementById('login-btn-head-id');
    const signupbtn = document.getElementById('signup-btn-head-id');

    const isMobile = window.innerWidth < 768;

    const isLoggedIn = !!localStorage.getItem('auth_token');

    if(cartbtn) cartbtn.style.display = isLoggedIn ? "flex" : "none";
    if(userimg) userimg.style.display = isLoggedIn ? "flex" : "none";
    if(loginbtn) loginbtn.style.display = !isLoggedIn  ? "block" : "none";
    if(signupbtn) signupbtn.style.display = !isLoggedIn && !isMobile ? "block" : "none";
}

document.addEventListener('DOMContentLoaded', updateHeaderButtons);

window.addEventListener('resize', updateHeaderButtons);

const btn = document.getElementById("cart-btn-id");
  const cart = document.getElementById("cartDrawer");

  btn.addEventListener("click", () => {
    cart.classList.toggle("active");
    document.getElementById('headID').classList.toggle("h");
    loadRentOrders(userId);
    loadTourOrders(userId);
  });


 const userIcon = document.getElementById('usr-img-id');
const dropdownMenu = document.getElementById('dropdownMenu');
userIcon.addEventListener('click', (e) => {
    e.stopPropagation(); 
    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
});
document.addEventListener('click', (e) => {
    if (!dropdownMenu.contains(e.target) && e.target !== userIcon) {
        dropdownMenu.style.display = 'none';
    }
});



function switchMode() {
document.body.classList.toggle("dark");
document.getElementById("cartIcon-id").classList.toggle("dark");
if(document.getElementById("cartIcon-id").classList.contains("dark")){
  document.getElementById("switchID").innerHTML="";
  document.getElementById("switchID").innerHTML="Light Mode";
}
else{
  document.getElementById("switchID").innerHTML="";
  document.getElementById("switchID").innerHTML="Dark Mode";
}
updateCartIcon();


  
}

function updateCartIcon() {
  const cartImg = document.getElementById('cartIcon-id');
  const imgUrl = getComputedStyle(document.body).getPropertyValue('--cart-img').trim();
  cartImg.src = imgUrl.replace(/url\(["']?(.+?)["']?\)/, '$1'); 
}

updateCartIcon();

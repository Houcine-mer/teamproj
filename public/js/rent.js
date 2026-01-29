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


async function loadRentOrders(userId) {
  try {
    const response = await fetch(`/api/checkout/rent/${userId}`);
    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const orders = await response.json();
    const container = document.getElementById("cart-content");
    container.innerHTML = ""; 

    orders.forEach(order => {
      const rentCard = document.createElement("div");
      rentCard.classList.add("rent-card");

      rentCard.innerHTML = `
        <img src="${order.image_url}" alt="${order.name}">

        <div class="rent-info">
          <div class="rent-top">
            <h4>${order.name}</h4>
            <span class="rent-status">RENT</span>
          </div>

          <p class="rent-dates">${formatDate(order.pivot.start_date)} – ${formatEndDate(order.pivot.start_date, order.pivot.number_of_days)}</p>
          
          <div class="rent-bottom">
          <span class="rent-price">total price: $${order.pivot.total_price}</span>
          
                <button class="update-btn-kk" 
                    data-user-id="${userId}" 
                    data-car-id="${order.pivot.car_id}"
                    data-rent-price="${order.rentprice}">✏️</button>
                <button class="remove-btn-kk" 
                    data-user-id="${userId}" 
                    data-car-id="${order.pivot.car_id}">✖</button>

          </div>
        </div>
      `;

      container.appendChild(rentCard);
    });

    document.querySelectorAll(".remove-btn-kk").forEach(btn => {
      btn.addEventListener("click", e => {
        const userId = e.target.dataset.userId;
        const carId = e.target.dataset.carId;
        removeRentOrder(userId, carId);
      });
    });

  } catch (error) {
    console.error("Error fetching rent orders:", error);
  }
}
function formatDate(dateStr) {
  const options = { day: "2-digit", month: "short" };
  return new Date(dateStr).toLocaleDateString("en-US", options);
}
function formatEndDate(startDateStr, days) {
  const date = new Date(startDateStr);
  date.setDate(date.getDate() + days );
  return formatDate(date.toISOString().split("T")[0]);
}


async function removeRentOrder(userId, carId) {
  try {
    const response = await fetch(`api/checkout/rent/${userId}/${carId}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    });

    const data = await response.json();

    if (response.ok) {
      console.log(data.message);
      const card = document.querySelector(`.remove-btn-kk[data-user-id='${userId}'][data-car-id='${carId}']`).closest('.rent-card');
      if (card) card.remove();
    } else {
      console.error("Error deleting order:", data.message);
    }
  } catch (error) {
    console.error("Error deleting order:", error);
  }
}



let selectedCarId = null;
let selectedRentPrice = 0;
document.addEventListener("click", (e) => {
  const btn = e.target.closest(".rent-btn");
  if (!btn) return;

  selectedCarId = btn.dataset.id;
  selectedRentPrice = parseFloat(btn.dataset.rentPrice);

  document.getElementById("rent-modal").classList.add("show");
  const daysInput = document.getElementById("rent-days");
  daysInput.value = 1;
  document.getElementById("rent-total-price").value = `$${selectedRentPrice.toFixed(2)}`;
});
document.getElementById("close-rent-modal").addEventListener("click", () => {
  document.getElementById("rent-modal").classList.remove("show");
});

document.getElementById("rent-days").addEventListener("input", (e) => {
  let days = parseInt(e.target.value) || 1;
  let total = selectedRentPrice * days;
  document.getElementById("rent-total-price").value = `$${total.toFixed(2)}`;
});



document.getElementById("rent-form").addEventListener("submit", async (e) => {
  e.preventDefault();
  const startDate = document.getElementById("rent-start-date").value;
  const numberOfDays = document.getElementById("rent-days").value;

  if (!userId) {
    alert("login required");
    window.location.href = '/login';
    return;
  }

  const totalPrice = selectedRentPrice * numberOfDays;

  try {
    const response = await fetch(`api/checkout/rent/${userId}/${selectedCarId}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        start_date: startDate,
        number_of_days: numberOfDays,
      })
    });

    const data = await response.json();

    if (response.ok) {
      alert(data.message || "Rent order created!");
      document.getElementById("rent-modal").classList.remove("show");
      loadRentOrders(userId);
    } else {
      alert(data.message || "Error creating rent order");
      document.getElementById("rent-modal").classList.remove("show");
    }

  } catch (error) {
    console.error("Error creating rent order:", error);
    alert("Error creating rent order");
  }
});




let updateRentOrderUserId = null;
let updateRentOrderCarId = null;
let updateRentOrderPrice = 0;

document.addEventListener("click", e => {
  const btn = e.target.closest(".update-btn-kk");
  if (!btn) return;


  console.log("DATASET", btn.dataset);

  updateRentOrderUserId = btn.dataset.userId; 
  updateRentOrderCarId  = btn.dataset.carId;  
  updateRentOrderPrice  = parseFloat(btn.dataset.rentPrice) || 0; 

  const modal = document.getElementById("update-rent-order-modal");
  modal.classList.add("show");


  const daysInput = document.getElementById("update-rent-order-days");
  daysInput.value = 1; 
  document.getElementById("update-rent-order-total").value = `$${updateRentOrderPrice.toFixed(2)}`;


  const startDateInput = document.getElementById("update-rent-order-start-date");
  startDateInput.value = ""; 
});

document.getElementById("update-rent-order-days").addEventListener("input", e => {
  const days = parseInt(e.target.value) || 1;
  const total = updateRentOrderPrice * days;
  document.getElementById("update-rent-order-total").value = `$${total.toFixed(2)}`;
});

document.getElementById("update-rent-order-form").addEventListener("submit", async e => {
  e.preventDefault();

  const startDate = document.getElementById("update-rent-order-start-date").value;
  const numberOfDays = parseInt(document.getElementById("update-rent-order-days").value) || 1;
  console.log(updateRentOrderPrice);

  try {
    const response = await fetch(
      `/api/checkout/rent/${updateRentOrderUserId}/${updateRentOrderCarId}`,
      {
        method: "PATCH",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
          start_date: startDate,
          number_of_days: numberOfDays
        })
      }
    );

    const data = await response.json();

    if (!response.ok) {
      alert(data.message || "Update Rent Order failed");
      return;
    }

    closeUpdateRentOrderModal();
    loadRentOrders(updateRentOrderUserId);

  } catch (err) {
    console.error("Update Rent Order error:", err);
  }
});

function closeUpdateRentOrderModal() {
  document.getElementById("update-rent-order-modal").classList.remove("show");
}




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


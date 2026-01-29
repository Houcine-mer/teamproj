
async function loadTourCars() {
  try {
    const response = await fetch('/api/tour-cars');
    const cars = await response.json();

    const select = document.getElementById('carNameT');
    select.innerHTML = '<option value="">Select a car</option>';

    cars.forEach(car => {
      const option = document.createElement('option');
      option.value = car.id;       // stored
      option.textContent = car.name; // shown
      select.appendChild(option);
    });
  } catch (error) {
    console.error('Failed to load tour cars:', error);
  }
}

loadTourCars();
async function loadTourOrders(userId) {
  try {
    const response = await fetch(`/api/checkout/tour/${userId}`);
    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

    const orders = await response.json();
    const container = document.getElementById("cart-content");

    orders.forEach(order => {
      const rentCard = document.createElement("div");
      rentCard.classList.add("rent-card");

      rentCard.innerHTML = `
        <img src="${order.image_url}" alt="${order.name}">

        <div class="rent-info">
          <div class="rent-top">
            <h4>${order.name}</h4>
            <span class="rent-status">TOUR</span>
          </div>

          <p class="rent-dates">${formatDate(order.pivot.start_date)}</p>
          <p class="rent-dates">${order.pivot.number_of_hours} hours</p>
          
          <div class="rent-bottom">
          <span class="rent-price">total price: $${order.pivot.total_price}</span>
          
                <button class="update-btn-kk-t" 
                    data-user-id="${userId}" 
                    data-car-id="${order.pivot.car_id}"
                    data-rent-price="${order.rentprice}">✏️</button>
                <button class="remove-btn-kk-t" 
                    data-user-id="${userId}" 
                    data-car-id="${order.pivot.car_id}">✖</button>

          </div>
        </div>
      `;

      container.appendChild(rentCard);
    });

    document.querySelectorAll(".remove-btn-kk-t").forEach(btn => {
      btn.addEventListener("click", e => {
        const userId = e.target.dataset.userId;
        const carId = e.target.dataset.carId;
        removeTourOrder(userId, carId);
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
/* =========================
   OPEN / CLOSE MODAL
========================= */
document.getElementById("book-tour-btn").addEventListener("click", () => {
  document.getElementById("createTourModal").classList.add("show");
});

document.getElementById("cancelCreateTour").addEventListener("click", () => {
  document.getElementById("createTourModal").classList.remove("show");
});

/* =========================
   SUBMIT TOUR ORDER
   ROUTE: /checkout/tour/{id}/{carID}
========================= */
document.getElementById("createTourForm").addEventListener("submit", async (e) => {
  e.preventDefault();

  const user = JSON.parse(localStorage.getItem("user_data"));
  if (!user) {
    alert("Please login first");
    return;
  }

  const user_id = user.id;
  const car_id = document.getElementById("carNameT").value;

  const data = {
    start_date: document.getElementById("DateT").value,
    number_of_hours: document.getElementById("DurationT").value
  };

  try {
    const res = await fetch(`/api/checkout/tour/${user_id}/${car_id}`, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json"
      },
      body: JSON.stringify(data)
    });

    const result = await res.json();

    if (!res.ok) {
      throw new Error(result.message || "Failed to book tour");
    }

    alert("Tour booked successfully ✅");
    document.getElementById("createTourForm").reset();
    document.getElementById("createTourModal").classList.remove("show");

  } catch (error) {
    console.error(error);
    alert(error.message);
  }
});


async function removeTourOrder(userId, carId) {
  try {
    const response = await fetch(`api/checkout/tour/${userId}/${carId}`, {
      method: 'DELETE',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
      }
    });

    const data = await response.json();

    if (response.ok) {
      console.log(data.message);
      const card = document.querySelector(`.remove-btn-kk-t[data-user-id='${userId}'][data-car-id='${carId}']`).closest('.rent-card');
      if (card) card.remove();
    } else {
      console.error("Error deleting order:", data.message);
    }
  } catch (error) {
    console.error("Error deleting order:", error);
  }
}




let updateTourOrderUserId = null;
let updateTourOrderCarId = null;

document.addEventListener("click", e => {
  const btn = e.target.closest(".update-btn-kk-t");
  if (!btn) return;


  console.log("DATASET", btn.dataset);

  updateTourOrderUserId = btn.dataset.userId; 
  updateTourOrderCarId  = btn.dataset.carId;  

  const modal = document.getElementById("updateTourModal");
  modal.classList.add("show");



  const startDateInput = document.getElementById("DateTU");
  startDateInput.value = ""; 
});


document.getElementById("updateTourForm").addEventListener("submit", async e => {
  e.preventDefault();

  const startDate = document.getElementById("DateTU").value;
  const numberOfHours = parseInt(document.getElementById("DurationTU").value) || 1;

  try {
    const response = await fetch(
      `/api/checkout/tour/${updateTourOrderUserId}/${updateTourOrderCarId}`,
      {
        method: "PATCH",
        headers: {
          "Content-Type": "application/json",
          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
          start_date: startDate,
          number_of_hours: numberOfHours
        })
      }
    );

    const data = await response.json();

    if (!response.ok) {
      alert(data.message || "Update Tour Order failed");
      return;
    }

    closeUpdateTourOrderModal();
    loadRentOrders(updateTourOrderUserId);
    loadTourOrders(updateTourOrderUserId);

  } catch (err) {
    console.error("Update Tour Order error:", err);
  }
});

function closeUpdateTourOrderModal() {
  document.getElementById("updateTourModal").classList.remove("show");
}




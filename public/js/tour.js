
let tourCarsList = [];

const tourGrid = document.getElementById("tourGrid");

async function loadTourCars() {
    try {
        const response = await fetch('/api/tour-cars');
        if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

        tourCarsList = await response.json(); 

        displayTours(tourCarsList);

    } catch (err) {
        console.error("Error fetching tour cars:", err);
        tourGrid.innerHTML = `<p style="text-align:center;color:#777;">Failed to load tours. Please try again later.</p>`;
    }
}

function displayTours(list) {
    tourGrid.innerHTML = "";

    if (list.length === 0) {
        tourGrid.innerHTML = `<p style="text-align:center;color:#777;">No tours available at the moment.</p>`;
        return;
    }

    list.forEach(car => {
        const card = document.createElement("div");
        card.classList.add("tour-card");
        card.innerHTML = `
            <img src="${car.image_url}" alt="${car.name}">
            <div class="tour-info">
                <h3>${car.brand_name} ${car.name}</h3>
                <p class="price">${car.tourprice} DZD / hour</p>
            </div>
        `;
        tourGrid.appendChild(card);
    });
}
loadTourCars();


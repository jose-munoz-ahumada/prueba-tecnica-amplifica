import Swal from 'sweetalert2';

const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const regionSelect = document.getElementById('region');
const comunaSelect = document.getElementById('comuna');
const formRates = document.getElementById('getRates');
const addToCartButtons = document.querySelectorAll(".add-to-cart");
const removeButton = document.querySelectorAll(".remove-from-cart");
const ratesResponse = document.getElementById("ratesResponse");

const defaultHeaders = {"Content-Type": "application/json", "Accept": "application/json", "X-CSRF-Token": csrfToken};

let regions = [];

document.addEventListener("DOMContentLoaded", function () {
    addToCartButtons.forEach(button => {
        button.addEventListener("click", async (e) => {
            e.preventDefault();
            const productId = e.target.dataset.productId;
            addToCart(productId);
        });
    })

    removeButton.forEach(button => {
        button.addEventListener("click", async (e) => {
            e.preventDefault();
            const productId = e.target.dataset.productId;
            removeFromCart(productId, e.target);
        });
    })

    if (formRates) {
        formRates.addEventListener('submit', function (event) {
            event.preventDefault();
            getRates(event.target);
        });

        initRegions();
    }
});

function errorHandler(errorData) {
    const errors = errorData.errors || errorData.error;

    if (typeof errors === 'object') {
        const errorText = Object.values(errors).join(', ');
        throw new Error(errorText || 'Error desconocido');
    } else {
        throw new Error(errorData.error || 'Error en la solicitud: ' + response.statusText);
    }
}

function showLoader() {
    Swal.fire({
        title: 'Cargando, espere un momento..',
        allowEscapeKey: false,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    })
}

function errorApi(message) {
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: message || 'Ocurrió un error desconocido',
    });
}

function successApi(message) {
    Swal.fire({
        icon: 'success',
        text: message || 'Ok',
    });
}


function showRates(data) {
    if (data.html) {
        ratesResponse.innerHTML = data.html;
    }
}

function initSelectors(regions) {
    regions.forEach(region => {
        const option = document.createElement('option');
        option.value = region.code;
        option.textContent = region.region;
        regionSelect.appendChild(option);
    });

    regionSelect.addEventListener('change', function () {
        const selectedRegionCode = this.value;

        comunaSelect.innerHTML = '<option value="">Seleccione una comuna</option>';

        if (selectedRegionCode) {
            const selectedRegion = regions.find(region => region.code === selectedRegionCode);

            if (selectedRegion) {
                selectedRegion.comunas.forEach(comuna => {
                    const optionElement = document.createElement('option');
                    optionElement.value = comuna;
                    optionElement.textContent = comuna;
                    comunaSelect.appendChild(optionElement);
                });
            }
        }
    });
}


async function getRates(form) {
    showLoader();
    try {
        let formData = new FormData(form);
        const data = {};
        formData.forEach((value, key) => {
            data[key] = value;
        });

        const response = await fetch(form.action, {
            method: 'POST',
            headers: defaultHeaders,
            body: JSON.stringify(data)
        });

        if (!response.ok) {
            const errorData = await response.json();
            errorHandler(errorData);
        }

        const rates = await response.json();
        showRates(rates);
        Swal.close();
    } catch (error) {
        errorApi(error.message)
    }
}

async function initRegions() {
    showLoader();
    try {
        const response = await fetch("/api/shipping/getRegions", {
            method: "GET",
            headers: defaultHeaders
        });
        if (!response.ok) {
            const errorData = await response.json();
            errorHandler(errorData);
        }
        regions = await response.json();
        initSelectors(regions);
        Swal.close();
    } catch (error) {
        errorApi(error.message)
    }
}

async function removeFromCart(product, button) {
    showLoader();
    try {
        const response = await fetch("/api/cart/update", {
            method: "POST",
            headers: defaultHeaders,
            body: JSON.stringify({product_id: product, action: 'delete'})
        });
        if (!response.ok) {
            const errorData = await response.json();
            errorHandler(errorData);
        }

        let result = await response.json();
        successApi(result.message);
        const row = button.closest('tr');
        if (row) {
            row.remove();
        }
    } catch (error) {
        errorApi(error.message)
    }
}

async function addToCart(product) {
    showLoader();
    try {
        const response = await fetch("/api/cart/update", {
            method: "POST",
            headers: defaultHeaders,
            body: JSON.stringify({product_id: product, action: 'update'})
        });
        if (!response.ok) {
            const errorData = await response.json();
            errorHandler(errorData);
        }

        let result = await response.json();
        successApi(result.message);
    } catch (error) {
        errorApi(error.message)
    }
}

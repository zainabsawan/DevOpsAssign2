// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

function checkout(){
  localStorage.removeItem('cart');
}

var checkbox = document.getElementById('same-address');
var addressInput = document.getElementById('ship-address');
addressInput.disabled = checkbox.checked;
checkbox.addEventListener('change', function() {
  addressInput.value = document.getElementById('address').value;
  addressInput.disabled = checkbox.checked;
});

var cod = document.getElementById('cod');
var cn = document.getElementById('cc-name');
var cnum = document.getElementById('cc-number');
var ce = document.getElementById('cc-expiration');
var cvv = document.getElementById('cc-cvv');

cn.disabled = cod.checked;
cnum.disabled = cod.checked;
ce.disabled = cod.checked;
cvv.disabled = cod.checked;
cod.addEventListener('change', function(){
  cn.disabled = cod.checked;
  cnum.disabled = cod.checked;
  ce.disabled = cod.checked;
  cvv.disabled = cod.checked;
});

const carts = JSON.parse(localStorage.getItem('cart')) || [];
id = document.getElementById("firstName").dataset.id;
userCart=[];
userCartIndex = carts.findIndex( subarray => subarray[0] === id );
if (userCartIndex != -1 ){
  userCart = carts[userCartIndex];
}
else{
  userCart = carts[0];
}
console.log(userCart);
const cart = userCart[1];

function calcTotal(){
  total = 0;
    for(var i=0; i < cart.length; i++){
      total += cart[i][2] * cart[i][3];
    }
    return total;
}

function calcTotalItems(){
  count = 0;
  for(var i = 0 ; i < cart.length ; i++){
    count += cart[i][3];
  }
  return count;
}

document.getElementById('count').innerHTML = calcTotalItems();

cart.forEach(product => {
    document.getElementById('list').innerHTML += `
    <li class="list-group-item d-flex justify-content-between lh-sm">
    <div>
      <h6 class="my-0" name="pname" >${product[1]}</h6>
      <small class="text-body-secondary" name="qty">Qty: ${product[3]}</small>
    </div>
    <span class="text-body-secondary" name="subtotal">$${product[2]*product[3]}</span>
  </li>`;
});

document.getElementById('list').innerHTML +=`
  <li class="list-group-item d-flex justify-content-between lh-sm">
  <div>
    <h6 class="my-0">Grand Total</h6>
  </div>
  <span class="text-body-secondary" name="total">$${calcTotal()}</span>
  </li>
`; 

document.getElementById('cart-data').value = JSON.stringify(cart);

// const cartData = localStorage.getItem('cart');
// fetch('/app/Http/Controllers/CustomerController.php', {
//   method: 'POST',
//   headers: {
//     'Content-Type': 'application/json'
//   },
//   body: JSON.stringify({ cart: cartData })
// })

//====================
// Assume you have some data in localStorage
// var myData = JSON.stringify(cart);

// // Make an AJAX request to the server
// fetch('/checkout', {
//     method: 'POST',
//     headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': '{{ csrf_token() }}', // Laravel CSRF token
//     },
//     body: JSON.stringify({ data: myData }),
// })
// .then(response => response.json())
// .then(data => {
//     // Handle the response from the server
//     console.log(data);
// })
// .catch(error => {
//     console.error('Error:', error);
// });
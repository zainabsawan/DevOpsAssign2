// function suggest(){

//     var term = document.getElementById('search').value;
//     const endpoint = '/products/'+term;
//     const productsList = document.getElementById('productsList');
//     productsList.innerHTML ='';

//     console.log('endpoint');
//     fetch(endpoint)
//     .then(response => {
//         if (!response.ok){
//             throw new Error('HTTP error! Status: ${response.status}')
//         }
//         return response.json();
//     })
//     .then(data => {
//         data.forEach(product => {
//             const listItem = document.createElement('li');
//             listItem.textContent = product.Name;
//             productsList.appendChild(listItem)
//         });
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }

// document.addEventListener('DOMContentLoaded', function () {
//     document.getElementById('search').addEventListener('input', suggest);

// })

// function suggest() {

//     var term = document.getElementById('search').value;
//     const endpoint = 'products/' + term;
//     const productsList = document.getElementById('productsList');
//     productsList.innerHTML = '';

//     console.log('endpoint');
//     fetch(endpoint)
//         .then(response => {
//             if (!response.ok) {
//                 throw new Error('HTTP error! Status: ${response.status}')
//             }
//             return response.json();
//         })
//         .then(data => {
//             data.forEach(product => {
//                 const listItem = document.createElement('li');
//                 listItem.textContent = product.Name;
//                 productsList.appendChild(listItem)
//             });
//         })
//         .catch(error => {
//             console.error('Error:', error);
//         });
// }



document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('search').addEventListener('input', suggest);
});

function suggest() {
    var term = document.getElementById('search').value;
    const endpoint = '/products/' + term;
    const productsList = document.getElementById('productsList');
    productsList.innerHTML = '';

    fetch(endpoint)
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP error! Status: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            if (data.length === 0) {
                const div = document.createElement('div');
                div.className = 'alert';
                div.setAttribute('role', 'alert');
                div.textContent = 'No products found';
                productsList.appendChild(div);
            } else {
                data.forEach(product => {
                    const card = document.createElement('div');
                    card.className = 'col';
                    card.innerHTML = `
                        <div class="card shadow-sm">
                            <img class="bd-placeholder-img card-img-top" width="100%" height="300" src="${product.MainImage}" alt="Product image" />
                            <div class="card-body">
                                <p class="card-text">${product.Name}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                
                                        <div class="btn-group">
                                            <button type="button"  onclick="editP(${product.id})" class="btn btn-sm btn-outline-secondary">Edit</button>
                                            <button type="button" onclick="deleteP(${product.id})" class="btn btn-sm btn-outline-secondary">Delete</button>
                                        </div>
                                   
                                    <small class="text-body-secondary">${product.Price}$ | ${product.Quantity} in stock</small>
                                </div>
                            </div>
                        </div>
                    `;
                    productsList.appendChild(card);
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
        });
}

function editP(id){
    window.location.href = '/editProduct/' + id;
}


function deleteP(id) {
    const confirmation = confirm('Are you sure you want to delete this product?');

    if (confirmation) {
        fetch(`/products/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            },
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('HTTP error! Status: ' + response.status);
            }
            // Handle success if needed
            // For example, you can redirect to a new page or update the UI
            window.location.reload(); // Reload the page after successful deletion
        })
        .catch(error => {
            console.error('Error:', error);
        });
    }
}


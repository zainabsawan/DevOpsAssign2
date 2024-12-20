//localStorage.clear(); 

//'cart': [ [id, [[pi],[pi],[pi]]], [id, [[pi],[pi],[pi]]], [id, [[pi],[pi],[pi]]] ]

//[id, [[pi],[pi],[pi]]]

function addToCart(event, id) {
    const card = event.target.closest('.card');
    const pid = card.dataset.id;
    const pName = card.dataset.name;
    const pPrice = card.dataset.price;
    pQuantity = 1;
    const productInfo = [pid, pName, pPrice, pQuantity];
    const carts = JSON.parse(localStorage.getItem('cart')) || [];
    userCart=[];
    userCartIndex = carts.findIndex( subarray => subarray[0] === id );
    if (userCartIndex != -1 ){
        userCart = carts[userCartIndex];
    
        for(var i = 0; i < userCart[1].length ; i++){
            if (userCart[1][i][0] == pid){
                pQuantity = pQuantity+1;
                productInfo[3] = pQuantity;
                userCart[1][i] = productInfo;
                carts.splice(userCartIndex, 1, userCart);
                localStorage.setItem('cart', JSON.stringify(carts));
                console.log("found user and product: "+localStorage.getItem('cart'));
                return;
            }
        }
        userCart[1].push(productInfo);
        carts.splice(userCartIndex, 1, userCart);
        localStorage.setItem('cart', JSON.stringify(carts));
        console.log("found user not product: "+localStorage.getItem('cart'));
    }
    else{
        userCart = [id, []];
        userCart[1].push(productInfo);
        carts.push(userCart);
        localStorage.setItem('cart', JSON.stringify(carts));
        console.log("not user not product: "+localStorage.getItem('cart'));
    }
            
}
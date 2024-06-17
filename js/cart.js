const product = [
{
id: 0,
image: '../images/beach_baju.jpg',
title: 'Kaos Beach',
price: 120,
},
{
id: 1,
image: '../images/dj_baju.jpg',
title: 'Kaos DJ',
price: 120,
},
{
id: 2,
image: '../images/catcher_baju.jpg',
title: 'Kaos Catcher',
price: 120,
},
{
id: 3,
image: '../images/dance_baju.jpg',
title: 'Kaos Dance',
price: 120,
}
];

const categories = [...new Set(product.map((item)=>
{return item}))]
let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var{image, title, price} = item;
    return(
        `<div class='box'>
        <div class='img-box'>
        <img class='image' src =${image}></img>
        </div>
        <div class='bottom'>
        <p>${title}</p>
        <h2>$ ${price}.000</h2>`+
        "<button onclick='addtocart("+(i++)+")'>Add to cart</button>"+
        `</div>
        </div>`
    );
}).join('')

var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}

function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(a){
    let j=0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "RP "+0+".00";
    }
    else{
        document.getElementById('cartItem').innerHTML = cart.map((items)=>
        {
            var{image, title, price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "RP "+total+".000";
            return(
            `<div class='cart-item'>
            <div class='row-img'>
            <img class='rowing' src =${image}>
            </div>
            <p style='font-size:12px;'>${title}</p>
            <h2 style='font-size: 15px;'>$ ${price}.000</h2>`+
            "<i class='ri-delete-bin-line' onclick='delElement("+(j++)+")'></i></div>"
            );
        }).join('');
    }
}
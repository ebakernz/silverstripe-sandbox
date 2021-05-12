import Client from 'shopify-buy';

// Initializing a client to return content in the store's primary language
const client = Client.buildClient({
  domain: 'emmas-sandbox-store.myshopify.com',
  storefrontAccessToken: 'bac10ed49f115f9ef2900fd51d77783f'
});


client.product.fetchAll().then((products) => {
    // Do something with the products
    console.log(products);
});

console.log('single product');

const productId = '6548105822358=';

client.product.fetch(productId).then((product) => {
    // Do something with the product
    console.log(product);
});
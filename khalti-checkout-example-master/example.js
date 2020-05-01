var config = {
    // replace the publicKey with yours
    "publicKey": "live_public_key_969c3f06eca040728f13a2351d765707",
    "productIdentity": "1234567890",
    "productName": "Dragon",
    "productUrl": "http://gameofthrones.wikia.com/wiki/Dragons",
    "eventHandler": {
        onSuccess(payload) {
            // hit merchant api for initiating verfication
            console.log(payload);
        },
        onError(error) {
            console.log(error);
        }
    }
};

var checkout = new KhaltiCheckout(config);
var btn = document.getElementById("payment-button");
btn.onclick = function () {
    checkout.show({ amount: 1000 });
}
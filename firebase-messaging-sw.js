// importScripts('https://www.gstatic.com/firebasejs/5.5.8/firebase.js');
// importScripts('https://www.gstatic.com/firebasejs/5.5.8/firebase-app.js');
// importScripts('https://www.gstatic.com/firebasejs/5.5.8/firebase-messaging.js');

 // Initialize Firebase

 var config = {
  apiKey: "AIzaSyD8_tGbhN4d7ee0bRA4hDSUKMKHDZOFOQU",
  authDomain: "orangetaxi-22969.firebaseapp.com",
  databaseURL: "https://orangetaxi-22969.firebaseio.com",
  projectId: "orangetaxi-22969",
  storageBucket: "orangetaxi-22969.appspot.com",
  messagingSenderId: "335583018888"
};
firebase.initializeApp(config);

var messaging = firebase.messaging();

// Retrieve Firebase Messaging object.
const messaging = firebase.messaging();

// messaging.usePublicVapidKey('<YOUR_PUBLIC_VAPID_KEY_HERE>');

messaging.requestPermission().then(function() {
console.log('Notification permission granted.');
// TODO(developer): Retrieve an Instance ID token for use with FCM.
// ...
getRegToken();
}).catch(function(err) {
console.log('Unable to get permission to notify.', err);
});

// get registration token
// Get Instance ID token. Initially this makes a network call, once retrieved
// subsequent calls to getToken will return from cache.
function getRegToken(params) {
messaging.getToken().then(function(currentToken) {
if (currentToken) {
    // sendTokenToServer(currentToken);
    // updateUIForPushEnabled(currentToken);
    console.log(currentToken);
} else {
    // Show permission request.
    console.log('No Instance ID token available. Request permission to generate one.');
    // Show permission UI.
    // updateUIForPushPermissionRequired();
    setTokenSentToServer(false);
}
}).catch(function(err) {
console.log('An error occurred while retrieving token. ', err);
// showToken('Error retrieving Instance ID token. ', err);
setTokenSentToServer(false);
});
}

// setTokenSentToServer

function setTokenSentToServer(sent) {
window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}
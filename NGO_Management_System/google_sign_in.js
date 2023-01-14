// Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.9.3/firebase-app.js";
  import { getAuth ,GoogleAuthProvider, signInWithRedirect, getRedirectResult, signInWithPopup, signOut } from "https://www.gstatic.com/firebasejs/9.9.3/firebase-auth.js";
  import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.9.3/firebase-analytics.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyBVvfucAZ8bYN_ZEfx_eUiQZLenZ7_rKdY",
    authDomain: "nomadic-portal-360605.firebaseapp.com",
    projectId: "nomadic-portal-360605",
    storageBucket: "nomadic-portal-360605.appspot.com",
    messagingSenderId: "519140106958",
    appId: "1:519140106958:web:ebed45fe3bf115937d269f",
    measurementId: "G-8VJG8E9B7T"
  };

  // Initialize Firebase
  const app = initializeApp(firebaseConfig);
  const auth = getAuth(app);
  const analytics = getAnalytics(app);
  const provider = new GoogleAuthProvider(app);

 login.addEventListener('click',(e) => {
   

 signInWithPopup(auth, provider)
   .then((result) => {
     // This gives you a Google Access Token. You can use it to access the Google API.
     const credential = GoogleAuthProvider.credentialFromResult(result);
     const token = credential.accessToken;
     // The signed-in user info.
    let id = Math.floor((Math.random() * 999999) + 100000); 
    const user = result.user;
    var uid = user.uid;
    const displayName = user.displayName; 
    var email = user.email;
    var phoneNumber = user.phoneNumber;
    const photoURL = user.photoURL;
    const emailVerified = user.emailVerified;
    
        window.location.href = "user_profile_2.php?name="+displayName+"&email="+email+"&contact="+phoneNumber+"&id="+id+"";
        console.log(displayName);            
     // ...
   }).catch((error) => {
     // Handle Errors here.
     const errorCode = error.code;
     const errorMessage = error.message;
     // The email of the user's account used.
     const email = error.email;
     // The AuthCredential type that was used.
     const credential = GoogleAuthProvider.credentialFromError(error);
     // ...

     alert(errorMessage);
   });
  });



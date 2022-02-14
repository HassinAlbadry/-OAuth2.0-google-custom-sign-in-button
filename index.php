<html>
<head>
  <script src="https://apis.google.com/js/platform.js" async defer></script>
  <meta name="google-signin-client_id" content="replace with your client id from google">


<body>

  <div class="g-signin2" data-onsuccess="onSignIn"></div>



  <script>

   

  function onSignIn(googleUser) {
  var profile = googleUser.getBasicProfile();
  var id_token = googleUser.getAuthResponse().id_token;

  console.log('this is the token',id_token);

  console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  console.log('Name: ' + profile.getName());
  console.log('Image URL: ' + profile.getImageUrl());
  console.log('Email: ' + profile.getEmail()); // This is null if the 'email' scope is not present.
 

      var xhr = new XMLHttpRequest();
      xhr.open('POST', './signup.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
     

      xhr.send(`email=${profile.getEmail()}&name=${profile.getName()}`);



}
  </script>



  <a href="#" onclick="signOut();">Sign out</a>
<script>
  function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }
</script>
</body>
</html>
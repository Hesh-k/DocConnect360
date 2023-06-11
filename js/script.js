var check = function() {
    if (document.getElementById('pwd1').value == document.getElementById('pwd2').value) {
      document.getElementById('msg').style.color = 'green';
      document.getElementById('msg').innerHTML = 'Passwords matching';
    } else {
      document.getElementById('msg').style.color = 'red';
      document.getElementById('msg').innerHTML = 'Passwords not matching';
    }
  }
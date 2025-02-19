<?php
session_start();
if (isset($_SESSION['unique_id'])) {
  header("location: ../users.php");
}
?>
<?php include_once "../header.php"; ?>
<?php include_once "../php/alerts.php"; ?>

<?php
if (isset($_GET['auth'])) {

  if ($_GET['auth'] == 'login') {

    require 'login.php';
  }
  if ($_GET['auth'] == 'signup') {

    require 'signup.php';
  }
}
?>
<script>
  document.addEventListener('contextmenu', event => event.preventDefault());
  document.onkeydown = function (e) {
    if (event.keyCode == 123) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) {
      return false;
    }
    if (e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) {
      return false;
    }
  }
</script>

<script src="https://unpkg.com/flowbite@1.5.5/dist/flowbite.js"></script>
<script>
  function nospaces(t){
  if(t.value.match(/\s/g)){
    t.value=t.value.replace(/\s/g,'');
  }
}
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
<script src="../javascript/showPass.js"></script>
<script src="../javascript/login.js"></script>
</body>

</html>

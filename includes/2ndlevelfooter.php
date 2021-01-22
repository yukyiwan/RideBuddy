<?php ?>
<footer>
  <div class="botnav">
  <nav>

    <?php if(isset($_SESSION["personId"])){ ?>
      <a href="../welcome.php">Home</a>
      <a href="../rides/rides.php?personId=<?php echo($_SESSION["personId"]); ?>">Rides</a>
      <a href="../rides/buddies.php?personId=<?php echo($_SESSION["personId"]); ?>">Buddies</a>
      <a href="../profiles/profile.php?profileId=<?php echo($_SESSION["personId"]); ?>">Profile</a>
      <a href="../contact.php">Contact</a>
      <?php }?>

</nav>
</div>
</footer>

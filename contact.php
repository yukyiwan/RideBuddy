<?php
session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Ride Buddy | Contact</title>
    <meta charset="utf-8">
    <meta name="description" content="Ride Buddy is committed to making your experience the best. Let us know how we can improve!">
    <meta name="keywords" content="contact form, query, queries, inquiry, inquiries, enquiries, enquiry, question">
    <link rel="canonical" href="contact.php" />
    <link rel="icon" type="image/x-icon" href = "favicon.ico" />
    <link rel="stylesheet" href="css/contact.css" />

  </head>

  <body>
    <?php include("includes/header.php"); ?>

  <main>

    <h1> Contact Ride Buddy </h1>

    <div class="contactInfo">

      <p>Ride Buddy is committed to making your experience the best. </p><p>Tell us what you love. Let us know how we can improve!  </p>
      <form action = "process-contact.php" method="POST">

            <label class="label" for "fName"> First Name: </label>
            <input type = "text"  name="fName" placeholder="First Name"  required /><br>

            <label class="label" for "lName"> Last Name: </label>
            <input type = "text" name="lName" placeholder="Last Name" required /><br>

            <label class="label" for "email"> Email: </label>
            <input type = "email" name = "email" placeholder="Email" required /><br>

            <label class="label" for "message">Message:</label><br>
              <textarea class="message" placeholder="We love hearing from you"  name="message" rows="4" cols="40"></textarea><br>

            <input  type="hidden" name="time" value="<?php echo date("Y-m-d h:i:s", time()); ?>" />

          <div id="submit">
            <input class="submit" type="submit" value = "Submit"/>
          </div>

      </form>
    </div>

  </main>
  <?php include("includes/footer.php"); ?>

  </body>
  </html>

<?php include ("partials/database.php");
include("partials/header.php");?>

<main role="main" class="container mt-5">
  <div class="jumbotron text-justify">
    <h1>Return and Refund</h1>
    <p class="lead">All customers are entitled to a 15-day return policy when they purchase the organic product.</p>
    <h3><u>Conditions for Return/Refund</u></h3>
    <p class="lead">Customers' returns will only be accepted with the following conditions:</p>
    <ul>
        <li>Wrong product(s) has been delivered by the seller</li>
        <li>Damaged or Faulty products</li>
    </ul>
    <h3><u>Customers' Return/Refund options</u></h3>
    <p class="lead">Depending on the Return/Refund request, customers will see the following options:</p>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Return Reason</th>
      <th scope="col">Solutions that Customers can choose</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Non-Receipt</td>
      <td>Refund ONLY</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Missing Products</td>
      <td>Return and Refund</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Packaging Damaged / Expired / Wrong </td>
      <td>Return and Refund</td>
    </tr>
  </tbody>
</table>

  <a class="btn btn-lg btn-success" href="home.php" role="button">&laquo; Back to Home </a>
  </div>
</main>


<?php include("partials/footer.php");?>
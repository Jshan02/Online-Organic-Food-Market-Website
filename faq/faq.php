<?php
session_start();

if (!isset($_SESSION["user"])){
    header("Location: ../general/LogIn.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>FAQ PAGE</title>
    
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Magra:wght@400;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    
    <link rel="stylesheet" href="faqStyles.css">

    <style>
        
    </style>

</head>
<body>
    <?php include("../product/partials/header.php");?>
    <main>
        <h1 class="faq-heading">Frequently Asked Questions(FAQs)</h1>
        <section class="faq-container">
            <div class="faq-one">

                <!-- faq question -->
                <h1 class="faq-page">When will I receive my order? </h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>It generally takes about 1 to 14 working days, 
                        depending on the location of the shipping address. 
                        The working days are excluding public holidays and weekends. </p>
                </div>
            </div>
            <hr class="hr-line">

            <div class="faq-two">

                <!-- faq question -->
                <h1 class="faq-page">How can I buy a product?</h1>

                <!-- faq answer -->

                <div class="faq-body">
                    <p>Click on the preferred product, click on order now and proceed to payment. 
                        You will be notified once the order is confirmed. </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-three">

                <!-- faq question -->
                <h1 class="faq-page">What is the return policy?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>a. Buyers could click on the “Refund and Return” button IF there is any incomplete or broken product received.<br>
                    b. Buyers will have the maximum of 5 days to ship back the item upon arrival.<br>
                    c. The shipping fees will be returned to buyer based on the bank account number provided by the buyer. </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-four">

                <!-- faq question -->
                <h1 class="faq-page">Can I cancel OR change my order details?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>a. If order has been shipped out, it cannot be changed or cancelled.<br>
                    b. If order has not been shipped out, order details is unchangeable but cancellation is allowed.</p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-five">

                <!-- faq question -->
                <h1 class="faq-page">How are the shipping fees counted?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>a. The shipping fees will be based upon East and West Malaysia. The shipping fees will be counted as below: -<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i.	East Malaysia: RM10<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii.	West Malaysia: RM8<br>
                    b.	FREE shipping for buyers who purchased RM100 and above.  
</p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-six">

                <!-- faq question -->
                <h1 class="faq-page">Why I’m not allowed to claim free shipping vouchers? </h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>a. Free Shipping Vouchers have been fully redeemed by other users.<br>
                    b. User might not fulfill the voucher’s Terms and Conditions. </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-seven">

                <!-- faq question -->
                <h1 class="faq-page">How can I change my account’s username or password? </h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>Go to “My Account” --> Click on “My Profile” --> Click on the
                         related tab to change the details. </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-eight">

                <!-- faq question -->
                <h1 class="faq-page">How do I claim for Lost & Damaged parcels? </h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>a. Lost Parcels<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i.	Make sure to raise the claim within 7 days after the parcel’s estimation delivered date<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii.	Provide supporting documents (Invoice of shipment) as evidence.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii. Provide the delivered information (Proof of delivery & Recipient Name) IF the parcel has been delivered to other location.<br>
                    b. Damaged Parcels<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i. Make sure to raise the claim within 48 hours after the parcel’s arrival date.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii. Provide supported documents (photos / videos) of damaged parcel and actual item(s) as evidence.<br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii. Provide invoice of shipment as evidence.<br>
</p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-nine">

                <!-- faq question -->
                <h1 class="faq-page">How many shipping methods do I have to ship my orders?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>Organic-X is shipping the products with our own delivery service. </p>
                </div>
            </div>
            <hr class="hr-line">


            <div class="faq-ten">

                <!-- faq question -->
                <h1 class="faq-page">How long is the refund process after it has been approved?</h1>

                <!-- faq answer -->
                <div class="faq-body">
                    <p>Normally, it takes about 2 – 3 working days. </p>
                </div>
            </div>
        </section>
    </main>
    <script src="faqScript.js"></script>
    <?php include("../product/partials/footer.php");?>
</body>
</html>
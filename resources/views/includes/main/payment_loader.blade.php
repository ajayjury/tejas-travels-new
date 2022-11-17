<style>
    .payment_loader{
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.8);
        z-index: 22222;
        display: grid;
        place-items: center;
    }
    .text-payment-holder{
        text-align: center;
        color: white !important;
    }
    .text-payment-holder h2, .text-payment-holder h5{
        color: white !important;
    }
    #payment_loader{
        display: none;
    }
</style>
<div id="payment_loader" class="payment_loader">
    <div class="text-payment-holder">
        <h2>Payment Proccessing...</h2><br/>
        <h5>Please wait till we process the payment!</h5>
    </div>
</div>
<?php include "includes/components/html-header.php"; displayTitle("Print"); importStyleSheets(['base'])?>
<?php include "includes/functions/security.php"; ?>
<?php include "includes/functions/transactions.php"; ?>

<style>
    section {
        padding: 10px;
        gap: 50px;
    }
    .top h2, .top h4 {
        text-align: center;
    }
    
    @media (min-width: 1240px) {
        section {
            padding: 100px;
        }
        .bottom {
            width: 30%;
        }
    }
</style>
<?php
if (isset($_GET['r'])) {
    $request = $_GET['r'];

    switch ($request) {
        case 'user':
            if (isset($_GET['c']) && transactionExists($_GET['c'])) {
                $transactionCode = $_GET['c'];
                $stmt = $connection->prepare("SELECT * FROM `users_transaction` WHERE `transaction_code` = :s1");
                $stmt->bindParam(":s1", $transactionCode);
                $stmt->execute();
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
                $name = $result['transaction_name'];
                $amnt = $result['transaction_amount'];
                $date = $result['transaction_date'];
                $stat = $result['transaction_status'];
                $code = $result['transaction_code'];
                $user = $result['user_full_name'];
            
            } else {
                redirect("index");
            }
            break;
        
        case 'donation':
            if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['phone']) && isset($_GET['pan']) && isset($_GET['amount']) && isset($_GET['date']) && isset($_GET['ref'])) {
                $name = "Donation";
                $amnt = $_GET['amount'];
                $date = $_GET['date'];
                $stat = "success";
                $code = $_GET['ref'];
                $userName = $_GET['name'];
                $email = $_GET['email'];
                $phone = $_GET['phone'];
                $pan = $_GET['pan'];
            } else {
                redirect("index");
            }
            break;
    }
} else {
    redirect("index");
}

?>

<body>
    <section class="full-width flex column justify-center align-center">
        <div class="top flex column justify-center align-center gap-10px">
            <h2>Transaction Successful</h2>
        </div>
        <div class="bottom flex column justify-center align-center gap-10px">
            <h4>Received with thanks</h4>
            <div class="flex column justify-center align-center gap-10px">
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Name: </h4>
                    <h4><?php echo $userName; ?></h4>
                </div>
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Transaction: </h4>
                    <h4><?php echo $name; ?></h4>
                </div>
                <?php
                if (isset($email) && isset($phone) && isset($pan)) {
                    echo <<<DELIMETER
                    <div class="full-width flex justify-sp-bt align-center gap-10px">
                        <h4>Email: </h4>
                        <h4>{$email}</h4>
                    </div>
                    <div class="full-width flex justify-sp-bt align-center gap-10px">
                        <h4>Phone Number: </h4>
                        <h4>{$phone}</h4>
                    </div>
                    <div class="full-width flex justify-sp-bt align-center gap-10px">
                        <h4>PAN: </h4>
                        <h4>{$pan}</h4>
                    </div>
                    DELIMETER;
                }
                ?>
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Reference Number: </h4>
                    <h4><?php echo $code; ?></h4>
                </div>
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Amount: </h4>
                    <h4><?php echo $amnt; ?></h4>
                </div>
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Date: </h4>
                    <h4><?php echo $date; ?></h4>
                </div>
                <div class="full-width flex justify-sp-bt align-center gap-10px">
                    <h4>Status: </h4>
                    <h4><?php echo $stat; ?></h4>
                </div>
                <div class="full-width flex column jutify-center gap-20px">
                    <h2>SAHYOG FOUNDATION</h2>
                    <h4 style="font-weight: 300;">* This donation is eligible for exemption u/s 80(G) of the Income Tax Act 1961 vide Certificate No: CIT(E)BLR/80G/R-207/AAOTS0874J/ITO(E)-3/Vol 2017-2018 dated 25.5.2017 extended periodically.</h4>
                </div>
            </div>
    </section>
</body>
<script>
    window.onload = window.print();
</script>
</html>
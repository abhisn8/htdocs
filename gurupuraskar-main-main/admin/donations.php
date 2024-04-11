<?php include "includes/components/html-header.php"; displayTitle("Donations"); importStyleSheets(["input", "admin-panel", "donations", "dash-success"]); ?>
<?php include "../includes/functions/security.php"; ?>
<?php include "includes/functions/security.php"; ?>
<?php include "../includes/functions/cookies.php"; ?>
<?php include "../includes/functions/user.php"; ?>
<?php include "includes/components/donations-table.php"; ?>
<?php include "../includes/components/popups.php"; ?>

<?php
if (!isAdminLoggedIn()) {
    redirect("index");
}
?>

<body>
    <?php include "includes/components/mobile-navbar.php"; ?>
    
    <main>
        <div class="tab-nav flex align-center">
            <img src="./../assets/svg/donations-logo.svg" alt="">
            <h4>Donations</h4>
        </div>
        
        <?php include "includes/components/sidebar.php"; ?>
        
        <div class="donations">
            <div class="donations-topbar">
                <h3>DONATIONS</h3>
                <div class="top-bar-controls flex column justify-center">
                    <form method="GET" class="searchbar flex justify-start align-center">
                        <img src="./../assets/svg/search-icon.svg" alt="">
                        <input type="search" name="q" placeholder="Search by user ID or by reference number">
                    </form>
                    <div class="navigator flex justify-start align-center">
                        <button class="donation-toggle-btns all selected" type="button">All</button>
                        <button class="donation-toggle-btns success" type="button">Successful</button>
                        <button class="donation-toggle-btns pending" type="button">Pending</button>
                        <button class="donation-toggle-btns failure" type="button">Failed</button>
                        <button class="donation-toggle-btns refund" type="button">Refunded</button>
                        <button class="donation-toggle-btns donation" type="button">Donations</button>
                    </div>
                </div>
            </div>

            <table>
                <thead>
                    <tr>
                        <td>User</td>
                        <td>Reference</td>
                        <td>Date</td>
                        <td>Amount</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>

                <?php
                // Displays the tables of donation.
                if (isset($_GET['q'])) {
                    $user = $_GET['q'];
                    
                    echo displayDonationsOfUser($user);
    
                    echo displayDonationsOfUser($user, "success", "success");
    
                    echo displayDonationsOfUser($user, "failure", "failure");
    
                    echo displayDonationsOfUser($user, "pending", "pending");
    
                    echo displayDonationsOfUser($user, "refunded", "refund");
                } else {
                    echo displayDonations();
    
                    echo displayDonations("success", "success");
    
                    echo displayDonations("failure", "failure");
    
                    echo displayDonations("pending", "pending");
    
                    echo displayDonations("refunded", "refund");

                    echo displayDonations("donation", "donations");
                }
                
                ?>
            </table>
        </div>
    </main>
`
    <?php include "includes/components/mobile-sidebar.php"; ?>

    <section id="prompt-popup" class="popup-bg flex justify-center align-center">
        <div class="popup flex column justify-center align-center">
            <h3>Block Firstname Lastname</h3>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button>
                    <h3>Block</h3>
                </button>
            </div>
        </div>
    </section>
    <section id="form-popup" class="popup-bg flex justify-center align-center">
        <div class="popup flex column justify-center align-center gap-20px">
            <h3>Edit score</h3>
            <div class="input-field full-width flex column align-start">
                <span class="input-field-title flex full-width justify-start gap-10px">
                    <h5>Score</h5>
                </span>
                <input type="text" name="" id="">
            </div>
            <div class="popup-btns flex justify-center align-center">
                <button>
                    <h3 class="fw-200">Cancel</h3>
                </button>
                <button>
                    <h3>Edit</h3>
                </button>
            </div>
        </div>
    </section>

    <?php
    if (isset($_GET['receipt'])) {
        $ref = $_GET['receipt'];

        echo displayPrintPopup($ref);
    }
    ?>
</body>
<script src="./scripts/donations.js"></script>
</html>
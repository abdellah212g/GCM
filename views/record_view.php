<?php 
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php'; 
?>

<div class="w3-col">
<div class="w3-container w3-white w3-padding-16">
    <h5>Medical Record</h5>
    <form action="index.php?page=record" method="post">
        <div class="w3-row-padding" style="margin:0 -16px;">
            <div class="w3-margin-bottom w3-half">
                <label for="civ"><i class="fa fa-calendar-o"></i> Civ</label>
                <select class="w3-input w3-border" name="civ" id="civ">
                    <option value="mr">Mr</option>
                    <option value="mme">Mme</option>
                </select>
            </div>
            <div class="w3-margin-bottom w3-half">
                <label for="date"><i class="fa fa-calendar-o"></i> Birth</label>
                <input class="w3-input w3-border" type="date" name="birth" id ="date" required>
            </div>
            <div class="w3-margin-bottom w3-half">
                <label for="fname"><i class="fa fa-calendar-o"></i> First Name</label>
                <input class="w3-input w3-border" placeholder="First Name" type="text" name="fname" required>
            </div>
            <div class="w3-margin-bottom w3-half">
                <label for="lname"><i class="fa fa-calendar-o"></i> Last Name</label>
                <input class="w3-input w3-border" placeholder="Last Name" type="text" name="lname" required>
            </div>
            <div class="w3-margin-bottom w3-half">
                <label for="address"><i class="fa fa-calendar-o"></i> Address</label>
                <input class="w3-input w3-border" placeholder="Address" type="text" name="address" id="address" required>
            </div>
            <div class="w3-margin-bottom w3-half">
                <label for="phone"><i class="fa fa-calendar-o"></i> Phone Number</label>
                <input class="w3-input w3-border" name="phone" type="tel" placeholder="Phone Number" pattern="[0-9]{10}" id="phone" required/>
            </div>
            <div class="w3-margin-bottom w3-padding-small">
                <label for="comment"><i class="fa fa-child"></i> Comment</label>
                <textarea class="w3-input w3-border" type="text" name="comment" id="comment"></textarea>
            </div>
        </div>
        <button class="w3-button w3-dark-grey" name="submit" type="submit"><i class="fa fa-id-card w3-margin-right"></i> Submit</button>
    </form>
</div>
</div>
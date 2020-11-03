<?php 
include_once 'includes/header.php';
include_once 'includes/navbar.php';
include_once 'includes/sidebar.php'; 
?>

<div class="w3-col">
<div class="w3-container w3-white w3-padding-16">
    <form method="post">
    <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-margin-bottom">
            <label for="subject"><i class="fa fa-calendar-o"></i> Subject</label>
            <select class="w3-input w3-border" name="cars" id="subject">
                <option value="volvo">Consultation</option>
                <option value="saab">Other</option>
            </select>
        </div>
        <div class="w3-margin-bottom">
            <label id="date"><i class="fa fa-calendar-o"></i> Date</label>
            <input class="w3-input w3-border" type="date" name="CheckOut" required>
        </div>
        <div class="w3-margin-bottom">
            <label for="time"><i class="fa fa-male"></i> Time</label>
            <input class="w3-input w3-border" type="time" name="Time" id="time" disabled>
        </div>
        <div class="w3-margin-bottom">
            <label for="comment"><i class="fa fa-child"></i> Comment</label>
            <textarea class="w3-input w3-border" type="text" name="Comment" id="comment"></textarea>
        </div>
    </div>
    <button class="w3-button w3-dark-grey" type="submit"><i class="fa fa-search w3-margin-right"></i> Search availability</button>
    </form>
</div>
</div>

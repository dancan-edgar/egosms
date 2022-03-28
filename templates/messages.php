<?php
global $wpdb;
$table_name = $wpdb->prefix.'egosms';
$msg_result = $wpdb->get_results("SELECT * FROM $table_name");
?>

<style>
    .tb-message{
    width: 100%;

}

.th-message{
    background-color: black;
    color: white;
    text-align: left;
    font-size: 15px;
    font-weight: lighter;

}

.tbody-message{

}
</style>

<div class="wrap form-container">
    <h1 style="font-weight: 500;text-transform: uppercase">SENT MESSAGES</h1>
    <hr />
    <?php settings_errors(); ?>

    <table class="tb-message" cellspacing="0">
        <tr class="th-message">
            <th>Date & Time</th>
            <th>Sender ID</th>
            <th>Receipient</th>
            <th>Message</th>
        </tr>
        <?php
            foreach($msg_result as $msg_row) { 
            $datetime = $msg_row->send_date;
            $sender = $msg_row->sender_id;
            $receipient = $msg_row->receipient;
            $message = $msg_row->message_body;
            
        ?>
        <tr class="tbody-message">
            <td><?php echo $datetime; ?></td>
            <td><?php echo $sender; ?></td>
            <td><?php echo $receipient; ?></td>
            <td><?php echo $message; ?></td>
        </tr>
        <?php  } ?>
    </table>

    <p class="msg"></p>
</div>